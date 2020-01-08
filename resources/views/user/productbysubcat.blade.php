<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
    <title>Service</title>
    <link rel="stylesheet" type="text/css" href="{{ asset('public/frontend/css/bootstrap.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('public/frontend/css/bootstrap.min.css') }}">
    <!-- <link rel="stylesheet" type="text/css" href="css/category.css"> -->
    <link rel="stylesheet" type="text/css" href="{{ asset('public/frontend/css/service.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('public/frontend/fonts/css/all.css') }}">
    <style>
        .responsive {
            width: 100%;
            height: auto;

        }

        body {
            font-family: Arial, Helvetica, sans-serif;
        }

        .navbar {
            overflow: hidden;
            background-color: #191D32;
        }

        .navbar a {
            float: left;
            font-size: 16px;
            color: white;
            text-align: center;
            padding: 14px 16px;
            text-decoration: none;
        }

        .dropdown {
            float: right;
            overflow: hidden;
        }

        .dropdown .dropbtn {
            font-size: 16px;
            border: none;
            outline: none;
            color: white;
            padding: 14px 16px;
            background-color: inherit;
            font-family: inherit;
            margin: 0;
        }

        .navbar a:hover, .dropdown:hover .dropbtn {
            background-color: #191D32;
        }

        .dropdown-content {
            display: none;
            position: absolute;
            background-color: #f9f9f9;
            min-width: 160px;
            box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
            z-index: 1;
        }

        .dropdown-content a {
            float: none;
            color: black;
            padding: 12px 16px;
            text-decoration: none;
            display: block;
            text-align: left;
        }

        .dropdown-content a:hover {
            background-color: #ddd;
        }

        .dropdown:hover .dropdown-content {
            display: block;
        }






        div.gallery {
            border: 1px solid #ccc;
        }

        div.gallery:hover {
            border: 1px solid #777;
        }

        div.gallery img {
            width: 100%;
            height: auto;
        }

        div.desc {
            padding: 15px;
            text-align: center;
        }

        * {
            box-sizing: border-box;
        }

        .responsive1 {
            padding: 0 6px;
            float: left;
            width: 24.99999%;
        }

        @media only screen and (max-width: 700px) {
            .responsive {
                width: 49.99999%;
                margin: 6px 0;
            }
        }

        @media only screen and (max-width: 500px) {
            .responsive {
                width: 100%;
            }
        }

        .clearfix:after {
            content: "";
            display: table;
            clear: both;
        }

        <--navvvv-->
         .navbar {
             overflow: hidden;
             background-color: #333;
         }

        .navbar a {
            float: left;
            font-size: 16px;
            color: white;
            text-align: center;
            padding: 14px 16px;
            text-decoration: none;
        }

        .dropdown {
            float: left;
            overflow: hidden;
        }

        .dropdown .dropbtn {
            font-size: 16px;
            border: none;
            outline: none;
            color: white;
            padding: 14px 16px;
            background-color: inherit;
            font-family: inherit;
            margin: 0;
        }

        .navbar a:hover, .dropdown:hover .dropbtn {
            background-color: red;
        }

        .dropdown-content {
            display: none;
            position: absolute;
            background-color: #f9f9f9;
            min-width: 160px;
            box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
            z-index: 1;
        }

        .dropdown-content a {
            float: none;
            color: black;
            padding: 12px 16px;
            text-decoration: none;
            display: block;
            text-align: left;
        }

        .dropdown-content a:hover {
            background-color: #ddd;
        }

        .dropdown:hover .dropdown-content {
            display: block;
        }





    </style>
</head>

<body>

