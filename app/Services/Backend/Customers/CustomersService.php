<?php
namespace App\Services\Backend\Customers;

use App\Models\Customer;
class CustomersService
{
    public function __construct()
    {
    }

    /**
     * @return object
     */
    public function getCustomers() : object
    {
        return Customer::all();
    }
}
