<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class API
{
    public function handle(Request $request, Closure $next)
    {
        if ($request->header('X-KEY')) {
            if ($request->header('X-KEY') === env('PRODUCT_KEY')) {
                return $next($request);
            } else {
                return response()->json([
                    'status' => 'invalid Product Key!'
                ], 401);
            }
        } else {
            return response()->json([
                'status' => 'Product Key is required !'
            ], 401);
        }

    }
}
