<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class Role
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, ...$roles): Response // ...$ : Para recibir un numero n de valores, en este caso de roles
    {
        $user = Auth::user();
        if (!$user || !in_array($user->role->name, $roles)) { // La sentencia !in_array($user->role, $roles) Me verifica si el rol del usuario
            return abort(403, 'Faah');                 // Los roles que esten en el arreglo $roles están permitidos en este caso, pueden seguir
        }

        return $next($request);
    }
}
