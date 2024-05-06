<?php

namespace App\Http\Controllers\Backend\Categories;

use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\Categories\CategoriesRequest;
use Illuminate\Http\Request;
use App\Services\Backend\Categories\CategoriesService;
use Illuminate\Http\JsonResponse;
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

    public function updateRequest(CategoriesRequest $categoriesRequest) : JsonResponse
    {
        $data = $categoriesRequest->validated();
        $create = $this->categoriesService->updateCategory($data);
        if($create)
        {
            return response()->json([
                'message' => 'Kateqoriya uğurla yeniləndi'
            ], 200);
        }
        return response()->json([
            'type' => 'error',
            'message' => 'Kateqoriya yenilənərkən xəta baş verdi'
        ], 500);
    }
}
