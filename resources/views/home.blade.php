@extends('layout')

@section('content')
<div class="container">
    <div>
        <a href="/posts/create" class="btn btn-success">New Post</a>
        <a href="/logout" class="btn btn-primary">Logout</a>
        <p class="float-right">{{ Auth::user()->name }}</p>
       
    </div>
     @if(session('status'))

            <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Success!</strong>   {{ session('status') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
        @endif
    <div class="card">
        <div class="card-header" style="text-align: center">
        Contact
        </div>
       
        <div class="card-body">
            @foreach ($data as $post)
                <h5 class="card-title">{{ $post->name}}</h5>
                <p class="card-text">{{ $post->description }}</p>
                <div class="form-row" style="padding-right: 10px">
                    <a href="/posts/{{ $post->id }}" class="btn btn-primary">View</a>
                    <a href="/posts/{{ $post->id }}/edit" class="btn btn-warning">Edit</a>
                    <form action="/posts/{{ $post->id }}" method="post">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form><hr>
                </div>
               
            @endforeach
        
        </div>
    </div>
</div>
    
@endsection