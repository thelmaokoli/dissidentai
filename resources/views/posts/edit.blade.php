@extends('layouts.app')

<?php // https://laravelcollective.com/docs/6.x/html#opening-a-form
// composer require laravelcollective/html ?>

@section('content')
   <h1> Edit Entry <h1>
    {!! Form::open(['action' => ['App\Http\Controllers\PostsController@update', $post->id], 'method' => 'POST']) !!}
        <div>
            {{Form::label('title', 'Title')}}
            {{Form::text('title', $post->title, ['class'=> 'form-part', 'placeholder' => 'stories, article summary, thoughts' ])}}
        </div>
        <div>
            {{Form::label('body', 'Body')}}
            {{Form::textarea('body', $post->body, ['class'=> 'form-part','id'=>'article-ckeditor', 'placeholder' => 'stories, article summary, thoughts' ])}}
        </div>
        {{Form::hidden('_method', 'PUT')}}
        {{Form::submit('Submit')}}
{!! Form::close() !!}
  @endsection 