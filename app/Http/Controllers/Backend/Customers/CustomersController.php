<?php

namespace App\Http\Controllers\Backend\Customers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CustomersController extends Controller
{
    public function index()
    {
        return view('Backend.pages.customers.index');
    }
}
