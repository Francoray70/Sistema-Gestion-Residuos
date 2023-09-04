<?php

namespace App\Http\Middleware;

use Closure;
use Symfony\Component\HttpFoundation\Response;

class Baneado
{
    public function handle($request, Closure $next): Response
    {
        if (auth()->check() && auth()->user()->baneado === 'NO') {
            return $next($request);
        }
        session()->flash('ban', 'Tu cuenta está baneada.');

        return redirect('/')->with('ban', 'Su usuario debe ser aceptado por la empresa. Comuniquese con ella para que pueda desbanearlo.');
    }
}
