@extends('layout')

@section('content')
<div class="container">
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
          @if ($errors->any())
          <div class="alert alert-danger">
              <ul>
                  @foreach ($errors->all() as $error)
                      <li>{{ $error }}</li>
                  @endforeach
              </ul>
          </div>
          @endif

            <form method="post" action="/posts/{{ $post->id }}">
                @csrf
                @method('PUT')
                <div class="form-group">
                  <label for="name">Name</label>
                  <input value="{{ $post->name }}" type="text" class="form-control" name="name" placeholder="Enter name" required>
                </div>
                <div class="form-group">
                    <label for="description">Description</label>
                        <textarea  class="form-control" name="description" rows="3">{{ $post->description }}</textarea>
                  </div>
                   <div class="form-group">
                   <select class="form-control" name="category_id" id="">
                      <option value="">Select Category</option>
                      @foreach ($category as $data)
                           <option value="{{ $data->id }}" {{ $data->id==$post->category_id ? 'selected' : '' }}>{{ $data->name }}</option>
                      @endforeach
                    </select>
                   </div>
                <button type="submit" class="btn btn-primary">Submit</button>
                <a href="/posts" class="btn btn-success">Back</a>
              </form>
        </div>
    </div>
</div>
    
@endsection