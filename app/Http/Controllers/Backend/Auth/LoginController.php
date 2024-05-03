<?php

namespace App\Http\Controllers\Backend\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\View\View;
use function App\Http\Controllers\Backend\view;

class LoginController extends Controller
{
    /**
     * @return View
     */
    public function index() : View
    {
        return view('Backend.pages.auth.index');
    }
    public function loginRequest()
    {

    }
}
