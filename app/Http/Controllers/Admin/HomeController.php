<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Claim;
use Auth;

class HomeController extends Controller
{
    public function __construct() {

    }

    public function index()
    {

        if(Auth::user()->isClient() && !Auth::user()->checkStatus()){
            return redirect()->route('user.edit', Auth::user())->with('alert', Auth::user()->getStatus());
        }
        if(Auth::user()->isAdmin() || Auth::user()->isSuperAdmin()|| Auth::user()->isFinance()){
            return view('admin.index',[
                'clients' => User::where('role', 2)->where('status', 1)->count(),
                'claims' => Claim::whereIn('status', [-1,0,1])->count()
            ]);
        }
        return view('admin.index');
    }

    public function frame(){

        return view('admin.frame');
    }
}
