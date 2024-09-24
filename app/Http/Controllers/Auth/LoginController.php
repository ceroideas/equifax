<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use App\Models\User; 
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Auth;
use Illuminate\Contracts\Encryption\DecryptException;

use PragmaRX\Google2FAQRCode\Google2FA;

use PragmaRX\Google2FALaravel\Support\Authenticator;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;
    protected function credentials(Request $request)
    {
        $users = User::all();
    
        foreach ($users as $user) {
            try {
             
                if ($user->email=== $request->email) {
                   
                    return ['email' => $user->getAttributes()['email'], 'password' => $request->password];
                }
            } catch (DecryptException $e) {

                continue;
            } catch (Exception $e) {
               
                continue;
            }
        }
    
        
        return $request->only($this->username(), 'password');
    }

    public function verify2FA(Request $request)
    {
        $user = Auth::user();
        $user->google2fa_enabled = 1;
        $user->save();
        $authenticator = app(Authenticator::class)->boot($request);

        if ($authenticator->isAuthenticated()) {
            return response()->json('Correct 2FA code',200);
        }

        return response()->json('Invalid 2FA code',422);
    }

    public function authenticated(Request $request, $user)
    {
        if ($user->role == 1) {
            $google2fa = new Google2FA();
            
            if ($user->google2fa_enabled) {
        
                if ($request->session()->has('2fa_passed')) {
                    $request->session()->forget('2fa_passed');
                }
        
                $request->session()->put('2fa:user:id', $user->id);
                $request->session()->put('2fa:auth:attempt', true);
                $request->session()->put('2fa:auth:remember', $request->has('remember'));
        
                $otp_secret = $user->google2fa_secret;
                $one_time_password = $google2fa->getCurrentOtp($otp_secret);
        
                return redirect()->route('2fa')->with('one_time_password', $one_time_password);
            }
            else {
                // Generar el secreto si no existe
                if (!$user->google2fa_secret) {
                    $user->google2fa_secret = $google2fa->generateSecretKey(64);
                    // $user->google2fa_enabled = 1;
                    $user->save();
                }

                // Generar el código QR en formato SVG
                $qrCode = $google2fa->getQRCodeInline(
                    config('app.name'),
                    $user->email,
                    $user->google2fa_secret
                );

                return view('2fa.enable', [
                    'qrCode' => $qrCode,
                    'secret' => $user->google2fa_secret,
                ]);
            }
        }
    
        return redirect()->intended($this->redirectPath());
    }


    

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout','verify2FA');
    }

    /*protected function attemptLogin(Request $request) {
        dump("Request");
        dump($request);
        return auth()->attempt([
            'email' => $request->email,
            'password' => $request->password,
            //'' => 1  // Only allow users with is_admin == 1 to log in
        ]);
    }*/
}
