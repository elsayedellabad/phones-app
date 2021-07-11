<?php

namespace App\Utils;
use App\Services\CountriesInfo as CountriesInfo;
use App\Constants\Constants;
class CountriesUtil
{
  /**
   * Get {country} name by using {$phone} param by calling {COUNTRIES_ENUM} of {CountriesInfo} class
   * 
   * @param string $phone
   * @return string
   */
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

  /**
   * Get {state} validation of {$phone} param by calling {preg_match()} PHP regex validaion function
   * 
   * @param string $phone
   * @return string
   */
  public static function getState($phone) {
    $state = '';
    if(isset($phone)){
      $country_code = CountriesUtil::getCode($phone);
      if(isset(CountriesInfo::COUNTRIES_ENUM[$country_code]) ){
        $regex =  '/' . CountriesInfo::COUNTRIES_ENUM[$country_code][Constants::REGEX_KEY] . '/';        
        preg_match($regex, $phone, $matches);
        if(count($matches) > 0){
          return Constants::STATE_OK;
        }
        return Constants::STATE_NOK;
      }
      
    }
    return $state;
  }

  /**
   * Get {code} from {$phone} param
   * 
   * @param string $phone
   * @return string
   */
  public static function getCode($phone) {
    $code = '';
    if(isset($phone)){
      $phone_block = explode(" ",trim($phone));
      $code = '+' . substr(trim($phone_block[0]), strpos($phone_block[0], '(') + 1,  strpos($phone_block[0], ')') -1 );  
    }
    return $code;
  }

  
}
