@extends('layout/main')

@section('title', 'Create')
    
@section('content')
<div class="container">
    <form action="/food/store" method="post" enctype="multipart/form-data">
        @csrf

        
            <div class="mb-3">
              <label for="name" class="form-label">name</label>
              <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name">
              
            </div>
            @error('name')
                 <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            <div class="mb-3">
              <label for="type" class="form-label">type</label>
              <input type="text" class="form-control @error('type') is-invalid @enderror" id="type" name="type">
            </div>
            @error('type')
                 <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            <div class="mb-3">
                <label for="price" class="form-label">price ($)</label>
                <input type="number" class="form-control @error('price') is-invalid @enderror" id="price" name="price">
              </div>
              @error('price')
                 <div class="alert alert-danger">{{ $message }}</div>
                @enderror
         
            <div class="mb-3">
                <label for="image" class="form-label">image</label>               
                <input class="form-control form-control-sm @error('image') is-invalid @enderror" id="image" type="file" name="image">
                @error('image')
                 <div class="alert alert-danger">{{ $message }}</div>
                @enderror
              </div>
            <button type="submit" class="btn btn-primary">Submit</button>
          

    </form>
</div>
    
@endsection