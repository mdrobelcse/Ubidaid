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

                            @foreach($blogs as $blog)

                                 <div class="single-post">
                                       <h2>{{ $blog->title }}</h2>
                                       <p>{{ $blog->description }}</p>
                                       <img class="img-responsive" src="{{ asset('public/uploads/blog/'.$blog->image) }}" alt="blog">

                                       
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

