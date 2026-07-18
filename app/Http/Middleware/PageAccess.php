<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class PageAccess
{
    public function handle(Request $request, Closure $next, $slug)
    {
        $user = auth()->user();

        if (!$user) {
            abort(401);
        }

        if (!$user->hasPageAccess($slug)) {
            abort(403, 'Unauthorized Access');
        }

        return $next($request);
    }
}