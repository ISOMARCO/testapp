<?php

namespace App\Http\Controllers\Backend\Categories;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\Backend\Categories\CategoriesService;
class CategoriesController extends Controller
{
    public function __construct(CategoriesService $categoriesService)
    {
    }

    public function index()
    {
        $categories = $this->categoriesService->getCategories();
        return view('Backend.pages.categories.index', compact('categories'));
    }
}
