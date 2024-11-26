<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index() {
        if(Auth::id()){
            $userLevel = Auth::user()->usertype;
            switch(strtolower($userLevel)){
                case "admin":
                    return view("admin.dashboard");
                case "librarian":
                    return view("librarian.dashboard");
                case "student":
                    return view("student.dashboard");
                case "lecturer":
                    return view("lecturer.dashboard");
            }
        }
        return view("welcome");
    }


}
