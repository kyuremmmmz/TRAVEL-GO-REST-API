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
    public function __invoke(LoginRequest $request)
    {
        $request->validated();

        $user = User::where('email', $request->email)->first();

        if (!$user || !Hash::check($request->password, $user->password)) {
            return response()->json([
                'error' => 'Credentials do not match'
            ], 400);
        }

        $device = substr($request->userAgent() ?? '', 0, 355);
        $token = $user->createToken($device)->plainTextToken;
        $name = User::select('name', 'email')->where('email', $request->email)->first();

        return response()->json([
            'access_token' => $token,
            'data'=> $name->name,
        ]);
    }
}

