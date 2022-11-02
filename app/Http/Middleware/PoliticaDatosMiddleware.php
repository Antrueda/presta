<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class PoliticaDatosMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $usuario = Auth::user();
        if (isset($request->segments()[1]) &&$request->segments()[1]== 'polidato' ) {
            return $next($request);
        } else if ($usuario->polidato_at == null) {
            return  redirect()->route('usuarios.polidato', Auth::user()->id)
                ->with('error', 'Para continuar por favor debe aceptar las políticas de datos');
        }
        return $next($request);
    }
}
