@extends('layouts.app')

@section('title') Edit @endsection

@section('content')

    <form method="POST" action="{{route('goal1.update', $post->id)}}">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label class="form-label">Year</label>
            <input name="year" type="number" value="{{$post->year}}" class="form-control" >
        </div>

        <div class="mb-3">
            <label class="form-label">Group</label>
            <input name="group" type="number" value="{{$post->group}}" class="form-control" >
        </div>

        

        <button class="btn btn-primary">Update</button>
    </form>


@endsection
