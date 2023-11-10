@extends('layouts.master')

    @section('title' , 'Admin|Service Rate Create')

@section('main-content')

<style>
    .switch {
  position: relative;
  display: inline-block;
  width: 60px;
  height: 34px;
}

.switch input { 
  opacity: 0;
  width: 0;
  height: 0;
}

.slider {
  position: absolute;
  cursor: pointer;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  background-color: #ccc;
  -webkit-transition: .4s;
  transition: .4s;
}

.slider:before {
  position: absolute;
  content: "";
  height: 26px;
  width: 26px;
  left: 4px;
  bottom: 4px;
  background-color: white;
  -webkit-transition: .4s;
  transition: .4s;
}

input:checked + .slider {
  background-color: #2196F3;
}

input:focus + .slider {
  box-shadow: 0 0 1px #2196F3;
}

input:checked + .slider:before {
  -webkit-transform: translateX(26px);
  -ms-transform: translateX(26px);
  transform: translateX(26px);
}

/* Rounded sliders */
.slider.round {
  border-radius: 34px;
}

.slider.round:before {
  border-radius: 50%;
}
</style> 

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
                                <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" method="post" action="{{route('admin.service.store')}}" enctype="multipart/form-data">
                                    @csrf
                                    
                                    
                                <h6>New Service Rate</h6>
                                <hr>    
                                <div class="row">
                                    <div class="form-group col-lg-6">
                                        <label for="project_name" >Service Name</label>
                                        <input type="text" class="form-control  @error('service_name') is-invalid @enderror" id="service_name" name="service_name" placeholder="Service Name" autofocus>
                                        @error('service_name')
                                            <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-group col-lg-6">
                                        <label for="project_name" >Service Order Type</label>
                                        <input type="text" class="form-control  @error('service_order_type') is-invalid @enderror" id="service_order_type" name="service_order_type" placeholder="Service Order Type" autofocus>
                                        @error('service_order_type')
                                            <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-lg-6">
                                        <label for="project_name" >Base Fee</label>
                                        <input type="text" value="0.00" class="form-control  @error('base_fee') is-invalid @enderror" id="base_fee" name="base_fee" placeholder="Base Fee" autofocus>
                                        @error('base_fee')
                                            <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-group col-lg-6">
                                        <label for="project_name" >Rate Calculation Method</label>
                                        <input type="text" class="form-control  @error('rate_calculation_method') is-invalid @enderror" id="rate_calculation_method" name="rate_calculation_method" placeholder="Rate Calculation Method" autofocus>
                                        @error('rate_calculation_method')
                                            <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-lg-12">
                                        <label for="project_name" >Duration Terms</label>
                                        <input type="text" class="form-control  @error('duration_terms') is-invalid @enderror" id="duration_terms" name="duration_terms" placeholder="Duration Terms" autofocus>
                                        @error('duration_terms')
                                            <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                   
                                </div>
                                <hr>
                                <h6>Cash on Delivery</h6>
                                <div class="row">
                                    <div class="row mt-4">
                                        <div class="form-group col-lg-12">
                                            
                                            <label class="switch">
                                                <input type="checkbox" name="cod">
                                                <span class="slider round"></span>
                                            </label>
                                            <label for="project_name" class="">Enable additional fee `cash on delivery` orders?</label> 
                                        </div>
                                    
                                    </div>
                                </div>
                                <hr>
                                <h6>Peak Hours</h6>
                                <div class="row">
                                    <div class="row mt-4">
                                        <div class="form-group col-lg-12">
                                            
                                            <label class="switch">
                                                <input type="checkbox" name="peak_hours">
                                                <span class="slider round"></span>
                                            </label>
                                            <label for="project_name" class="">Enable additional fee for order made during service defined `peak hours`?</label>
                                        </div>
                                    
                                    </div>
                                </div>
                                <h6>Restrict Service</h6>
                                <div class="row">
                                    <div class="form-group col-lg-6">
                                        <label for="project_name" >Service Area</label>
                                        <input type="text" class="form-control  @error('service_area') is-invalid @enderror" id="service_area" name="service_area" placeholder="Restrict to service area" autofocus>
                                        @error('service_area')
                                            <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                               
                                
                                    <div class="ln_solid"></div>
                                    <div class="item form-group">
                                        <div class="col-md-6 col-sm-6 ">
                                            <a class="btn btn-primary" href="{{route('admin.service.rate')}}">Back</a>
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
    var test = document.getElementById("base_fee");
    var text= "$"+test.value;
    document.getElementById("base_fee").value = text;
    ///document.write();
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