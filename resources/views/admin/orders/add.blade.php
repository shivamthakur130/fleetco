@extends('layouts.master')

    @section('title' , 'Admin|Customer Create')

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
                                <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" method="post" action="{{route('admin.customer.save')}}" enctype="multipart/form-data">
                                    @csrf
                                    
                                    
                                <h6>Order Details</h6>
                                <hr>    
                                
                                <div class="row">
                                    <div class="form-group col-lg-6">
                                        <label for="project_name" >Order Type</label>
                                        <input type="text" class="form-control  @error('order_type') is-invalid @enderror" id="order_type" name="order_type" placeholder="Order Type">
                                            @error('order_type')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                    </div>
                                    <div class="form-group col-lg-6">
                                        <label for="project_name" >Internal Id</label>
                                        <input type="text" class="form-control  @error('internal_id') is-invalid @enderror" id="internal_id" name="internal_id" placeholder="Internal Id">
                                            @error('internal_id')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                    </div>
                                   
                                </div>
                                <div class="row">
                                    <div class="form-group col-lg-6">
                                        <label for="project_name" >Schedule</label>
                                        <input type="datetime-local" class="form-control  @error('street_1') is-invalid @enderror" id="street_1" name="street_1" placeholder="Street 1">
                                            @error('street_1')
                                            <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                    </div>

                                    <div class="form-group col-lg-6">
                                        <label for="project_url" >Customer</label>
                                            <select class="form-control select2" id="customer" data-placeholder="Select customer" name ="customer" style="width: 100%;">
                                                @if(count($customers) > 0)
                                                    @foreach($customers as $customer)
                                                        <option value="{{$customer->id}}" >{{$customer->name}}</option>
                                                    @endforeach
                                                @endif
                                            </select> 
                                    </div>
                                   
                                </div>
                                <div class="row">
                                    <div class="form-group col-lg-6">
                                        <label for="project_name" >Facilitator</label>
                                            <select class="form-control select2" id="driver" data-placeholder="Select Driver" name ="driver" style="width: 100%;">
                                                @if(count($drivers) > 0)
                                                    @foreach($drivers as $driver)
                                                        <option value="{{$driver->id}}" >{{$driver->name}}</option>
                                                    @endforeach
                                                @endif
                                            </select> 
                                    </div>
                                    <div class="form-group col-lg-6">
                                        <label for="project_url" >Driver</label>
                                            <select class="form-control select2" id="driver" data-placeholder="Select Driver" name ="driver" style="width: 100%;">
                                                @if(count($drivers) > 0)
                                                    @foreach($drivers as $driver)
                                                        <option value="{{$driver->id}}" >{{$driver->name}}</option>
                                                    @endforeach
                                                @endif
                                            </select> 
                                    </div>
                                   
                                </div>
                                <div class="row mt-4">
                                    <div class="form-group col-lg-4">
                                        
                                        <label class="switch">
                                            <input type="checkbox" checked>
                                            <span class="slider round"></span>
                                        </label>
                                        <label for="project_name" class="">Ad-Hoc</label> <i class="fa fa-info-circle" title="Ad-Hoc"></i>
                                    </div>
                                   
                                </div>
                                <div class="row">
                                    <div class="form-group col-lg-4">
                                        
                                        <label class="switch">
                                            <input type="checkbox" checked>
                                            <span class="slider round"></span>
                                        </label>
                                        <label for="project_name" class="">Dispatch Immediately</label> <i class="fa fa-info-circle" title="Dispatch Immediately"></i>
                                    </div>
                                   
                                </div>
                                <div class="row">
                                    <div class="form-group col-lg-4">
                                        
                                        <label class="switch">
                                            <input type="checkbox" checked>
                                            <span class="slider round"></span>
                                        </label>
                                        <label for="project_name" class="">Require Proof of Delivery </label> <i class="fa fa-info-circle" title="Require Proof of Delivery"></i>
                                    </div>
                                   
                                </div>
                                <hr>
                                <h6>Route</h6>
                                <div class="row">
                                <div class="form-group col-lg-4">
                                        
                                        <label class="switch">
                                            <input type="checkbox" checked>
                                            <span class="slider round"></span>
                                        </label>
                                        <label for="project_name" class="">Multiple Dropoff's</label> 
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-lg-6">
                                        <label for="project_url" >Pickup</label>
                                        <select class="form-control select2" id="driver" data-placeholder="Select Driver" name ="driver" style="width: 100%;">
                                            <option value=""></option>
                                        </select> 
                                    </div>
                                    <div class="form-group col-lg-6">
                                        <label for="project_url" >Dropoff</label>
                                            <select class="form-control select2" id="driver" data-placeholder="Select Driver" name ="driver" style="width: 100%;">
                                                <option value=""></option>
                                            </select> 
                                    </div>
                                    <div class="form-group col-lg-6">
                                        <label for="project_url" >Return</label>
                                        <select class="form-control select2" id="driver" data-placeholder="Select Driver" name ="driver" style="width: 100%;">
                                            <option value=""></option>
                                        </select> 
                                    </div>
                                </div>
                                <hr>
                                <h6>Payload/Entities</h6>
                                <button class="btn btn-primary"><i class="fa fa-plus" > </i> Add Item to Order</button>
                                <hr>
                                <h6>Service</h6>
                                <div class="row">
                                    <div class="form-group col-lg-4">
                                        
                                        <label class="switch">
                                            <input type="checkbox" checked>
                                            <span class="slider round"></span>
                                        </label>
                                        <label for="project_name" class="">Apply service rate </label> <i class="fa fa-info-circle" title="Apply service rate"></i>
                                    </div>
                                   
                                </div>
                                <div class="row">
                                    <div class="form-group col-lg-12">
                                        <label for="project_name" >Notes</label>
                                        <textarea name="notes" class="form-control" id="" cols="10" rows="3">Enter order notes here....</textarea>
                                        
                                    </div>
                                </div>
                                
                                
                                    <div class="ln_solid"></div>
                                    <div class="item form-group">
                                        <div class="col-md-6 col-sm-6 ">
                                            <a class="btn btn-primary" href="{{route('admin.order')}}">Back</a>
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