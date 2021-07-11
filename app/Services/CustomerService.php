<?php

namespace App\Services;
use Illuminate\Support\Facades\DB;
use App\Models\CustomerModel as CustomerModel;
use App\Services\CountriesInfo as CountriesInfo;
use App\Constants\Constants;
class CustomerService
{    
    /**
     * API to get countries customers phones according to user filterations values
     * 
     * @param string $country_code
     * @param string $state
     * @return array
     */
    public function filterCustomerInfo($country_code = Constants::DEFAULT_ALL, $state = Constants::DEFAULT_ALL){
        $customers= [];
        $validCountries = $this->getByCode($country_code);
        $this->initializeRegexpDBFunction();
        foreach ($validCountries as $validCountry) {
            //Extract Key from Country Regex
            $key = substr(trim($validCountry[Constants::REGEX_KEY]), strpos($validCountry[Constants::REGEX_KEY], '(') + 1,  strpos($validCountry[Constants::REGEX_KEY], '\)') - 2 );
            $key = '(' . ($key) . ')';
            if($state == Constants::STATE_VALID_KEY || $state == Constants::DEFAULT_ALL){
                $customers = $this->executeQuery($customers , 'REGEXP', $validCountry, $key);
            } 
            if($state == Constants::STATE_INVALID_KEY || $state == Constants::DEFAULT_ALL){
                $customers = $this->executeQuery($customers , 'NOT REGEXP', $validCountry, $key);
            }            
        }
        return $customers;
    }
    
    /**
     * Model Query to return required info
     * 
     * @param array $customers
     * @param string $validation_method
     * @param array $validCountry
     * @param string $key
     * @return array
     */
    private function executeQuery($customers, $validation_method, $validCountry, $key) {
        $customers = array_merge( $customers , CustomerModel::where('phone', $validation_method , $validCountry[Constants::REGEX_KEY])
        ->where('phone', 'like', $key . '%')
        ->get()->toArray());
        return $customers;
    }
    
    /**
     * Get countries info[contry_name, country_regex] by calling {COUNTRIES_ENUM} of {CountriesInfo} class
     * 
     * @param array $customers
     * @param string $validation_method
     * @param array $validCountry
     * @param string $key
     * @return array
     */
    private function getByCode($country_code) {
        $arr = [];
        if($country_code == Constants::DEFAULT_ALL){
            $arr = CountriesInfo::COUNTRIES_ENUM;
        } else {
            if(isset(CountriesInfo::COUNTRIES_ENUM[$country_code])){
                array_push($arr, CountriesInfo::COUNTRIES_ENUM[$country_code]);
            }
        }        
        return $arr;            
    }

    /**
     * Initialize {REGEXP} DB function on {SQLITE} engine 
     */
    private function initializeRegexpDBFunction(){
        if (DB::Connection() instanceof \Illuminate\Database\SQLiteConnection) {               
            DB::connection()->getPdo()->sqliteCreateFunction('REGEXP', function ($pattern, $value) {               
                mb_regex_encoding('UTF-8');
                return (false !== mb_ereg($pattern, $value)) ? 1 : 0;
            });
            
        }
    }   

   

     
}
