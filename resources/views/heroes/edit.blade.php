@extends('layouts.main')

@section('content')
    <h1 class="text-center">Edit Superhero</h1>
    @include('layouts.errors')

    <form action="/heroes/{{$hero->id}}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="nickname">Hero nickname</label>
            <input type="text" id="nickname" name="nickname" class="form-control" value="{{$hero->nickname}}">
        </div>

        <div class="form-group">
            <label for="realName">Hero real name</label>
            <input type="text" id="realName" name="realName" class="form-control" value="{{$hero->name}}">
        </div>

        <div class="form-group">
            <label for="description">Hero Description</label>
            <textarea id="description" name="description" class="form-control">{{$hero->origin_description}}</textarea>
        </div>

        <div class="form-group">
            <label for="superpowers">Hero superpowers</label>
            <textarea type="text" id="superpowers" name="superpowers" class="form-control">{{$hero->superpowers}}</textarea>
        </div>

        <div class="form-group">
            <label for="phrase">Hero catch phrase</label>
            <input type="text" id="phrase" name="phrase" class="form-control" value="{{$hero->catch_phrase}}">
        </div>

        <div class="form-group row">
            <div class="col-md-4">
                <label for="newimage">New Hero Avatar</label>
                <select name="newimage" id="newimage" class="form-control">
                    @foreach($img as $key => $value)
                        @if(strlen($value) > 2)
                            <option value="{{$value}}" class="upimage" {{$hero->images == '/images/' . $value ? 'selected' : ''}}>
                                {{$value}}
                            </option>
                        @endif
                    @endforeach
                </select>
            </div>

            <div class="col-md-4">
                <p>Old image: </p>
                <img src="{{$hero->images}}" alt="" style="width: 200px;">
            </div>
            <div class="col-md-4">
                <p>New image: </p>
                <img alt="" id="heroNewImg" style="width: 200px;">
            </div>

        </div>
        <button class="btn btn-primary">Edit Hero</button>
    </form>

@endsection

