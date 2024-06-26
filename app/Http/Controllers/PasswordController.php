<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class PasswordController extends Controller
{
    public function generate()
    {
        $key = '123456789';
        $hashedPassword = Hash::make($key);
        return $hashedPassword;
    }
}
