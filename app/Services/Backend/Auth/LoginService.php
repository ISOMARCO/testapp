<?php
namespace App\Services\Backend\Auth;

class LoginService
{
    public function __construct()
    {
    }

    public function authenticate(array $credentials) : bool
    {
        if(Auth::attempt($credentials))
        {
            return true;
        }
        return false;
    }
}
