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
    public $timestamps = false;
    protected  $appends = [Constants::COUNTRY_COL_NAME, Constants::STATE_COL_NAME, Constants::COUNTRY_CODE_COL_NAME, Constants::PHONE_NUM_COL_NAME];

    /**
     * Append {country} name into {CustomerModel} by calling  function {getCountryName} of {CountriesUtil} Utils calss 
     * 
     * @return string
     */
    public function getCountryAttribute(){
        
        return CountriesUtil::getCountryName($this->phone);
    }
    /**
     * Append phone {state} into {CustomerModel} by calling  function {getState()} of {CountriesUtil} Utils calss 
     * 
     * @return string
     */
    public function getStateAttribute(){

        return CountriesUtil::getState($this->phone);
    }

    /**
     * Append {code} into {CustomerModel} by calling  function {getCode()} of {CountriesUtil} Utils calss 
     * 
     * @return string
     */
    public function getCountryCodeAttribute(){

        return CountriesUtil::getCode($this->phone);
    }

    /**
     * Append {phone_num} into {CustomerModel} by calling  function {getCode()} of {CountriesUtil} Utils calss 
     * 
     * @return string
     */
    public function getPhoneNumAttribute(){

        if(isset($this->phone)){
            $phone_block = explode(" ",trim($this->phone));
            return $phone_block[1];
        }
        
    }



}
