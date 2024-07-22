<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Symfony\Component\HttpFoundation\Response;

class CreateSymLink
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (!file_exists(public_path('storage'))) {
            try {
                symlink(storage_path('app/public'), public_path('storage'));
            } catch (\Exception $e) {
                Log::error('Could not create symlink: ' . $e->getMessage());
            }
        }

        return $next($request);
    }
}
