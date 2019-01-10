<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    //Vista principal

    public function inicio()
    {

        return view('welcome');
    }
}
