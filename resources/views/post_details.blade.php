 @extends('layouts.frontend.app')

@section('title')

   Ubidaid | {{ $post->post_title }} 

@endsection

@section('content')


<div class="promoted-post">
   <div class="container-fluid">
        <div class="row">
           <div class="col-md-10 col-md-offset-1">
              <div class="row">
                   
                      <div class="col-md-12 col-xs-12 col-sm-12">
                           <div class="row">


                                <div class="single-post">
                                       <h2>{{ $post->post_title }}</h2>
                                       <p>{{ $post->post_details }}</p>
                                     
                                       <img class="img-responsive" src="{{ asset('public/uploads/post/'.$post->image) }}" alt="blog">
                                       
                                 </div>

                                 
                                  
                           </div>
                      </div>
               </div>
          </div>
        </div>
   </div>
   </div>


@endsection