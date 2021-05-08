@extends('layouts.app')
@section('content')
<div class="story-main">
    <h1>{{$post->title}}</h1>
   
    <img src="/storage/images/cover_images/{{$post->cover_image}}">

        <p>
        {!!$post->body!!}
        </p>

    <hr>
    <small>Dropped on {{$post-> created_at}}</small>
    <hr>
    <div class="post-options">
    <a href="/posts">Go Back</a>
    <div class="socials">
        <a class="twitter"
            href="https://twitter.com/intent/tweet?text=dissidentai.com/posts/{{$post->id}}"><i class="fab fa-twitter"></i></a>
    <script src="https://platform.linkedin.com/in.js" type="text/javascript">lang: en_US</script>
    <script type="IN/Share" data-url="dissidentai.com/posts/{{$post->id}}"></script>
    </div>
    @if(!Auth::guest())
    @if(Auth::user()->id == $post->user_id)
    <a href="/posts/{{$post->id}}/edit">Edit</a>

    {!!Form::open(['action' => ['App\Http\Controllers\PostsController@destroy', $post->id], 'method' => 'POST'])!!}
    <?php // just like with update - the fake POST becomes a delete (see route list for limitations)?>
    {{Form::hidden('_method', 'DELETE')}}
    {{Form::submit('Delete', ['class' => 'delete-btn'])}}
    {!!Form::close()!!}
    @endif 
    @endif 
    </div>
</div>
    @endsection