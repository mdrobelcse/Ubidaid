@extends('layouts.frontend.app')

@push('css')

    <link rel="stylesheet" type="text/css" href="{{ asset('frontend/css/category.css') }}">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.1/css/font-awesome.min.css" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend/css/custom.css') }}">


@endpush


@section('searchbycategory')
    <hr>
    <div class="">
        <form action="{{ route('search') }}" method="post">
            @csrf
        <label style="color: #fff" class="searchCategory col-lg-2 col-md-2 col-sm-3 col-xs-4">Search by Category</label>
        <input type="search" name="search" class="col-lg-6 col-md-6 col-sm-6 col-xs-6" placeholder="Search by Category..."><i id="filtersubmit" class="fa fa-search"></i>
        <input type="submit" name="submit" value="search">
        </form>
        <br><br>
    </div>
@endsection

@section('content')

   <div class="container-fluid">
      <div class="row">
           <div class="col-sm-12">
                <div class="menu-for-category">
                        <ul>
              
            
                 <li><a href="">Computer and electronics</a>

                       <ul>
                          
                            <li><a href="">Sub item1</a></li>
                            <li><a href="">Sub item2</a></li>
                            <li><a href="">Sub item3</a></li>
                            <li><a href="">Sub item4</a></li>

                       </ul>

                 </li>
                 <li><a href="">Hard disk</a>

                       <ul>
                          
                            <li><a href="">Sub item5</a></li>
                            <li><a href="">Sub item6</a></li>
                            <li><a href="">Sub item7</a></li>
                            <li><a href="">Sub item8</a></li>

                       </ul>

                 </li>
                    <li><a href="">Smart phone</a>

                       <ul>
                          
                            <li><a href="">Sub item9</a></li>
                            <li><a href="">Sub item10</a></li>
                            <li><a href="">Sub item11</a></li>
                            <li><a href="">Sub item12</a></li>

                       </ul>

                 </li>
                  
                 

            </ul>
                </div>
           </div>
      </div>
 </div>

@endsection


@push('js')
    
   
@endpush

