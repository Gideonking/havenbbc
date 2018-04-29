<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Ministry;
use App\Leader;
use App\Position;
use Illuminate\Support\Facades\Storage;
use App\Traits\ImageUpload;
class MinistriesController extends Controller
{
    use ImageUpload;

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
     
        $ministries = Ministry::orderBy('id', 'asc')->get();
        $pageName = 'Ministries';
        return view('ministries.index')->with('pageName', $pageName)->with('ministries',$ministries);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $pageName = 'Create Ministries';
        return view('ministries.create')->with('pageName', $pageName)->with('cropSettings',$this->cropSet('ministries'));
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
        ]);
//Handle file upload
if ($request->input('cover_image') != "") {
    $data = $request->input('cover_image');
    $path = 'storage/ministry_images/';
    $fileNameToStore = $this->uploadImageBase64($data,$path,'ministry','png');
    if($fileNameToStore == false)
    return redirect('/ministries/')->with('error', 'Upload Failed')->with('pageName', 'Ministries');
         } else {
            $fileNameToStore = "noimage.jpg";
        }
        $ministry = new Ministry;
        $ministry->title = $request->input('title');
        $ministry->description = $request->input('description');
        $ministry->longdescription = $request->input('longdescription');
        $ministry->cover_image = $fileNameToStore;
        $ministry->user_id = auth()->user()->id;
        $ministry->save();

        return redirect('/ministries')->with('success', 'Ministry Created')->with('pageName', 'Ministries');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id){
        $ministry = Ministry::with(['positions.leaders'])->find($id);
      //  dd($ministry);
        $pageName = $ministry->title;
        return view('ministries.show')->with('ministry', $ministry)->with('pageName', $pageName);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    { $ministry = Ministry::find($id);
        return view('ministries.edit')->with('ministry', $ministry)->with('pageName', 'Edit Ministry')->with('cropSettings',$this->cropSet('ministries'));
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
        'longdescription' => 'required',]);


//Handle file upload
if ($request->input('cover_image') != "") {
    $data = $request->input('cover_image');
    $path = 'storage/ministry_images/';
    $fileNameToStore = $this->uploadImageBase64($data,$path,'ministry','png');
    if($fileNameToStore == false)
    return redirect('/ministries/')->with('error', 'Upload Failed')->with('pageName', 'Ministries');
         } 

        $ministry = ministry::find($id);
        $ministry->title = $request->input('title');
        $ministry->description = $request->input('description');
        $ministry->longdescription = $request->input('longdescription');
        if ($request->input('cover_image') != "") {
            $ministry->cover_image = $fileNameToStore;
        }

        $ministry->save();

        return redirect('/ministries')->with('success', 'Ministry Edited')->with('pageName', 'Ministries');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    { $ministry = Ministry::find($id);
        if($ministry->cover_image != 'noimage.jpg'){
      //delete image
Storage::delete('public/ministry_images/'.$ministry->cover_image);
}

        $ministry->delete();

        return redirect('/ministries')->with('success', 'Ministry Deleted')->with('pageName', 'Ministries');
    }
}
