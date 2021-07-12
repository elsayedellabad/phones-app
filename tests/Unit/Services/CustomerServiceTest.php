<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;
use App\Services\CustomerService;
class CustomerServiceTest extends TestCase
{       
    

    public function test_getByCode_function_of_Customer_Service_for_all_countries(){
        $customer_Service = new CustomerService();
        $res = $this->callMethod($customer_Service, 'getByCode', ['all']);
        $this->assertEquals(count($res), 5);
    }

    public function test_getByCode_function_of_Customer_Service_for_sample_country(){
        $customer_Service = new CustomerService();
        $res = $this->callMethod($customer_Service, 'getByCode', ['+212']);
        $this->assertEquals($res[0]['country'], 'Morocco');
        $this->assertEquals(count($res), 1);
    }

    public function test_getByCode_function_of_Customer_Service__empty__response(){
        $customer_Service = new CustomerService();
        $res = $this->callMethod($customer_Service, 'getByCode', ['000']);
        $this->assertEquals(count($res), 0);
    }


    private function callMethod($object, string $method , array $parameters = [])
    {
        try {
            $className = get_class($object);
            $reflection = new \ReflectionClass($className);
        } catch (\ReflectionException $e) {
           throw new \Exception($e->getMessage());
        }

        $method = $reflection->getMethod($method);
        $method->setAccessible(true);

        return $method->invokeArgs($object, $parameters);
    }

}
