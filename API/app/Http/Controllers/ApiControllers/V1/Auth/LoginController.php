<?php

namespace App\Http\Controllers\ApiControllers\V1\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use Illuminate\Foundation\Auth\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    /**
     * Handle the incoming request.
     */

    public function __invoke(LoginRequest $request, Request $requestt)

    public function csrf()
    {
        return csrf_token();
    }

    public function __invoke(LoginRequest $request, $id)
    {

        $credentials = User::where('email', $request->email)->get();

        if (! $credentials || ! Hash::check($credentials->password, $credentials->password)) {
            return response()->json([
                'error' => 'Credentials do not match'
            ])->setStatusCode(422);

        }

        $device = substr($request->userAgent() ??'',0,255);
        $csrf = csrf_token();
        $accesToken = $credentials->createToken($device)->plainTextToken;
        return response()->json([

            'access_token'=> $credentials->createToken($device)->plainTextToken,
            ])->setStatusCode(200);

            'csrf' =>  $csrf,
            'data' => $credentials,
            'access_token'=> $accesToken,
        ])->setStatusCode(200);
>>>>>>> d15075b4e06acb5a6df981cf85da664335a3133c
    }
}
