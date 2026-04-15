<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RoleMiddleware
{
    public function handle(Request $request, Closure $next, string $role): Response
    {
        if (! $request->user()) {
            return redirect('/login');
        }

        $userRole = $request->user()->role?->name;

        if ($userRole !== $role && $userRole !== 'admin') {
            abort(403, 'Unauthorized access');
        }

        return $next($request);
    }
}
