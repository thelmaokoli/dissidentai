<?php

namespace App\Http\Controllers;

// automatically brought in request library to handle requests 
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Post;

class PagesController extends Controller
{
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    
    public function index(){
       // return 'INDEX';
      
       $post = Post::find(8);
       return view('pages.index')->with('post', $post);
       // or (better for multiple methods, passing in array)
       // return view('pages.index')->with('title', $title);
    }

    public function about(){
        $title = 'About';
        $data = array(
             'subtitle' => 'Topics',
             'topics' => ['Artificial Intelligence', 'Machine Learning', 'Algorithms', 'Internet of Things']

         );
         return view('pages.about')->with('title', $title)->with($data);
     }

     public function news(){
         return view('pages.news');
     }

     public function blogs(){
         return view('pages.blogs');
     }

     public function communities(){
         return view('pages.communities');
     }

     public function contact(){
         return view('pages.contact');
     }

     

};
