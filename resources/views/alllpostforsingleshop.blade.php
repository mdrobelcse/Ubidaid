 @extends('layouts.frontend.app')

@section('title')

   Ubidaid | All Posts 

@endsection

@section('content')

<!--==================PROMOTED POST START==============-->
  <div class="promoted-post">
   <div class="container-fluid">
        <div class="row">
           <div class="col-md-8 col-md-offset-2">
            <div class="promoted-post-heading">

                 <h3>All post</h3>

            </div>
              <div class="row">
                   
                      <div class="col-md-12 col-xs-12 col-sm-12">
                           <div class="row">

                            @foreach($posts as $post)

                                 <div class="single-post">
                                       <h2>{{ $post->post_title }}</h2>
                                       <p>{{ str_limit($post->post_details,300) }}</p>
                                       <img class="img-responsive" src="{{ asset('public/uploads/post/'.$post->image) }}" alt="blog">

                                       <div class="promoted-post-link">
                                           <div class="visit-now">
                                                 <a href="{{ route('post.details',$post->id) }}">Read more</a>
                                           </div>
                                       </div>
                                 </div>

                            @endforeach      
                                  
                           </div>
                      </div>
               </div>
          </div>
        </div>
   </div>
   </div>
<!--==================PROMOTED POST END==============-->

@endsection

