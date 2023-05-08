<?php

namespace App\Http\Controllers;


use Auth;
class AdminController extends Controller
{
    public function logout(){
        Auth::logout();
        return redirect()->route("login");
    }

}
