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
                                <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" method="post" action="{{route('admin.fleet.update')}}" enctype="multipart/form-data">
                                    @csrf
                                    
                                    <input type="hidden" name="id" value="{{$fleet->id}}">
                                <h6>Edit Details</h6>
                                <hr>    
                                <div class="row">
                                    <div class="form-group col-lg-4">
                                        <label for="project_name" >Internal Id</label>
                                        <input type="text" class="form-control  @error('internal_id') is-invalid @enderror" readonly value="{{$fleet->internal_id}}" id="internal_id" name="internal_id" placeholder="Internal Id" autofocus>
                                        @error('internal_id')
                                            <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-group col-lg-4">
                                        <label for="project_name" >Plate Number</label>
                                        <input type="text" class="form-control  @error('plate_number') is-invalid @enderror" value="{{$fleet->plate_number}}"  id="plate_number" name="plate_number" value="" placeholder="Plate Number">
                                            @error('plate_number')
                                            <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                    </div>
                                    <div class="form-group col-lg-4">
                                        <label for="project_url" >VIN Number</label>
                                        <input type="text" class="form-control  @error('vin_number') is-invalid @enderror" value="{{$fleet->vin_number}}"  id="vin_number" name="vin_number" value="" placeholder="VIN Number">
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
                                        <input type="text" class="form-control  @error('vehicle_make') is-invalid @enderror" value="{{$fleet->vehicle_make}}"  id="vehicle_make" name="vehicle_make" value="" placeholder="Vehicle Make">
                                        @error('vehicle_make')
                                            <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-group col-lg-4">
                                        <label for="project_url" >Model</label>
                                        <input type="text" class="form-control  @error('vehicle_model') is-invalid @enderror" value="{{$fleet->vehicle_model}}"  id="vehicle_model" name="vehicle_model" value="" placeholder="Vehicle Model">
                                        @error('vehicle_model')
                                            <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-group col-lg-4">
                                        <label for="project_url" >Year</label>
                                        <!-- <input type="text" class="form-control  @error('vehicle_year') is-invalid @enderror" id="vehicle_year" name="vehicle_year" value="" placeholder="Vehicle Year" > -->
                                        <input id="birthday" name="vehicle_year"  require="required" value="{{$fleet->year}}"  class="date-picker form-control @error('vehicle_year') is-invalid @enderror" placeholder="dd-mm-yyyy" type="text"  type="text" onfocus="this.type='date'" onmouseover="this.type='date'" onclick="this.type='date'" onblur="this.type='text'" onmouseout="timeFunctionLong(this)">
												<script>
													function timeFunctionLong(input) {
														setTimeout(function() {
															input.type = 'text';
														}, 60000);
													}
												</script>
                                        @error('vehicle_year')
                                            <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-lg-4">
                                        <label for="category_id">Driver Assigned</label>
                                            <select class="form-control select2" id="assigned_driver"  data-placeholder="Select Driver" name ="assigned_driver" style="width: 100%;">
                                                @if(count($drivers) > 0)
                                                    @foreach($drivers as $driver)
                                                    <option value="{{$driver->id}}" @if($driver->id == $fleet->driver_assigned) selected @endif>{{$driver->name}}</option>
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
                                    <div class="form-group col-lg-4" id="last_fetch_image">
                                    <img src="{{ asset('fleet/'.$fleet->vehicle_image) }}" alt="Not Uploaded" id="original" width="100px" style="margin-top: 29px;!important"/>
                                    </div>
                                    <div class="form-group col-lg-4" id="new_fetch_image">
                                        <img src="" id="profile-img-tag" width="100px" style="margin-top: 29px;!important"/>
                                    </div>
                                </div>
                                <hr>
                                <h6>Model Information</h6>
                                <div class="row">
                                    <div class="form-group col-lg-6">
                                        <label for="project_url" >0 To 100 KPH</label>
                                        <input type="text" class="form-control  @error('kph') is-invalid @enderror" value="{{$fleet->kph}}"  id="kph" name="kph" value="" placeholder="0 To 100 KPH">
                                        @error('kph')
                                            <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-group col-lg-6">
                                        <label for="project_url" >Body</label>
                                        <input type="text" class="form-control  @error('body_type') is-invalid @enderror" value="{{$fleet->body_type}}"  id="body_type" name="body_type" value="" placeholder="Vehicle Body Type" >
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
                                        <input type="text" class="form-control  @error('doors') is-invalid @enderror" id="doors" value="{{$fleet->door}}"  name="doors" value="" placeholder="Number Of Doors">
                                        @error('doors')
                                            <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-group col-lg-6">
                                        <label for="project_url" >Drive</label>
                                        <input type="text" class="form-control  @error('driver_type') is-invalid @enderror" id="driver_type" value="{{$fleet->driver_type}}"  name="driver_type" placeholder="Vehicle Driver Type">
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
                                        <input type="text" class="form-control  @error('vehicle_length') is-invalid @enderror" id="vehicle_length" value="{{$fleet->length}}"  name="vehicle_length" placeholder="Vehicle Length (mm)">
                                        @error('vehicle_length')
                                            <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-group col-lg-6">
                                        <label for="project_url" >Seats</label>
                                        <input type="text" class="form-control  @error('seats') is-invalid @enderror" id="seats" name="seats" value="{{$fleet->seat}}"  placeholder="Number Of Seats">
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
                                        <input type="text" class="form-control  @error('top_speed') is-invalid @enderror" id="top_speed" name="top_speed" value="{{$fleet->speed}}"  placeholder="Vehicle Top Speed (kph)">
                                        @error('top_speed')
                                            <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-group col-lg-6">
                                        <label for="project_url" >Transmission Type</label>
                                        <input type="text" class="form-control  @error('transmission_type') is-invalid @enderror" id="transmission_type" value="{{$fleet->transmission_type}}"  name="transmission_type" value="" placeholder="Vehicle Transmission Type">
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
                                        <input type="text" class="form-control  @error('engine_bore') is-invalid @enderror" id="engine_bore" value="{{$fleet->engine_bore}}"  name="engine_bore" placeholder="Engine Bore (mm)">
                                        @error('engine_bore')
                                            <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-group col-lg-6">
                                        <label for="project_url" >CC</label>
                                        <input type="text" class="form-control  @error('cc') is-invalid @enderror" id="cc" name="cc" value="{{$fleet->engine_cc}}"  placeholder="Engine CC">
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
                                        <input type="text" class="form-control  @error('compression') is-invalid @enderror" id="compression" name="compression" value="{{$fleet->compression}}"  placeholder="Engine Compression">
                                        @error('compression')
                                            <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-group col-lg-6">
                                        <label for="project_url" >Cylinders</label>
                                        <input type="text" class="form-control  @error('cylinders') is-invalid @enderror" id="cylinders" name="cylinders" value="{{$fleet->cylinder}}"  placeholder="Number Of Cylinders">
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
                                        <input type="text" class="form-control  @error('position') is-invalid @enderror" id="position" name="position" value="{{$fleet->position}}"  placeholder="Engine Position">
                                        @error('position')
                                            <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-group col-lg-6">
                                        <label for="project_url" >Power (ps)</label>
                                        <input type="text" class="form-control  @error('power_ps') is-invalid @enderror" id="power_ps" name="power_ps" value="{{$fleet->power_ps}}"  placeholder="Engine Power (ps)">
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
                                        <input type="text" class="form-control  @error('power_rpm') is-invalid @enderror" id="power_rpm" name="power_rpm" value="{{$fleet->power_rpm}}" placeholder="Power rpm">
                                        @error('power_rpm')
                                            <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-group col-lg-6">
                                        <label for="project_url" >Stroke (mm)</label>
                                        <input type="text" class="form-control  @error('stroke') is-invalid @enderror" id="stroke" name="stroke" value="{{$fleet->stroke}}" placeholder="Stroke Length (mm)">
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
                                        <input type="text" class="form-control  @error('torque_nm') is-invalid @enderror" id="torque_nm" name="torque_nm" value="{{$fleet->torque_nm}}" placeholder="Engine Torque nm">
                                        @error('torque_nm')
                                            <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-group col-lg-6">
                                        <label for="project_url" >Torque rpm</label>
                                        <input type="text" class="form-control  @error('torque_rpm') is-invalid @enderror" id="torque_rpm" name="torque_rpm" value="{{$fleet->torque_rpm}}" placeholder="Engine Torque rpm">
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
                                        <input type="text" class="form-control  @error('valves') is-invalid @enderror" id="valves" name="valves" value="{{$fleet->valve_per_cylinder}}" placeholder="Valves per Cylinder">
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
                                        <input type="text" class="form-control  @error('fuel') is-invalid @enderror" id="fuel" name="fuel" value="{{$fleet->fuel_type}}" placeholder="Fuel Type">
                                        @error('fuel')
                                            <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-group col-lg-6">
                                        <label for="project_url" >Fuel Cap (L)</label>
                                        <input type="text" class="form-control  @error('fuel_cap') is-invalid @enderror" id="fuel_cap" name="fuel_cap" value="{{$fleet->fuel_cap}}" placeholder="Fuel Cap Volume (L)">
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
                                        <input type="text" class="form-control  @error('liter_per_km_city') is-invalid @enderror" id="liter_per_km_city" value="{{$fleet->liter_per_km_city}}" name="liter_per_km_city" placeholder="Liters Per km City">
                                        @error('liter_per_km_city')
                                            <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-group col-lg-6">
                                        <label for="project_url" >Liters Per km Highway</label>
                                        <input type="text" class="form-control  @error('liter_per_km_highway') is-invalid @enderror" id="liter_per_km_highway" value="{{$fleet->liter_per_km_highway}}" name="liter_per_km_highway" placeholder="Liters Per km Highway">
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
                                        <input type="text" class="form-control  @error('liter_per_km_mixed') is-invalid @enderror" id="liter_per_km_mixed" name="liter_per_km_mixed" value="{{$fleet->liter_per_km_mixed}}" placeholder="Liters Per km Mixed">
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
                                            <a class="btn btn-primary" href="{{route('admin-area')}}">Back</a>
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