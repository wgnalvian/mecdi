<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <!doctype html>
    <html lang="en">

    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- Bootstrap CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet"
            integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
            <script src="https://kit.fontawesome.com/88bbde95ae.js" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="{{url('css/paid.css')}}">
        <title>Hello, world!</title>
    </head>

    <body>
        <div class="container-fluid">
            <nav>
                <h1>Chasier</h1>
                <a href=""><button>kembali</button></a>
            </nav>
            <div class="main-section">
                <div class="main-order">
                    <h2>{{$order->name}}</h2>

                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Order</th>
                                <th scope="col">Jumlah</th>
                                <th scope="col">Harga</th>
                            </tr>
                        </thead>
                        <tbody>

                            <?php $item = unserialize($order->order); ?>
                            @foreach ($item as $key)
                            <tr>
                                <?php $itemKey = explode(',', $key) ?>
                                <th scope="row">3</th>
                                <td>{{$itemKey [0]}}</td>
                                <td>{{$itemKey [1]}}</td>
                                <td>{{$itemKey [2]}}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="main-input">
                    <div class="title-input">
                        <h3>Pembayaran</h3>
                    </div>
                    <form action="/user/chasier/store/{{$order->id}}" method="POST">


                        <label for="paid"><i class="fas fa-dollar-sign"></i></label>
                        <input type="number" id="paid" placeholder="Masukan Pembayaran" name="paid" pattern="[0-9]">
                        <input type="hidden" name="changeMoney" id="changeMoney">

                        <div class="show-cost-container">
                            <div class="show-cost-title">
                                <h4>{{$order->total}} </h4>
                                <h3>Total</h3>
                                <h3>Pembayaran</h3>
                                <h3>Kembalian</h3>
                            </div>
                            <div class="show-cost-main">
                                <h2 class="dataCost">{{$order->cost}}</h2>
                                    <h2 class="dataInput">0</h2>
                                    <h2 class="changeMoney">0</h2>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary" id="btn-submit">Bayar</button>
                    </form>
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
        <script>
            let input = document.querySelector('input');
            let inputValue = '';
            let dataCost = document.querySelector('.dataCost');
            dataCost = dataCost.textContent;
            dataCost = dataCost.split('$');
            dataCost = dataCost[1];
            dataCost = parseInt(dataCost);
            let changeMoney;
            // dataCost = string.split(dataCost.textContent);
            // console.log(dataCost);


            input.addEventListener('keyup', function () {
                inputValue = input.value;
                if (inputValue) {

                    document.querySelector('.dataInput').textContent = '$'+inputValue;
                    inputValue = parseInt(inputValue);

                    changeMoney = inputValue - dataCost;
                    changeMoney = '$' + changeMoney;
                    document.querySelector('.changeMoney').textContent = changeMoney;
                    document.querySelector('#changeMoney').setAttribute('value', changeMoney)

                } else {
                    document.querySelector('.changeMoney').textContent = '0';
                    document.querySelector('#changeMoney').setAttribute('value', '0');
                }


            })
        </script>
    </body>

    </html>
</body>

</html>