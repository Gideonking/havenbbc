<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Ministry;
use App\Position;
use App\Leader;

class PositionsController extends Controller
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
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ministries = Ministry::with('positions.leaders')->orderBy('title', 'asc')->get();
        return view('ministries.positions.index')->with('ministries',$ministries)->with('pageName','Positions');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($ministry_id)
    {
     //   dd($ministry_id);
        $ministry = Ministry::find($ministry_id);
        return view('ministries.positions.create')->with('ministry',$ministry)->with('pageName','Positions');
 
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
            'tier' => 'required|numeric'
        ]);

        $position = new Position;
        $position->title = $request->input('title');
        $position->tier = $request->input('tier');
        $position->ministry_id = $request->input('ministry_id');
        $position->save();

        return redirect('/positions')->with('success', 'Position Created')->with('pageName', 'Position');
  
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
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $position = Position::find($id);
        return view('ministries.positions.edit')->with('position',$position)->with('pageName','Positions');
        
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
            'tier' => 'required|numeric'
        ]);

        $position = Position::find($id);
        $position->title = $request->input('title');
        $position->tier = $request->input('tier');
        $position->ministry_id = $request->input('ministry_id');
        $position->save();

        return redirect('/positions')->with('success', 'Position Updated')->with('pageName', 'Position');
  
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $position = Position::with('leaders')->find($id);
        if(count($position->leaders)>0){
            $leaderid = array();
            foreach($position->leaders as $leader)
            array_push($leaderid,$leader->id);
              $position->leaders()->detach($leader->id);

        }

        $position->delete();
    
                return redirect('/positions')->with('success', 'Position Deleted')->with('pageName', 'Position');
          
    }
    public function addAssignment($id)
    {
        $position = Position::find($id);
        $leaders = Leader::with('positions.ministry')->get();
        return view('ministries.positions.assign')->with('position',$position)->with('leaders',$leaders)->with('pageName','Positions');
    
    }
    public function assignLeader(Request $request){
        $position = Position::find($request->input('position_id'));
        $leader = Leader::find($request->input('leader_id'));
        $position->leaders()->attach($leader->id);

        $successMsg = 'Assigned '.$leader->title.' '.$leader->name.' to '.$position->title;
        
        return redirect('/positions')->with('success',$successMsg)->with('pageName', 'Position');
    }

    public function editAssignment($id)
    {
        
        $position = Position::find($id);
        $leaders = Leader::with('positions.ministry')->get();
       
        return view('ministries.positions.editassign')->with('position',$position)->with('leaders',$leaders)->with('pageName','Positions');
    
    }
    public function updateLeader(Request $request){
        $position = Position::find($request->input('position_id'));

        if(count($position->leaders)>0){
            $leaderid = array();
            foreach($position->leaders as $leader)
            array_push($leaderid,$leader->id);
              $position->leaders()->detach($leader->id);
        }

        $leader = Leader::find($request->input('leader_id'));
        $position->leaders()->attach($leader->id);

        $successMsg = 'Assigned '.$leader->title.' '.$leader->name.' to '.$position->title;
        
        return redirect('/positions')->with('success',$successMsg)->with('pageName', 'Position');
    }
    

    public function clearLeader(Request $request){
        $position = Position::with('leaders')->find($id);
        if(count($position->leaders)>0){
            $leaderid = array();
            foreach($position->leaders as $leader)
            array_push($leaderid,$leader->id);
              $position->leaders()->detach($leader->id);

              return redirect('/positions')->with('success', 'Assignment Cleared')->with('pageName', 'Position');
       
        } 
        return redirect('/positions')->with('error', 'Assignment NOT Cleared')->with('pageName', 'Position');
       

    }
}
