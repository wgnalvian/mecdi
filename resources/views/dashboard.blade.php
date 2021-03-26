<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{url('css/main.css')}}">
    <title>@yield('title')</title>
</head>

<body>
    <div class="container">
        <nav>
            <h1>Main Menu </h1>
        </nav>
        <main>
            <div class="container-menu">
                <div class="menu">

                    <img src="{{url('image/add.svg')}}" alt="" srcset="">
                    <a href="{{url('/food')}}"><button>Add Food</button> </a>
                </div>
                <div class="menu">
                    <img src="{{url('image/cashier.svg')}}" alt="" srcset="">
                    <a href="{{url('/user/order')}}"><button>Cahsier</button> </a>
                </div>
                <div class="menu">
                    <img src="{{url('image/cook.svg')}}" alt="" srcset="">
                    <a href="{{url('/user/chasier')}}"><button>Cook</button> </a>
                </div>
                <div class="menu">
                    <img src="{{url('image/sell.svg')}}" alt="" srcset="">
                    <a href="{{url('/user')}}"><button>Selling</button> </a>
                </div>
            </div>
        </main>
    </div>
</body>

</html>


    