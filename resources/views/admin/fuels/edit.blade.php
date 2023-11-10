@extends('layouts.master')

    @section('title' , 'Admin|Fuel Station Edit')

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
                                <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" method="post" action="{{route('admin.fuel.update')}}" enctype="multipart/form-data">
                                    @csrf
                                    
                                    
                                <h6>Fuel Station Details</h6>
                                <hr>    
                                <input type="hidden" name="id" value="{{$fuel->id}}">
                                <div class="row">
                                    <div class="form-group col-lg-6">
                                        <label for="project_name" >Fuel Station</label>
                                        <input type="text" class="form-control  @error('fuel_station') is-invalid @enderror" id="fuel_station" name="fuel_station" value="{{$fuel->fuel_station}}" placeholder="Fuel Station" autofocus>
                                        @error('fuel_station')
                                            <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-group col-lg-6">
                                        <label for="project_name" >Fuel Type</label>
                                        <input type="text" class="form-control  @error('fuel_type') is-invalid @enderror" id="fuel_type" name="fuel_type" placeholder="Fuel Type" value="{{$fuel->fuel_type}}" >
                                        @error('fuel_type')
                                            <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row">
                                <div class="form-group col-lg-6">
                                        <label for="project_name" >Fuel Price Per Liter</label>
                                        <input type="text" class="form-control  @error('fuel_price') is-invalid @enderror" id="fuel_price" name="fuel_price" placeholder="Fuel Price Per Liter" value="{{$fuel->fuel_price}}" >
                                        @error('fuel_price')
                                            <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                <div class="form-group col-lg-6">
                                        <label for="project_name" >Contact Number</label>
                                        <input type="text" class="form-control  @error('cnumber') is-invalid @enderror" id="cnumber" name="cnumber" placeholder="Contact Number" value="{{$fuel->contact_number}}" >
                                        @error('cnumber')
                                            <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-lg-6">
                                        <label for="project_name" >Address</label>
                                        <input type="text" class="form-control  @error('address') is-invalid @enderror" id="address" name="address" placeholder="Address" value="{{$fuel->address}}" >
                                        @error('address')
                                            <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-group col-lg-6">
                                        <label for="project_name" >Address 2</label>
                                        <input type="text" class="form-control  @error('address') is-invalid @enderror" id="address_2" name="address_2" placeholder="Address 2" value="{{$fuel->address_2}}" >
                                        @error('address_2')
                                            <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                
                                </div>
                                <div class="row">
                                <div class="form-group col-lg-6">
                                        <label for="project_name" >Deposit Kept</label>
                                        <input type="number" class="form-control  @error('deposit') is-invalid @enderror" id="deposit" name="deposit" placeholder="Deposit Kept" value="{{$fuel->deposit_kept}}" >
                                        @error('deposit')
                                            <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-group col-lg-6">
                                        <label for="project_url" >City</label>
                                        <input type="text" class="form-control  @error('city') is-invalid @enderror" id="city" name="city" placeholder="City" value="{{$fuel->city}}" >
                                        @error('city')
                                            <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-group col-lg-6">
                                        <label for="project_url" >State</label>
                                        <input type="text" class="form-control  @error('state') is-invalid @enderror" id="state" name="state" placeholder="State" value="{{$fuel->state}}" >
                                        @error('state')
                                            <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-group col-lg-6">
                                        <label for="category_id">Country</label>
                                            <select class="form-control select2" id="country" data-placeholder="Select Country" name ="country" style="width: 100%;" >
                                                @if(count($countries) > 0)
                                                @foreach($countries as $country)
                                                <option value="{{$country->id}}" @if($fuel->country == $country->id) selected @endif>{{$country->name}}</option>
                                                @endforeach
                                                @endif
                                            </select> 
                                    </div>
                                    <div class="form-group col-lg-6">
                                        <label for="project_url" >Zip Code</label>
                                        <input type="text" class="form-control  @error('zip') is-invalid @enderror" id="zip" name="zip" placeholder="Zip Code" value="{{$fuel->zip}}" >
                                        @error('zip')
                                            <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                
                                    <div class="ln_solid"></div>
                                    <div class="item form-group">
                                        <div class="col-md-6 col-sm-6 ">
                                            <a class="btn btn-primary" href="{{route('admin.fuel')}}">Back</a>
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