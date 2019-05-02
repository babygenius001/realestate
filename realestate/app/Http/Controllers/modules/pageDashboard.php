<?php

namespace App\Http\Controllers\modules;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class pageDashboard extends Controller
{
    //
    function __construct(){
        parent::__construct();
    }

    public function dashboard(){
    	# code...
    	return view('modules.account.dashboard.dashboard');
    }
   

}
