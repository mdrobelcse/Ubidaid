<!DOCTYPE html>
<html lang="en">
<head>

  <title>@yield('title','Ubidaid')</title>
  <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('public/frontend/images/icon/favicon.png') }}">

  <meta name='viewport' content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0'/>
  <meta charset="utf-8">
  <!-- <meta name="viewport" content="width=device-width, initial-scale=1"> -->
  <link rel="stylesheet" href="{{asset('public/frontend/css/bootstrap.min.css')}}">
  <script src="{{asset('public/frontend/js/jquery.min.js')}}"></script>
  <script src="{{asset('public/frontend/js/bootstrap.min.js')}}"></script>
  <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
   <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.css" rel="stylesheet">
   <!--metarials icon cdn-->
   <link href="https://fonts.googleapis.com/icon?family=Material+Icons"
      rel="stylesheet">

  <link rel="stylesheet" type="text/css" href="{{asset('public/frontend/css/style.css')}}">

  <style type="text/css">
    

    .activelink{

            background: #58d9de;
            padding: 7px 15px;
    }

  </style>

  <!--css link for tostr notification--->
 <!--  <link rel="stylesheet" href="http://cdn.bootcss.com/toastr.js/latest/css/toastr.min.css"> -->
  <link rel="stylesheet" type="text/css" href="{{asset('public/frontend/css/tostr.css')}}">
  @stack('css')

</head>
<body>



  <!--==============SUCCESS AND ERROR MESSAGE=================-->

<!--info message-->

@if(session('infoMsg'))
   <div id="toast-container" class="toast-top-right"><div class="toast toast-info" aria-live="polite" style=""><div class="toast-progress"></div><button type="button" class="toast-close-button" role="button" onclick="this.parentElement.style.display='none'">×</button><div class="toast-title">Info</div><div class="toast-message">{{ session('infoMsg') }}</div></div></div>
@endif

<!--error message-->

@if(session('errorMsg'))
   <div id="toast-container" class="toast-top-right"><div class="toast toast-error" aria-live="polite" style=""><div class="toast-progress"></div><button type="button" class="toast-close-button" role="button" onclick="this.parentElement.style.display='none'">×</button><div class="toast-title">Error</div><div class="toast-message">{{ session('errorMsg') }}</div></div></div> 
@endif

<!--success message-->
@if(session('successMsg'))
    <div id="toast-container" class="toast-top-right"><div class="toast toast-success" aria-live="polite" style=""><div class="toast-progress"></div><button type="button" class="toast-close-button" role="button" onclick="this.parentElement.style.display='none'">×</button><div class="toast-title">Success</div><div class="toast-message">{{ session('successMsg') }}</div></div></div>
@endif

<!--======================ERROR MESSAGE======================-->

    @if ($errors->any())
            
                <div id="toast-container" class="toast-top-right"><div class="toast toast-error" aria-live="polite" style=""><div class="toast-progress"></div><button type="button" class="toast-close-button" role="button" onclick="this.parentElement.style.display='none'">×</button>

              @foreach ($errors->all() as $error)
                    <div class="toast-title">Error</div><div class="toast-message">{{ $error }}</div>
               @endforeach

                </div>
            </div> 
          
    @endif

