<?php
namespace App\Http\Controllers\Backend\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\Auth\LoginRequest;
use App\Services\Backend\Auth\LoginService;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\RedirectResponse;
class LoginController extends Controller
{
    protected mixed $loginService;
    /**
     * @param LoginService $loginService
     */
    public function __construct(LoginService $loginService)
    {
        $this->loginService = $loginService;
    }

    /**
     * @return View
     */
    public function index() : View
    {
        return view('Backend.pages.auth.index');
    }

    /**
     * @param LoginRequest $loginRequest
     * @return void
     */
    public function loginRequest(LoginRequest $loginRequest) : JsonResponse
    {
        $credentials = $loginRequest->validated();
        $login = $this->loginService->authenticate($credentials);
        if($login === false)
        {
            return response()->json([
                'type' => 'auth_error',
                'message' => 'Email və ya şifrə doğru deyil'
            ], 500);
        }
        return response()->json([
            'message' => 'Giriş uğurla başa çatdı. Ana səhifəyə yönləndirilirsiniz...',
            'redirect' => route('Backend.home')
        ], 200);
    }

    /**
     * @param Request $request
     * @return RedirectResponse
     */
    public function logout(Request $request) : RedirectResponse
    {
        auth()->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('Backend.auth.login');
    }
}
