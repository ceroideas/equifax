<?php

namespace App\Http\Controllers\Auth;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\ResetsPasswords;
use Illuminate\Http\Request;
use App\Models\User;


class ResetPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset requests
    | and uses a simple trait to include this behavior. You're free to
    | explore this trait and override any methods you wish to tweak.
    |
    */

    use ResetsPasswords;

    /**
     * Where to redirect users after resetting their password.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    public function reset(Request $request)
    {
        // Validar el token, el correo, la contraseña y su confirmación
        $request->validate([
            'token' => 'required',                   // El token de restablecimiento de contraseña
            'email' => 'required|email',             // El correo electrónico ingresado
            'password' => 'required|confirmed|min:8', // La nueva contraseña (y debe coincidir con confirmación)
        ]);

        // Obtén el correo electrónico ingresado por el usuario
        $inputEmail = $request->input('email');

        // Buscar y desencriptar el correo en la base de datos
        $users = User::all();
        $foundUser = null;

        foreach ($users as $user) {
            try {

                
                // Compara el correo desencriptado con el correo ingresado
                if ($user->email === $inputEmail) {
                    $foundUser = $user;
                    break;
                }
            } catch (\Exception $e) {
                // Si la desencriptación falla, ignorar este usuario
            }
        }

        // Si no se encuentra ningún usuario con el correo ingresado, lanza un error
        if (!$foundUser) {
            throw ValidationException::withMessages([
                'email' => 'No se encontró ningún usuario con esa dirección de correo.',
            ]);
        }
        

        // Realizar el restablecimiento de contraseña utilizando el correo desencriptado
        $status = Password::reset(
            ['email' => $user->email, 'password' => $request->password, 'token' => $request->token],
            function ($user, $password) {
                // Actualiza la contraseña del usuario
                $user->password = Hash::make($password);
                $user->save();
            }
        );

        // Verificar si el restablecimiento fue exitoso o hubo errores
        return $status === Password::PASSWORD_RESET
            ? redirect()->route('login')->with('status', __($status))  // Redirigir al login con un mensaje de éxito
            : back()->withErrors(['email' => [__($status)]]);          // Enviar un error si falla
    }

    public function showResetForm(Request $request, $token = null)
    {
        // Obtener el correo ingresado
        $inputEmail = $request->input('email');

        // Buscar al usuario por su correo desencriptado
        $foundUser = null;
        $users = User::all();

        foreach ($users as $user) {
            try {
              
                if ($user->email === $inputEmail) {
                    $foundUser = $user;
                    break;
                }
            } catch (\Exception $e) {
                // Manejo de excepción
            }
        }

        // Verificar si el usuario tiene el rol de administrador (role 1)
        $isAdmin = $foundUser && $foundUser->role == 1;
        
        return view('auth.passwords.reset')->with([
            'token' => $token,
            'email' => $inputEmail,
            'isAdmin' => $foundUser->isAdmin(),
        ]);
    }
}
