<?php

namespace App\Http\Controllers;

use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    use AuthenticatesUsers;

    protected $redirectTo = RouteServiceProvider::DASH;

//    public function loginPage(){
//        return view('admin.auth.login');
//    }

    public function adminDashboard(){
        return view('admin.dashboard.dashboard');
    }

    public function adminLogout(){
        Auth::logout();

        return redirect()->route('admin.login');
    }

    public function showLoginForm()
    {
        return view('admin.auth.login');
    }

    protected function guard()
    {
        return Auth::guard('admin');
    }
}
