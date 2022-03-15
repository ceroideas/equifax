<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Auth;

class HomeController extends Controller
{
    public function __construct() {

    }

    public function index()
    {   
        $status = Auth::user()->checkStatus();

        if($status == NULL){
            return redirect()->route('user.edit', Auth::user())->with('alert', Auth::user()->getStatus());
        }
        
        return view('admin.index');
    }

    public function frame(){

        return view('admin.frame');
    }
}
