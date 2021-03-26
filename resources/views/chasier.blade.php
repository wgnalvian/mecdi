<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <link rel="stylesheet" href="{{url('css/chasier.css')}}">
    <title>Hello, world!</title>
</head>

<body>
    <div class="container">
        <nav>
            <h1>Chasier</h1>
            <a href="{{url('/')}}"><button>kembali</button></a>
        </nav>
        <div class="main-table">
            <div class="table">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Nama</th>
                            <th scope="col">No Table</th>
                            <th scope="col">Order</th>
                            <th scope="col">Total</th>
                            <th scope="col">Status</th>
                            <th scope="col"></th>
                            <th scope="col"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($result as $item)
                        <tr>
                            <th scope="row">1</th>
                            <td>{{$item->name}}</td>
                            <td>{{$item->no_table}}</td>
                            <?php   
      
              $order = unserialize($item->order);
        
              
              ?>
                            <td>
                                @foreach ($order as $key)
                                <?php $key = explode(',',$key); ?>
                                <p>{{$key[0]}}({{$key[1]}}) cost : {{$key[2]}} </p>

                                @endforeach
                            </td>
                            <td>{{$item->cost}}</td>
                            <td><p>{{$item->status}}</p></td>
                            @if ($item->status == 'belum bayar')
                                
                            <td><a href="/user/chasier/{{$item->id}}" style="background-color: green; padding:2px 4px;color:white">Pembayaran</a></td>
                            @endif
                            <td><a href="/user/chasier/destroy/{{$item->id}}" style="background-color: red; padding:2px 4px;color:white">Hapus</a></td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous">
    </script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.6.0/dist/umd/popper.min.js" integrity="sha384-KsvD1yqQ1/1+IA7gi3P0tyJcT3vR+NdBTt13hSJ2lnve8agRGXTTyNaBYmCR/Nwi" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.min.js" integrity="sha384-nsg8ua9HAw1y0W1btsyWgBklPnCUAFLuTMS2G72MMONqmOymq585AcH49TLBQObG" crossorigin="anonymous"></script>
    -->
</body>

</html>