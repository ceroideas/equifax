<?php

namespace App\Providers;

use Closure;
use Illuminate\Contracts\Auth\UserProvider;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Support\Facades\Hash;

use App\Models\User;

class CustomUserProvider implements UserProvider
{
    public function retrieveById($identifier)
    {
        return User::find($identifier);
        // Implementa la lógica para recuperar un usuario por su ID.
    }

    public function retrieveByToken($identifier, $token)
    {
        dd("retrieveByToken");
        // Implementa la lógica para recuperar un usuario por su token.
    }

    public function updateRememberToken(Authenticatable $user, $token)
    {
        // Implementa la lógica para actualizar el token de "recordar".
    }

    public function retrieveByCredentials(array $credentials)
    {
        $email = $credentials['email'];
        $users = User::all();

        if (isset($credentials['hashed'])) {
            foreach ($users as $user) {
                if ($user->getAttributes()['email'] === $email) {
                    return $user;
                }
            }
        }else{        
            foreach ($users as $user) {
                if ($user->email === $email) {
                    return $user;
                }
            }
        }
    }

    public function validateCredentials(Authenticatable $user, array $credentials)
    {
        return Hash::check($credentials['password'], $user->getAuthPassword());
    }
}
