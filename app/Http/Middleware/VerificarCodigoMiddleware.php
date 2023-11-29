<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Session;

class VerificarCodigoMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Verifica si el código ha sido ingresado
        if (!Session::has('codigo_ingresado')) {
            // El código no ha sido ingresado, redirige o realiza otra acción según tus necesidades
            return redirect('/');
        }

        // El código ha sido ingresado correctamente, permite el acceso
        return $next($request);
    }
}
