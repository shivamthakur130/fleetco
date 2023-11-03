@extends('layouts.master')

    @section('title' , 'Admin|Order Edit')

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
                                <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" method="post" action="{{route('admin.order.update')}}" enctype="multipart/form-data">
                                    @csrf
                                <input type="hidden" name="id" value="{{$order->id}}">
                                    
                                <h6>Order Edit Details</h6>
                                <hr>    
                                
                                <div class="row">
                                    <div class="form-group col-lg-6">
                                        <label for="project_name" >Order Type</label>
                                        <input type="text" class="form-control  @error('order_type') is-invalid @enderror" id="order_type" name="order_type" value="{{$order->order_type}}" placeholder="Order Type">
                                            @error('order_type')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                    </div>
                                    <div class="form-group col-lg-6">
                                        <label for="project_name" >Internal Id</label>
                                        <input type="text" class="form-control  @error('internal_id') is-invalid @enderror" readonly id="internal_id" value="{{$order->internal_id}}" name="internal_id" placeholder="Internal Id">
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
                                        <input type="datetime-local" class="form-control  @error('sch') is-invalid @enderror" value="{{$order->schedule_date}}" id="sch" name="sch" placeholder="Schedule">
                                            @error('sch')
                                            <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                    </div>

                                    <div class="form-group col-lg-6">
                                        <label for="project_url" >Customer</label>
                                            <select class="form-control select2" id="" data-placeholder="Select customer" name ="customer" style="width: 100%;">
                                                @if(count($customers) > 0)
                                                    @foreach($customers as $customer)
                                                        <option value="{{$customer->id}}" @if($customer->id == $order->customer) selected @endif >{{$customer->name}}</option>
                                                    @endforeach
                                                @endif
                                            </select> 
                                    </div>
                                   
                                </div>
                                <div class="row">
                                    <div class="form-group col-lg-6">
                                        <label for="project_name" >Facilitator</label>
                                        <input type="text" class="form-control  @error('facilitator') is-invalid @enderror" readonly id="base_fee" name="facilitator" value="{{auth()->user()->name}}" placeholder="facilitator" autofocus>
                                            <!-- <select class="form-control select2" id="facilitator" data-placeholder="Select facilitator" name ="facilitator" style="width: 100%;">
                                                @if(count($companies) > 0)
                                                    @foreach($companies as $com)
                                                        <option value="{{$com->id}}" >{{$com->company_name}}</option>
                                                    @endforeach
                                                @endif
                                            </select>  -->
                                    </div>
                                    <div class="form-group col-lg-6">
                                        <label for="project_url" >Driver</label>
                                            <select class="form-control select2" id="driver" data-placeholder="Select Driver" name ="driver" style="width: 100%;">
                                                @if(count($drivers) > 0)
                                                    @foreach($drivers as $driver)
                                                        <option value="{{$driver->id}}" @if($driver->id == $order->driver_assign) selected @endif>{{$driver->name}}</option>
                                                    @endforeach
                                                @endif
                                            </select> 
                                    </div>
                                   
                                </div>
                                <div class="row mt-4">
                                    <div class="form-group col-lg-4">
                                        
                                        <label class="switch">
                                            <input type="checkbox" name="ad_hoc" @if($order->ad_hoc) checked @endif>
                                            <span class="slider round"></span>
                                        </label>
                                        <label for="project_name" class="">Ad-Hoc</label> <i class="fa fa-info-circle" title="Ad-Hoc"></i>
                                    </div>
                                   
                                </div>
                                <div class="row">
                                    <div class="form-group col-lg-4">
                                        
                                        <label class="switch">
                                            <input type="checkbox" name="dispatch" @if($order->dispatch_immediately) checked @endif>
                                            <span class="slider round"></span>
                                        </label>
                                        <label for="project_name" class="">Dispatch Immediately</label> <i class="fa fa-info-circle" title="Dispatch Immediately"></i>
                                    </div>
                                   
                                </div>
                                <div class="row">
                                    <div class="form-group col-lg-4">
                                        
                                        <label class="switch">
                                            <input type="checkbox" name="require_proof_of_delivery" @if($order->require_proof_of_delivery) checked @endif>
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
                                            <input type="checkbox" name="multiple_drop_off" id="multiple_drop_off" @if($order->multiple_drop_off) checked @endif>
                                            <span class="slider round"></span>
                                        </label>
                                        <label for="project_name" class="">Multiple Dropoff's</label> 
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-lg-4">
                                        <label for="project_url" >Pickup</label>
                                        <input type="text" class="form-control  @error('pickup1') is-invalid @enderror" id="pickup1" value="{{$order->pick1}}" name="pickup1" placeholder="Pickup" autofocus>
                                    </div>
                                    <div class="form-group col-lg-4">
                                        <label for="project_url" >Dropoff</label>
                                        <input type="text" class="form-control  @error('pickup1') is-invalid @enderror" id="Dropoff1" name="dropoff1" value="{{$order->drop1}}" placeholder="Dropoff" autofocus>
                                    </div>
                                    <div class="form-group col-lg-4">
                                        <label for="project_url" >Return</label>
                                        <input type="text" class="form-control  @error('return1') is-invalid @enderror" id="return1" name="return1" value="{{$order->return1}}" placeholder="Return" autofocus>
                                    </div>
                                </div>
                                <div class="row dropp2"  @if(!$order->multiple_drop_off) style="display:none;" @endif>
                                    <div class="form-group col-lg-4">
                                        <label for="project_url" >Pickup</label>
                                        <input type="text" class="form-control  @error('pickup1') is-invalid @enderror" id="pickup2" name="pickup2" value="{{$order->pick2}}" placeholder="Pickup" autofocus>
                                    </div>
                                    <div class="form-group col-lg-4">
                                        <label for="project_url" >Dropoff</label>
                                        <input type="text" class="form-control  @error('pickup1') is-invalid @enderror" id="dropoff2" name="dropoff2" value="{{$order->drop2}}" placeholder="Dropoff" autofocus>
                                    </div>
                                    <div class="form-group col-lg-4">
                                        <label for="project_url" >Return</label>
                                        <input type="text" class="form-control  @error('return1') is-invalid @enderror" id="return2" name="return2" value="{{$order->return2}}" placeholder="Return" autofocus>
                                    </div>
                                </div>
                                <hr>
                                <h6>Payload/Entities</h6>
                                <a href="javascript:void(0);" class="btn btn-primary" id="add"><i class="fa fa-plus" > </i> Add Item to Order</a>
                                <hr>
                                
                                <div id="items">
                                    <?php 
                                     $items = explode(".", $order->item);
                                
                                     
                                    ?>
                                    @if($order->item)
                                    @foreach($items as $item)
                                    <div class="row">
                                        <div class="col-md-4">
                                            <input type="text" class="form-control" name="items[]" value ={{$item}} > <button class="remove btn-danger">X</button><br>
                                        </div>
                                    </div>
                                    @endforeach
                                    @endif
                                </div>
                                
                                <h6>Service</h6>
                                <div class="row">
                                    <div class="form-group col-lg-4">
                                        
                                        <label class="switch">
                                            <input type="checkbox" name="service" id="service_check" @if($order->service) checked @endif>
                                            <span class="slider round"></span>
                                        </label>
                                        <label for="project_name" class="">Apply service rate </label> <i class="fa fa-info-circle" title="Apply service rate"></i>
                                    </div>
                                   
                                </div>
                                <div class="row service" @if(!$order->service) style="display:none" @endif>
                                <div class="form-group col-lg-6">
                                        <label for="project_url" >Service Name</label>
                                            <select class="form-control select2" id="service_id" data-placeholder="Select Driver" name ="service_id" style="width: 100%;">
                                                @if(count($services) > 0)
                                                    @foreach($services as $service)
                                                        <option value="{{$service->id}}" @if($order->service_id == $service->id) selected @endif>{{$service->service_name}}</option>
                                                    @endforeach
                                                @endif
                                            </select> 
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-lg-12">
                                        <label for="project_name" >Notes</label>
                                        <textarea name="notes" class="form-control" id="" cols="10" rows="3">{{$order->notes}}</textarea>
                                        
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
    <script src="https://code.jquery.com/jquery-3.6.4.min.js" integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8=" crossorigin="anonymous"></script>
<script>
    $(function(){
        $('#multiple_drop_off').on('change', function(){
        //alert('dsd');
        if($(this).is(":checked")) {
                $(".dropp2").show();
            } else {
                $(".dropp2").hide();
            }
        });
        $('#service_check').on('change', function(){
        if($(this).is(":checked")) {
                $(".service").show();
            } else {
                $(".service").hide();
            }
        });
    
        // $("body").on("click",".remove",function(){ 
        //     $(this).parents("#tab_logic").remove();
        // });

    });



    $(document).ready(()=>{
    let template = `<div class="row"><div class='col-md-4'><input type="text" class="form-control" name="items[]" placeholder="Enter Something" /><button class="remove btn-danger">X</button></div></div>`; 

    $("#add").on("click", ()=>{
        
        $("#items").append(template);
    })
    $("body").on("click", ".remove", (e)=>{
        $(e.target).parent("div").remove();
    })
});
    
    </script>
@endsection