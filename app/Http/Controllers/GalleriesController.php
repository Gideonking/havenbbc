<?php

namespace App\Http\Controllers;

use App\Gallery;
use App\Photo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use GuzzleHttp\Client;

class GalleriesController extends Controller
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
        $galleries = Gallery::orderBy('updated_at', 'asc')->get();
        //cover image on each gallery
        
        foreach($galleries as $gallery){
            //improve this with limiting and randomizing the images to be sent
            $gallery->images = $gallery->photos;
        }

        $apiKey = 'AIzaSyD_TLq31Fx_2Umbau6JJqab7tExkUKCmL0';
        $channelId = 'UC90VgQJGHvAN6gM0vS-q9RA';
        $client = new Client();
    
            $req =  ['query' => [
                    'key' =>   $apiKey,
                    'channelId' => $channelId,
                    'part' => 'snippet,id',
                    'order'=>'date'
                    //'maxResult' => 20
                    ]
        ];
            $res = $client->request('GET','https://www.googleapis.com/youtube/v3/search?key=AIzaSyD_TLq31Fx_2Umbau6JJqab7tExkUKCmL0&channelId=UC90VgQJGHvAN6gM0vS-q9RA&part=snippet,id&order=date');
          //  dd($res);
    
            $result = json_decode($res->getBody());
            //dd($result);

            $videos = $result->items;
           // dd($videos[0]->id->videoId);
        $pageName = 'Gallery';
   //     dd($galleries);
        return view('galleries.index')->with('pageName', $pageName)->with('galleries', $galleries)->with('videos', $videos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $pageName = 'Create New Gallery';
        return view('galleries.create')->with('pageName', $pageName);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //validate
        $validate =  [
            'title' => 'required',
            'description' => 'nullable  ',
            'photos' => 'required'
        ];
        $photos = count($request->photos);

        //return $photos;
        foreach(range(0,$photos) as $index){
            $validate['photos.' . $index] = 'image|mimes:jpeg,bmp,png|max:2000';
        }
        $this->validate($request, $validate );

   

        //save new gallery
        $gallery = new Gallery;
        $gallery->title = $request->input('title');
        $gallery->description = $request->input('description');
        $gallery->user_id = auth()->user()->id;
        $gallery->save();
        //saving the photos
         self::storePhotos($request->file('photos'),$gallery->id);
     


       return redirect('/galleries')->with('success', 'Gallery Created')->with('pageName', 'Gallery');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $gallery = Gallery::Find($id);
        $gallery->images = $gallery->photos;
        //cover image on each gallery
        $pageName = 'Gallery:'. $gallery->title;
   //     dd($galleries);
        return view('galleries.show')->with('pageName', $pageName)->with('gallery', $gallery);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $gallery = Gallery::find($id);
        $gallery->images = $gallery->photos;
        return view('galleries.edit')->with('gallery', $gallery)->with('pageName', 'Edit Gallery');
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
        ]);
    
        $gallery = Gallery::find($id);
            $gallery->title = $request->input('title');
            $gallery->description = $request->input('description');
            $gallery->save();
    
            return redirect('/galleries/'.$id)->with('success', 'Ministry Edited')->with('pageName', 'Gallery');
    }
    public function updateMany(Request $request, $id)
    {
     
        //validate
        $validate =  [
            'photos' => 'required'
        ];
        $photos = count($request->photos);

        //return $photos;
        foreach(range(0,$photos) as $index){
            $validate['photos.' . $index] = 'image|mimes:jpeg,bmp,png|max:2000';
        }
        $this->validate($request, $validate );


        //saving the photos
         self::storePhotos($request->file('photos'),$id);
     


       return redirect('/galleries/'.$id.'/edit')->with('success', 'Added '. $photos .' New Photo(s)')->with('pageName', 'Gallery');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $gallery = Gallery::find($id);
   foreach($gallery->photos as $photo){
$image = Photo::Find($photo->id);
Storage::delete('public/gallery_images/'. $photo->path);
$image->delete();

   }
           
        

        $gallery->delete();

        return redirect('/galleries/')->with('success', 'Gallery Deleted')->with('pageName', 'Edit Gallery');
    }

    public function storePhotos($photos , $gallery_id)
    {
              
      foreach($photos as $photo){
        $dimensions = getimagesize($photo);
        $width = $dimensions[0];
        $height = $dimensions[1];
            //get file name with extension
            $filenamewithExt = $photo->getClientOriginalName();
            //get file name
            $fileName = pathinfo($filenamewithExt,PATHINFO_FILENAME);
            //get ext
            $extension = $photo->getClientOriginalExtension();
            //filename to store
            $fileNameToStore = $fileName.'_'.time().'.'.$extension;
            //upload image
            $path =$photo->storeAs('public/gallery_images',$fileNameToStore);

            $photoSave = new Photo;
            $photoSave->path = $fileNameToStore;
            $photoSave->caption = "";
            $photoSave->gallery_id = $gallery_id;
            $photoSave->width = $width;
            $photoSave->height =  $height;
            $photoSave->save();

      }

    }
}
