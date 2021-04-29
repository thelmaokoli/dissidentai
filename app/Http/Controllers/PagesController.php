<?php

namespace App\Http\Controllers;

// automatically brought in request library to handle requests 
use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function index(){
       // return 'INDEX';
       $title = 'This is Dissident AI';
       return view('pages.index', compact('title'));
       // or (better for multiple methods, passing in array)
       // return view('pages.index')->with('title', $title);
    }

    public function about(){
        $title = 'About';
        return view('pages.about')->with('title', $title);
     }
     public function services(){
         $data = array(
             'title' => 'Services',
             'services' => ['Artificial Intelligence', 'Machine Learning', 'Algorithms', 'Internet of Things']

         );
        return view('pages.services')->with($data);
     }
}
