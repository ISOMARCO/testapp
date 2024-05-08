<?php

namespace App\Http\Controllers\Backend\Departments;

use App\Http\Controllers\Controller;
use Illuminate\View\View;
class DepartmentsController extends Controller
{
    public function index() : View
    {
        return view('Backend.pages.departments.index');
    }
}
