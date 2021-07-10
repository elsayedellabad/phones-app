<?php

namespace App\Utils;
use App\Services\CountriesInfo as CountriesInfo;
use App\Constants\Constants;
class CountriesUtil
{

  public static function getCountryName($phone){   
        $country_name = '';
        if(isset($phone)){
            $country_code = CountriesUtil::getCode($phone);
            if(CountriesInfo::COUNTRIES_ENUM[$country_code]){
                $country_name =  CountriesInfo::COUNTRIES_ENUM[$country_code][Constants::COUNTRY_KEY];
            }
        }
        return $country_name;           
        
  }
  
  public static function getState($phone) {

    if(isset($phone)){
      $country_code = CountriesUtil::getCode($phone);
      if( isset(CountriesInfo::COUNTRIES_ENUM[$country_code]) ){
        $regex =  '/' . CountriesInfo::COUNTRIES_ENUM[$country_code][Constants::REGEX_KEY] . '/';        
        preg_match($regex, $phone, $matches);
        if(count($matches) > 0){
          return Constants::STATE_OK;
        }
        return Constants::STATE_NOK;
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
