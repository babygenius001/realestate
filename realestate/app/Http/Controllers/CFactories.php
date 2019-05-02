<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CFactories extends Controller
{
    //
    public function __construct()
    {
    	$this->middleware('auth');
    }

    public function URL_ROOT()
    {
    	# code..
    	return 1;

    }

    public function IMG_RESOURCE()
    {
    	
    	return 1;
    }

    public function IMG_RESOURCE_IMG($link = 1)
    {
    	if($link = 1) return 0;
    	return 1;
    }
}
