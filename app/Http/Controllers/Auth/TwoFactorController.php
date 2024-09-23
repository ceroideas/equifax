<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TwoFactorController extends Controller
{
        // Muestra la página para ingresar el código MFA
        public function show()
        {
            return view('auth.mfa');
        }
    
        // Verifica el código MFA ingresado
        public function verify(Request $request)
        {
            // Inicializa el autenticador de Google 2FA
            $authenticator = app(Authenticator::class)->boot($request);
    
            // Verificar si el código MFA ingresado es correcto
            if ($authenticator->isAuthenticated()) {
                // Guardar en la sesión que el usuario pasó el proceso MFA
                $request->session()->put('2fa', true);
                // Redirigir a la página de administración
                return redirect()->intended('admin/dashboard');
            }
    
            // Si el código es incorrecto, redirigir con un error
            return redirect()->back()->withErrors(['code' => 'El código es incorrecto.']);
        }
    
        // Genera el código QR para configurar el 2FA
        public function generateSecret()
        {
            $user = Auth::user();
            $google2fa = app('pragmarx.google2fa');
    
            // Generar una clave secreta
            $user->google2fa_secret = $google2fa->generateSecretKey();
            $user->save();
    
            // Generar una URL QR para que el usuario la escanee con su aplicación de autenticación
            $QR_Image = $google2fa->getQRCodeInline(
                config('app.name'),
                $user->email,
                $user->google2fa_secret
            );
    
            return view('auth.2fa_setup', ['QR_Image' => $QR_Image, 'secret' => $user->google2fa_secret]);
        }
}
