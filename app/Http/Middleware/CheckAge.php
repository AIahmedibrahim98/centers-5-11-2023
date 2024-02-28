<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Symfony\Component\HttpFoundation\Response;

class CheckAge
{
    /**
     * Handle an incoming request.
     *
     * @param \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response) $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        Log::info('Text 1');
       /* if ($request->has('age') && $request->age >= 14)
            return $next($request);
        else
            abort(401);*/
            return $next($request);
    }

    public function terminate(Request $request, Response $response): void
    {
        Log::info('Text 2');
        // ...
    }
}
