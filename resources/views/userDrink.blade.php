@foreach ($result as $r)
<?php 
if($r->type == "Drink"){
    $drink = "drink";
}else {
    $drink = "";
}

?>
   <div class="menu" id="{{$r->price}}" >
   <img src="{{url('image/'. $r->image)}}" class="{{$drink}}">
   <p>{{$r->name}}</p>
   <p id="harga"><b>{{$r->price}}</b></p>
        <a href="#" class="tambah" id="{{str_replace(" ",'',$r->name)}}"><i class="fas fa-plus-circle" ></i></a>
    </div>   
@endforeach