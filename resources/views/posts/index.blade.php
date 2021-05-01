@extends('layouts.app')

@section('content')
    <h1>Posts</h1>
    @if(count($posts) > 0)
    @foreach ($posts as $post)
        <div class="">
        <div>
            <div>
             <h3>
                <a href="/posts/{{$post->id}}">{{$post->title}}
                <small>Dropped on {{$post->created_at}} by {{$post->user->name}}
                 </small>
            </h3>
            </div>
            <img style="width: 75%" src="/storage/cover_images/{{$post->cover_image}}">
            <div>
            </div>
        </div>
        </div>
    @endforeach
   <?php // pagination? {{$posts->links()}} ?>

    @else
        <p>No Posts Yet</p>
    @endif
@endsection