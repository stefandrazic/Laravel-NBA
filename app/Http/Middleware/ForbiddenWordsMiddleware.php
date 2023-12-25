<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ForbiddenWordsMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $string = strtolower($request->content);
        $forbidenWords = ['hate', 'idiot', 'stupid'];
        foreach ($forbidenWords as $word) {
            if (str_contains($string, $word)) {
                return redirect()->back()->withErrors("You can't use bad words here!");
            }
        }
        return $next($request);
    }
}
