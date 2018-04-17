<?php

namespace App\Http\Controllers;
use App\Photo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PhotosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     
    public function index()
    {
        //
    }
    */
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     
    public function create()
    {
        //
    }
*/
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      
    }
    

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
    
    public function show($id)
    {
        //
    }
 */
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
  
    public function edit($id)
    {
        //
    }
   */
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $gallery_id = $request->gallery_id;
      $photo = Photo::Find($id);
      $photo->caption = $request->input('caption');
      $photo->save();
      return redirect('/galleries/'.$gallery_id.'/edit')->with('success', 'Edited a Photo')->with('pageName', 'Gallery');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id,Request $req)
    {
        $photo = Photo::find($id);
   
            Storage::delete('public/gallery_images/'.$photo->path);
        

        $photo->delete();

        return redirect('/galleries/'.$req->gallery_id.'/edit')->with('success', 'Photo Deleted')->with('pageName', 'Edit Gallery');
    }
}
