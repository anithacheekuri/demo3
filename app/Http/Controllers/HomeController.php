<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function form()
    {
        echo "hh";
        exit;
        return view('form');
    }
    public function aa()
    {
        echo "hh";
        exit;
        return view('form');
    }
    public function formstore()
    {
       // return view('home');
       echo "ff";
    }
    
}
