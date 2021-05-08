@extends('layouts.app')

@section('content')
<div class="flex-half">
   <div class="landing-box">
   <h2> This is Dissident AI <h2>
   <p class="yellow">This is a community blog <br> (open contribution) documenting examples of AI being used for dissedent causes.</p>
   </div>  
   <div class="landing-box">
      <h2>Featured Story</h2>
      <div>
       <h3>
          <a class="feature-link" href="/posts/8">{{$post->title}}</a>
          <br><small class="post-date">Dropped on {{$post->created_at}} by {{$post->user->name}}
           </small>
      </h3>
      </div>
      <img style="width: 75%" src="/storage/images/cover_images/{{$post->cover_image}}">
  </div>
</div>
<div class="main-story-btn">
<a href='/posts' class="yellow-btn main-btn"> See All Stories</a> 
</div>  
@endsection