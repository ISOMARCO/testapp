<?php
namespace App\Services\Backend\Customers;
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
