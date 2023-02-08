<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use Log;

class UserController extends Controller
{
    public function getAuthUser()
    {
        Log::info('Auth::user()');
        Log::info(Auth::user());
        return ['user' => Auth::user()];
    }
}
