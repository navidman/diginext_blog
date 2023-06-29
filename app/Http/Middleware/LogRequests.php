<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Log;

class LogRequests
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Log the incoming request information
        Log::info('Incoming Request', [
            'Method' => $request->method(),
            'URL' => $request->fullUrl(),
            'Headers' => $request->header(),
            'Body' => $request->all(),
        ]);

        // Process the request and get the response
        $response = $next($request);

        // Log the outgoing response information
        Log::info('Outgoing Response', [
            'Status' => $response->getStatusCode(),
            'Headers' => $response->headers->all(),
            'Body' => $response->getContent(),
        ]);

        return $response;
    }
}
