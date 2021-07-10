<?php

namespace App\Services;
use Illuminate\Support\Facades\DB;
use App\Models\CustomerModel as CustomerModel;
use App\Services\CountriesInfo as CountriesInfo;
class CustomerService
{    

    public function filterCustomerInfo($country_code = 'all', $state = 'all'){
        $customers= [];
        $validCountries = $this->getByCode($country_code);
        $this->initializeRegexpDBFunction();

        foreach ($validCountries as $validCountry) {
            $key = substr(trim($validCountry['regex']), strpos($validCountry['regex'], '(') + 1,  strpos($validCountry['regex'], '\)') - 2 );
            $key = '(' . ($key) . ')';
            if($state == 'valid' || $state == 'all'){
                $customers = array_merge( $customers , CustomerModel::where('phone', 'REGEXP', $validCountry['regex'])
                ->where('phone', 'like', $key . '%')
                ->get()->toArray());
            } 
            if($state == 'invalid' || $state == 'all'){
                $customers = array_merge( $customers , CustomerModel::where('phone', 'NOT REGEXP', $validCountry['regex'])
                ->where('phone', 'like', $key . '%')
                ->get()->toArray());
            }            
        }
        return $customers;
    }
   
    public function getByCode($country_code) {
        $arr = [];
        if($country_code == 'all'){
            $arr = CountriesInfo::COUNTRIES_ENUM;
        } else {
            if(isset(CountriesInfo::COUNTRIES_ENUM[$country_code])){
                array_push($arr, CountriesInfo::COUNTRIES_ENUM[$country_code]);
            }
        }        
        return $arr;            
    }

    public function initializeRegexpDBFunction(){
        if (DB::Connection() instanceof \Illuminate\Database\SQLiteConnection) {               
            DB::connection()->getPdo()->sqliteCreateFunction('REGEXP', function ($pattern, $value) {               
                mb_regex_encoding('UTF-8');
                return (false !== mb_ereg($pattern, $value)) ? 1 : 0;
            });
            
        }
    }   

   

     
}
