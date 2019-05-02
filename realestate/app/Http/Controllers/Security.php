<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Http\Session;
use App\m_managers;
use Validator;
use Auth;
class Security extends Controller
{
    //


  	public function C_getLogin(Request $request)
  	{
      // if(Session()->has('manager_permission') && Session()->has('login'))
      // {
        
      //   if(Session()->get('manager_permission') === 'admin' || Session()->get('login') === true) 
      //   {
      //     return redirect()->route('NRGRedirects_AdminIndex');
      //   }
      // }

		  return view('admin.modules.login');
  	}

    //--------------------------------------------------------  
    public function C_logout()
    {
        Auth::logout();
        Auth::guard('m_managers')->logout();
        return redirect()->route('NRGSecurity_getLogin');
    }
    //-------------------------------------------------------- 

    public function C_postLogin(Request $request)
    {
   		
   		$rules = [
   			'iText-email'=>'required|email',
   			'iPassword-password'=>'required|min:8'
   		];
   		$messages = [
   			'iText-email.required' => 'Email là trường bắt buộc',
   			'iText-email.email' => 'Email không đúng định dạng',
   			'iPassword-password.required' => 'Password là trường bắt buộc',
   			'iPassword-password.min' => 'Password có ít nhất 8 ký tự'
   		];

   		$validator = Validator::make($request->all(), $rules, $messages);

    	if ($validator->fails())
    	{
  		  return redirect()->back()->withErrors($validator)->withInput();
    	}
    	else {

    		$log_email = $request->input('iText-email');
      	$log_pw = $request->input('iPassword-password');
      	$token = $request->_token;
 
      	if(Auth::guard('m_managers')->attempt(['email'=>$log_email, 'password'=>$log_pw])){
            return redirect()->route('NRGRedirects_AdminIndex');
      	}
      	return redirect()->back();

    	}


    }

    //-------------------------------------------------------- 

}