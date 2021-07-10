<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Utils\CountriesUtil ;
use App\Constants\Constants;
class CustomerModel extends Model
{
    use HasFactory;
    protected  $table='customer';
    protected  $appends = [Constants::COUNTRY_COL_NAME, Constants::STATE_COL_NAME, Constants::COUNTRY_CODE_COL_NAME, Constants::PHONE_NUM_COL_NAME];

    public function getCountryAttribute()
    {
        
        return CountriesUtil::getCountryName($this->phone);
    }

    public function getStateAttribute()
    {
        return CountriesUtil::getState($this->phone);
    }

    public function getCountryCodeAttribute()
    {
        return CountriesUtil::getCode($this->phone);
    }

    public function getPhoneNumAttribute()
    {
        if(isset($this->phone)){
            $phone_block = explode(" ",trim($this->phone));
            return $phone_block[1];
        }
        
    }



}
