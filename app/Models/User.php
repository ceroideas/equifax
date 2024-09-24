<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Support\Facades\Crypt;


class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'type',
        'name',
        'email',
        'newsletter',
        'dni',
        'phone',
        'address',
        'location',
        'province',
        'cop',
        'iban',
        'role',
        'dni_img',
        'password',
        'legal_representative',
        'representative_dni',
        'apud_acta',
        'taxcode',
        'discount',
        'status',
        'referenced',
        'campaign',
        'msgusr',
        'pw_updated_at',
        'old_passwords'

    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
        'old_passwords',
        'google2fa_secret'
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        "old_passwords" => "array"
        //'pw_updated_at'=>'datetime',
    ];


    public function isSuperAdmin(){ // webmaster

        if($this->role === 0){
            return true;
        }

    }

    public function getEmailAttribute($value) {
        return Crypt::decryptString($value);
        }

    

    public function isAdmin(){ // gestor legal
        if($this->role === 1){
            return true;
        }
    }

    public function isClient(){  // cliente
        if($this->role === 2){
            return true;
        }
    }

    public function isGestor(){  //gestorias (cliente)
        if($this->role === 3){
            return true;
        }
    }

    public function isAssociate(){ //asociaciones (cliente)
        if($this->role === 4){
            return true;
        }
    }

    public function isFinance(){ //Financiero (Empresa)
        if($this->role === 5){
            return true;
        }
    }
    public function setGoogle2faSecretAttribute($value)
        {
            $this->attributes['google2fa_secret'] = Crypt::encryptString($value);
        }

        public function getGoogle2faSecretAttribute($value)
        {
            if (!$value) return;
            return Crypt::decryptString($value);
        }

    public function getRole(){
        switch ($this->role) {
            case 0:
                return 'Super Admin';
                break;
            case 1:
                return 'Administrador';
                break;
            case 2:
                return 'Cliente';
                break;
            case 3:
                return 'Gestoría';
                break;
            case 4:
                return 'Asociado';
                break;
            case 5:
                return 'Finanzas';
                break;
            default:
                return 'Cliente';
                break;
        }
    }

    public function getStatus(){
        switch ($this->status) {
            case NULL:
                return 'Datos incompletos';
            case 1:
                return 'Pendiente de Revisión';
                break;
            case 2:
                return 'Revocado vuelva a enviar el DNI';
                break;
            case 3:
                return 'Ficha completa';
                break;
            default:
                return 'Pendiente de Aprobación';
                break;
        }
    }

    public function status(){

        switch ($this->status) {

            case 3:
                return true;
                break;
            default:
                return false;
                break;
        }
    }

    public function checkStatus(){
        if($this->isClient()/* && $this->status()*/){

            return true;

        }

        return false;
    }

    public function isPending(){

        if($this->status === 1){
            return true;
        }

        return false;
    }

    public function approval(){

       $this->status = 3;
       $this->save();

       return true;
    }

    public function denial(){

        $this->status = 2;
        $this->save();

        return true;
     }

     public function pending(){

        $this->status = 1;
        $this->save();

        return true;
     }

     public function adminlte_profile_url(){


        //$decryptedName = Crypt::decryptString($this->name);
        //dd($decryptedName);

         return route('user.show', $this);
         //return route('user.show', compact($this,$decryptedName));
     }

     public function adminlte_desc(){
         return $this->getRole();
     }

     public function thirdParties(){

         return $this->hasMany(ThirdParty::class);
     }

     public function debtors(){

        return $this->hasMany(Debtor::class);
    }

    public function claims(){

        return $this->hasMany(Claim::class, 'owner_id');
    }
    public function invoices(){

        return $this->hasMany(Invoice::class, 'user_id');
    }

    public function retrieveByCredentials($credentials)
    {
        return User::find(1);
    }
}
