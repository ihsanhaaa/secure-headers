<?php

namespace Ihsanhaaa\SecureHeaders\Middleware;

use Closure;

class SecureHeaders
{
    public function handle($request, Closure $next)
    {
        $response = $next($request);

        // Tambahkan header keamanan
        $response->headers->set('Strict-Transport-Security', 'max-age=31536000; includeSubDomains');
        $response->headers->set('X-Content-Type-Options', 'nosniff');
        $response->headers->set('X-Frame-Options', 'DENY');
        $response->headers->set('X-XSS-Protection', '1; mode=block');
        $response->headers->set('Referrer-Policy', 'no-referrer');
        $response->headers->set('Permissions-Policy', 'geolocation=(), microphone=()');
        $response->headers->set('Content-Security-Policy', "default-src 'self'");

        return $response;
    }
}
