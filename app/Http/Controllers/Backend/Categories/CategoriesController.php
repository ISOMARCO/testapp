<?php

namespace App\Http\Controllers\Backend\Categories;

use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\Categories\CategoriesRequest;
use Illuminate\Http\Request;
use App\Services\Backend\Categories\CategoriesService;
use Illuminate\Http\JsonResponse;
use Illuminate\View\View;
class CategoriesController extends Controller
{
    protected $categoriesService;

    /**
     * @param CategoriesService $categoriesService
     */
    public function __construct(CategoriesService $categoriesService)
    {
        $this->categoriesService = $categoriesService;
    }

    /**
     * @return View
     */
    public function index() : View
    {
        $categories = $this->categoriesService->getCategories();
        return view('Backend.pages.categories.index', compact('categories'));
    }

    /**
     * @param CategoriesRequest $categoriesRequest
     * @return JsonResponse
     */
    public function updateRequest(CategoriesRequest $categoriesRequest) : JsonResponse
    {
        $data = $categoriesRequest->validated();
        return response()->json($data);
        $update = $this->categoriesService->updateCategory($data);
        if($update[0] === true)
        {
            return response()->json([
                'message' => 'Kateqoriya uğurla yeniləndi'
            ], 200);
        }
        return response()->json([
            'type' => 'update_error',
            'message' => 'Kateqoriya yenilənərkən xəta baş verdi'
        ], 500);
    }
}
