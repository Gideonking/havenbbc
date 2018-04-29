<?php

namespace App\Http\Controllers;

use App\Event;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Traits\ImageUpload;

class EventsController extends Controller
{
    use ImageUpload;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth',['except' => ['index','show']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        //return Event::all();
        $events = Event::orderBy('start', 'asc')->get();
        $events = self::transformMultiEventDates($events);
        $pageName = 'Events';
        return view('events.index')->with('pageName', $pageName)->with('events', $events);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $pageName = 'Create Event';
        return view('events.create')->with('pageName', $pageName)->with('cropSettings',$this->cropSet('events'));
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
            'title' => 'required',
            'description' => 'required',
            'start' => 'required|before:end',
            'end' => 'required|after:start',
           ]);
//Handle file upload
if ($request->input('cover_image') != "") {
    $data = $request->input('cover_image');
    $path = 'storage/event_images/';
    $fileNameToStore = $this->uploadImageBase64($data,$path,'event','png');
    if($fileNameToStore == false)
    return redirect('/events/')->with('error', 'Upload Failed')->with('pageName', 'Events');
        } else {
            $fileNameToStore = "noimage.jpg";
        }
        $event = new Event;
        $event->title = $request->input('title');
        $event->description = $request->input('description');
        $event->longdescription = $request->input('longdescription');
        $event->cover_image = $fileNameToStore;
        $event->start = $request->input('start');
        $event->end = $request->input('end');
        $event->user_id = auth()->user()->id;
        $event->save();

        return redirect('/events')->with('success', 'Event Created')->with('pageName', 'Events');
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
        $event = self::transformEventDates(Event::find($id));

        $pageName = "Event: " . $event->title;
        return view('events.show')->with('event', $event)->with('pageName', $pageName);
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

        $startDt = Carbon::parse($event->start);
        $endDt = Carbon::parse($event->end);

        $newStart = $startDt->format('Y-m-d\TH:i:s');
        $newEnd = $endDt->format('Y-m-d\TH:i:s');

        $event->start = $newStart;
        $event->end = $newEnd;
        return view('events.edit')->with('event', $event)->with('pageName', 'Edit Event')->with('cropSettings',$this->cropSet('events'));
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
            'title' => 'required',
            'description' => 'required',
            'start' => 'required|before:end',
            'end' => 'required|after:start',
                 ]);


//Handle file upload
if ($request->input('cover_image') != "") {
    $data = $request->input('cover_image');
    $path = 'storage/event_images/';
    $fileNameToStore = $this->uploadImageBase64($data,$path,'slide','png');
    if($fileNameToStore == false)
    return redirect('/events/')->with('error', 'Upload Failed')->with('pageName', 'Event');
            } 

        $event = Event::find($id);
        $event->title = $request->input('title');
        $event->description = $request->input('description');
        $event->longdescription = $request->input('longdescription');
        if ($request->input('cover_image') != "") {
            $event->cover_image = $fileNameToStore;
        }
        $event->start = $request->input('start');
        $event->end = $request->input('end');
        $event->save();

        return redirect('/events')->with('success', 'Event Edited')->with('pageName', 'Events');
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
if($event->cover_image != 'noimage.jpg'){
//delete image
Storage::delete('public/event_images/'.$event->cover_image);
}

        $event->delete();

        return redirect('/events')->with('success', 'Event Deleted')->with('pageName', 'Events');
    }

    //added functionlities

    private function sameDay($dt1, $dt2)
    {
        $date1 = Carbon::parse($dt1);
        $date2 = Carbon::parse($dt1);
        if ($date1->eq($date2)) {
            return true;
        } else {
            return false;
        }

        return false;
    }

    public function transformEventDates($event)
    {
        $event->start = Carbon::parse($event->start)->format('l F j, Y h:i A');
        if (self::sameDay($event->start, $event->end)) {
            $event->end = Carbon::parse($event->end)->format('h:i A');
        } else {
            $event->end = Carbon::parse($event->end)->format('l F j, Y h:i A');
        }

        return $event;
    }

     public function transformMultiEventDates($events)
    {
        foreach ($events as $event) {
            $event = self::transformEventDates($event);
        }
        return $events;
    }
}
