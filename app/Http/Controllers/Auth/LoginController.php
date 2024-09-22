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
        $this->middleware('guest')->except('logout');
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
