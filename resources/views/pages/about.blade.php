@extends('layouts.app')

   @section('content')
   <div class="flex-half">
   <div class="landing-box about">
   <h1> Dissident AI: {{$title}} <?php // you could also do echo $title ?> <h1>
   <hr>
      <p>This is a community (open contribution) blog documenting examples of AI being used for dissedent causes. 
      <br>Narratives shared can be historical, current, or speculative.</p>
      <hr class="fade">
      <div class=topic-list>
      @if(count($topics) >0)
      <h3>{{$subtitle}}</h3>
      <ul class="">
      @foreach($topics as $topic)
      <li>{{$topic}}</li>
      @endforeach
      </ul>
      @endif
   </div>
</div>
<div class="landing-box about">
   <h3><i class="purple far fa-calendar-alt"></i> Coming Soon ::: <span class="yellow">Comments & Social</span></h3>
      <hr>
      <h2>About the Creator:</h2>
      <p class="purple">Thelma Jemma has always been interested in tech, sociology, an futurology. She hopes this community will grow and draw attention to dissident narratives in artificial intelligence.</p>
       </div>
</div>

  


    @endsection