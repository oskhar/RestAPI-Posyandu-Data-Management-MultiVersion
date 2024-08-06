<?php

namespace App\Infrastructure\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class RequestTrackingMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */

    public function handle(Request $request, Closure $next)
    {
        $response = $next($request);
        $requestId = (string) Str::uuid();
        $responseSize = strlen($response->getContent());

        $response->headers->set('X-Request-ID', $requestId);
        $response->headers->set('X-Response-Size', $responseSize);

        return $response;
    }
}
