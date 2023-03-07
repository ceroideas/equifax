<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

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
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    public function isSuperAdmin(){

        if($this->role === 0){
            return true;
        }

    }

    public function isAdmin(){
        if($this->role === 1){
            return true;
        }
    }

    public function isClient(){
        if($this->role === 2){
            return true;
        }
    }

    public function isGestor(){
        if($this->role === 3){
            return true;
        }
    }

    public function isAssociate(){
        if($this->role === 4){
            return true;
        }
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
         return route('user.show', $this);
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
}
