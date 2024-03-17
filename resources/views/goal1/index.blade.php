@extends('layouts.app')

@section('title') Index @endsection

@section('content')
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" >
            Data
        </a>
    </nav>
    <div class="text-center">
        <a href="{{route('goal1.create')}}" class="btn btn-success">Add Row</a>
    </div>


    <!-- This is table for no poverty data -->
    <table class="table mt-4">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Year</th>
            <th scope="col"> Group</th>
            <th scope="col">Created At</th>
            <th scope="col">Actions</th>
        </tr>
        </thead>
        <tbody>
        @foreach($posts as $post)
{{--            @dd($posts, $post)--}}
            <tr>
                <td>{{$post->id}}</td>
                <td>{{$post->year}}</td>
                <td>{{$post->group}}</td>
                <td>{{$post->created_at->format('Y-m-d')}}</td>
                <td>
{{--                    /posts/{{$post['id']}}--}}
                    <a href="{{route('goal1.show', $post->id)}}" class="btn btn-info">View</a>
                    <a href="{{route('goal1.edit', $post->id)}}" class="btn btn-primary">Edit</a>

                    <form style="display: inline;" method="POST" action="{{route('goal1.destroy', $post->id)}}">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach

    

        </tbody>
    </table>
    <div class="text-center">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <a class="navbar-brand" >
                Meta Data
            </a>
        </nav>
    </div>
    

    <table class="table mt-4">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Indicator</th>
            <th scope="col"> Target</th>
            <th scope="col"> Goal</th>
            <th scope="col"> Contact Persons</th>
            <th scope="col">Created At</th>
            <th scope="col">Actions</th>
        </tr>
        </thead>
        <tbody>
        @foreach($posts_meta as $post_meta)
    {{--       @dd($posts_meta, $post_meta)    --}}

            <!--     'indicator','target','gaol','contact_persons'
            -->
            <tr>
                <td>{{$post_meta->id}}</td>
                <td>{{$post_meta->indicator}}</td>
                <td>{{$post_meta->target}}</td>
                <td>{{$post_meta->goal}}</td>
                <td>{{$post_meta->contact_persons}}</td>
                <td>{{$post_meta->created_at->format('Y-m-d')}}</td>
                <td>
{{--                    /posts/{{$post['id']}}--}}
                    <a href="{{route('goal1.show_meta', $post_meta->id)}}" class="btn btn-info">View</a>
                    <a href="{{route('goal1.edit_meta', $post_meta->id)}}" class="btn btn-primary">Edit</a>

                    
                </td>
            </tr>
        @endforeach

    

        </tbody>
    </table>

@endsection





