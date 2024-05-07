<?php

namespace App\Http\Controllers\Backend\Customers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\Backend\Customers\CustomersService;
use App\Services\Backend\Categories\CategoriesService;

class CustomersController extends Controller
{
    protected $customersService;

    public function __construct()
    {
        $this->customersService = new CustomersService();
    }

    public function index()
    {
        $customers = $this->customersService->getCustomers();
        $categories = (new CategoriesService())->getCategories();
        return view('Backend.pages.customers.index', compact('customers', 'categories'));
    }
}
