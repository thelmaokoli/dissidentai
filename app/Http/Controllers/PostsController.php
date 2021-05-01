<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
// bring in model to etc posts:
use App\Models\Post;

// ****&&**** HOW TO USE SQL QUERIES WITHOUT ELOQUENT (THIS CODE IS 
// WRITTEN IN ELOQUENT) :
use DB; // ****&&****

class PostsController extends Controller
{

     /**
     * Create a new controller instance.
     *
     * @return void
     */
     // auth constructor 
   public function __construct()
   {
       $this->middleware('auth', ['except' => ['index', 'show']]);
   }
   // trying to add an entry now redirects to login

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::all();
        // this will fetch all the data in this model (array / json form)
        
        // or
        //$posts = Post::where('title', 'Post two')->get();

        // or
        //$posts = Post::orderBy('title', 'desc')->get();
        
        // OR (****&&****)
        // $posts = DB::select('SELECT * FROM posts');


        // limit posts to 2:
        // $posts = Post::orderBy('title', 'desc')->take(2)->get();
       

        // pagination to one per page:
        //$posts = Post::orderBy('title', 'desc')->paginate(1);
       

        return view('posts.index')->with('posts', $posts);
  
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('posts.create');
        // when you hit submit on that form, 
        // it will make a post request to the store unction below
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
            'cover_image' => 'image|nullable|max:1999'
        ]);
     
            // handle file upload
            if($request->hasFile('cover_image')){
                // Get filename with the extension 
                $filenameWithExt = $request->file('cover_image')->getClientOriginalName();
                // sets the exact file name 

                // get just filename
                $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
                // get just ext
                $extension = $request->file('cover_image')->getClientOriginalExtension();
                // filename to store
                $filenameToStore= $filename.'_'.time().'.'.$extension;
                // timestamp - helps with UNIQUE file names
                $path = $request->file('cover_image')->storeAs('public/cover_images', $filenameToStore);
                // note that this function also creates the folder if it doesn't already exists
            } else {
                $filenameToStore = 'noimage.jpg';
            }

            //create post
            // we can use this because we brought in use App\Models\Post
            $post = new Post;
            $post->title = $request->input('title');
            $post->body = $request->input('body');
            $post->user_id = auth()->user()->id;
            $post->cover_image = $filenameToStore;
            $post->save();
            return redirect('/posts')->with('success', 'Entry Created');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::find($id);
        return view('posts.show')->with('post', $post);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::find($id);

        // check for correct user:
            if(auth()->user()->id !==$post->user_id){
                return redirect('/posts')->with('error', 'unauthorized page');
            }

        return view('posts.edit')->with('post', $post);
    
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
            'body' => 'required'
        ]);

        // handle file upload
        if($request->hasFile('cover_image')){
            // Get filename with the extension 
            $filenameWithExt = $request->file('cover_image')->getClientOriginalName();
            // sets the exact file name 

            // get just filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            // get just ext
            $extension = $request->file('cover_image')->getClientOriginalExtension();
            // filename to store
            $filenameToStore= $filename.'_'.time().'.'.$extension;
            // timestamp - helps with UNIQUE file names
            $path = $request->file('cover_image')->storeAs('public/cover_images', $filenameToStore);
            // note that this function also creates the folder if it doesn't already exists
        } 

            // we can use this because we brought in use App\Models\Post
            $post = Post::find($id);
            // check for correct user:
                if(auth()->user()->id !==$post->user_id){
                    return redirect('/posts')->with('error', 'unauthorized page');
                } else {   
            $post->title = $request->input('title');
            $post->body = $request->input('body');
            if($request->hasFile('cover_image')){
                $post->cover_image= $filenameToStore;
            }
            $post->save();
            return redirect('/posts')->with('success', 'Entry Updated');
                }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::find($id);

        $post = Post::find($id);

        // check for correct user:
            if(auth()->user()->id !==$post->user_id){
                return redirect('/posts')->with('error', 'unauthorized page');
            } elseif (auth()->user()->id ==$post->user_id ) {
                if ($request->hasFile('cover_image')) {
                if($post->cover_image != 'noimage.jpg'){
                   Storage::delete('public/cover_images/'.$post->cover_image);
                }
                $post->cover_image = $filenameToStore;
            }
            
        $post->delete();
        return redirect('/posts')->with('success', 'Entry Deleted');
 
}
    }
}
