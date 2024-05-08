<?php

namespace App\Http\Controllers\Backend\Customers;

use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\Customers\CustomerStoreRequest;
use App\Http\Requests\Backend\Customers\CustomerUpdateRequest;
use App\Services\Backend\Customers\CustomersService;
use App\Services\Backend\Categories\CategoriesService;
use Illuminate\Http\JsonResponse;
use Illuminate\View\View;
use Illuminate\Http\Request;
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
    public function createRequest(CustomerStoreRequest $customerStoreRequest) : JsonResponse
    {
        $data = $customerStoreRequest->validated();
        $create = $this->customersService->createCustomer($data);
        if($create[0] === false)
        {
            return response()->json([
                'type' => 'create_error',
                'message' => 'Müştəri yaradılarkən xəta baş verdi',
                'errorMessage' => $create[1]
            ], 500);
        }
        $data = $create[1];
        $htmlElement = view('Backend.pages.customers.sections.customer-list-body', compact('data'))->render();
        return response()->json([
            'message' => 'Müştəri uğurla yaradıldı',
            'htmlElement' => $htmlElement
        ]);
    }

    public function updateRequest(CustomerUpdateRequest $customerUpdateRequest) : JsonResponse
    {
        $data = $customerUpdateRequest->validated();
        $update = $this->customersService->updateCustomer($data);
        if($update[0] === false)
        {
            return response()->json([
                'type' => 'update_error',
                'message' => 'Müştəri yenilənərkən xəta baş verdi',
                'errorMessage' => $update[1]
            ], 500);
        }
        $data = $update[1];
        return response()->json([
            'message' => 'Müştəri uğurla yeniləndi',
            'data' => $data
        ]);
    }

    public function deleteRequest(Request $request) : JsonResponse
    {
        $delete = $this->customersService->deleteCustomer($request->id);
        if($delete[0] === false)
        {
            return response()->json([
                'type' => 'delete_error',
                'message' => 'Müştəri silinərkən xəta baş verdi',
                'errorMessage' => $delete[1]
            ], 500);
        }
        return response()->json([
            'message' => 'Müştəri uğurla silindi',
            'id' => $delete[1]
        ]);
    }
}
