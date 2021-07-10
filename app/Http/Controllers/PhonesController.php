<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\CustomerService;
use App\Services\CountriesInfo as CountriesInfo;

class PhonesController extends Controller
{
    public function index($country_code = 'all', $state = 'all')
    {
        
        $customer_service = new CustomerService;
        $customers = $customer_service->filterCustomerInfo($country_code , $state);
        
        $countries = array("+237" => "Cameroon", "+251" => "Ethiopia", "+212" => "Morocco", "+258" => "Mozambique", "+256" => "Uganda");
        
        return view('phones')->with('customers',$customers)
                             ->with('countries',$countries)
                             ->with('country_code',$country_code)
                             ->with('state', $state);
    }
}
