@extends('layouts.master')

    @section('title' , 'Admin|Users')

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
                                <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" method="post" action="{{route('admin.fleet.save')}}" enctype="multipart/form-data">
                                    @csrf
                                    
                                    
                                <h6>Details</h6>
                                <hr>    
                                <div class="row">
                                    <div class="form-group col-lg-4">
                                        <label for="project_name" >Internal Id</label>
                                        <input type="text" class="form-control  @error('internal_id') is-invalid @enderror" id="internal_id" readonly="" value="@if(count($fleets) > 0) {{count($fleets)+1}} @else {{1}} @endif" name="internal_id" placeholder="Internal Id" autofocus>
                                        @error('internal_id')
                                            <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-group col-lg-4">
                                        <label for="project_name" >Plate Number</label>
                                        <input type="text" value="{{old('plate_number')}}" class="form-control  @error('plate_number') is-invalid @enderror" id="plate_number" name="plate_number" value="" placeholder="Plate Number">
                                            @error('plate_number')
                                            <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                    </div>
                                    <div class="form-group col-lg-4">
                                        <label for="project_url" >VIN Number</label>
                                        <input type="text" value="{{old('vin_number')}}" class="form-control  @error('vin_number') is-invalid @enderror" id="vin_number" name="vin_number" value="" placeholder="VIN Number">
                                        @error('vin_number')
                                            <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-lg-4">
                                        <label for="project_url" >Make</label>
                                        <input type="text" value="{{old('vehicle_make')}}" class="form-control  @error('vehicle_make') is-invalid @enderror" id="vehicle_make" name="vehicle_make" value="" placeholder="Vehicle Make">
                                        @error('vehicle_make')
                                            <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-group col-lg-4">
                                        <label for="project_url" >Model</label>
                                        <input type="text" value="{{old('vehicle_model')}}" class="form-control  @error('vehicle_model') is-invalid @enderror" id="vehicle_model" name="vehicle_model" value="" placeholder="Vehicle Model">
                                        @error('vehicle_model')
                                            <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-group col-lg-4">
                                        <label for="project_url" >Year</label>
                                        <!-- <input type="text" class="form-control  @error('vehicle_year') is-invalid @enderror" id="vehicle_year" name="vehicle_year" value="" placeholder="Vehicle Year" > -->
                                        <!-- <input id="birthday" name="vehicle_year"  require="required" class="date-picker form-control @error('vehicle_year') is-invalid @enderror" placeholder="dd-mm-yyyy" type="text"  type="text" onfocus="this.type='date'" onmouseover="this.type='date'" onclick="this.type='date'" onblur="this.type='text'" onmouseout="timeFunctionLong(this)"> -->
										    <select class="form-control select2" id="vehicle_year" data-placeholder="Select Driver" name ="vehicle_year" style="width: 100%;">
                                                
                                                <option value="2023" >2023</option>
                                                <option value="2024" >2024</option>
                                                <option value="2025" >2025</option>
                                                <option value="2026" >2026</option>
                                                <option value="2027" >2027</option>
                                                <option value="2028" >2028</option>
                                                <option value="2029" >2029</option>
                                                <option value="2030" >2030</option>
                                                <option value="2031" >2031</option>
                                                <option value="2032" >2032</option>
                                                <option value="2033" >2033</option>

                                                
                                            </select> 
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-lg-4">
                                        <label for="category_id">Driver Assigned</label>
                                            <select class="form-control select2" id="assigned_driver" data-placeholder="Select Driver" name ="assigned_driver" style="width: 100%;">
                                                @if(count($drivers) > 0)
                                                @foreach($drivers as $driver)
                                                <option value="{{$driver->id}}" >{{$driver->name}}</option>
                                                @endforeach
                                                @endif
                                            </select> 
                                    </div>
                                    <div class="form-group col-lg-4">
                                        <label for="category_id">Fleet</label>
                                            <select class="form-control select2" id="fleet_type" data-placeholder="Select Fleet" name ="fleet_type" style="width: 100%;">
                                                @if(count($fleetTypes) > 0)
                                                @foreach($fleetTypes as $fleetType)
                                                <option value="{{$fleetType->id}}" >{{$fleetType->fleet_type}}</option>
                                                @endforeach
                                                @endif
                                            </select> 
                                    </div>
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
                                    <div class="form-group col-lg-4" >
                                        <img src="" id="profile-img-tag" width="100px" style="margin-top: 29px;!important"/>
                                    </div>
                                </div>
                                <hr>
                                <h6>Model Information</h6>
                                <div class="row">
                                    <div class="form-group col-lg-6">
                                        <label for="project_url" >0 To 100 KPH</label>
                                        <input type="text" value="{{old('kph')}}" class="form-control  @error('kph') is-invalid @enderror" id="kph" name="kph" value="" placeholder="0 To 100 KPH">
                                        @error('kph')
                                            <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-group col-lg-6">
                                        <label for="project_url" >Body</label>
                                        <input type="text" value="{{old('body_type')}}" class="form-control  @error('body_type') is-invalid @enderror" id="body_type" name="body_type" value="" placeholder="Vehicle Body Type" >
                                        @error('body_type')
                                            <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    
                                </div>
                                <div class="row">
                                <div class="form-group col-lg-6">
                                        <label for="project_url" >Doors</label>
                                        <input type="text" value="{{old('doors')}}" class="form-control  @error('doors') is-invalid @enderror" id="doors" name="doors" value="" placeholder="Number Of Doors">
                                        @error('doors')
                                            <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-group col-lg-6">
                                        <label for="project_url" >Drive</label>
                                        <input type="text" value="{{old('driver_type')}}" class="form-control  @error('driver_type') is-invalid @enderror" id="driver_type" name="driver_type" placeholder="Vehicle Driver Type">
                                        @error('driver_type')
                                            <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                   
                                </div>
                                <div class="row">
                                <div class="form-group col-lg-6">
                                        <label for="project_url" >Length (mm)</label>
                                        <input type="text" value="{{old('vehicle_length')}}" class="form-control  @error('vehicle_length') is-invalid @enderror" id="vehicle_length" name="vehicle_length" placeholder="Vehicle Length (mm)">
                                        @error('vehicle_length')
                                            <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-group col-lg-6">
                                        <label for="project_url" >Seats</label>
                                        <input type="text" value="{{old('seats')}}" class="form-control  @error('seats') is-invalid @enderror" id="seats" name="seats" placeholder="Number Of Seats">
                                        @error('seats')
                                            <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-lg-6">
                                        <label for="project_url" >Top Speed (kph)</label>
                                        <input type="text" value="{{old('top_speed')}}" class="form-control  @error('top_speed') is-invalid @enderror" id="top_speed" name="top_speed" placeholder="Vehicle Top Speed (kph)">
                                        @error('top_speed')
                                            <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-group col-lg-6">
                                        <label for="project_url" >Transmission Type</label>
                                        <input type="text" value="{{old('transmission_type')}}" class="form-control  @error('transmission_type') is-invalid @enderror" id="transmission_type" name="transmission_type" value="" placeholder="Vehicle Transmission Type">
                                        @error('transmission_type')
                                            <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <hr>
                                <h6>Engine Information</h6>
                                <div class="row">
                                    <div class="form-group col-lg-6">
                                        <label for="project_url" >Engine Bore (mm)</label>
                                        <input type="text" value="{{old('engine_bore')}}" class="form-control  @error('engine_bore') is-invalid @enderror" id="engine_bore" name="engine_bore" placeholder="Engine Bore (mm)">
                                        @error('engine_bore')
                                            <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-group col-lg-6">
                                        <label for="project_url" >CC</label>
                                        <input type="text" value="{{old('cc')}}" class="form-control  @error('cc') is-invalid @enderror" id="cc" name="cc" placeholder="Engine CC">
                                        @error('cc')
                                            <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-lg-6">
                                        <label for="project_url" >Compression</label>
                                        <input type="text" value="{{old('compression')}}" class="form-control  @error('compression') is-invalid @enderror" id="compression" name="compression" placeholder="Engine Compression">
                                        @error('compression')
                                            <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-group col-lg-6">
                                        <label for="project_url" >Cylinders</label>
                                        <input type="text" value="{{old('cylinders')}}" class="form-control  @error('cylinders') is-invalid @enderror" id="cylinders" name="cylinders" value="" placeholder="Number Of Cylinders">
                                        @error('cylinders')
                                            <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-lg-6">
                                        <label for="project_url" >Position</label>
                                        <input type="text" value="{{old('position')}}" class="form-control  @error('position') is-invalid @enderror" id="position" name="position" placeholder="Engine Position">
                                        @error('position')
                                            <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-group col-lg-6">
                                        <label for="project_url" >Power (ps)</label>
                                        <input type="text" value="{{old('power_ps')}}" class="form-control  @error('power_ps') is-invalid @enderror" id="power_ps" name="power_ps" placeholder="Engine Power (ps)">
                                        @error('power_ps')
                                            <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-lg-6">
                                        <label for="project_url" >Power (rpm)</label>
                                        <input type="text" value="{{old('power_rpm')}}" class="form-control  @error('power_rpm') is-invalid @enderror" id="power_rpm" name="power_rpm" placeholder="Power rpm">
                                        @error('power_rpm')
                                            <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-group col-lg-6">
                                        <label for="project_url" >Stroke (mm)</label>
                                        <input type="text" value="{{old('stroke')}}" class="form-control  @error('stroke') is-invalid @enderror" id="stroke" name="stroke" placeholder="Stroke Length (mm)">
                                        @error('stroke')
                                            <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-lg-6">
                                        <label for="project_url" >Torque nm</label>
                                        <input type="text" value="{{old('torque_nm')}}" class="form-control  @error('torque_nm') is-invalid @enderror" id="torque_nm" name="torque_nm" placeholder="Engine Torque nm">
                                        @error('torque_nm')
                                            <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-group col-lg-6">
                                        <label for="project_url" >Torque rpm</label>
                                        <input type="text" value="{{old('torque_rpm')}}" class="form-control  @error('torque_rpm') is-invalid @enderror" id="torque_rpm" name="torque_rpm" placeholder="Engine Torque rpm">
                                        @error('torque_rpm')
                                            <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-lg-6">
                                        <label for="project_url" >Valves per Cylinder</label>
                                        <input type="text" value="{{old('valves')}}" class="form-control  @error('valves') is-invalid @enderror" id="valves" name="valves" placeholder="Valves per Cylinder">
                                        @error('valves')
                                            <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    
                                </div>
                                <hr>
                                <h6>Fuel Information</h6>
                                <hr>
                                <div class="row">
                                    <div class="form-group col-lg-6">
                                        <label for="project_url" >Fuel</label>
                                        <input type="text" value="{{old('fuel')}}" class="form-control  @error('fuel') is-invalid @enderror" id="fuel" name="fuel" placeholder="Fuel Type">
                                        @error('fuel')
                                            <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-group col-lg-6">
                                        <label for="project_url" >Fuel Cap (L)</label>
                                        <input type="text" value="{{old('fuel_cap')}}" class="form-control  @error('fuel_cap') is-invalid @enderror" id="fuel_cap" name="fuel_cap" placeholder="Fuel Cap Volume (L)">
                                        @error('fuel_cap')
                                            <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-lg-6">
                                        <label for="project_url" >Liters Per km City</label>
                                        <input type="text" value="{{old('liter_per_km_city')}}" class="form-control  @error('liter_per_km_city') is-invalid @enderror" id="liter_per_km_city" name="liter_per_km_city" placeholder="Liters Per km City">
                                        @error('liter_per_km_city')
                                            <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-group col-lg-6">
                                        <label for="project_url" >Liters Per km Highway</label>
                                        <input type="text" value="{{old('liter_per_km_highway')}}" class="form-control  @error('liter_per_km_highway') is-invalid @enderror" id="liter_per_km_highway" name="liter_per_km_highway" placeholder="Liters Per km Highway">
                                        @error('liter_per_km_highway')
                                            <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-lg-6">
                                        <label for="project_url" >Liters Per km Mixed</label>
                                        <input type="text" value="{{old('liter_per_km_mixed')}}" class="form-control  @error('liter_per_km_mixed') is-invalid @enderror" id="liter_per_km_mixed" name="liter_per_km_mixed" placeholder="Liters Per km Mixed">
                                        @error('liter_per_km_mixed')
                                            <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                    <div class="ln_solid"></div>
                                    <div class="item form-group">
                                        <div class="col-md-6 col-sm-6 ">
                                            <a class="btn btn-primary" href="{{route('admin.fleet')}}">Back</a>
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
    <script src="{{ asset('assets/js/custom.min.js')}}"></script>

<script>
$(function () {
    var alphanumericCode = generateAlphanumericCode(8); // Change 8 to the desired code length
        //alert(alphanumericCode);
        $('#internal_id').val(alphanumericCode);



        function generateAlphanumericCode(length) {
        var charset = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789";
        var code = "";
        for (var i = 0; i < length; i++) {
            var randomIndex = Math.floor(Math.random() * charset.length);
            code += charset[randomIndex];
        }
        return code;
    }
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