@extends('layouts.master')

    @section('title' , 'Admin|Admin Profile')

@section('main-content')

  

        <!-- page content -->
        <div class="right_col" role="main">
          <!-- top tiles -->
           <div class="">
           
                <div class="clearfix"></div>
                <div class="row">
                    <div class="col-md-12 col-sm-12 ">
                        <div class="x_panel">
                        @if(session()->has('message'))    
                            <div class="alert alert-success alert-dismissible ml-3 mr-3">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                <!-- <h5><i class="icon fas fa-check"></i> Alert!</h5> -->
                                {{ session()->get('message') }}
                            </div>
                            @endif
                                <div class="x_content">
                                <br />
                                <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" method="post" action="{{route('admin.profile-update')}}">
                                    @csrf
                                    <input type="hidden" name="id" value="{{$user->unique_id}}">
                                    <div class="item form-group">
                                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">User Name <span class="required">*</span>
                                        </label>
                                        <div class="col-md-6 col-sm-6 ">
                                            <input type="text" id="username" name="username" class="form-control @error('username') is-invalid @enderror" value="{{$user->username}}">
                                            @error('username')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                       
                                    </div>
                                    <div class="item form-group">
                                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Full Name <span class="required">*</span>
                                        </label>
                                        <div class="col-md-6 col-sm-6 ">
                                            <input type="text" id="fullname" name="fullname" class="form-control @error('fullname') is-invalid @enderror" value="{{$user->name}}">
                                            @error('fullname')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="item form-group">
                                        <label for="middle-name" class="col-form-label col-md-3 col-sm-3 label-align">Email</label><span class="required">*</span>
                                        <div class="col-md-6 col-sm-6 ">
                                            <input id="email" class="form-control @error('email') is-invalid @enderror" type="email" name="email" value="{{$user->email}}">
                                            @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                        
                                    </div>
                                    <div class="item form-group">
                                        <label for="middle-name" class="col-form-label col-md-3 col-sm-3 label-align">Password</label><span class="required">*</span>
                                        <div class="col-md-6 col-sm-6 ">
                                            <input id="password" class="form-control @error('password') is-invalid @enderror" type="password" name="password" autocomplet="off">
                                            <span>If you want to change password then enter it</span>
                                            @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                    
                                    <div class="ln_solid"></div>
                                    <div class="item form-group">
                                        <div class="col-md-6 col-sm-6 offset-md-3">
                                            <a class="btn btn-primary" href="{{route('admin-area')}}">Back</a>
                                            <button type="submit" class="btn btn-success">Submit</button>
                                        </div>
                                    </div>

                                </form>
                            </div>
                        </div>
                    </div>
                </div>

					
			</div>

        </div>
        <!-- /page content -->

       
      </div>
    </div>

    <!-- jQuery -->
    <script src="{{ asset('vendors/jquery/dist/jquery.min.js')}}"></script>
    <!-- Bootstrap -->
    <script src="{{ asset('vendors/bootstrap/dist/js/bootstrap.bundle.min.js')}}"></script>
    <!-- FastClick -->
    <script src="{{ asset('vendors/fastclick/lib/fastclick.js')}}"></script>
    <!-- NProgress -->
    <script src="{{ asset('vendors/nprogress/nprogress.js')}}"></script>
    <!-- iCheck -->
    <script src="{{ asset('vendors/iCheck/icheck.min.js')}}"></script>
    
    <!-- Custom Theme Scripts -->
    <script src="{{ asset('build/js/custom.min.js')}}"></script>

    

@endsection