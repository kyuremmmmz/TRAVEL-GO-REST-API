<?php

namespace App\Http\Controllers\ApiControllers\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;


class LoginController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(LoginRequest $request)
    {
        $credentials = User::where('email', $request->email)->first();

        if (! $credentials || ! Hash::check($credentials->password, $credentials->password)) {
            return response()->json([
                'error' => 'credentials doesnt match'
            ])->setStatusCode(400);

        }
        return [
            ''
        ];
    }
}
