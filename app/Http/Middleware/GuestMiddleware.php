<?php

namespace App\Http\Middleware;

use Closure;
use Firebase\JWT\JWT;
use Firebase\JWT\Key;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class GuestMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next)
    {
        $token = $request->cookie('jwt');

        if ($token) {
            try {
                // Decode JWT
                $decoded = JWT::decode($token, new Key(env("APP_KEY"), 'HS256'));

                // Jika token valid, redirect ke halaman admin
                return redirect()->route('akun-admin');
            } catch (\Exception $e) {
                // Token tidak valid, lanjutkan ke halaman login
                return $next($request);
            }
        }

        // Tidak ada token, lanjutkan ke halaman login
        return $next($request);
    }
}
