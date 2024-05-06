<?php

namespace App\Http\Controllers\Backend\Categories;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\Backend\Categories\CategoriesService;
class CategoriesController extends Controller
{
    protected $categoriesService;
    public function __construct(CategoriesService $categoriesService)
    {
        $this->categoriesService = $categoriesService;
    }

    public function index()
    {
        $categories = $this->categoriesService->getCategories();
        return view('Backend.pages.categories.index', compact('categories'));
    }
}
