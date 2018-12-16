<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\User;
use App\modelos\TipoCentro;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
class HomeController extends Controller
{
   
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
     {
       

        if($user = Auth::user()){
            return "vaLidado";
        }

        return "sin validar";
      
    }
}
