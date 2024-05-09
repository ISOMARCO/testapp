<?php
namespace App\Services\Backend\Departments;

use App\Models\User;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\DB;

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
        return User::with(['parent' => function($query){
            return $query->select('id', 'name');
        }])->whereNotNull('department')->get();
    }

    /**
     * @return Collection
     */
    public function getCustomers() : Collection
    {
        return User::whereNull('department')->get();
    }

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
}
