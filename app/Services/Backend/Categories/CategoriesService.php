<?php
namespace App\Services\Backend\Categories;

use App\Models\Categories;
use Illuminate\Database\QueryException;
class CategoriesService
{
    public function __construct()
    {
    }

    /**
     * @return object
     */
    public function getCategories() : object
    {
        return Categories::all();
    }

    public function createCategory(array $data) : array
    {
        try
        {
            return [true, Categories::create($data)];
        } catch(QueryException $e)
        {
            return [false, $e->getMessage()];
        }
    }
}
