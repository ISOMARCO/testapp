<?php

namespace App\Http\Controllers\Backend\Categories;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    public function index()
    {
        return view('Backend.pages.categories.index');
    }
}
