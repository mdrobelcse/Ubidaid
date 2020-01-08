@extends('layouts.backend.app')

@section('content')

    <div class="container-fluid">
        <!-- ============================================================== -->
        <!-- Bread crumb and right sidebar toggle -->
        <!-- ============================================================== -->
        <div class="row page-titles">
            <div class="col-md-5 col-8 align-self-center">
                <h3 class="text-themecolor m-b-0 m-t-0">Post</h3>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                    <li class="breadcrumb-item active">Edit post</li>
                </ol>
            </div>

        </div>
        <!-- ============================================================== -->
        <!-- End Bread crumb and right sidebar toggle -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Start Page Content -->
        <!-- ============================================================== -->
        <!-- Row -->
        <div class="row">
            <!-- Column -->

            <!-- Column -->
            <!-- Column -->
            <div class="col-lg-8 col-xlg-9 col-md-7">
                <div class="card">
                    <div class="card-block">
                        <form action="{{ route('service_provider.post.promote',$post->id) }}" method="post" class="form-horizontal form-material" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label class="col-md-12">Post title</label>
                                <div class="col-md-12">
                                    <input type="text" name="post_title" class="form-control form-control-line" value="{{ $post->post_title }}" readonly="">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-12">Post descriptoin</label>
                                <div class="col-md-12">
                                    <textarea name="post_details" class="form-control form-control-line" rows="10" readonly="">{{ $post->post_details }}</textarea>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-12">Post Image</label>
                                <div class="col-md-12">
                                    <img src="{{ asset('public/uploads/post/'.$post->image) }}" alt="" height="100px" width="150px" style="border: 1px solid #ddd;">
                                </div>
                            </div>



                            <div class="form-group">
                                <div class="col-sm-12">

                                    @if($post->status == 0)

                                        <button class="btn btn-success">Promote post</button>

                                    @elseif($post->status == 1)

                                       <span class="badge badge-info">Request sent for promote post</span>

                                    @elseif($post->status == 2)

                                       <span class="badge badge-success">Promoted</span>

                                    @endif   

                                    
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <!-- Column -->
        </div>
        <!-- Row -->
        <!-- ============================================================== -->
        <!-- End PAge Content -->
        <!-- ============================================================== -->
    </div>

@endsection
