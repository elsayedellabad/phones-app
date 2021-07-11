<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\CustomerService;
use App\Constants\Constants;

class CustomerController extends Controller
{
    /**
     * Main API to get countries customers phones according to user filterations values
     * 
     * @param string $country_code
     * @param string $state
     * @return array
     */
    public function index($country_code = Constants::DEFAULT_ALL, $state = Constants::DEFAULT_ALL)
    {
        $customer_service=new CustomerService;
        return $customers=$customer_service->filterCustomerInfo($country_code, $state);
    }
}
