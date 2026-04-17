<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Models\Book;

class Example
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $cant_libros = Book::count();

        if($cant_libros >= 9){
            return $next($request); //Peticion aprobada (puede seguir)
        }else{
            return abort(403);
        }

    }
}

// Pregunta
// Valide en un Middleware si una tabla tiene más de 5 registros. En caso de ser verdad, se debe permitir el flujo de la peticion
// y se debe retornar a una vista ordenados de manera descendente por el atributo "name" todos los datos 