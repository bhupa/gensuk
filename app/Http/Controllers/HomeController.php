<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function __construct()
    {
    }

    public function index(){
        return view('frontend.home');
    }

    public function getAbout(){
        return view('frontend.about');
    }
}
