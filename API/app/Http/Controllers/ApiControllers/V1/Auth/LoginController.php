<?php

namespace App\Http\Controllers\ApiControllers\V1\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

use function Laravel\Prompts\select;

class LoginController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function csrf()
    {
        $request->validated();

    public function __invoke(LoginRequest $request, $id)
    {

        $credentials = User::where('email', $request->email)->get();

        if (! $credentials || ! Hash::check($credentials->password, $credentials->password)) {
            return response()->json([
                'error' => 'Credentials do not match'
            ], 400);
        }

        $device = substr($request->userAgent() ??'',0,255);
        $csrf = csrf_token();
        $accesToken = $credentials->createToken($device)->plainTextToken;
        return response()->json([
            'csrf' =>  $csrf,
            'data' => $credentials,
            'access_token'=> $accesToken,
        ])->setStatusCode(200);
    }
}

