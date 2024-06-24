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
    {

        $credentials = User::where('email', $request->email)->all;

        if (! $credentials || ! Hash::check($credentials->password, $credentials->password)) {
            return response()->json([
                'error' => 'Credentials do not match'
            ])->setStatusCode(422);

        }

        $device = substr($request->userAgent() ??'',0,255);

        return response()->json([
            'access_token'=> $credentials->createToken($device)->plainTextToken,
            ])->setStatusCode(200);
    }
}
