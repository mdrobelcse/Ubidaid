@extends('layouts.frontend.app')

@section('title')

   Ubidaid | Notification 

@endsection

@section('content')

<!--======================NOTIFICATION SECTION START=============================-->
<div class="notification-sectino">
	<div class="container-fluid">
 	    <div class="row">
 	    	 <div class="col-md-8 col-lg-8 col-sm-12 col-xs-12 col-md-offset-2 col-lg-offset-2">


 	    	 	@if($notifications->count() > 0)

 	    	 	@foreach($notifications as $notification)  

 	    	 	   <div class="single-notification">
 	    	 	         <div class="row">

 	    	 	  	    	 	<div class="col-xs-12">
 	    	 	  	    	 		
 	    	 	  	    	 	        <div class="col-lg-2 col-md-3 col-xs-12 col-sm-3">
 	    	 	  	    	 	      	   <div class="notificaiotn-img">


 	    	 	  	    	 	      	  	    


                                      @if(Auth::user()->role_id == 4 && Auth::user()->profile == 'default.png' )

                                         <img class="img-responsive" src="{{ asset('public/uploads/profile/default/default.jpg') }}" alt="user">

                                      @else

                                        <img class="img-responsive" src="{{ asset('public/uploads/profile/'.$notification->user->profile) }}" alt="user">

                                          

                                      @endif


 	    	 	  	    	 	      	  	   
 	    	 	  	    	 	      	    </div>
 	    	 	  	    	 	        </div>
 	    	 	  	    	 	        <div class="col-lg-10 col-md-9 col-xs-12 col-sm-9">
 	    	 	  	    	 	      	   <div class="notification-content">
 	    	 	  	    	 	      	  	    <h2>{{ $notification->user->name }}</h2>
		 	    	 	  	    	 	      	<p>{{ $notification->notification }}</p>
		 	    	 	  	    	 	      	<div class="notificaiton-comment">
		 	    	 	  	    	 	      		 <i class="fas fa-comment"></i><span>{{ date('H:i', strtotime($notification->created_at)) }}</span>
		 	    	 	  	    	 	      	</div>
 	    	 	  	    	 	      	    </div>
 	    	 	  	    	 	        </div>
 	    	 	  	                
 	    	 	  	            </div>
 	    	 	       </div>
 	    	 	  </div>

 	    	 	  @endforeach

 	    	 	  @else

 	    	 	   <div class="single-notification">
 	    	 	         <div class="row">
 	    	 	  	    	 	<div class="col-xs-12">
 	    	 	  	    	 	      <h4>You have no any notification</h4>
 	    	 	  	            </div>
 	    	 	       </div>
 	    	 	  </div>

 	    	 	  @endif


 	    	 </div>
 	    </div>
    </div>
</div>
 <!--======================NOTIFICATION SECTION END===============================-->


@endsection
