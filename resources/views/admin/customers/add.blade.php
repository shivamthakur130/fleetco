@extends('layouts.master')

    @section('title' , 'Admin|Customer Create')

@section('main-content')

  

        <!-- page content -->
        <div class="right_col" role="main">
          <!-- top tiles -->
           <div class="">
           
                <div class="clearfix"></div>
                <div class="row">
                    <div class="col-md-12 col-sm-12 ">
                        <div class="x_panel">
                            
                            <div class="x_content">
                                <br/>
                                <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" method="post" action="{{route('admin.customer.save')}}" enctype="multipart/form-data">
                                    @csrf
                                    
                                    
                                <h6>Customer Details</h6>
                                <hr>    
                                
                                <div class="row">
                                    <div class="form-group col-lg-12">
                                        <label for="project_name" >Customer Name</label>
                                        <input type="text" class="form-control  @error('customer_name') is-invalid @enderror" id="customer_name" name="customer_name" placeholder="Customer Name">
                                            @error('customer_name')
                                            <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                    </div>
                                   
                                </div>
                                <div class="row">
                                    <div class="form-group col-lg-12">
                                        <label for="project_name" >Street 1</label>
                                        <input type="text" class="form-control  @error('street_1') is-invalid @enderror" id="street_1" name="street_1" placeholder="Street 1">
                                            @error('street_1')
                                            <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                    </div>
                                   
                                </div>
                                <div class="row">
                                    <div class="form-group col-lg-12">
                                        <label for="project_name" >Street 2</label>
                                        <input type="text" class="form-control  @error('street_2') is-invalid @enderror" id="street_2" name="street_2" placeholder="Street 2">
                                            @error('street_2')
                                            <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                    </div>
                                   
                                </div>
                                <div class="row">
                                    <div class="form-group col-lg-4">
                                        <label for="project_name" >Neighbour</label>
                                        <input type="text" class="form-control  @error('neighbour') is-invalid @enderror" id="neighbour" name="neighbour" placeholder="Neighbour">
                                            @error('neighbour')
                                            <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                    </div>
                                    <div class="form-group col-lg-4">
                                        <label for="project_name" >Building</label>
                                        <input type="text" class="form-control  @error('building') is-invalid @enderror" id="building" name="building" placeholder="Building">
                                            @error('building')
                                            <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                    </div>
                                    <div class="form-group col-lg-4">
                                        <label for="project_name" >Security Access</label>
                                        <input type="text" class="form-control  @error('security_access') is-invalid @enderror" id="security_access" name="security_access" placeholder="Security Access">
                                            @error('security_access')
                                            <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                    </div>
                                   
                                </div>
                                <div class="row">
                                    <div class="form-group col-lg-4">
                                        <label for="project_name" >Postal Code</label>
                                        <input type="text" class="form-control  @error('postal_code') is-invalid @enderror" id="postal_code" name="postal_code" placeholder="Postal Code">
                                            @error('postal_code')
                                            <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                    </div>
                                    <div class="form-group col-lg-4">
                                        <label for="project_name" >City</label>
                                        <input type="text" class="form-control  @error('city') is-invalid @enderror" id="city" name="city" placeholder="City">
                                            @error('city')
                                            <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                    </div>
                                    <div class="form-group col-lg-4">
                                        <label for="project_name" >State</label>
                                        <input type="text" class="form-control  @error('state') is-invalid @enderror" id="state" name="state" placeholder="State">
                                            @error('state')
                                            <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                    </div>
                                   
                                </div>
                                <div class="row">
                                   
                                    <div class="form-group col-lg-12">
                                        <label for="project_url" >Country</label>
                                        <input type="text" class="form-control  @error('country') is-invalid @enderror" id="country" name="country" placeholder="Country">
                                        @error('country')
                                            <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    
                                </div>
                                <hr>
                                <h6>Coordinates</h6><hr>
                                <div class="row">
                                    <div class="form-group col-lg-6">
                                        <label for="project_url" >Lat</label>
                                        <input type="text" class="form-control  @error('lat') is-invalid @enderror" id="lat" name="lat"placeholder="Lat">
                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-group col-lg-6">
                                        <label for="project_url" >Lang</label>
                                        <input type="text" class="form-control  @error('lang') is-invalid @enderror" id="lang" name="lang" placeholder="Lang">
                                        @error('phone_number')
                                            <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    
                                </div>
                                <div class="row">
                                    <div class="form-group col-lg-6">
                                        <label for="project_url" >Email</label>
                                        <input type="email" class="form-control  @error('email') is-invalid @enderror" id="driver_license" name="email"placeholder="Email">
                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-group col-lg-6">
                                        <label for="project_url" >Phone</label>
                                        <input type="number" class="form-control  @error('phone_number') is-invalid @enderror" id="phone_number" name="phone_number" placeholder="Phone Number">
                                        @error('phone_number')
                                            <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    
                                </div>
                                
                                
                                    <div class="ln_solid"></div>
                                    <div class="item form-group">
                                        <div class="col-md-6 col-sm-6 ">
                                            <a class="btn btn-primary" href="{{route('admin.customer')}}">Back</a>
                                            <button type="submit" class="btn btn-success">Confirm & Create</button>
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
    <!-- bootstrap-daterangepicker -->
	<script src="{{ asset('moment/min/moment.min.js')}}"></script>
	<script src="{{ asset('bootstrap-daterangepicker/daterangepicker.js')}}"></script>
    
    <!-- Custom Theme Scripts -->
    <script src="{{ asset('assets/js/custom.min.js')}}"></script>


@endsection