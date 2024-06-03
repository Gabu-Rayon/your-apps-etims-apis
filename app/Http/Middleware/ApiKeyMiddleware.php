<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\ApiKey; // Assuming your API key model is named ApiKey

class ApiKeyMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        $apiKeyValue = $request->header('ApiKey');
        $apiKey = ApiKey::where('key', $apiKeyValue)->first();
        if ($apiKey && $apiKey->isUsed && $apiKey->activated) {
            return $next($request);
        }
        return response()->json(['message' => 'Unauthorized'], 401);
    }
}