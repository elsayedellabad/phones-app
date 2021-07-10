<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\CustomerService;
use App\Constants\Constants;

class CustomerController extends Controller
{
    public function index($country_code = Constants::DEFAULT_ALL, $state = Constants::DEFAULT_ALL)
    {
        $customer_service=new CustomerService;
        return $customers=$customer_service->filterCustomerInfo($country_code, $state);
    }
}
