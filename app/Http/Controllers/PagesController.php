<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Event;
class PagesController extends Controller
{
    public function index(){
        $pageName = "Home";
        $EC = new EventsController();
        $events = $EC->transformMultiEventDates(Event::orderBy('start','asc')->take(3)->get());
        return view('pages.index')->with('pageName', $pageName)->with('events',$events);
    }

    public function about(){
        $pageName = "About";
        $path = storage_path()."\app\public\json\about.json"; 
        $about = json_decode(file_get_contents($path), true);
     
        return view('pages.about')->with('pageName', $pageName)->with('about',$about);
    }

    public function services(){
        $pageName = "Service Times";
        return view('pages.services')->with('pageName',$pageName);
    }

    public function contact(){
        $pageName = "Contact Us";
        return view('pages.contact')->with('pageName',$pageName);
    }
}
