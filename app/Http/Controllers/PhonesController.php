<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\Customer;
use App\Services\CountriesInfo as CountriesInfo;

class PhonesController extends Controller
{
    public function index($country_code = 'all', $state = 'all')
    {
        //die(var_dump($country_code . $state ));
        $customer = new Customer;
        $customers=$customer->filterCustomerInfo($country_code , $state);
        
        $countries = array("+237" => "Cameroon", "+251" => "Ethiopia", "+212" => "Morocco", "+258" => "Mozambique", "+256" => "Uganda");
        //var_dump(CountriesInfo::COUNTRIES_ENUM);

        return view('phones')->with('customers',$customers)
                             ->with('countries',$countries)
                             ->with('country_code',$country_code)
                             ->with('state', $state);
    }
}
