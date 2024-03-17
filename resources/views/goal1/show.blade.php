@extends('layouts.app')

@section('title') Show @endsection

@section('content')
    <div class="card mt-4">
        <div class="card-header">
            Row Info
        </div>
        <div class="card-body">
            <h5 class="card-title">ID: {{$post->id}}</h5>
            <p class="card-title">Year: {{$post->year}}</p>
            <p class="card-text">Group: {{$post->group}}</p>
        </div>
@endsection



