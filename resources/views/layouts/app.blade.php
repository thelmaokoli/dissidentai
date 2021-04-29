<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="{{asset('css/app.css')}}" />
        <title>{{config('app.name', 'DissidentAI')}}</title>
    </head>
   <body>
       @include('inc.navbar')
       <div class="container">
           @include('inc.messages')
@yield('content')
   </div>
   <script src="//cdn.ckeditor.com/4.16.0/standard/ckeditor.js"></script>
   <script>
    CKEDITOR.replace( 'article-ckeditor');
    </script>
</body>
</html>
