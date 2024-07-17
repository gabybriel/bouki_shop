<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class AdminMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        // Vérifiez si l'utilisateur est un administrateur
        if (!$request->user() || !$request->user()->is_admin) {
            abort(403, 'Accès interdit');
        }

        return $next($request);
    }
}
