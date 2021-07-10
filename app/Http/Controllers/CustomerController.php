<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\CustomerService;

class CustomerController extends Controller
{
    public function index($country_code = 'all', $state = 'all')
    {
        $customer_service=new CustomerService;
        return $customers=$customer_service->filterCustomerInfo($country_code, $state);
    }
}
