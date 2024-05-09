<?php

namespace App\Http\Controllers\Backend\Departments;

use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\Departments\DepartmentStoreRequest;
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
        return view('Backend.pages.departments.index', compact('departments'));
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
}
