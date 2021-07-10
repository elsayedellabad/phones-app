<?php

namespace App\Constants;

class Constants
{    
    const DEFAULT_ALL  = 'all';
    const STATE_OK  = 'OK';
    const STATE_NOK  = 'NOK';
    const NO_RESULT_PHONES = 'There are no results for your selected filters, Please select another one';
    //All project Keys
    const COUNTRY_KEY  = 'country';
    const CUSTOMERS_KEY = 'customers';
    const COUNTRIES_KEY = 'countries';
    const COUNTRY_CODE_KEY = 'country_code';
    const STATE_KEY    = 'state';
    const PHONE_NUM_KEY = 'phone_num';
    const REGEX_KEY = 'regex';
    const STATE_VALID_KEY  = 'valid';
    const STATE_INVALID_KEY  = 'invalid';

   

    //Extra Grid Columns Names
    const COUNTRY_COL_NAME  = 'country';
    const COUNTRY_CODE_COL_NAME  = 'country_code';
    const STATE_COL_NAME    = 'state';
    const PHONE_NUM_COL_NAME = 'phone_num';

    //Countries Names
    const COUNTRY_NAME_CAMEROON = 'Cameroon';
    const COUNTRY_NAME_ETHIOPIA = 'Ethiopia';
    const COUNTRY_NAME_MOROCCO  = 'Morocco';
    const COUNTRY_NAME_MOZAMBIQUE = 'Mozambique';
    const COUNTRY_NAME_UGANDA = 'Uganda';

    //Countries Codes
    const COUNTRY_CODE_CAMEROON = '+237';
    const COUNTRY_CODE_ETHIOPIA = '+251';
    const COUNTRY_CODE_MOROCCO  = '+212';
    const COUNTRY_CODE_MOZAMBIQUE = '+258';
    const COUNTRY_CODE_UGANDA = '+256';

     //Countries Phones Regex
     const CAMEROON_PHONE_REGEX = '\(237\)\ ?[2368]\d{7,8}$';
     const ETHIOPIA_PHONE_REGEX = '\(251\)\ ?[1-59]\d{8}$';
     const MOROCCO_PHONE_REGEX  = '\(212\)\ ?[5-9]\d{8}$';
     const MOZAMBIQUE_PHONE_REGEX = '\(258\)\ ?[28]\d{7,8}$';
     const UGANDA_PHONE_REGEX = '\(256\)\ ?\d{9}$';

    
  
}
