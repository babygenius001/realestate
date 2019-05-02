<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Session;
use App\m_config;

class Redirects extends Controller
{
    //-------------------------------------------------------- 


    //-------------------------------------------------------- 

    public function Redirect_admin_index(Request $request){
        return view('admin.modules.home');
    }
}
