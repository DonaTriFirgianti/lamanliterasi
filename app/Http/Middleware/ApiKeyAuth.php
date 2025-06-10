<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\User;

class ApiKeyAuth
{
    public function handle($request, Closure $next)
    {
        $apiKey = $request->header('X-API-Key');

        if (!$user = User::where('api_key', $apiKey)->first()) {
            return response()->json(['error' => 'Invalid API Key'], 401);
        }

        Auth::login($user);
        return $next($request);
    }
}