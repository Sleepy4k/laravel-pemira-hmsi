<?php

namespace App\Http\Middleware;

use App\Support\PermissionPolicy;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Vite;
use Symfony\Component\HttpFoundation\Response;

class AddSecureHeaderRequest
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        Vite::useCspNonce(app('csp-nonce'));

        $response = $next($request);

        $permissions = (new PermissionPolicy())->configure();
        $response->headers->set('Permissions-Policy', $permissions, true);

        foreach (config('secure-headers.headers') as $key => $value) {
            if (empty($value)) continue;

            $response->headers->set($key, $value, true);
        }

        return $response;
    }
}
