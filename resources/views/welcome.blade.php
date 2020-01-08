@extends('layouts.frontend.app')
 
@section('title')

   Ubidaid | Home 

@endsection

@section('content')

   <!--==================SIDEBAR AND SERVICE SECTION START=======================-->
   <div class="service-and-sedebar" style="overflow: hidden;">
   <div class="container-fluid">
        <div class="row">

          <div class="col-md-10 col-md-offset-1">
            <div class="col-md-3 col-xs-12 col-sm-12 hidden-sm hidden-xs">
                  <div class="sidebar-section">
                       <div class="row">
                           <div class="col-xs-12">
                                 <h2><i class="fa fa-user-circle"></i>

                                    @if(Auth::check() && Auth::user()->role->id == 4)

                                         {{ Auth::user()->name }}

                                     @else
                                     
                                          Please login      

                                     @endif

                                 </h2>
                                <!--  <p>Details</p> -->
                               <ul>
                                   

                                    @php 

                                           $allnotification = App\Notification::allnotification(Auth::id());

                                    @endphp

                                    @if(Auth::check() && Auth::user()->role->id == 4)

                                         <li><a href="{{ route('user.allnotification',Auth::id()) }}">Notification</a><span class="span">{{ $allnotification->count() }}</span></li> 

                                     @else
                                     
                                         <li><a href="">Notification</a><span class="span">0</span></li>     

                                     @endif
                                   
                                  
                               </ul>
                           </div>
                       </div>

                      <!--  <div class="row">
                            <div class="col-xs-12">
                                 <div class="cartlist">
                                      <h4>Cart list</h4>
                                      <ul>
                                          <li><a href="">Item one</a></li>
                                          <li><a href="">Item two</a></li>
                                          <li><a href="">Item three</a></li>
                                          <li><a href="">Item four</a></li>
                                          <li><a href="">Item five</a></li>
                                      </ul>
                                      <div class="cartlink">
                                         <a href="#">See more....</a>
                                      </div>
                                 </div>
                            </div>
                       </div> -->

                        <div class="row">
                            <div class="col-xs-12">
                                 <div class="favouritelist">
                                      <h4>Favourite list</h4>
                                      <ul>

                                        @php 

                                           $allfavshop = App\Favourite::allfavshop(Auth::id());

                                        @endphp

                                        @if($allfavshop->count() > 0)

                                          @foreach($allfavshop as $favshop)

                                             <li><a href="{{ route('single-shop',$favshop->shop_id) }}">{{ $favshop->shop->name }}</a></li>

                                          @endforeach  


                                        @else
                                        
                                          <li><a href="">You have no any favourite shop..</a></li>

                                        @endif
                                          
                                      </ul>

                                    @if($allfavshop->count() > 5)
                                      <div class="favouritelink">
                                         <a href="{{ route('user.allfavouriteshop') }}">See more....</a>
                                      </div>
                                    @endif  



                                 </div>
                            </div>
                       </div>
                 </div>
            </div>
             <div class="col-md-9 col-sm-12 col-xs-12">
                 <div class="service-section">
                        <div class="row">

                          @php $x = 0 @endphp

                          @if($servicetypes->count() > 0)
                               @foreach($servicetypes as $servicetype)

                                <div class="col-sm-6 col-md-4 col-lg-4 col-xs-12">
                                      <div class="single-service">
                                           <a href="{{ route('categoryforserviceid',$servicetype->id) }}">
                                              
                                              <div class='section header'>
                                                <div class='photo'>
                                                  <img src='{{ asset('public/uploads/servicetype/'.$servicetype->image) }}'
                                                       srcset='{{ asset('public/uploads/servicetype/'.$servicetype->image) }} 2000w,
                                                               {{ asset('public/uploads/servicetype/'.$servicetype->image) }} 1000w'
                                                       sizes='(min-width: 960px) 960px,
                                                              100vw'/>
                                                </div>
                                              </div>
                                              <h4>{{ $servicetype->name }}</h4>
                                            </a>
                                      </div>
                                </div>

                               @endforeach 
                          @else

                               <div class="col-sm-6 col-md-4 col-lg-4 col-xs-12">
                                        <h4>Data not available</h4>
                                </div>

                          @endif    
                            
                            
                        </div>
                 </div>
            </div>

            </div>


        </div>
   </div>
   </div>



<!--=======================-->


 


<!--=========================-->

   <!--==================SIDEBAR AND SERVICE SECTION END=======================-->



   <!--=================================BLOG SECTION START==================================-->
   <div class="blog-section" style="overflow: hidden;">
   <div class="container-fluid">
        <div class="row">
           <div class="col-md-10 col-md-offset-1">
              <div class="row">
                   
                      <div class="col-md-9 col-xs-12 col-sm-12 col-md-offset-3">
                           <div class="row">

                            @if($blogs->count() > 0)

                            @foreach($blogs as $blog)

                                 <div class="single-blog">
                                       <h2>{{ $blog->title }}</h2>
                                       <p>{{ $blog->description }}</p>
                                       <img class="img-responsive" src="{{ asset('public/uploads/blog/'.$blog->image) }}" alt="blog">

                                       <span>{{ date('d-m-Y  H:i:s', strtotime($blog->created_at)) }}</span>
                                 </div>

                            @endforeach

                            @else


                                 <div class="single-blog">
                                       <h2>Post not available</h2>
                                 </div>


                            @endif



                            @if($blogs->count() >= 3)

                                <div class="seemorepost">
                                   <a href="{{ route('alladmin.post') }}">See more post</a>
                                </div>

                            @else    

                            @endif

                            
                                  
                           </div>
                      </div>
               </div>
          </div>
        </div>
   </div>
   </div>

   <!--=================================BLOG SECTION END==================================-->


<!--==================PROMOTED POST START==============-->
  <div class="promoted-post" style="overflow: hidden;">
   <div class="container-fluid">
        <div class="row">
           <div class="col-md-10 col-md-offset-1">
            <!-- <div class="promoted-post-heading">

                 <h3>Promoted post</h3>

            </div> -->
              <div class="row">
                   
                      <div class="col-md-9 col-xs-12 col-sm-12 col-md-offset-3">
                           <div class="row">


                          @if($posts->count() >0)

                            @foreach($posts as $post)

                                 <div class="single-post">
                                       <h2>{{ $post->post_title }} <span>{{ $post->user->name }}</span></h2>
                                       <p>{{ $post->post_details }}</p>
                                       <img class="img-responsive" src="{{ asset('public/uploads/post/'.$post->image) }}" alt="blog">

                                       <div class="promoted-post-link">
                                           <div class="visit-now">
                                                 <a href="{{ route('single-shop',$post->user->id) }}">Visit Now</a>
                                           </div>
                                           <div class="contact-us">
                                                 <a href="{{ route('contact.index',$post->user->id) }}">Contact us</a>
                                           </div>
                                       </div>
                                 </div>

                              @endforeach


                          @else

                              <div class="single-post">
                                       <h2>promoted post not available</h2>
                                  
                              </div>

                          @endif    
                                 
                                  
                           </div>
                      </div>
               </div>
          </div>
        </div>
   </div>
   </div>
<!--==================PROMOTED POST END==============-->

@endsection 