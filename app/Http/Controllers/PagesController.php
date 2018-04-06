<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function index(){
        $pageName = "Home";
        return view('pages.index')->with('pageName', $pageName);
    }

    public function about(){
        $pageName = "About";
        return view('pages.about')->with('pageName', $pageName);
    }
}
