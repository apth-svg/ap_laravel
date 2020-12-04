@extends('layout')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header" style="text-align: center">
        Contact
        </div>
        <div class="card-body">
          
            @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif

            <form method="post" action="/posts">
                @csrf
                <div class="form-group">
                  <label for="name">Name</label>
                  <input type="text" class="form-control" name="name" placeholder="Enter name">
                </div>
                <div class="form-group">
                    <label for="description">Description</label>
                    <textarea  class="form-control" name="description" rows="3"></textarea>
                  </div>
                
                    <select class="form-control" name="category_id" id="">
                      <option value="">Select Category</option>
                      @foreach ($category as $data)
                           <option value="{{ $data->id }}">{{ $data->name }}</option>
                      @endforeach
                   
                    </select>
                 
                <button type="submit" class="btn btn-primary">Submit</button>
                <a href="/posts" class="btn btn-success">Back</a>
              </form>
        </div>
    </div>
</div>
    
@endsection