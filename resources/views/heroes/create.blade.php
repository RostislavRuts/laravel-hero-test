@extends('layouts.main')

@section('content')
    <h1 class="text-center">Create new Superhero</h1>
    @include('layouts.errors')

    <form action="/heroes" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="nickname">Hero nickname</label>
            <input type="text" id="nickname" name="nickname" class="form-control">
        </div>

        <div class="form-group">
            <label for="realName">Hero real name</label>
            <input type="text" id="realName" name="realName" class="form-control">
        </div>

        <div class="form-group">
            <label for="description">Hero Description</label>
            <textarea id="description" name="description" class="form-control"></textarea>
        </div>

        <div class="form-group">
            <label for="superpowers">Hero superpowers</label>
            <textarea type="text" id="superpowers" name="superpowers" class="form-control"></textarea>
        </div>

        <div class="form-group">
            <label for="phrase">Hero catch phrase</label>
            <input type="text" id="phrase" name="phrase" class="form-control">
        </div>

        <div class="form-group">
            <label for="images">Hero Image</label>
            <input type="file" id="images" name="images" class="form-control">
        </div>
        <button class="btn btn-primary">Save</button>
    </form>
@endsection