<div id="menubar">
    <nav>
        <div class="logo col-lg-2 col-md-2 col-sm-4 col-xs-4">
            <!-- <img src="" alt="WEBSITE"> -->
            <a href="{{ route('welcome') }}"><h3>WEBSITE</h3></a>
        </div>
        <div class="input">
            <input type="text" name="searchbar" class="col-lg-10 col-md-10 col-sm-8 col-xs-8">
            <i class="fa fa-search" id="filtersubmit"></i>
        </div>
        <div class="toggle">
            <i class="fa fa-bars menu" aria-hidden="true"></i>
        </div>
        <ul>
            <li><a href="{{ route('welcome') }}"><i class="fas fa-home"></i>Home</a></li>
            @if (Auth::check() && Auth::user()->role->id == 1)
                <li><a href="{{ route('admin.dashboard') }}"><i class="fas fa-user-circle"></i>Profile</a></li>
            @elseif (Auth::check() && Auth::user()->role->id == 2)
                <li><a href="{{ route('shop.dashboard') }}"><i class="fas fa-user-circle"></i>Profile</a></li>
            @elseif (Auth::check() && Auth::user()->role->id == 3)
                <li><a href="{{ route('user.dashboard') }}"><i class="fas fa-user-circle"></i>Profile</a></li>
            @endif
            <li><a href="{{ route('user.cartitem') }}"><i class="fas fa-cart-plus"></i>Cart</a></li>
            <br>
            <li><a href="#"><i class="fas fa-box"></i> Searvice & Coltancy</a></li>
            <li><a href="#"><i class="fas fa-shopping-bag"></i> Shopping</a></li>
            <li><a href="#"><i class="fas fa-hamburger"></i> Food</a></li>
            <li><a href="#"><i class="fas fa-building"></i> Shopping</a></li>
            @if(Auth::check())
                <li><a href="{{ route('logout') }}" onclick="event.preventDefault();
                document.getElementById('logout-form').submit();">Logout</a>
                </li>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            @else
                <li><a href="{{ route('login') }}"><i class="fas fa-user"></i>Login</a></li>
                <li><a href="{{ route('register') }}"><i class="fas fa-user-lock"></i>Register</a></li>
            @endif

        </ul>
    </nav>
</div>

<section class="reviewgoods container">
    <div class="container col-lg-12 col-md-12 col-sm-12 col-xs-12">


        @if($products->count())
            @foreach($products as $product)
                <div class="container new col-lg-3 col-md-3 col-sm-4 col-xs-8">
                    <div class="container imgs col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <a href="{{ route('shopbyid',$product->user_id) }}"> <img src="{{ url('public/storage/product/'.$product->image_name) }}" height="150px" width="100px" alt="" /></a>
                    </div>
                    <div class="container des col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <a href="{{ route('shopbyid',$product->user_id) }}"><h4>{{ $product->product_name }}</h4></a>
                        <p>Architecture news</p>
                    </div>
                </div>
            @endforeach

        @else

            <p>Product not available</p>

        @endif

    </div>
</section>



<div class="container">
    <div class="bottom col-md-12 col-lg-12 col-sm-12 col-xs-12">
        <div class="col-md-4 col-lg-3 col-sm-6 col-xs-12">
            <h3>Get to Know Us</h3>
            <p>Careers</p>
            <p>Blog</p>
            <p>About Amazon</p>
            <p>Investor Relation</p>
            <p>Amazon Devices</p>
        </div>
        <div class="col-md-4 col-lg-3 col-sm-6 col-xs-12">
            <h3>Make Moeny With Us</h3>
            <p>Sell on Amazon</p>
            <p>Sell Your Services on Amazon</p>
            <p>Sell on Amazon Business</p>
            <p>Sell Your Apps on Amazon</p>
            <p>Become an Affiliate</p>
            <p>Advise Your Products</p>
            <p>Self Publish With Us</p>
            <p>> See all</p>
        </div>
        <div class="col-md-4 col-lg-3 col-sm-6 col-xs-12">
            <h3>Amazon Payment Products</h3>
            <p>Amazon Business Cards</p>
            <p>Shop with Points</p>
            <p>Relod Your Balance</p>
            <p>Amazon Currency Converter</p>
        </div>
        <div class="col-md-4 col-lg-3 col-sm-6 col-xs-12">
            <h3>Let Us Help You</h3>
            <p>Your Account</p>
            <p>Your Orders</p>
            <p>Shipping Rates and Policies</p>
            <p>Return and Replacements</p>
            <p>Manage Your Content and Devices</p>
            <p>Amazon Assitant</p>
            <p>Help</p>
        </div>
    </div>
</div>

<script type="text/javascript" src="{{ asset('frontend/js/bootstrap.js') }}"></script>
<script type="text/javascript" src="{{ asset('frontend/js/bootstrap.min.js') }}"></script>
<script src="https://code.jquery.com/jquery-3.4.1.js"></script>
<script type="text/javascript">
    $(document).ready(function(){
        $('.menu').click(function(){
            $('ul').toggleClass('active');
        })
    })
</script>


</body>
</html>
