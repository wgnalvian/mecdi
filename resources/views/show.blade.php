@extends('layout.main')

@section('title', 'Detail')

@section('content')

<div class="container">
    <div class="card" style="width: 18rem;">
    <img src="{{url("image/$food->image")}}" class="card-img-top" alt="...">
        <div class="card-body">
        <h5 class="card-title">{{$food->name}}</h5>
        <p class="card-text"><b>type :</b>{{$food->type}}</p>
        <p class="card-text"><b>price :</b>{{$food->price}}</p>
        <form action="" method="post" class="d-inline">
            @method('delete')
            @csrf
            <button type="submit" name="submit" class="btn btn-danger">Delete</button>
        </form>
        <form action="" method="post" class="d-inline">
            @method('put')
            @csrf
            <button type="submit" name="submit" class="btn btn-success">Edit</button>
        </form>
          
        </div>
      </div>
</div>
    
@endsection
