@extends('layouts.master')

    @section('title' , 'Admin|Company Edit')

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
                                <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" method="post" action="{{route('admin.company.update')}}" enctype="multipart/form-data">
                                    @csrf
                                    
                                    
                                <h6>Company Details</h6>
                                <hr>    
                                <input type="hidden" name="id" value="{{$company->id}}">
                                <div class="row">
                                    <div class="form-group col-lg-4">
                                        <label for="project_name" >Company EID</label>
                                        <input type="text" class="form-control  @error('company_eid') is-invalid @enderror" value="{{$company->company_eid}}" id="company_eid" name="company_eid" placeholder="Company EID">
                                            @error('company_eid')
                                            <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                    </div>
                                    <div class="form-group col-lg-4">
                                        <label for="project_url" >Company Email</label>
                                        <input type="email" class="form-control  @error('company_email') is-invalid @enderror" value="{{$company->email}}" id="driver_license" name="company_email"placeholder="Company Email">
                                        @error('company_email')
                                            <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-group col-lg-4">
                                        <label for="project_url" >Company Phone</label>
                                        <input type="text" class="form-control  @error('company_phone_number') is-invalid @enderror" value="{{$company->contact}}" id="phone_number" name="company_phone_number" placeholder="Company Phone Number">
                                        @error('company_phone_number')
                                            <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                   
                                </div>
                                <div class="row">
                                    <div class="form-group col-lg-12">
                                        <label for="project_name" >Street</label>
                                        <input type="text" class="form-control  @error('street') is-invalid @enderror" id="street" value="{{$company->street}}" name="street" placeholder="Street">
                                            @error('street')
                                            <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                    </div>
                                   
                                </div>
                                
                                <div class="row">
                                    <div class="form-group col-lg-4">
                                        <label for="project_name" >Postal Code</label>
                                        <input type="text" class="form-control  @error('postal_code') is-invalid @enderror" value="{{$company->zip}}" id="postal_code" name="postal_code" placeholder="Postal Code">
                                            @error('postal_code')
                                            <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                    </div>
                                    <div class="form-group col-lg-4">
                                        <label for="project_name" >City</label>
                                        <input type="text" class="form-control  @error('city') is-invalid @enderror" id="city" name="city" value="{{$company->city}}" placeholder="City">
                                            @error('city')
                                            <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                    </div>
                                    <div class="form-group col-lg-4">
                                        <label for="project_name" >State</label>
                                        <input type="text" class="form-control  @error('state') is-invalid @enderror" id="state" value="{{$company->state}}" name="state" placeholder="State">
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
                                            <select class="form-control select2" id="country" data-placeholder="Select Country" name ="country" style="width: 100%;">
                                                @if(count($countries) > 0)
                                                    @foreach($countries as $country)
                                                        <option value="{{$country->id}}" @if($company->country == $country->id) selected @endif>{{$country->name}}</option>
                                                    @endforeach
                                                @endif
                                            </select> 
                                    </div>
                                    
                                </div>
                                <div class="ln_solid"></div>
                                <div class="item form-group">
                                    <div class="col-md-6 col-sm-6 ">
                                        <a class="btn btn-primary" href="{{route('admin.company')}}">Back</a>
                                        <button type="submit" class="btn btn-success">Save Changes</button>
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