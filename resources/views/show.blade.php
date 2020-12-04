@extends('layout')

@section('content')
<div class="container">
   
    <div class="card">
        <div class="card-header" style="text-align: center">
        Contact
        </div>
        <div class="card-body">
            <div>
                <h5 class="card-title">{{ $post->name }}</h5>
                <p class="card-text">{{ $post->description }}</p>
                 <p class="card-text">{{ 'Categories'.$post->categories->name }}</p>
            </div>
        </div>
        <div>
            <a href="/posts" class="btn btn-success">Back</a>
        </div>
    </div>
</div>
    
@endsection