<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\DiscountCode;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use App\Models\Template;
use App\Models\Campaign;
use App\Models\Participant;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Auth;
use Mail;
use Illuminate\Support\Facades\Crypt;

use Carbon\Carbon;


class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
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
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {

        if($_SERVER['SERVER_NAME']=='127.0.0.1'){

            return Validator::make($data, [
                'nombre' => ['required', 'string', 'max:255'],
                'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
                'password' => ['required', 'string', 'min:8', 'confirmed'],
                'tos' => ['required'],
                'lopd' => ['required'],
                //'g-recaptcha-response' => 'required|captcha',
            ]);
        }else{
            return Validator::make($data, [
                'nombre' => ['required', 'string', 'max:255'],
                'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
                'password' => ['required', 'string', 'min:8', 'confirmed'],
                'tos' => ['required'],
                'lopd' => ['required'],
                'g-recaptcha-response' => 'required|captcha',
            ]);
        }

    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {


        $user = User::create([
            'name' => Crypt::encryptString($data['nombre']),
            'email' => Crypt::encryptString($data['email']),
            'password' => Hash::make($data['password']),
        ]);


        $user->pw_updated_at=Carbon::now();

        $user->newsletter = isset($data['newsletter']) ? 1 : 0;
       /* Control de roles */
       if(!$data['referenced'] == null){
        $today = Carbon::today();

        $dc = DiscountCode::where('code',$data['referenced'])
                        ->where('status',1)
                        ->where('date_from','<=',$today)
                        ->where('date_end', '>=', $today)
                        ->get();

        if($dc->count()){
            $user->referenced = $data['referenced'];
            $user->role = 4;
            $user->msgusr = 0;
        }else{
            $user->role = 2;
            $user->msgusr = 1;
        }

    }else{
        $user->role = 2;
        $user->msgusr = 1;
    }

        /*Asignacion participacion sorteos*/
        $campaign = Campaign::where('type', 1)
                       ->whereDate('init_date', '<=', Carbon::now()->format('Y-m-d H:i:s'))
                       ->whereDate('end_date', '>=', Carbon::now()->format('Y-m-d H:i:s'))
                       ->first();
        $notificacion =0;
        if($campaign){
            // Buscamos si participan todos los usuarios
            if($campaign->all_users ==1){

                $user->campaign = $campaign->prefix . rand(1000,99999);
                $notificacion = 1;
            }else{

                /*$participants = Participant::where('email',Crypt::decryptString($user->email))->first();
                dump("Participantes: ");
                dump(Crypt::decryptString($user->email));
                dd($participants);*/

                $participants = Participant::all();
                foreach($participants as $participant){
                    if(Crypt::decryptString($participant->email) == $user->email){
                        $user->campaign = $campaign->prefix . rand(1000,99999);
                        $participant->available = 0;
                        $participant->save();
                        $notificacion = 1;
                    }
                }
            }
        }

     $user->old_passwords = [$user->password];

       $user->save();

       addNotification('Nuevo usuario', 'Nuevo usuario registrado', 0,$user->id);
       if($notificacion==1){
            addNotification('Nueva participación sorteo', 'Nueva participación asignada', 0,$user->id);
       }


       $tmp = Template::find(1);
        Mail::send('email_base_2', ['tmp' => $tmp,'target'=>url('/users/'.$user->id)], function ($message) use($tmp, $user) {
            //$message->to(Crypt::decryptString($user->email), Crypt::decryptString($user->name));
            $message->to($user->email, Crypt::decryptString($user->name));
            $message->subject($tmp->title);
        });


       return $user;
    }

    public function registerSocial(Request $r)
    {
        $user = User::where('email',$r->email)->first();

        if (!$user) {

            $user = $model_user->create([

                'name' => $request->name,
                'email' => $request->email,
                'newsletter' => 1,
                'role' => 2,
                'password' => null,

            ]);

            $tmp = Template::find(1);
            Mail::send('email_base_2', ['tmp' => $tmp], function ($message) use($tmp, $user) {
                $message->to($user->email, $user->name);
                $message->subject($tmp->title);
            });
        }

        return Auth::loginUsingId($user->id);
    }
}
