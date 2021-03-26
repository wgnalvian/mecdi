@foreach ($post as $r)
   <div class="menu" id="{{$r['price']}}">
    <img src="{{url('image/'. $r['image'])}}" >
   <p>{{$r['name']}}</p>
   <p id="harga"><b>{{$r->price}}</b></p>
   <a   class="tambah" id="{{str_replace(" ",'',$r['name'])}}"><i class="fas fa-plus-circle "></i></a>
        
    </div>   
@endforeach