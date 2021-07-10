<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\CustomerService;
use App\Services\CountriesInfo as CountriesInfo;
use App\Constants\Constants;
class PhonesController extends Controller
{
    public function index($country_code = Constants::DEFAULT_ALL, $state = Constants::DEFAULT_ALL)
    {
        
        $customer_service = new CustomerService;
        $customers = $customer_service->filterCustomerInfo($country_code , $state);
        
        $countries = array(Constants::COUNTRY_CODE_CAMEROON   => Constants::COUNTRY_NAME_CAMEROON,
                           Constants::COUNTRY_CODE_ETHIOPIA   => Constants::COUNTRY_NAME_ETHIOPIA,
                           Constants::COUNTRY_CODE_MOROCCO    => Constants::COUNTRY_NAME_MOROCCO,
                           Constants::COUNTRY_CODE_MOZAMBIQUE => Constants::COUNTRY_NAME_MOZAMBIQUE, 
                           Constants::COUNTRY_CODE_UGANDA     => Constants::COUNTRY_NAME_UGANDA
                        );
        
        return view('phones')->with(Constants::CUSTOMERS_KEY, $customers)
                             ->with(Constants::COUNTRIES_KEY, $countries)
                             ->with(Constants::COUNTRY_CODE_KEY, $country_code)
                             ->with(Constants::STATE_KEY, $state);
    }
}
