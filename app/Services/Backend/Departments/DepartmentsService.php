<?php
namespace App\Services\Backend\Departments;

use App\Models\User;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\QueryException;

class DepartmentsService
{
    public function __construct()
    {
    }

    /**
     * @return Collection
     */
    public function getDepartments() : Collection
    {
        return User::with('Customer')->whereNotNull('customer')->get();
    }

    /**
     * @return Collection
     */
    public function getCustomers() : Collection
    {
        return User::whereNull('customer')->get();
    }

    /**
     * @param array $data
     * @return array
     */
    public function createDepartment(array $data) : array
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
    public function updateDepartment(array $data) : array
    {
        try
        {
            $return = $data;
            $department = User::findOrFail($data['id']);
            if($data['password'] == NULL)
            {
                unset($data['password']);
            }
            unset($data['password_confirmation']);
            unset($data['id']);
            $department->update($data);
            return [true, $return];
        } catch(QueryException $e)
        {
            return [false, $e->getMessage()];
        }
    }

    /**
     * @param int $id
     * @return array|true[]
     */
    public function deleteDepartment(int $id) : array
    {
        if(auth()->user()->id == $id)
        {
            return [false, 'Bu istifadəçini silmək olmaz'];
        }
        try
        {
            User::findOrFail($id)->delete();
            return [true];
        } catch(QueryException $e)
        {
            return [false, $e->getMessage()];
        }
    }

    /**
     * @param $customerId
     * @return User
     */
    public function getCustomer($customerId) : User
    {
        return User::select(['id', 'name'])->where('id', $customerId)->first();
    }
}
