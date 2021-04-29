@extends('layouts.app')

@section('content')
   <h1> Dissident AI: {{$title}}<h1>
   <h2>This is the services page</h2>
   @if(count($services) >0)
   <ul>
   @foreach($services as $service)
   <li>{{$service}}</li>
   @endforeach
   </ul>
   @endif
 @endsection