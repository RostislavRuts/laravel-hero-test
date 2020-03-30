@extends('layouts.main')

@section('content')
    <div class="container row justify-content-center">
        <div class="col-md">
            <img src="{{$hero->images}}" alt="{{$hero->name}}" style="width: 300px;">
        </div>
        <div class="col-md text-left">
            <h2>{{$hero->nickname}}</h2>
            <p><b>Real name:</b> {{$hero->name}}</p>
            <p><b>Description:</b> {{$hero->origin_description}}</p>
            <p><b>Superpowers:</b> {{$hero->superpowers}}</p>
            <p><b>Hero catch phrase:</b> {{$hero->catch_phrase}}</p>
        </div>

    </div>

@endsection
