<?php

namespace App\Http\Middleware;

use Closure;
use Firebase\JWT\JWT;
use Firebase\JWT\Key;
use Illuminate\Http\Request;

class AdminMiddleware
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

                // Lanjutkan jika token valid
                $request->attributes->set('user', $decoded);
                return $next($request);
            } catch (\Exception $e) {
                // Token tidak valid atau expired
                return redirect()->route('login')->with('token_invalid', 'Token tidak valid atau kadaluarsa.');
            }
        }

        // Tidak ada token, redirect ke login
        return redirect()->route('login')->with('no_token', 'Anda harus login terlebih dahulu.');
    }
}
