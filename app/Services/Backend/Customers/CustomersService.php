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

    /**
     * @param array $data
     * @return array
     */
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

    /**
     * @param array $data
     * @return array
     */
    public function updateCustomer(array $data) : array
    {
        try
        {
            $return = $data;
            $customer = User::findOrFail($data['id']);
            if($data['password'] == NULL)
            {
                unset($data['password']);
            }
            unset($data['password_confirmation']);
            unset($data['id']);
            $customer->update($data);
            return [true, $return];
        } catch(QueryException $e)
        {
            return [false, $e->getMessage()];
        }
    }

    /**
     * @param array $data
     * @return array|true[]
     */
    public function deleteRequest(int $id) : array
    {
        try
        {
            User::findOrFail($id)->delete();
            return [true];
        } catch(QueryException $e)
        {
            return [false, $e->getMessage()];
        }
    }
}
