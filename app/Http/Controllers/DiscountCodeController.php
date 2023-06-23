<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;

use Illuminate\Support\Facades\Notification;

use App\Notifications\NotifyUpdate;


class DiscountCodeController extends Controller
{
    public function check(){

        $msg = "DiscountCodeController check";
        return $msg;
    }

    /*public function sendNotification(){

        $esquema = User::find(3); // usuario superadmin

        $notificacion = [
            'titulo' => 'Se agrego una nueva notificacion',
            'contenido' => 'Notificacion test'
        ];

        Notification::send($esquema, new NotifyUpdate($notificacion));

        dd('Save notification');

    }*/
}
