@extends('layouts.backend.app')

@section('content')

    <div class="container-fluid">
        <!-- ============================================================== -->
        <!-- Bread crumb and right sidebar toggle -->
        <!-- ============================================================== -->
        <div class="row page-titles">
            <div class="col-md-5 col-8 align-self-center">
                <h3 class="text-themecolor m-b-0 m-t-0">Table</h3>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                    <li class="breadcrumb-item active">Table</li>
                </ol>
            </div>
             
        </div>
        <!-- ============================================================== -->
        <!-- End Bread crumb and right sidebar toggle -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Start Page Content -->
        <!-- ============================================================== -->
        <div class="row">
            <!-- column -->
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-block">
                        <h4 class="card-title">Basic Table</h4>
                        <h6 class="card-subtitle">Add class <code>.table</code></h6>
                        <div>
                            <table id="example" class="table table-striped table-bordered" style="width:100%">
                                <thead>
                                <tr>
                                    <th>Sl</th>
                                    <th>Post title</th>
                                    <th>Post image</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>

                                @foreach($posts as $key=>$post)

                                   <tr>
                                        <td>{{ $key+1 }}</td>
                                        <td>{{ $post->post_title }}</td>
                                        <td><img src="{{ asset('public/uploads/post/'.$post->image) }}" height="80px" width="100px" alt="blog image"></td>
                                        <td>
                                            @if($post->status == 1)
                                                 <span class="badge badge-info">Pending for promote</span>
                                            @elseif($post->status == 2)
                                                  <span class="badge badge-success">promoted</span>
                                            @endif
                                        </td>
                                        <td>
                                             @if($post->status == 1)

                                                <a href="{{ route('admin.view.post',$post->id) }}" class="btn btn-success">Promote post</a>


                                             @elseif($post->status == 2)  
                                             
                                                 <a href="{{ route('admin.viewforcancel.promote',$post->id) }}" class="btn btn-danger">Cancel Promote</a>

                                             @endif

                                        </td>
                                        
                                   </tr>

                                @endforeach

                                </tbody>
                                <tfoot>
                                <tr>
                                    <th>Sl</th>
                                    <th>Post title</th>
                                    <th>Post image</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- End PAge Content -->
        <!-- ============================================================== -->
    </div>

@endsection


 
