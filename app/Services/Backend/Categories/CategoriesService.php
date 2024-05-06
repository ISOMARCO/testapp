<?php
namespace App\Services\Backend\Categories;

use App\Models\Categories;
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

    public function createCategory(array $data) : object
    {
        return Categories::create($data);
    }
}
