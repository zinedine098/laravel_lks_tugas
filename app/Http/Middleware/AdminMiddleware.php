<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Pastikan user terotentikasi dan memiliki role 'admin'
        if ($request->user() && $request->user()->role === 'admin') {
            return $next($request);
        }

        // Jika tidak, kembalikan response 403 Forbidden
        return response()->json([
            'message' => 'Akses Ditolak. Anda harus menjadi Admin.',
        ], 403); 
    }
}
