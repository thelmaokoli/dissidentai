<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Controller;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\PostsController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [PagesController::class, 'index']); 
// controller - method 

Route::get('/about', [PagesController::class, 'about']);

Route::get('/services', [PagesController::class, 'services']);


Route::get('/news', [PagesController::class, 'news' ]);
Route::get('/blogs', [PagesController::class, 'blogs' ]);
Route::get('/communities', [PagesController::class, 'communities' ]);
Route::get('/contact', [PagesController::class, 'contact']);

Route::resources(['posts'=>PostsController::class]);
// this sends appname/posts to go to index function of resource PostContoller

Route::post('ckeditor/image_upload', 'CKEditorController@upload')->name('upload');


/* pre cotroller setup
Route::get('/', function () {
   return view('welcome');
   // return  'Hello World';
   // return '<h1>hELLO bIG'</h1>
});

Route::get('/about', function () {
    return view('pages.about');
    // pages/about also works
 });

 // insert dynamic value
Route::get('/users/{id}', function ($id) {
    return 'this is user '.$id;
    // http://dissidentai.me/users/thelma
    // => this is user thelma
 });

 Route::get('/users/{id}/{name}', function ($id, $name) {
    return 'this is user '.$id .' named ' .$name;
    // http://dissidentai.me/users/22/thelma
    // => this is user 22 named thelma
 });
 
*/

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
