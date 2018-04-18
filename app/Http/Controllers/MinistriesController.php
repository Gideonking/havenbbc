<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Ministry;
use Illuminate\Support\Facades\Storage;
class MinistriesController extends Controller
{
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
        return view('ministries.create')->with('pageName', $pageName);
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
$path = $request->file('cover_image')->storeAs('public/ministry_images',$fileNameToStore);
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
    public function show($id)
    {
        $ministry = Ministry::find($id);

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
        return view('ministries.edit')->with('ministry', $ministry)->with('pageName', 'Edit Ministry');
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
        'longdescription' => 'required',
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
    $path = $request->file('cover_image')->storeAs('public/ministry_images',$fileNameToStore);
            } 

        $ministry = ministry::find($id);
        $ministry->title = $request->input('title');
        $ministry->description = $request->input('description');
        $ministry->longdescription = $request->input('longdescription');
        if ($request->hasFile('cover_image')) {
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