<!--===============//==================-->


  <!--===============//=================-->  


 
 <!--==================HEADER SECTION START==========================-->

     <div class="header-section">
           <div class="container-fluid">
                <div class="row">
                     <div class="col-md-12 col-sm-12 col-xs-12">
                          <div class="header-top">
                                <div class="col-md-2 col-sm-12 col-xs-12">
                                    <div class="logo">
                                          <a href="{{ route('welcome') }}">
                                              <img src="{{ asset('public/frontend/images/logo/logo.png') }}" alt="logo">
                                          </a> 
                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-12 col-xs-12">
                                     <div class="row margin-left">
                                         <div class="hidden-md hidden-lg hidden-sm col-sm-2 col-xs-2">
                                              <div class="sidebarbtn-2">
                                                   <span></span>
                                              </div>
                                         </div>
                                         <div class="col-md-12 col-lg-12 col-sm-12 col-xs-7 padding-left">
                                              <div class="search-form">
                                                  <form action="{{ route('searchby.product') }}" method="post">
                                                     @csrf
                                                      <input type="text" name="product" id="product" placeholder="search.....">
                                                       <button type="submit"><i class="fa fa-search"></i></button>
                                                        
                                                  </form>
                                                   <div class="productlist" id="productlist">
                                                          
                                                  </div>
                                             </div>

                                         </div>
                                         <div class="hidden-md hidden-lg hidden-sm  col-sm-3 col-xs-3" style="padding: 0px;">
                                              <div class="user-and-home">


                                                  @if (Auth::check() && Auth::user()->role->id == 1)
                                                  <a href="{{ route('admin.dashboard') }}"><i class="fa fa-user-circle"></i></a>
                                                  @elseif (Auth::check() && Auth::user()->role->id == 2)
                                                   <a href="{{ route('shop.dashboard') }}"><i class="fa fa-user-circle"></i></a>
                                                  @elseif (Auth::check() && Auth::user()->role->id == 3)
                                                  <a href="{{ route('service_provider.dashboard') }}"><i class="fa fa-user-circle"></i></a>
                                                  @elseif (Auth::check() && Auth::user()->role->id == 4)
                                                      <a href="{{ route('user.dashboard') }}"><i class="fa fa-user-circle"></i></a>
                                                  @endif


                                                  <a href="{{ route('welcome') }}"><i class="fa fa-home"></i></a>
                                              </div>
                                         </div>
                                     </div>
                                </div>
                                <div class="col-md-4 col-sm-12 col-xs-12 hidden-xs">
                                     <div class="header-top-item">
                                            <ul>
                                                <li><i class="fa fa-home"></i><a class="{{ Request::is('/') ? 'activelink' : '' }}" id="home" href="{{ route('welcome') }}">Home</a></li>

                                                  @if (Auth::check() && Auth::user()->role->id == 1)
                                                  <li><i class="fa fa-user-circle"></i><a id="profile" href="{{ route('admin.dashboard') }}">Profile</a></li>
                                                  @elseif (Auth::check() && Auth::user()->role->id == 2)
                                                  <li><i class="fa fa-user-circle"></i><a id="profile" href="{{ route('shop.dashboard') }}">Profile</a></li>
                                                  @elseif (Auth::check() && Auth::user()->role->id == 3)
                                                  <li><i class="fa fa-user-circle"></i><a id="profile" href="{{ route('service_provider.dashboard') }}">Profile</a></li>
                                                  @elseif (Auth::check() && Auth::user()->role->id == 4)
                                                      <li><i class="fa fa-user-circle"></i><a class="{{ Request::is('user/dashboard') ? 'activelink' : '' }}" id="profile" href="{{ route('user.dashboard') }}">Profile</a></li>
                                                  @endif
                                                <li><i class="fa fa-cart-plus"></i><a class="{{ Request::is('user/cart/item') ? 'activelink' : '' }}" id="cart" href="{{ route('user.cartitem') }}">Cart</a></li>
                                            </ul>
                                     </div>
                                </div>
                          </div>
                     </div>
                </div>
                <div class="row">
                     <div class="col-md-12 col-sm-12 col-xs-12">
                          
                                 <div class="header-bottom">

                                   <ul class="hidden-sm hidden-md hidden-lg">
                                        <li><i class="fa fa-home"></i><a class="{{ Request::is('/') ? 'activelink' : '' }}" id="home" href="{{ route('welcome') }}">Home</a></li>

                                                @if (Auth::check() && Auth::user()->role->id == 1)
                                                <li><i class="fa fa-user-circle"></i><a id="profile" href="{{ route('admin.dashboard') }}">Profile</a></li>
                                                @elseif (Auth::check() && Auth::user()->role->id == 2)
                                                <li><i class="fa fa-user-circle"></i><a id="profile" href="{{ route('shop.dashboard') }}">Profile</a></li>
                                                @elseif (Auth::check() && Auth::user()->role->id == 3)
                                                <li><i class="fa fa-user-circle"></i><a id="profile" href="{{ route('service_provider.dashboard') }}">Profile</a></li>
                                                @elseif (Auth::check() && Auth::user()->role->id == 4)
                                                    <li><i class="fa fa-user-circle"></i><a class="{{ Request::is('user/dashboard') ? 'activelink' : '' }}" id="profile" href="{{ route('user.dashboard') }}">Profile</a></li>
                                                @endif

                                        <li><i class="fa fa-cart-plus"></i><a class="{{ Request::is('user/cart/item') ? 'activelink' : '' }}" id="cart" href="{{ route('user.cartitem') }}">Cart</a></li>
                                   </ul>
                                   <ul>
                                       <li><i class="fa fa-box"></i><a class="{{ Request::is('categoryforserviceid/1') ? 'activelink' : '' }}" id="service" href="{{ route('categoryforserviceid',1) }}">Sercice & Consultency</a></li>
                                       <li><i class="fa fa-shopping-bag"></i><a class="{{ Request::is('categoryforserviceid/2') ? 'activelink' : '' }}" id="shopping" href="{{ route('categoryforserviceid',2) }}">Shopping</a></li>
                                       <li><i class="fa fa-hamburger"></i><a class="{{ Request::is('categoryforserviceid/3') ? 'activelink' : '' }}" id="food" href="{{ route('categoryforserviceid',3) }}">Food</a></li>



                                       @if(Auth::check())

                                          <li><i class="fas fa-sign-out-alt"></i><a id="food" href="{{ route('logout') }}" onclick="event.preventDefault();
                                          document.getElementById('logout-form').submit();">Logout</a></li>

                                          <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                              @csrf
                                          </form>
                                      @else
                                          
                                          <li><i class="fas fa-user"></i><a class="{{ Request::is('login') ? 'activelink' : '' }}" id="food" href="{{ route('login') }}">Login</a></li>
                                          <li><i class="fas fa-user-lock"></i><a class="{{ Request::is('register') ? 'activelink' : '' }}" id="food" href="{{ route('register') }}">Register</a></li>

                                      @endif
                                       
                                   </ul>

                                   <!-- <button class="sidebarbtn">
                                       <span></span>
                                   </button> -->
                               </div>
                             
                         
                     </div>
                </div>
          </div>
     </div>


   <!--==================HEADER SECTION END==========================-->  

   @yield('content')

   <!--===========================FOOTER SECTION START=====================-->
   <div class="footer-section">
       <div class="container-fluid">
            <div class="row">
                 <div class="col-md-10 col-md-offset-1">
                     <div class="row">
                         <div class="col-xs-12 col-sm-6 col-md-3 col-lg-3">
                              <!--   <div class="single-column">
                                  <h3>Get to Know Us</h3>
                                  <ul>
                                      <li><a href="">Careers</a></li>
                                      <li><a href="">Blog</a></li>
                                      <li><a href="">About Amazon</a></li>
                                      <li><a href="">Investor Relation</a></li>
                                      <li><a href="">Amazon Devices</a></li>
                                  </ul>
                                </div> -->  
                         </div>
                          <div class="col-xs-12 col-sm-6 col-md-3 col-lg-3">
                               <!--  <div class="single-column"> 
                                  <h3>Make Moeny With Us</h3>
                                  <ul>
                                      <li><a href="">Sell on Amazon</a></li>
                                      <li><a href="">Sell Your Services on Amazon</a></li>
                                      <li><a href="">Sell on Amazon Business</a></li>
                                      <li><a href="">Sell Your Apps on Amazon</a></li>
                                      <li><a href="">Become an Affiliate</a></li>
                                      <li><a href="">Advise Your Products</a></li>
                                      <li><a href="">Self Publish With Us</a></li>
                                      <li><a href="">See all</a></li>
                                  </ul>
                                </div> -->  
                         </div>
                          <div class="col-xs-12 col-sm-6 col-md-3 col-lg-3">
                                <!-- <div class="single-column">  
                                  <h3>Amazon Payment Products</h3>
                                  <ul>
                                      <li><a href="">Amazon Business Cards</a></li>
                                      <li><a href="">Shop with Points</a></li>
                                      <li><a href="">Relod Your Balance</a></li>
                                      <li><a href="">Amazon Currency Converter</a></li>
                                  </ul>
                                </div>  --> 
                         </div>
                          <div class="col-xs-12 col-sm-6 col-md-3 col-lg-3">
                                <!-- <div class="single-column">  
                                  <h3>Let Us Help You</h3>
                                  <ul>
                                      <li><a href="">Your Account</a></li>
                                      <li><a href="">Your Orders</a></li>
                                      <li><a href="">Shipping Rates and Policies</a></li>
                                      <li><a href="">Return and Replacements</a></li>
                                      <li><a href="">Manage Your Content and Devices</a></li>
                                      <li><a href="">Amazon Assitant</a></li>
                                      <li><a href="">Help</a></li>
                                  </ul>
                                </div> -->  
                         </div>
                     </div>
                 </div>
            </div>
       </div>
   </div>
   <!--===========================FOOTER SECTION END=======================-->



    <!--=======================jquery==========================-->

    <!--script for toggle navigation-->

     <script type="text/javascript">
           
             $(document).ready(function(){

                   $('.sidebarbtn-2').click(function(){

                         $('.header-bottom').toggleClass('active');  
                         $('.sidebarbtn-2').toggleClass('toggle'); 
                        

                   })
             })

     </script>

     <!--===============SCRIPT FOR SUGGESTED SEARCH===================-->



     <script>
      $(document).ready(function(){

       $('#product').keyup(function(){ 
              var query = $(this).val();
           //   console.log(query);
              if(query != '')
              {
               var _token = $('input[name="_token"]').val();
               $.ajax({
                url:"{{ route('autocomplete.searchbox') }}",
                method:"POST",
                data:{query:query, _token:_token},
                success:function(data){
                 $('#productlist').fadeIn();  
                          $('#productlist').html(data);
                }
               });
              }
          });

          $(document).on('click', 'li', function(){  
              $('#product').val($(this).text());  
              $('#productlist').fadeOut();  
          });  

      });
      </script>
     <!--===============//SCRIPT FOR SUGGESTED SEARCH===================-->

<!--hide element by jquery-->

   <script type="text/javascript">
     
       $(function() {
              setTimeout(function() {
                $('#toast-container').fadeOut('fast');
              }, 3000);
          });
   </script>

<!--//-->


    @stack('js')


<!--scripts for tostr js start-->

<script src="http://cdn.bootcss.com/toastr.js/latest/js/toastr.min.js"></script>
<!-- {!! Toastr::message() !!}

<script>
    @if($errors->any())
    @foreach($errors->all() as $error)
    toastr.error('{{ $error }}','Error',{
        closeButton:true,
        progressBar:true,
    });
    @endforeach
    @endif
</script> -->

<!--//end scripts-->


 
</body>
</html>
