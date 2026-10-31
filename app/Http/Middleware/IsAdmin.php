<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class IsAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  Closure(Request): (Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Kontrollera om användaren är inloggad och har admin-roll
        if ($request->user() && $request->user()->role === 'admin') {
            return $next($request);
        }
        // Om användaren inte är admin, avbryt med 403 Forbidden
        abort(403, 'Du har inte behörighet till denna sida.');
    }
}
