<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class LoginController extends Controller
{
    //this method show admin login page
   public function index(){
    return view('admin.login');
   }

   public function authenticate(Request $request)
   {
//this method will authenticate admin user
       $validator = Validator::make($request->all(), [
           'email' => 'required|email',
           'password' => 'required'

       ]);

       if ($validator->passes()) {

           if(Auth::guard('admin')->attempt(['email'=> $request->email, 'password'=> $request->password])){

               if(Auth::guard('admin')-> user()->role != 'admin'){
                Auth:: guard('admin')->logout();
                return redirect()->route('admin.login')->withInput()->with('error','you are not authorized to access this.');
                    
               }

               return redirect()->route('admin.dashboard');

           } else{
               return redirect()->route('admin.login')->with('error','Either email or password is incorrect.');
           }

       } else {
           return redirect()->route('admin.login')
               ->withInput()
               ->withErrors($validator);
       }

   }

   public function logout(){
    Auth::guard('admin')->logout();
    return redirect()->route('admin.login');
   }

}
