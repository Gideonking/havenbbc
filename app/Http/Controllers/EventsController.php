<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Event;

class EventsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //  
        //return Event::all();
        $events = Event::orderBy('start','asc')->get();
        $pageName = 'Events';
        return view('events.index')->with('pageName',$pageName)->with('events',$events);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {  $pageName = 'Create Event';
        return view('events.create')->with('pageName',$pageName);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title'=>'required',
            'description' =>'required',
            'start' => 'required',
            'end' => 'required'
        ]);

       $event = new Event;
       $event->title = $request->input('title');
       $event->description = $request->input('description');
       $event->start = $request->input('start');
       $event->end = $request->input('end');
       $event->save();

       return redirect('/events')->with('success','Event Created')->with('pageName','Events');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $event = Event::find($id);
        $pageName = "Event: " . $event->title;
        return view('events.show')->with('event',$event)->with('pageName',$pageName);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $event = Event::find($id);
        return view('events.edit') -> with('event', $event) -> with('pageName', 'Edit Event');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
       
        $this->validate($request, [
            'title'=>'required',
            'description' =>'required',
            'start' => 'required',
            'end' => 'required'
        ]);

       $event = Event::find($id);
       $event->title = $request->input('title');
       $event->description = $request->input('description');
       $event->start = $request->input('start');
       $event->end = $request->input('end');
       $event->save();

       return redirect('/events')->with('success','Event Edited')->with('pageName','Events');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       $event = Event::find($id);
       $event->delete();
       return redirect('/events')->with('success','Event Deleted')->with('pageName','Events');
    }
}
