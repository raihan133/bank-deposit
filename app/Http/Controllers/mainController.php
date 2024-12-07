<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class mainController extends Controller
{
    public function index(){
        return view("index");
    }

    public function login(){
        return view("login");
    }

    public function user_signup(){
        return view("user.signup");
    }

    public function user_registration(Request $request){

        DB::table("users")->insert([

            "email"=> $request->email,
            "password"=> bcrypt($request->password),
            "name" => $request->name,
            "role" => 1

        ]);

        return route("user.signup",["Successful"]);

    }

    public function user_login(Request $request){
        return view("user.profile");
    }

    public function admin_dashboard(){

        return view('admin.dashboard');
    }

    public function logout(){
        Auth::logout();

        return view("index");
    }

    public function admin_settings(){
        return view('admin.settings');
    }
}
