<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Inertia\Inertia;

class HandleBreadcrumbs
{
    public function handle(Request $request, Closure $next)
    {
        $routeName = $request->route()?->getName();

        $breadcrumbsConfig = include app_path('Helpers/Breadcrumbs.php');

        $breadcrumbs = [];

        if ($routeName && isset($breadcrumbsConfig[$routeName])) {

            $crumb = $breadcrumbsConfig[$routeName];

            if (is_callable($crumb)) {

                $patient = $request->route('patient');

                $breadcrumbs = $crumb($patient);

            } else {

                $breadcrumbs = $crumb;

            }
        }

        Inertia::share([
            'breadcrumbs' => $breadcrumbs
        ]);

        return $next($request);
    }
}