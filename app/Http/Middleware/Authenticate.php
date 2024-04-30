<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Support\Facades\Auth;


class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string|null
     */
    protected function redirectTo($request)
    {

/*
        dump("Authenticate Verifica autenticacion de usuario");
        dump($request->expectsJson()); // false si se hace login correcto
        dump(! $request->expectsJson());
        dump("Session");
        dump(session());
        dump(session()->all());  // solo tiene _token
        dump("Request Session");
        dump($request->session()->all()); // solo tiene el _token
        dd($request);*/
        // Me faltan datos del usuario con el state para comprobar el estado del usuario
        // en login correcto no entra aqui

        if (! $request->expectsJson()) {
            dump("Entra a expectsJson redirige a login");
            dd($request->expectsJson());
            return route('login');
        }
    }
}
