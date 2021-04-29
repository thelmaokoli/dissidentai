@extends('layouts.app')
@section('content')
<a href="/posts">Go Back</a>
    <h1>{{$post->title}}</h1>
    
    <div>
        {!!$post->body!!}
    </div>
    <hr>
    <small>Dropped on {{$post-> created_at}}</small>
    <hr>
    <a href="/posts/{{$post->id}}/edit">Edit</a>

    {!!Form::open(['action' => ['App\Http\Controllers\PostsController@destroy', $post->id], 'method' => 'POST'])!!}
    <?php // just like with update - the fake POST becomes a delete (see route list for limitations)?>
    {{Form::hidden('_method', 'DELETE')}}
    {{Form::submit('Delete', ['class' => 'delete-btn'])}}
    {!!Form::close()!!}
    @endsection