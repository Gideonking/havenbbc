<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Leader;
use App\Position;
use App\Ministry;
class LeadersController extends Controller
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
        $leaders = Leader::with('positions.ministry')->get();
        return view('ministries.leaders.index')->with('leaders',$leaders)->with('pageName','Leaders');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('ministries.leaders.create')->with('pageName', 'Create Leader');
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
            'name' => 'required',
            'cover_image' => 'image|nullable|max:1999',
        ]);
//Handle file upload
        if ($request->hasFile('cover_image')) {
//get file name with extension
$filenamewithExt = $request->file('cover_image')->getClientOriginalName();
//get file name
$fileName = pathinfo($filenamewithExt,PATHINFO_FILENAME);
//get ext
$extension = $request->file('cover_image')->getClientOriginalExtension();
//filename to store
$fileNameToStore = $fileName.'_'.time().'.'.$extension;
//upload image
$path = $request->file('cover_image')->storeAs('public/profile_images',$fileNameToStore);
        } else {
            $fileNameToStore = "noimage.jpg";
        }
        $leader = new Leader;
        $leader->title = $request->input('title');
        $leader->name = $request->input('name');
        $leader->cover_image = $fileNameToStore;
        $leader->save();

        return redirect('/leaders')->with('success', 'Leader Created')->with('pageName', 'Leaders');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $leaders = Leader::with('positions.ministry')->get();
        return view('ministries.leaders.index')->with('leaders',$leaders)->with('pageName','Leaders');
  
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $leader = Leader::find($id);
        return view('ministries.leaders.edit')->with('leader',$leader)->with('pageName','Leaders');
  
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
            'name' => 'required',
            'cover_image' => 'image|nullable|max:1999',
        ]);


//Handle file upload
if ($request->hasFile('cover_image')) {
    //get file name with extension
    $filenamewithExt = $request->file('cover_image')->getClientOriginalName();
    //get file name
    $fileName = pathinfo($filenamewithExt,PATHINFO_FILENAME);
    //get ext
    $extension = $request->file('cover_image')->getClientOriginalExtension();
    //filename to store
    $fileNameToStore = $fileName.'_'.time().'.'.$extension;
    //upload image
    $path = $request->file('cover_image')->storeAs('public/profile_images',$fileNameToStore);
            } 

        $leader = Leader::find($id);
        $leader->title = $request->input('title');
        $leader->name = $request->input('name');
        if ($request->hasFile('cover_image')) {
            $leader->cover_image = $fileNameToStore;
        }
        $leader->save();

        return redirect('/leaders')->with('success', 'Leader Edited')->with('pageName', 'Leaders');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $leader = Leader::with('positions')->find($id); 
        if(count($leader->positions)>0){
            $leader->positions()->detach();
        }
          
        
        if($leader->cover_image != 'noimage.jpg'){
            //delete image
            Storage::delete('public/profile_images/'.$leader->cover_image);
            }
            
            $leader->delete();
        
        return redirect('/leaders')->with('success', 'Leader Deleted!')->with('pageName', 'Leaders');
        
    }

    public function unassign(Request $ids){
        $leader = Leader::with('positions')->find($ids->input('leader_id'));
        $position_id = $ids->input('position_id');
       // dd($leader);
        if(count($leader->positions)>0){
           // dd($leader->positions);
            $leader->positions()->detach($position_id);
            return redirect('/leaders')->with('success', 'Position Cleared')->with('pageName', 'Leaders');
  

        }
            return redirect('/leaders')->with('error', 'No Position Found!')->with('pageName', 'Leaders');
  

        

    }
}
