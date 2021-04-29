<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// bring in model to etc posts
use App\Models\Post;

// ****&&**** HOW TO USE SQL QUERIES WITHOUT ELOQUENT (THIS CODE IS 
// WRITTEN IN ELOQUENT) :
use DB; // ****&&****

class PostsController extends Controller
{
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
            'body' => 'required'
        ]);
     

            // we can use this because we brought in use App\Models\Post
            $post = new Post;
            $post->title = $request->input('title');
            $post->body = $request->input('body');
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
     

            // we can use this because we brought in use App\Models\Post
            $post = Post::find($id);
            $post->title = $request->input('title');
            $post->body = $request->input('body');
            $post->save();
            return redirect('/posts')->with('success', 'Entry Updated');

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
        $post->delete();
        return redirect('/posts')->with('success', 'Entry Deleted');

    }
}
