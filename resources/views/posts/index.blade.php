@extends('layouts.app')

@section('content')
    <h1>Posts</h1>
    @if(count($posts) > 0)
    @foreach ($posts as $post)
        <div class="">
            <h3>
                <a href="/posts/{{$post->id}}">{{$post->title}}
                <small>Dropped on {{$post->created_at}}</small>
            </h3>
        </div>
    @endforeach
   <?php // pagination? {{$posts->links()}} ?>

    @else
        <p>No Posts Yet</p>
    @endif
@endsection