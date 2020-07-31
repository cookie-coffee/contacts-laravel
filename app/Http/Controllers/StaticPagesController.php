<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StaticPagesController extends Controller
{
    public function home ()
    {
        return view('static_pages/home');
    }

    public function search ()
    {
        return view('static_pages/search');
    }
}
