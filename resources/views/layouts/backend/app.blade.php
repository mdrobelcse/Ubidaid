<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('public/frontend/images/icon/favicon.png') }}">
    <title>Ubidaid</title>
    <!-- Bootstrap Core CSS -->
    <link href="{{ asset('public/backend/assets/plugins/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <!-- chartist CSS -->
    <link href="{{ asset('public/backend/assets/plugins/chartist-js/dist/chartist.min.css') }}" rel="stylesheet">
    <link href="{{ asset('public/backend/assets/plugins/chartist-js/dist/chartist-init.css') }}" rel="stylesheet">
    <link href="{{ asset('public/backend/assets/plugins/chartist-plugin-tooltip-master/dist/chartist-plugin-tooltip.css') }}" rel="stylesheet">
    <!--This page css - Morris CSS -->
    <link href="{{ asset('public/backend/assets/plugins/c3-master/c3.min.css') }}" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="{{ asset('public/backend/assets/css/style.css') }}" rel="stylesheet">
    <!-- You can change the theme colors from here -->
    <link href="{{ asset('public/backend/assets/css/colors/blue.css') }}" id="theme" rel="stylesheet">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <!-scripts for tostr js-->
    <link href="{{ asset('public/backend/assets/css/tostr.css') }}" rel="stylesheet">
    <!-- <link rel="stylesheet" href="http://cdn.bootcss.com/toastr.js/latest/css/toastr.min.css">

    <style>
        .toast-title{
            font-size: 16px;
            font-family: monospace;
        }
        .toast-message{
            font-size: 14px;
            font-family: inherit;
        }
    </style> -->

    <!--metarials icon cdn-->

    <link href="https://fonts.googleapis.com/icon?family=Material+Icons"
          rel="stylesheet">


    <!--custom css link-->

    <link href="{{ asset('public/backend/assets/css/custom.css') }}" rel="stylesheet">


    <!--css link for data tables-->
    <link href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap.min.css" rel="stylesheet">


    @stack('css')

    <![endif]-->
</head>



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

<!-- ============================================================== -->
<!-- Preloader - style you can find in spinners.css -->
<!-- ============================================================== -->
<div class="preloader">
    <svg class="circular" viewBox="25 25 50 50">
        <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10" /> </svg>
</div>
<!-- ============================================================== -->
<!-- Main wrapper - style you can find in pages.scss -->
<!-- ============================================================== -->
<div id="main-wrapper">
    <!-- ============================================================== -->
    <!-- Topbar header - style you can find in pages.scss -->
    <!-- ============================================================== -->
     @include('layouts.backend.partials.topbar')
<!-- ============================================================== -->
    <!-- End Topbar header -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- Left Sidebar - style you can find in sidebar.scss  -->
    <!-- ============================================================== -->
     @include('layouts.backend.partials.sidebar')
<!-- ============================================================== -->
    <!-- End Left Sidebar - style you can find in sidebar.scss  -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- Page wrapper  -->
    <!-- ============================================================== -->
    <div class="page-wrapper">
        <!-- ============================================================== -->
        <!-- Container fluid  -->
        <!-- ============================================================== -->

<body class="fix-header fix-sidebar card-no-border">



    @yield('content')
    <!-- ============================================================== -->
        <!-- End Container fluid  -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- footer -->
        <!-- ============================================================== -->
       @include('layouts.backend.partials.footer')
    <!-- ============================================================== -->
        <!-- End footer -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- End Page wrapper  -->
    <!-- ============================================================== -->
</div>
<!-- ============================================================== -->
<!-- End Wrapper -->
<!-- ============================================================== -->
<!-- ============================================================== -->
<!-- All Jquery -->
<!-- ============================================================== -->
<script src="{{ asset('public/backend/assets/plugins/jquery/jquery.min.js') }}"></script>
<!-- Bootstrap tether Core JavaScript -->
<script src="{{ asset('public/backend/assets/plugins/bootstrap/js/tether.min.js') }}"></script>
<script src="{{ asset('public/backend/assets/plugins/bootstrap/js/bootstrap.min.js') }}"></script>
<!-- slimscrollbar scrollbar JavaScript -->
<script src="{{ asset('public/backend/assets/js/jquery.slimscroll.js') }}"></script>
<!--Wave Effects -->
<script src="{{ asset('public/backend/assets/js/waves.js') }}"></script>
<!--Menu sidebar -->
<script src="{{ asset('public/backend/assets/js/sidebarmenu.js') }}"></script>
<!--stickey kit -->
<script src="{{ asset('public/backend/assets/plugins/sticky-kit-master/dist/sticky-kit.min.js') }}"></script>
<!--Custom JavaScript -->
<script src="{{ asset('public/backend/assets/js/custom.min.js') }}"></script>
<!-- ============================================================== -->
<!-- This page plugins -->
<!-- ============================================================== -->
<!-- chartist chart -->
<script src="{{ asset('public/backend/assets/plugins/chartist-js/dist/chartist.min.js') }}"></script>
<script src="{{ asset('public/backend/assets/plugins/chartist-plugin-tooltip-master/dist/chartist-plugin-tooltip.min.js') }}"></script>
<!--c3 JavaScript -->
<script src="{{ asset('public/backend/assets/plugins/d3/d3.min.js') }}"></script>
<script src="{{ asset('public/backend/assets/plugins/c3-master/c3.min.js') }}"></script>
<!-- Chart JS -->
<script src="{{ asset('public/backend/assets/js/dashboard1.js') }}"></script>

<!--scripts for data tables-->

{{--<script src="https://code.jquery.com/jquery-3.3.1.js"></script>--}}

<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>



<script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap.min.js"></script>


<script type="text/javascript">
    $(document).ready(function() {
        $('#example').DataTable();
    } );
</script>



<!--hide element by jquery-->

   <script type="text/javascript">
     
       $(function() {
              setTimeout(function() {
                $('#toast-container').fadeOut('fast');
              }, 3000);
          });
   </script>

<!--//-->



<!--scripts for tostr js start-->

<script src="http://cdn.bootcss.com/toastr.js/latest/js/toastr.min.js"></script>
<!--  {!! Toastr::message() !!} -->

<!--<script>
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








@stack('js')


</body>

</html>