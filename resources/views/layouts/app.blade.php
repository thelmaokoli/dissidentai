<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('//dissidentai.herokuapp.com/js/app.js') }}" defer></script>
<script src="{{ asset('//dissidentai.herokuapp.com/ckeditor/ckeditor.js') }}"></script>
<script> CKEDITOR.replace( 'summary-ckeditor' );</script>
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('//dissidentai.herokuapp.com/css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
</head>
<div>
<body>
  
        
    @include('inc.navbar')
        <main class="py-4">
            @include('inc.messages')
            @yield('content')
        </main>
        @include('inc.footer')
</body>
</div>

</html>
