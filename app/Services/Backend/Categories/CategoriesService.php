<?php
namespace App\Services\Backend\Categories;

use App\Models\Category;
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
        return Category::all();
    }

    public function updateCategory(array $data) : array
    {
        dd($data);
        try
        {
            return [true, Category::findOrFail($data['id'])->update([
                'name' => $data['name']
            ])];
        }catch(QueryException $e)
        {
            return [false, $e->getMessage()];
        }
    }

    public function createCategory(array $data) : array
    {
        try
        {
            return [true, Category::create($data)];
        } catch(QueryException $e)
        {
            return [false, $e->getMessage()];
        }
    }
}
