@if(count($errors) >0)
    @foreach ($errors->all() as $error)
        <div class="error-class">
            {{$error}}
        </div>
    @endforeach
@endif

@if (session('success'))
<div>
    {{session('success')}}
</div>
@endif

@if (session('error'))
<div>
    {{session('error')}}
</div>
    
@endif