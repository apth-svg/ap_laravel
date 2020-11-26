@extends('layout')

@section('content')
<div class="container">
   
    <div class="card">
        <div class="card-header" style="text-align: center">
        Contact
        </div>
        <div class="card-body">
            {{ $post }}
        </div>
        <div>
            <a href="/posts" class="btn btn-success">Back</a>
        </div>
    </div>
</div>
    
@endsection