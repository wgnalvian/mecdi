
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1" name="viewport" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/88bbde95ae.js" crossorigin="anonymous"></script>
<link rel="stylesheet" href="{{url('style.css')}}">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Fira+Sans&display=swap" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <!-- Bootstrap CSS -->

    <title>Document</title>
</head>

<body>
    @if (session('status'))
   <script>alert('Menu belum dipilih')</script>


@endif
@if (session('wait'))
<script>alert('Mohon tunggu sejenak pesanan akan segera datang')</script>


@endif

    <div class="container-fluid">
        <div class="row">
            
            <div class="sidebar">
                <ul>
                    <i class="fas fa-arrow-circle-left fa-2x" id="back"></i>
                    <li id="all"><a href="#"><button>all</button></a></li>
                    <li id="burger"><i class="fas fa-hamburger fa-2x"></i></li>
                    <li id="pizza"><i class="fas fa-pizza-slice fa-2x"></i></li>
                    <li id="drink"><i class="fas fa-cocktail fa-2x"></i></li>
                    
                </ul>
            </div>
            <div class="content">
                <nav>
                    <i class="fas fa-align-left sileft"></i>
                    <a href="">Mecdi</a>
                    <div class="search">
                        <input type="text" class="search" placeholder="Search menu...">
                        <i class="fas fa-search"></i>
                    </div>
                    <div class="wallet">
                        <i class="fas fa-wallet"></i>                         
                     </div>
                    
                    
                </nav>
                <div class="row_content">
                    <div class="container_menu">
                        <div class="list_menu">
                           
                           
                        </div>
                    </div>


                    
                    <div class="list_item">
                        <div class="times">
                            <i class="fas fa-times fa-2x"></i>
                        </div>
                        <div class="content_item">
                            <h5>Your Order</h5>
                            <div class="item">
                             <form action="/user/print" method="POST">
                                @method('PUT')
                                @csrf
                                @foreach ($result as $r)

                                <div class="pick_item" id="{{str_replace(" ",'',$r->name)}}">
                                    <img src="{{url('image/'. $r->image)}}" alt="">
                                    <div class="item_content">
                                    <p>{{$r->name}}</p>
                                        <div class="count_item">
                                            <i class="fas fa-chevron-left" id="min"></i>
                                            <p id="data">0</p>
                                        <a class="{{$r->price}}"><i class="fas fa-chevron-right" id="plus"></i></a>
                                        </div>
                                    </div>
                                <h3>$0</h3>
                                <h2 hidden>{{$r->price}}</h2>
                                <input type="hidden"  class="val" value="" name="{{str_replace(" ",'',$r->name)."val"}}">
                                <input type="hidden"  class="val_price" value="" name="{{str_replace(" ",'',$r->name)}}">
                                
                                </div>

                               
                                    
                                @endforeach

                            </div>
                            <div class="container_label">
                                <div class="label1">
                                    <p id="jumitem">0 item</p>
                                    <input type="hidden" class="jumitem" value="" name="jumitem">
                                    <p>Subtotal</p>
                                    <p>Delivery Cost</p>
                                    <h4>Total</h4>
                                    <button>Cancel</button>

                                </div>
                                <div class="label2">
                                    <p id="subtotal">$0</p>
                                    <input type="hidden" class="subtotal" value="" name="subtotal">
                                    <p>$0</p>
                                    <h4 id="total">$0</h4>
                                    <input type="hidden" class="total" value="" name="total">
                                    <button type="submit" name="submit" id="submit">Checkout</button>
                                </form>  
                                </div>
                            </div>
                        </div>
                    </div>
                   
                </div>
            </div>
        </div>
    </div>
</body>
<script src="{{url('script.js')}}"></script>
<script src="{{url('style.js')}}"></script>
<script src="{{url('print.js')}}"></script>
</html>