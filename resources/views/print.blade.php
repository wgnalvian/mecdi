<?php 








?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    @foreach ($data[0]['result'] as $item)
        <ul>
        <li>{{$item->name}} : <?= $data[1]->{str_replace(" ",'',$item->name)."val"}; ?> price <?= $data[1]->{str_replace(" ",'',$item->name)}; ?> </li>        
        </ul>
    @endforeach
    <p>Total item : {{$data[1]->jumitem}}</p>
    <p>Subtotal : {{$data[1]->subtotal}}</p>
    <p>Total : {{$data[1]->total}}</p>
</body> 
</html>