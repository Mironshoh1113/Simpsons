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
        // Admin tekshirish - oddiy admin paroli bilan
        if ($request->session()->has('is_admin') && $request->session()->get('is_admin') === true) {
            return $next($request);
        }
        
        return redirect()->route('home')->with('error', 'Admin huquqlari kerak!');
    }
}
