@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="hidden">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                </div>
            <a href="/posts/create">Create An entry</a>
        </div>
       <div class="flexbox">
        @if(count($posts) > 0)
        @foreach ($posts as $post)
        <div class="story">
             <td>{{$post->title}}</td>
             <br>
        <td><a href="/posts/{{$post->id}}/edit">Edit</a></td>
        <td>
          {!!Form::open(['action' => ['App\Http\Controllers\PostsController@destroy', $post->id], 'method' => 'POST'])!!}
    <?php // just like with update - the fake POST becomes a delete (see route list for limitations)?>
 {{Form::hidden('_method', 'DELETE')}}
    {{Form::submit('Delete', ['class' => 'delete-btn'])}}
    {!!Form::close()!!}
        </td>
        </div>
        @endforeach
        </table>
        @else
            <p>You have no contributions</p>
        @endif
        </div>
    </div>
</div>
@endsection
