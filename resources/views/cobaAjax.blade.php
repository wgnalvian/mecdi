
<tbody>
@foreach ($result as $r)
<tr>
<td>{{$r->name}}</td>
<td>{{$r->type}}</td>
<td>{{$r->price}}</td>
</tr>
@endforeach
</tbody>

