@extends('layouts.master')

    @section('title' , 'Admin|Fuel Station Create')

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
                                <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" method="post" action="{{route('admin.fuel.save')}}" enctype="multipart/form-data">
                                    @csrf
                                    
                                    
                                <h6>Fuel Station Details</h6>
                                <hr>    
                                <div class="row">
                                    <div class="form-group col-lg-6">
                                        <label for="project_name" >Fuel Station</label>
                                        <input type="text" class="form-control  @error('fuel_station') is-invalid @enderror" id="fuel_station" name="fuel_station" placeholder="Fuel Station" autofocus>
                                        @error('fuel_station')
                                            <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-group col-lg-6">
                                        <label for="project_name" >Fuel Type</label>
                                        <input type="text" class="form-control  @error('fuel_type') is-invalid @enderror" id="fuel_type" name="fuel_type" placeholder="Fuel Type">
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
                                        <input type="text" class="form-control  @error('fuel_price') is-invalid @enderror" id="fuel_price" name="fuel_price" placeholder="Fuel Price Per Liter">
                                        @error('fuel_price')
                                            <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                <div class="form-group col-lg-6">
                                        <label for="project_name" >Contact Number</label>
                                        <input type="number" class="form-control  @error('cnumber') is-invalid @enderror" id="cnumber" name="cnumber" placeholder="Contact Number">
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
                                        <input type="text" class="form-control  @error('address') is-invalid @enderror" id="address" name="address" placeholder="Address">
                                        @error('address')
                                            <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                <div class="form-group col-lg-6">
                                        <label for="project_name" >Deposit Kept</label>
                                        <input type="number" class="form-control  @error('deposit') is-invalid @enderror" id="deposit" name="deposit" placeholder="Deposit Kept">
                                        @error('deposit')
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
                                            <button type="submit" class="btn btn-success">Create</button>
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