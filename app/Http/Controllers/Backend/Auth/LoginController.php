<?php

namespace App\Http\Controllers\Backend\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\Auth\LoginRequest;
use App\Services\Backend\Auth\LoginService;
use Illuminate\Http\Request;
use Illuminate\View\View;

class LoginController extends Controller
{
    /**
     * @return View
     */
    protected $loginService;
    public function __construct(LoginService $loginService)
    {
        $this->loginService = $loginService;
    }

    public function index() : View
    {
        return view('Backend.pages.auth.index');
    }
    public function loginRequest(LoginRequest $loginRequest)
    {
        $loginRequest->validated();
//        $loginRequest->email;
//        $this->loginService->checkEmail($loginRequest->email);
    }
}
