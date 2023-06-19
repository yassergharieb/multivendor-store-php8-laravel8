<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminLoginController extends Controller
{
    
    public  function AdminLoginForm() {
        return view('admin.auth.login');
    }

    public function AdminLoginPost(Request $request) {
        $admin  =  Auth::guard('admin')->attempt($request->only(['password' , 'email']));
        if($admin) {
             
            
           return  redirect()->intended();

            // return redirect()->route('admin.dashboard');
        } else {
            return redirect()->back()->with(['error' =>  'some thing went wrong ,  try again with correct credentials!']);

        }
    }


    public function LogOut() {
         Auth::guard('admin')->logout();
         return redirect()->route('admin.login');
    }
}
