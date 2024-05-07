<?php

namespace App\Http\Controllers\Backend\Customers;

use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\Customers\CustomersRequest;
use Illuminate\Http\Request;
use App\Services\Backend\Customers\CustomersService;
use App\Services\Backend\Categories\CategoriesService;
use Illuminate\Http\JsonResponse;
use Illuminate\View\View;
class CustomersController extends Controller
{
    protected $customersService;

    public function __construct()
    {
        $this->customersService = new CustomersService();
    }

    /**
     * @return View
     */
    public function index() : View
    {
        $customers = $this->customersService->getCustomers();
        $categories = (new CategoriesService())->getCategories();
        return view('Backend.pages.customers.index', compact('customers', 'categories'));
    }

    /**
     * @param CustomersRequest $customersRequest
     * @return JsonResponse
     */
    public function createRequest(CustomersRequest $customersRequest) : JsonResponse
    {
        $data = $customersRequest->validated();
        $create = $this->customersService->createCustomer($data);
        if($create[0] === false)
        {
            return response()->json([
                'type' => 'create_error',
                'message' => 'Müştəri yaradılarkən xəta baş verdi',
                'errorMessage' => $create[1]
            ], 500);
        }
        return response()->json([
            'message' => 'Müştəri uğurla yaradıldı',
            'data' => $create[1]
        ], 200);
    }
}
