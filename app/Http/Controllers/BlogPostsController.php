<?php

namespace App\Http\Controllers;
use App\BlogPost;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
class BlogPostsController extends Controller
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
        //return Event::all();
        $posts = BlogPost::orderBy('created_at', 'asc')->get();
        $pageName = 'Blog';
        return view('blog.index')->with('pageName', $pageName)->with('posts', $posts);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $pageName = 'Create Post';
        return view('blog.create')->with('pageName', $pageName);
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
            'body' => 'required',
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
$path = $request->file('cover_image')->storeAs('public/blog_images',$fileNameToStore);
        } else {
            $fileNameToStore = "noimage.jpg";
        }
        $post = new BlogPost;
        $post->title = $request->input('title');
        $post->body = $request->input('body');
        $post->cover_image = $fileNameToStore;
        $post->user_id = auth()->user()->id;
        $post->save();

        return redirect('/blog')->with('success', 'Post Created')->with('pageName', 'Blog');
  
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = BlogPost::find($id);

        $pageName = "Blog: " . $post->title;
        return view('blog.show')->with('post', $post)->with('pageName', $pageName);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = BlogPost::find($id);

        return view('blog.edit')->with('post', $post)->with('pageName', 'Edit Post');
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
            'body' => 'required',
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
    $path = $request->file('cover_image')->storeAs('public/blog_images',$fileNameToStore);
            } 

        $post = BlogPost::find($id);
        $post->title = $request->input('title');
        $post->body = $request->input('body');
        if ($request->hasFile('cover_image')) {
            $post->cover_image = $fileNameToStore;
        }
        $post->save();

        return redirect('/blog')->with('success', 'Post Edited')->with('pageName', 'Post');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = BlogPost::find($id);
        if($post->cover_image != 'noimage.jpg'){
        //delete image
        Storage::delete('public/event_images/'.$post->cover_image);
        }
        
                $post->delete();
        
                return redirect('/blog')->with('success', 'Post Deleted')->with('pageName', 'Blog');
    }
}
