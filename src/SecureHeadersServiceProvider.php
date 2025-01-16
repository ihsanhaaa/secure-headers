<?php

namespace Vendor\SecureHeaders;

use Illuminate\Support\ServiceProvider;

class SecureHeadersServiceProvider extends ServiceProvider
{
    public function boot()
    {
        // Publikasi middleware (opsional)
        $this->publishes([
            __DIR__.'/Middleware/SecureHeaders.php' => app_path('Http/Middleware/SecureHeaders.php'),
        ], 'secure-headers');
    }

    public function register()
    {
        // Register middleware (opsional)
        $this->app['router']->aliasMiddleware('secure.headers', Middleware\SecureHeaders::class);
    }
}
