@extends('layouts.master')

    @section('title' , 'Admin|Accident Repair, Edit')

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
                                <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" method="post" action="{{route('admin.accident.repair.update')}}" enctype="multipart/form-data">
                                    @csrf
                                    
                                <input type="hidden" name="id" value="{{$regular->id}}">
                                <h6>Accident Repair, Edit</h6>
                                <hr>    
                                
                                <div class="row">
                                    <div class="form-group col-lg-3">
                                        <label for="project_name" >Maint Type</label>
                                       <input type="text" class="form-control" value="Accidnet Reapir" name="maint_type" readonly>      
                                    </div>
                                    <div class="form-group col-lg-3">
                                        <label for="project_name" >Fleet</label>
                                        <select class="form-control select2 @error('fleet') is-invalid @enderror" id="fleet" data-placeholder="Select Fleet" name ="fleet" style="width: 100%;">
                                        <option value="" >Select Fleet</option>
                                        @if(count($fleetTypes) > 0)
                                            @foreach($fleetTypes as $f)
                                            <option value="{{$f->id}}" data-id="{{$f->id}}" {{$regular->fleet == $f->id ? 'selected' : ''}}>{{$f->fleet_type}}</option>
                                            @endforeach
                                        @endif
                                        </select>    
                                        @error('fleet')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror     
                                    </div>
                                    <div class="form-group col-lg-3">
                                        <label for="project_name" >Vehicle</label>
                                        <select class="form-control select2 @error('vehicle') is-invalid @enderror" id="vehicle" data-placeholder="Select Vehicle" name ="vehicle" style="width: 100%;">
                                        <option value="{{$regular->vehicle}}" >{{$regular->vehicle}}</option>
                                        
                                        </select>    
                                       
                                    </div>
                                    
                                    <div class="form-group col-lg-3">
                                        <label for="project_name" >Date</label>
                                        <input id="from" name="date" value="{{$regular->date}}" require="required" class="date-picker form-control @error('from') is-invalid @enderror" placeholder="dd-mm-yyyy" type="text"  type="text" onfocus="this.type='date'" onmouseover="this.type='date'" onclick="this.type='date'" onblur="this.type='text'" onmouseout="timeFunctionLong(this)"> 
                                            <script>
                                                function timeFunctionLong(input) {
                                                    setTimeout(function() {
                                                        input.type = 'text';
                                                    }, 60000);
                                                }
                                            </script>
                                    </div>
                                </div>  
                                <div class="row">
                                <div class="form-group col-lg-3">
                                        <label for="project_name" >Type</label>
                                        <select class="form-control select2 @error('type') is-invalid @enderror" id="type" data-placeholder="Select Type" name ="type" style="width: 100%;">
                                        <option value="" >Select Type</option>
                                        @if(count($vehicleTypes) > 0)
                                            @foreach($vehicleTypes as $vt)
                                            <option value="{{$vt->id}}"  {{$regular->type == $vt->id ? 'selected' : ''}}>{{$vt->vehicle_type}}</option>
                                            @endforeach
                                        @endif
                                        </select>    
                                        @error('fleet')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror     
                                    </div>
                                    <div class="form-group col-lg-3">
                                        <label for="project_url" >Meter R.</label>
                                        <input type="text" value="{{$regular->meter}}" class="form-control  @error('meter') is-invalid @enderror" id="meter" name="meter" placeholder="Meter R">
                                        @error('meter')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-group col-lg-3">
                                        <label for="project_url" >PO No</label>
                                        <input type="text" value="{{$regular->po_number}}" class="form-control  @error('po') is-invalid @enderror" id="po" name="po" placeholder="po No.">
                                        @error('po')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                    <div class="form-group col-lg-3">
                                        <label for="project_url" >Cost</label>
                                        <input type="number"value="{{$regular->cost}}"  class="form-control  @error('cost') is-invalid @enderror" id="cost" name="cost" placeholder="Cost">
                                        @error('cost')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-lg-4">
                                        <label for="project_name" >Supplier</label>
                                        <select class="form-control select2 @error('supplier') is-invalid @enderror" id="supplier" data-placeholder="Select Supplier" name ="supplier" style="width: 100%;">
                                        <option value="" >Select Type</option>
                                        @if(count($suppliers) > 0)
                                            @foreach($suppliers as $vt)
                                            <option value="{{$vt->id}}" {{$regular->supplier == $vt->id ? 'selected' : ''}}>{{$vt->supplier_name}}</option>
                                            @endforeach
                                        @endif
                                        </select>    
                                        @error('supplier')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <div class="form-group col-lg-4">
                                        <label for="project_name" >Pay. Ref</label>
                                        <input type="text" value="{{$regular->pay_ref}}" class="form-control  @error('pay_ref') is-invalid @enderror" id="pay_ref" name="pay_ref" placeholder="Pay Ref">
                                    </div>
                                    <div class="form-group col-lg-4">
                                        <label for="project_name" >Accident Ref</label>
                                        <input type="text" value="{{$regular->acc_ref}}" class="form-control  @error('acc_ref') is-invalid @enderror" id="pay_ref" name="acc_ref" placeholder="Accident Ref">
                                    </div>
                                    <div class="form-group col-lg-4">
                                        <label for="project_name" >Remarks</label>
                                        <input type="text" value="{{$regular->remarks}}" class="form-control  @error('remark') is-invalid @enderror" id="remark" name="remark" placeholder="Remarks">
                                    </div>
                                    
                                </div>
                                
                                <hr>
                                <div class="row">
                                    <div class="form-group col-lg-12">
                                        <label for="project_url" >Eneterd By: </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                        {{Auth::user()->name}}
                                    </div>
                                </div>
                                <div class="row">
                                <div class="form-group col-lg-12">
                                        <label for="project_url" >System Date: </label>&nbsp;&nbsp;
                                        <span class="text-bold">{{ date('Y-m-d') }}</span>
                                </div>
                                </div>
                                <div class="ln_solid"></div>
                                <div class="item form-group">
                                    <div class="col-md-6 col-sm-6 ">
                                        <a class="btn btn-primary" href="{{route('admin.accident.repair')}}">Back</a>
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
        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
        $(function(){
            $('#item_code').on('change', function(){
                let id = $(this).val();

                $.ajax({
                    url: '/admin/stock/stock-purchase/getDetail/'+id,
                    type: 'get',
                    dataType: 'json',
                    success: function(data){
                        console.log(data);
                        $('#brand').val(data.brand);
                        $('#desc').val(data.description);
                        $('#supplier').val(data.supplier);
                    }
                });
               
            });

            $('#fleet').on('change', function(){
                let fleet = $(this).find(':selected').attr('data-id');
                //alert(fleet);
                $.ajax({
                    url: '/admin/stock/stock-issue/getDetail/'+fleet,
                    type: 'get',
                    dataType: 'json',
                    success: function (result) {

                        $('#vehicle').html('<option value=""> Select Vehicle </option>');

                        $.each(result.vehicles, function (key, value) {
                            console.log(value)
                            $("#vehicle").append('<option value="' + value

                                .plate_number + '">' + value.plate_number + '</option>');

                        });

                    }
                });
            });
        });
    </script>
@endsection