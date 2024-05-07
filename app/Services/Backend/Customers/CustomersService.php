<?php
class CustomersService
{
    public function __construct()
    {
    }

    public function getCustomers() : object
    {
        return Customer::all();
    }
}
