@extends('layouts.app')

@section('title') Edit @endsection

@section('content')

    @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

    <form method="POST" action="{{ route('goal1.update_meta', $post_meta->id) }}">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label class="form-label">Indicator</label>
            <input name="indicator" type="text" value="{{ $post_meta->indicator }}" class="form-control">
        </div>

        <div class="mb-3">
            <label class="form-label">Target</label>
            <input name="target" type="text" value="{{ $post_meta->target }}" class="form-control">
        </div>

        <div class="mb-3">
            <label class="form-label">Goal</label>
            <input name="goal" type="text" value="{{ $post_meta->goal }}" class="form-control">
        </div>

        <div class="mb-3">
            <label class="form-label">Contact Persons</label>
            <input name="contact_persons" type="text" value="{{ $post_meta->contact_persons }}" class="form-control">
        </div>

        <button class="btn btn-primary">Update</button>
    </form>


@endsection