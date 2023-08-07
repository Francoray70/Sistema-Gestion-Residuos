<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Session;

class CheckInactiveUser
{
    public function handle($request, Closure $next)
    {
        // Obtener el tiempo de inactividad configurado
        $maxInactiveTime = config('session.lifetime') * 60; // Convertir minutos a segundos

        // Obtener el tiempo en el que el usuario estuvo activo por última vez
        $lastActivityTime = Session::get('last_activity_time');

        // Verificar si el usuario ha estado inactivo por el tiempo configurado
        if ($lastActivityTime !== null && time() - $lastActivityTime > $maxInactiveTime) {
            // Olvidar la sesión y eliminarla
            Session::flush();
            return view('mensajes.impedirsumadetalle');
        }

        // Actualizar el tiempo de última actividad del usuario
        Session::put('last_activity_time', time());

        return $next($request);
    }
}
