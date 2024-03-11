<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
// use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;


class LoginController extends Controller
{
    

    public function login(Request $request)
{
    $this->validateLogin($request);

    // if (Auth::attempt($this->credentials($request))) {
    //     $user = Auth::user();
    //     // $user->generateToken();

    //     return response()->json([
    //         'data' => $user,
    //     ]);
    // }
    $user= User::where('email', $request->email)->first();
    if ($user &&  Hash::check($request->password, $user->password)) {
        $user->generateToken();
        return response()->json([
            'data' => $user,
        ]);
    }


    return $this->sendFailedLoginResponse($request);
}



    protected function validateLogin(Request $request)
    {
        $request->validate([
            $this->username() => 'required|string',
            'password' => 'required|string',
        ]);
    }

    protected function attemptLogin(Request $request)
    {
        return $this->guard()->attempt(
            $this->credentials($request)
        );
    }

    protected function sendFailedLoginResponse(Request $request)
    {
        return response()->json(['error' => 'Unauthorized'], 401);
    }

    protected function credentials(Request $request)
    {
        return $request->only($this->username(), 'password');
    }

    protected function username()
    {
        return 'email';
    }
    public function logout(Request $request)
    {
        $user = Auth::guard('api')->user();

        if ($user) {
            $user->api_token = null;
            // $user->save();
        }

        return response()->json(['data' => 'User logged out.'], 200);
    }

}
