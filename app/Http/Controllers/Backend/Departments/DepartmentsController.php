<?php

namespace App\Http\Controllers\Backend\Departments;

use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\Departments\DepartmentStoreRequest;
use App\Http\Requests\Backend\Departments\DepartmentUpdateRequest;
use Illuminate\View\View;
use App\Services\Backend\Departments\DepartmentsService;
use Illuminate\Http\JsonResponse;
class DepartmentsController extends Controller
{
    protected $departmentsService;
    public function __construct()
    {
        $this->departmentsService = new DepartmentsService();
    }

    public function index() : View
    {
        $departments = $this->departmentsService->getDepartments();
        $customers = $this->departmentsService->getCustomers();
        $customerName = function($customerId) use ($customers): ?string {
            foreach($customers as $customer)
            {
                if($customer->id === $customerId)
                {
                    return $customer->name;
                }
            }
            return NULL;
        };
        return view('Backend.pages.departments.index', compact('departments', 'customers', 'customerName'));
    }

    public function createRequest(DepartmentStoreRequest $departmentStoreRequest) : JsonResponse
    {
        $data = $departmentStoreRequest->validated();
        $create = $this->departmentsService->createDepartment($data);
        if($create[0] === false)
        {
            return response()->json([
                'type' => 'create_error',
                'message' => 'Şöbə yaradılarkən xəta baş verdi',
                'errorMessage' => $create[1]
            ], 500);
        }
        $data = $create[1];
        $htmlElement = view('Backend.pages.departments.sections.department-list-body', compact('data'))->render();
        return response()->json([
            'message' => 'Şöbə uğurla yaradıldı',
            'htmlElement' => $htmlElement
        ]);
    }

    public function updateRequest(DepartmentUpdateRequest $departmentUpdateRequest)
    {
        $data = $departmentUpdateRequest->validated();
        $update = $this->departmentsService->updateDepartment($data);
        if($update[0] === false)
        {
            return response()->json([
                'type' => 'update_error',
                'message' => 'Şöbə yenilənərkən xəta baş verdi',
                'errorMessage' => $update[1]
            ], 500);
        }
        $data = $update[1];
        $htmlElement = view('Backend.pages.departments.sections.department-list-body', compact('data'))->render();
        return response()->json([
            'message' => 'Şöbə uğurla yeniləndi',
            'htmlElement' => $htmlElement
        ]);
    }
}
