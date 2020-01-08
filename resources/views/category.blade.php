@extends('layouts.frontend.app')

@section('title')

   Ubidaid | Category 

@endsection


@section('content')

    <!--======================CATEGORY SECTION START==================-->
 

 
   <!--======================CATEGORY SECTION END==================-->

     <div class="category-section">
       <div class="container-fluid">
            <div class="row">
                  <div class="col-md-10 col-lg-10 col-sm-12 col-xs-12 col-md-offset-1 col-lg-offset-1">
                          <div class="row">

                      @foreach($categories as $category)


                             <div class="category-div">
                                  <div class="single-category">
                                       <a data-toggle="collapse" href="#{{ $category->id }}" style="text-decoration: none;"><div class="main-category">
                                            <h5>{{ $category->name }}</h5>
                                       </div></a>
                                        <div class="sub-category" style="display: block;">
                                          <div id="{{ $category->id }}" class="panel-collapse collapse">
                                            @foreach($category->subcategories as $subcat)
                                                 <a href="{{ route('shopbysubcategories',$subcat->id) }}"><div class="panel-body single-cat-hover">{{ $subcat->name }}</div></a>
                                            @endforeach
                                          </div>
                                       </div>
                                  </div>
                             </div>


                      @endforeach       
                              
                             
                             
                            
                          </div>
                  </div>
            </div>
       </div>
   </div>

@endsection


@push('js')

     <!--script for category dropdown menu-->

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script> 


      $(document).ready(function(){



        $("#maincat-one").click(function(){
          $("#subcat-one").slideToggle("slow");
         // console.log("hello world");
        });



        //  $("#maincat-two").click(function(){
        //   $("#subcat-two").slideToggle("slow");
        //  // console.log("hello world");
        // });

        //   $("#maincat-three").click(function(){
        //   $("#subcat-three").slideToggle("slow");
        //  // console.log("hello world");
        // });

       

      });



</script>

@endpush