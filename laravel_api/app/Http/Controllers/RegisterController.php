<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RegisterController extends Controller
{

    // when i call Route::post('register', 'RegisterController@register') , return hello
    public function register(Request $request)
    {
        return 'Hello Worlds';
    }
}
