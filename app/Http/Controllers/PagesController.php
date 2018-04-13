<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Event;
class PagesController extends Controller
{
    public function index(){
        $pageName = "Home";
        $events = Event::orderBy('start','asc')->take(3)->get();
        return view('pages.index')->with('pageName', $pageName)->with('events',$events);
    }

    public function about(){
        $pageName = "About";
        return view('pages.about')->with('pageName', $pageName);
    }
}
