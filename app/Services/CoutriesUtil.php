<?php

namespace App\Services;
use App\Services\CountriesInfo as CountriesInfo;
class CoutriesUtil
{

  public static function getCountryName($phone){   
        $country_name = '';
        if(isset($phone)){
            $country_code = CoutriesUtil::getCode($phone);
            if(CountriesInfo::COUNTRIES_ENUM[$country_code]){
                $country_name =  CountriesInfo::COUNTRIES_ENUM[$country_code]['country'];
            }
        }
        return $country_name;           
        
  }
  
  public static function getState($phone) {

    if(isset($phone)){
      $country_code = CoutriesUtil::getCode($phone);
      if( isset(CountriesInfo::COUNTRIES_ENUM[$country_code]) ){
        $regex =  '/' . CountriesInfo::COUNTRIES_ENUM[$country_code]['regex'] . '/';        
        preg_match($regex, $phone, $matches);
        if(count($matches) > 0){
          return 'OK';
        }
        return 'NOK';
      }
      
    }
    return '';
  }


  public static function getCode($phone) {
    if(isset($phone)){
      $phone_block = explode(" ",trim($phone));
      $code = '+' . substr(trim($phone_block[0]), 1,  strlen($phone_block[0]) - 2 );
      return $code;
    }

  }

  
}
