@extends('layouts.master')

    @section('title' , 'Admin|Company Branch Edit')

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
                                <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" method="post" action="{{route('admin.company.branch.update')}}" enctype="multipart/form-data">
                                    @csrf
                                    
                                    
                                <h6>Company Branch Details</h6>
                                <hr>    
                                <input type="hidden" name="id" value="{{$companyBranch->id}}">
                                <div class="row">
                                    <div class="form-group col-lg-4">
                                        <label for="project_name" >Branch EID</label>
                                        <input type="text" class="form-control  @error('branch_eid') is-invalid @enderror" id="branch_eid" name="branch_eid" value="{{$companyBranch->branch_eid}}" placeholder="Branch EID">
                                            @error('branch_eid')
                                            <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                    </div>
                                    <div class="form-group col-lg-4">
                                        <label for="project_url" >Branch Name</label>
                                        <input type="text" class="form-control  @error('branch_name') is-invalid @enderror" id="branch_name" name="branch_name" value="{{$companyBranch->branch_name}}" placeholder="Branch Name">
                                        @error('branch_name')
                                            <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-group col-lg-4">
                                        <label for="project_url" >Branch Type</label>
                                            <select class="form-control select2" id="country" data-placeholder="Select Branch" name ="branch_type" style="width: 100%;">
                                                @if(count($branches) > 0)
                                                    @foreach($branches as $branch)
                                                        <option value="{{$branch->id}}" @if($companyBranch->branch_type == $branch->id) selected @endif >{{$branch->branch_type}}</option>
                                                    @endforeach
                                                @endif
                                            </select> 
                                    </div>
                                   
                                </div>
                                <div class="row">
                                    <div class="form-group col-lg-4">
                                        <label for="project_url" >Branch Email</label>
                                        <input type="email" class="form-control  @error('branch_email') is-invalid @enderror" id="branch_email" name="branch_email" value="{{$companyBranch->branch_email}}" placeholder="Branch Email">
                                        @error('branch_email')
                                            <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-group col-lg-4">
                                        <label for="project_url" >Branch Contact</label>
                                        <input type="text" class="form-control  @error('branch_contact') is-invalid @enderror" id="branch_contact" name="branch_contact" value="{{$companyBranch->branch_contact}}" placeholder="Branch Contact">
                                        @error('branch_contact')
                                            <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-group col-lg-4">
                                        <label for="project_url" >Company Id</label>
                                            <select class="form-control select2" id="company_id" data-placeholder="Select Company Id" name ="company_id" style="width: 100%;">
                                                @if(count($companies) > 0)
                                                    @foreach($companies as $company)
                                                        <option value="{{$company->id}}" @if($companyBranch->company_id == $company->id ) selected @endif>{{$company->company_eid}}</option>
                                                    @endforeach
                                                @endif
                                            </select> 
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-lg-12">
                                        <label for="project_name" >Street</label>
                                        <input type="text" class="form-control  @error('street') is-invalid @enderror" id="street_1" name="street" value="{{$companyBranch->street}}" placeholder="Street">
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
                                        <input type="text" class="form-control  @error('postal_code') is-invalid @enderror" id="postal_code" name="postal_code" value="{{$companyBranch->zip}}" placeholder="Postal Code">
                                            @error('postal_code')
                                            <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                    </div>
                                    <div class="form-group col-lg-4">
                                        <label for="project_name" >City</label>
                                        <input type="text" class="form-control  @error('city') is-invalid @enderror" id="city" name="city" value="{{$companyBranch->city}}" placeholder="City">
                                            @error('city')
                                            <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                    </div>
                                    <div class="form-group col-lg-4">
                                        <label for="project_name" >State</label>
                                        <input type="text" class="form-control  @error('state') is-invalid @enderror" id="state" name="state" value="{{$companyBranch->state}}" placeholder="State">
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
                                                        <option value="{{$country->id}}" @if($companyBranch->country == $country->id) selected @endif>{{$country->name}}</option>
                                                    @endforeach
                                                @endif
                                            </select> 
                                    </div>
                                    
                                </div>
                                <div class="ln_solid"></div>
                                <div class="item form-group">
                                    <div class="col-md-6 col-sm-6 ">
                                        <a class="btn btn-primary" href="{{route('admin.company.branch')}}">Back</a>
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