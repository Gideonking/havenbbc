<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Slide;
use App\Traits\ImageUpload;
use Illuminate\Support\Facades\Storage;

class SlidesController extends Controller
{
    use ImageUpload;
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
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    { 
        $slides = Slide::all();

        $pageName = 'Slides';
        return view('admin.slides.index')->with('pageName', $pageName)->with('slides', $slides);
  
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $pageName = 'Create a Slide';
        return view('admin.slides.create')->with('pageName', $pageName);
  
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $reqVal = [
            'title' => 'required'
        ];
        $isLink = 0;

        if($request->input('is_linked')[0]=='1'){ 
            $reqVal['link']='required';
            $reqVal['label']= 'required';
            $isLink = 1;
        }
       // dd($reqVal);
        $this->validate($request, $reqVal);
//Handle file upload
        if ($request->input('cover_image') != "") {
            $data = $request->input('cover_image');
            $path = 'storage/slide_images/';
            $fileNameToStore = $this->uploadImageBase64($data,$path,'slide','png');
            if($fileNameToStore == false)
            return redirect('/slides/')->with('error', 'Upload Failed')->with('pageName', 'Slides');
        } else {
            $randVal = mt_rand(1,5);
            $fileNameToStore = "noimage".$randVal.".jpg";
        }

        $slide = new Slide;
        $slide->title = $request->input('title');
        $slide->description = $request->input('description');
        $slide->cover_image = $fileNameToStore;
        $slide->is_linked = $isLink;
        $slide->link = $request->input('link').'';
        $slide->label = $request->input('label').'';
        $slide->save();

        return redirect('/slides/')->with('success', 'Slide Created')->with('pageName', 'Slides');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $slide = Slide::find($id); 
        return view('admin.slides.edit')->with('slide', $slide)->with('pageName', 'Edit Slide');
  
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
        $reqVal = [
            'title' => 'required',
            'cover_image' => 'image|nullable|max:1999'
        ];
        $isLink = 0;
        if($request->input('is_linked')[0]=='1'){ 
            $reqVal['link']='required';
            $reqVal['label']= 'required';
            $isLink = 1;
        }
       // dd($reqVal);
        $this->validate($request, $reqVal);
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
            $path = $request->file('cover_image')->storeAs('public/slide_images',$fileNameToStore);
        } 

        $slide = Slide::find($id);
        $slide->title = $request->input('title');
        $slide->description = $request->input('description');
        if ($request->hasFile('cover_image')) {
            $slide->cover_image = $fileNameToStore;
        }
        $slide->is_linked = $isLink;
        $slide->link = $request->input('link').'';
        $slide->label = $request->input('label').'';
        $slide->save();

        return redirect('/slides/')->with('success', 'Slide Edited')->with('pageName', 'Slides');
   
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $slide = Slide::find($id);
        $isDefault = true;
        for($i = 1; $i<=5 ;$i++){
            if($slide->cover_image == 'noimage'.$i.'.jpg'){
                break;
            }else{
            if($i==5)
            Storage::delete('public/event_images/'.$slide->cover_image);
            }
        }
        
                $slide->delete();
        
                return redirect('/slides')->with('success', 'Slide Deleted')->with('pageName', 'Slides');
           
    }
}
