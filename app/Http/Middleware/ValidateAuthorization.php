<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class ValidateAuthorization
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $authorization = $request->header('Authorization');

        // Check if the Authorization header is missing or does not match the expected format
        if (!$authorization || !preg_match('/^Bearer\s+(.*?)$/', $authorization, $matches)) {
            return response()->json(['error' => 'Invalid login.'], 401);
        }

        return $next($request);
    }
}
