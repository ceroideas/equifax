<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class InvoicesController extends Controller
{
    public function create($serie, $invoice){
        echo "invoice Controller Create: ";
        echo $serie;
        echo $invoice;


    }
}
