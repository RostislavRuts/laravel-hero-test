@extends('layouts.main')

@section('content')
    <h1 class="text-center">Heroes</h1>

    {{$heroes->links()}}

    <table class="table table-borderless">
        <tbody>
        @foreach($heroes as $hero)
        <tr class="text-center">
            <td colspan="3">
                <p style="font-size: 32px; font-weight: bold;">{{$hero->nickname}}</p>
                <img src="{{$hero->images}}" alt="#" style="width: 200px;">
            </td>
        </tr>
        <tr>
            <td class="text-right"><a href="/heroes/{{$hero->id}}" class="btn btn-primary">Show profile</a></td>
            <td class="text-center"><a href="/heroes/{{$hero->id}}/edit" class="btn btn-warning">Edit Hero</a></td>
            <td>
                <form action="/heroes/{{$hero->id}}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger">Delete Hero</button>
                </form>
            </td>
        </tr>
        @endforeach
        </tbody>
    </table>

    {{$heroes->links()}}


@endsection
