@extends('layouts.app')

@section('title') Show @endsection

@section('content')
    <div class="card mt-4">
        <div class="card-header">
            Meta Data Info
        </div>

        <!--     'indicator','target','gaol','contact_persons'
            -->
        <div class="card-body">
            <h5 class="card-title">Indicator:</h5> {{$post_meta->indicator}}
            <h5 class="card-title">Target:</h5> {{$post_meta->target}}
            <h5 class="card-text">Goal:</h5> {{$post_meta->goal}}
            <h5 class="card-text">Contact Person:</h5> {{$post_meta->contact_persons}}

        </div>
@endsection