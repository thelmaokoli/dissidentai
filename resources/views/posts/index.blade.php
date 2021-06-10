@extends('layouts.app')

@section('content')
    <h1 class="page-topic hidden">Stories</h1>
    <div class="flexbox">
    @if(count($posts) > 0)
    @foreach ($posts as $post)
        <div class="story">
            <div>
             <h3>
                <a href="/posts/{{$post->id}}">{{$post->title}}</a>
                <br><small class="post-date">Dropped on {{$post->created_at}} by {{$post->user->name}}
                 </small>
            </h3>
            </div>
            <img style="width: 75%" src="/storage/images/cover_images/{{$post->cover_image}}">
            <div class="socials">
                <a class="twitter"
                    href="https://twitter.com/intent/tweet?text=dissidentai.herokuapp.com/posts/{{$post->id}}"><i class="fab fa-twitter"></i></a>
            <script src="https://platform.linkedin.com/in.js" type="text/javascript">lang: en_US</script>
            <script type="IN/Share" data-url="dissidentai.com/posts/{{$post->id}}"></script>
            </div>
        </div>
    @endforeach
   <?php // pagination? {{$posts->links()}} ?>

    @else
        <p>No Posts Yet</p>
    @endif
    </div>
@endsection
