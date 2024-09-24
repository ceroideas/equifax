<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User; 
use Illuminate\Support\Facades\Password;
class ForgotPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset emails and
    | includes a trait which assists in sending these notifications from
    | your application to your users. Feel free to explore this trait.
    |
    */

    use SendsPasswordResetEmails;

    public function sendResetLinkEmail(Request $request)
    {
        // Valida el formato del correo electrónico
        $request->validate(['email' => 'required|email']);

        // Obtén el correo electrónico que se ingresó
        $inputEmail = $request->input('email');

        // Busca todos los usuarios para desencriptar sus correos
        $users = User::all();

        $foundUser = null;

        // Desencripta y compara los correos electrónicos
        foreach ($users as $user) {
            try {

                
                
                if ($user->email === $inputEmail) {
                    
                    $foundUser = $user;
                    break;
                }
            } catch (\Exception $e) {
                // Si ocurre un error en la desencriptación, lo ignoramos
            }
        }

        if (!$foundUser) {
            throw ValidationException::withMessages([
                'email' => [trans(Password::INVALID_USER)],
            ]);
        }


       
        // Si encontró al usuario, procede con el envío del enlace de restablecimiento
        $status = Password::sendResetLink(['email' => $foundUser->email]);

        return $status === Password::RESET_LINK_SENT
            ? back()->with(['status' => __($status)])
            : back()->withErrors(['email' => __($status)]);
    }
}
