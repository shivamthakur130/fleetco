@extends('layouts.master')

    @section('title' , 'Admin|Driver Edit')

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
                                <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" method="post" action="{{route('admin.driver.update')}}" enctype="multipart/form-data">
                                    @csrf
                                    
                                   <input type="hidden" name="id"> 
                                <h6>Driver Details</h6>
                                <hr>    
                                <input type="hidden" name="id" value="{{$driver->id}}">
                                <div class="row">
                                    <div class="form-group col-lg-4">
                                    <label for="first_name" >Image</label>
                                        <div class="custom-file">
                                        <input type="file" class="form-control custom-file-input @error('logo') is-invalid @enderror" id="customFile" name="image" accept=".png, .jpg, .jpeg">
                                        <label class="custom-file-label" for="customFile">Image</label>
                                            @error('logo')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>    
                                    </div>
                                    <div class="form-group col-lg-4" id="last_fetch_image">
                                    <img src="{{ asset('drivers/'.$driver->image) }}" alt="Not Uploaded" id="original" width="100px" style="margin-top: 29px;!important"/>
                                    </div>
                                    <div class="form-group col-lg-4" id="new_fetch_image">
                                        <img src="" id="profile-img-tag" width="100px" style="margin-top: 29px;!important"/>
                                    </div>
                                </div>
                                
                                <div class="row">
                                    <div class="form-group col-lg-4">
                                        <label for="project_name" >Internal Id</label>
                                        <input type="text" class="form-control  @error('internal_id') is-invalid @enderror" readonly id="internal_id" name="internal_id" value="{{$driver->internal_id}}" placeholder="Internal Id" autofocus>
                                        @error('internal_id')
                                            <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-group col-lg-4">
                                        <label for="project_name" >Driver Name</label>
                                        <input type="text" class="form-control  @error('driver_name') is-invalid @enderror" id="driver_name" name="driver_name"  value="{{$driver->name}}" placeholder="Driver Name">
                                            @error('driver_name')
                                            <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                    </div>
                                    <div class="form-group col-lg-4">
                                        <label for="project_url" >Driver License</label>
                                        <input type="text" class="form-control  @error('driver_license') is-invalid @enderror" id="driver_license" name="driver_license"  value="{{$driver->driver_license}}" placeholder="Driver License">
                                        @error('driver_license')
                                            <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-lg-4">
                                        <label for="project_url" >Email</label>
                                        <input type="email" class="form-control  @error('email') is-invalid @enderror" id="driver_license"  value="{{$driver->email}}" name="email"placeholder="Email">
                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-group col-lg-4">
                                        <label for="project_url" >Phone</label>
                                        <input type="text" class="form-control  @error('phone_number') is-invalid @enderror" id="phone_number" name="phone_number"  value="{{$driver->phone}}" placeholder="Phone Number">
                                        @error('phone_number')
                                            <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-group col-lg-4">
                                        <label for="category_id">Vendor</label>
                                            <select class="form-control select2" id="supplier" data-placeholder="Select Vendor" name ="supplier" style="width: 100%;">
                                                @if(count($suppliers) > 0)
                                                @foreach($suppliers as $supplier)
                                                <option value="{{$supplier->id}}"  @if($driver->vendor == $supplier->id) selected @endif>{{$supplier->supplier_name}}</option>
                                                @endforeach
                                                @endif
                                            </select> 
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-lg-4">
                                        <label for="category_id">Vehicle Type</label>
                                            <select class="form-control select2" id="supplier" data-placeholder="Select Vendor" name ="vehicle" style="width: 100%;">
                                                @if(count($vehicle_type) > 0)
                                                @foreach($vehicle_type as $vehicle)
                                                <option value="{{$vehicle->id}}" @if($driver->vehicle_type == $vehicle->id) selected @endif>{{$vehicle->vehicle_type}}</option>
                                                @endforeach
                                                @endif
                                            </select> 
                                    </div>
                                    <div class="form-group col-lg-4">
                                        <label for="project_url" >Street Address</label>
                                        <input type="text" class="form-control  @error('address') is-invalid @enderror" value="{{$driver->address}}" id="address" name="address" placeholder="Address">
                                        @error('address')
                                            <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-group col-lg-4">
                                        <label for="project_url" >Street Address 2</label>
                                        <input type="text" class="form-control  @error('address') is-invalid @enderror" value="{{$driver->address_2}}" id="address" name="address_2" placeholder="Address 2">
                                        @error('address_2')
                                            <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                   
                                   
                                </div>
                                <div class="row">
                                <div class="form-group col-lg-4">
                                        <label for="project_url" >City</label>
                                        <input type="text" class="form-control  @error('city') is-invalid @enderror" id="city" name="city"  value="{{$driver->city}}" placeholder="City">
                                        @error('city')
                                            <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                <div class="form-group col-lg-4">
                                        <label for="project_url" >State</label>
                                        <input type="text" class="form-control  @error('state') is-invalid @enderror" id="state"  value="{{$driver->state}}" name="state" placeholder="State">
                                        @error('state')
                                            <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    
                                    <div class="form-group col-lg-4">
                                        <label for="project_url" >Zip Code</label>
                                        <input type="text" class="form-control  @error('zip') is-invalid @enderror"  value="{{$driver->zip}}" id="zip" name="zip" placeholder="Zip Code">
                                        @error('zip')
                                            <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-group col-lg-4">
                                        <label for="category_id">Country</label>
                                            <select class="form-control select2" id="country" data-placeholder="Select Country" name ="country" style="width: 100%;">
                                                @if(count($countries) > 0)
                                                @foreach($countries as $country)
                                                <option value="{{$country->id}}" @if($country->id == $driver->country) selected @endif>{{$country->name}}</option>
                                                @endforeach
                                                @endif
                                            </select> 
                                    </div>
                                </div>
                                
                                    <div class="ln_solid"></div>
                                    <div class="item form-group">
                                        <div class="col-md-6 col-sm-6 ">
                                            <a class="btn btn-primary" href="{{route('admin.driver')}}">Back</a>
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

    <script>
$(function () {
  /* CFetching image instantly */
  function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function (e) {
                $('#profile-img-tag').attr('src', e.target.result);
                $('#last_fetch_image').hide();
            }
            reader.readAsDataURL(input.files[0]);
        }
    }
    $("#customFile").change(function(){
        readURL(this);
    });
   
});
</script>

@endsection