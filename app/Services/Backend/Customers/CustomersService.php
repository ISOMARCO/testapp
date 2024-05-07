<?php
namespace App\Services\Backend\Customers;

use App\Models\User;
use Illuminate\Database\QueryException;
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

    public function createCustomer(array $data) : array
    {
        try
        {
            unset($data['password_confirmation']);
            return [true, User::create($data)];
        } catch(QueryException $e)
        {
            return [false, $e->getMessage()];
        }
    }
}
