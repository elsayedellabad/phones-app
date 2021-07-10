<?php

namespace App\Services;
use App\Constants\Constants;
class CountriesInfo
{
  

    const COUNTRIES_ENUM = array
    (
      Constants::COUNTRY_CODE_CAMEROON => array
                      (
                        Constants::COUNTRY_KEY => Constants::COUNTRY_NAME_CAMEROON,
                        Constants::REGEX_KEY => Constants::CAMEROON_PHONE_REGEX ,
                      ),
      Constants::COUNTRY_CODE_ETHIOPIA => array
                      (
                        Constants::COUNTRY_KEY => Constants::COUNTRY_NAME_ETHIOPIA,
                        Constants::REGEX_KEY => Constants::ETHIOPIA_PHONE_REGEX ,
                      ),
      Constants::COUNTRY_CODE_MOROCCO => array
                      (
                        Constants::COUNTRY_KEY => Constants::COUNTRY_NAME_MOROCCO,
                        Constants::REGEX_KEY => Constants::MOROCCO_PHONE_REGEX ,
                      ),
      Constants::COUNTRY_CODE_MOZAMBIQUE => array
                      (
                        Constants::COUNTRY_KEY => Constants::COUNTRY_NAME_MOZAMBIQUE,
                        Constants::REGEX_KEY => Constants::MOZAMBIQUE_PHONE_REGEX ,
                      ),
      Constants::COUNTRY_CODE_UGANDA => array
                      (
                        Constants::COUNTRY_KEY =>  Constants::COUNTRY_NAME_UGANDA,
                        Constants::REGEX_KEY => Constants::UGANDA_PHONE_REGEX ,
                      )
    );
}
