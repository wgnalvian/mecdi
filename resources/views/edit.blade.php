@extends('layout/main')
@section('title', 'Edit')

<?php 
$price = $food->price;

$arr = explode("$", $price);


?>
    
@section('content')
<div class="container">
<form action="/food/update/{{$food->id}}" method="post" enctype="multipart/form-data">
      @csrf
   
        
<input type="hidden" name="photo" value="{{$food->image}}">
        
            <div class="mb-3">
              <label for="name" class="form-label">name</label>
            <input type="text" class="form-control " id="name" name="name" value="{{$food->name}}">
              
            </div>
            
            <div class="mb-3">
              <label for="type" class="form-label">type</label>
            <input type="text" class="form-control " id="type" name="type" value="{{$food->type}}">
            </div>
          
            <div class="mb-3">
                <label for="price" class="form-label">price ($)</label>
            <input type="number" class="form-control " id="price" name="price" value="{{$arr[1]}}">
              </div>
              
         
            <div class="mb-3">
                <label for="image" class="form-label">image</label>               
                <input class="form-control form-control-sm " id="image" type="file" name="image">
               
              </div>
            <button type="submit" class="btn btn-primary">Submit</button>
          

    </form>
</div>
@endsection