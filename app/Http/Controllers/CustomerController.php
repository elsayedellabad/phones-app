<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\Customer;

class CustomerController extends Controller
{
    public function index($country_code = 'all', $state = 'all')
    {
        $customer=new Customer;
        return $customers=$customer->all($country_code, $state);
    }
}
