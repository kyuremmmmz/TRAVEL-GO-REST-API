<?php

namespace App\Http\Middleware;

use App\Models\roles;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class role
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, string $role): Response
    {
        $rolemodel = roles::class;
        $roles = auth()->$rolemodel;
        $user = auth()->user();
        if (! auth()->check()) {
            return abort(401);
        }

        if (! $user->$roles->where('name', $role)->exists()) {
            return abort(403);
        }
        return $next($request);
    }
}
