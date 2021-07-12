<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use  App\Models\CustomerModel;
class CustomerModelTest extends TestCase
{
    use RefreshDatabase;
    public function test_getting_data_from_customer_model_has_name()
    {
        $customer_model = CustomerModel::factory()->create();
        $customer_name = $customer_model->name;
        $this->assertNotEmpty($customer_name);
    }

    public function test_getting_data_from_customer_model_has_phone()
    {
        $customer_model = CustomerModel::factory()->create();
        $customer_phone = $customer_model->phone;
        $this->assertNotEmpty($customer_phone);
    }
}
