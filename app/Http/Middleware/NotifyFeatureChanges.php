<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class NotifyFeatureChanges
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if(!session()->has('feature_changes_notified')) {
            $featureChanges = config('feature_changes', []);
            if (!empty($featureChanges)) {
                session(['feature_changes_notified' => true]);
                session(['feature_changes' => $featureChanges]);
            }
        }
        return $next($request);
    }
}
