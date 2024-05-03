<?php
namespace App\Services\Backend\Auth;

class LoginService
{
    public function __construct()
    {
    }

    public function checkEmail($email) : bool|string
    {
        if($email)
        {
            return $email;
        }
        return false;
    }
}
