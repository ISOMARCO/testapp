<?php
namespace App\Services\Backend\Categories;

use App\Models\Category;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\QueryException;
class CategoriesService
{
    public function __construct()
    {
    }

    /**
     * @return Collection
     */
    public function getCategories() : Collection
    {
        return Category::all();
    }

    public function updateCategory(array $data) : array
    {
        try
        {
            $id = $data['id'];
            unset($data['id']);
            Category::findOrFail($id)->update($data);
            return [true];
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

    public function deleteCategory(int $id) : array
    {
        try
        {
            Category::findOrFail($id)->delete();
            return [true, $id];
        } catch(QueryException $e)
        {
            return [false, $e->getMessage()];
        }
    }
}
