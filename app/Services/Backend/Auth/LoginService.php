<?php
namespace App\Services\Backend\Auth;

class LoginService
{
    public function __construct()
    {
    }

    public function authenticate() : bool
    {
        if(Auth::check())
        {
            return true;
            //return redirect()->route('backend.dashboard');
        }
        return false;
    }
}
