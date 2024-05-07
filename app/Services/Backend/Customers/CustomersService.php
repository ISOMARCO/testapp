<?php
namespace App\Services\Backend\Customers;

use App\Models\User;
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
        return User::all();
    }
}
