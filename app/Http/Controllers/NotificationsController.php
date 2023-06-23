<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;

use Illuminate\Support\Facades\Notification;

use App\Notifications\NotifyUpdate;
use Auth;




class NotificationsController extends Controller
{


        /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        /*if(Auth::user()->isAssociate()){
            $thirdParties = Auth::user()->thirdParties;
        }elseif(Auth::user()->isSuperAdmin() ){
            $thirdParties = thirdParty::all();
        }/*else{
            $thirdParties = thirdParty::where('user_id',session('other_user'))->get();
        }*/

        $user = User::find(3);

        /*foreach($user->notifications as $notification){
            echo $notification->id;echo '<br>';
            echo json_encode($notification->data);echo '<br>';
            echo $notification->type;echo '<br>';
        }*/


        return view('notifications.index', [

            'userNotification'=>  $user
        ]);
    }



    public function setNotification(){

        $user = User::find(3); // usuario superadmin

        $notificacion = [
            'titulo' => 'Se agrego una nueva notificacion',
            'contenido' => 'Notificacion test'
        ];

        Notification::send($user, new NotifyUpdate($notificacion));

        dd('Save notification');

    }

    public function show($id)
    {

        $user = User::find(3);

        $notification = "";
        foreach($user->notifications as $item){
            if($item->id == $id){
                $notification = $item;
                //$item->markAsRead();
                break;
            }

        }


        return view('notifications.show', [
            'notification' => $notification
        ]);
    }


    public function read($id)
    {

        $user = User::find(3);

        foreach($user->notifications as $item){
            if($item->id == $id){
                $item->markAsRead();

                actuationActions("30050",$item->data['reclamacion']);
                break;
            }

        }


        return redirect('notifications')->with('msj', 'Notificación leida');
    }

    public function unread($id)
    {

        $user = User::find(3);

        foreach($user->notifications as $item){
            if($item->id == $id){

                $item->update(['read_at'=> NULL]);
                break;
            }

        }

        return redirect('notifications')->with('error', 'Notificación marcada como no leida');
    }

}
