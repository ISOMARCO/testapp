<?php
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
