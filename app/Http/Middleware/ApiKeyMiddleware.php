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

        // API key from the db
        $apiKey = ApiKey::where('key', $apiKeyValue)->first();

        // Check API key exists and is active
        if (!$apiKey || !$apiKey->isUsed || !$apiKey->activated) {
            return response()->json(['message' => 'Unauthorized'], 401);
        }

        return $next($request);
    }
}