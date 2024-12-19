<?php

namespace App\Http\Controllers;

use App\Models\User;
use Tymon\JWTAuth\Facades\JWTAuth;

class UserController extends Controller
{
    public function getKey() {
        $User = User::find(1);
        return JWTAuth::claims(['role' => $User->email])->fromUser($User);
    }
}
