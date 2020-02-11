<?php

namespace App\Http\Controllers;

use App\Grupo;
use Carbon\Carbon;
use Illuminate\Http\Request;
 use Illuminate\Support\Facades\Auth;

class FrontController extends Controller


{
    public function __construct()
    {

        $this->middleware('auth');
    }


    public function index()
{
    return view('Auth.login');
}
    public function home()
    {
    if(Auth::check())
    {

        return view('home');
    }

        return redirect('/login');
    }

    public function principal()
    {
        return view('principal');
    }

    public function inicio()
    {
        return view('inicio');
    }
}
