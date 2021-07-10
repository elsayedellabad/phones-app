<?php

namespace App\Services;
use Illuminate\Support\Facades\DB;
use App\Models\CustomerModel as CustomerModel;
use App\Services\CountriesInfo as CountriesInfo;
use App\Constants\Constants;
class CustomerService
{    

    public function filterCustomerInfo($country_code = Constants::DEFAULT_ALL, $state = Constants::DEFAULT_ALL){
        $customers= [];
        $validCountries = $this->getByCode($country_code);
        $this->initializeRegexpDBFunction();

        foreach ($validCountries as $validCountry) {
            $key = substr(trim($validCountry[Constants::REGEX_KEY]), strpos($validCountry[Constants::REGEX_KEY], '(') + 1,  strpos($validCountry[Constants::REGEX_KEY], '\)') - 2 );
            $key = '(' . ($key) . ')';
            if($state == Constants::STATE_VALID_KEY || $state == Constants::DEFAULT_ALL){
                $customers = array_merge( $customers , CustomerModel::where('phone', 'REGEXP', $validCountry[Constants::REGEX_KEY])
                ->where('phone', 'like', $key . '%')
                ->get()->toArray());
            } 
            if($state == Constants::STATE_INVALID_KEY || $state == Constants::DEFAULT_ALL){
                $customers = array_merge( $customers , CustomerModel::where('phone', 'NOT REGEXP', $validCountry[Constants::REGEX_KEY])
                ->where('phone', 'like', $key . '%')
                ->get()->toArray());
            }            
        }
        return $customers;
    }
   
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

    private function initializeRegexpDBFunction(){
        if (DB::Connection() instanceof \Illuminate\Database\SQLiteConnection) {               
            DB::connection()->getPdo()->sqliteCreateFunction('REGEXP', function ($pattern, $value) {               
                mb_regex_encoding('UTF-8');
                return (false !== mb_ereg($pattern, $value)) ? 1 : 0;
            });
            
        }
    }   

   

     
}
