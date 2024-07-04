<?php

namespace App\Http\Controllers\ApiControllers\V1\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request, User $user)
    {

        $credentials = User::where('email', $request->email)->first();

        if (! $credentials || ! Hash::check($credentials->password, $credentials->password)) {
            return response()->json([
                'error' => 'credentials doesnt match'
            ])->setStatusCode(400);

        }

        $device = substr($request->userAgent() ??'',0,255);

        return response()->json([
            'access_token'=> $user->createToken($device)->plainTextToken,
        ]);
    }
}
