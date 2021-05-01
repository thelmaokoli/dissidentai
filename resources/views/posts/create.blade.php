@extends('layouts.app')

<?php // https://laravelcollective.com/docs/6.x/html#opening-a-form
// composer require laravelcollective/html ?>

@section('content')
   <h1> Create Entry <h1>
    {!! Form::open(['action' => 'App\Http\Controllers\PostsController@store', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
        <div>
            {{Form::label('title', 'Title')}}
            {{Form::text('title', '', ['class'=> 'form-part', 'placeholder' => 'stories, article summary, thoughts' ])}}
        </div>
        <div>
            {{Form::label('body', 'Body')}}
            {{Form::textarea('body', '', ['class'=> 'ckeditor form-control','id'=>'summary-ckeditor', 'placeholder' => 'stories, article summary, thoughts' ])}}
        </div>
        <div>
        {{Form:: file('cover_image')}}
        </div>
        {{Form::submit('Submit')}}
{!! Form::close() !!}
  @endsection 