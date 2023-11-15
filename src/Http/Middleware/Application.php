<?php

namespace Isifnet\PieAdmin\Http\Middleware;

use Isifnet\PieAdmin\Admin;

class Application
{
    public function handle($request, \Closure $next, $app = null)
    {
        if ($app) {
            Admin::app()->switch($app);
        }

        return $next($request);
    }
}
