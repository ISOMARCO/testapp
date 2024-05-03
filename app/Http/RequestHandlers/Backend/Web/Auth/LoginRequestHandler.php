<?php

namespace App\Http\RequestHandlers\Backend\Web\Auth;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class LoginRequestHandler
{
    public function __construct()
    {
    }

    public function __invoke(Request $request): View|RedirectResponse
    {
        if(Auth::check())
        {
            return redirect()->route('dashboard');
        }
        return view('pages.auth.index');
    }
}
