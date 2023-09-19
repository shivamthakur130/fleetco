@extends('layouts.master')

    @section('title' , 'Admin|Other Renewal Edit')

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
                                <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" method="post" action="{{route('admin.other.renewal.update')}}" enctype="multipart/form-data">
                                    @csrf
                                    
                                    <input type="hidden" name="id" value="{{$otherRenewal->id}}">
                                <h6>Other Renewal Details</h6>
                                <hr>    
                                
                                <div class="row">
                                    <div class="form-group col-lg-4">
                                        <label for="project_name" >Fleet</label>
                                        <select class="form-control select2 @error('fleet') is-invalid @enderror" id="fleet" data-placeholder="Select Fleet" name ="fleet" style="width: 100%;">
                                        <option value="" >Select Fleet</option>
                                        @if(count($fleet) > 0)
                                            @foreach($fleet as $f)
                                            <option value="{{$f->id}}" @if($otherRenewal->fleet_type == $f->id) selected @endif>{{$f->fleet_type}}</option>
                                            @endforeach
                                        @endif
                                        </select>         
                                    </div>
                                    <div class="form-group col-lg-4">
                                        <label for="project_name" >Vehicle Number</label>
                                        <select class="form-control select2" id="vehicle_number" data-placeholder="Select Vehicle Number" name ="vehicle_number" style="width: 100%;">
                                        <option value="0" >Select Vehicle Number</option>
                                        <option value="1"  @if($otherRenewal->vehicle_number == 1) selected @endif>1</option>
                                        <option value="2" @if($otherRenewal->vehicle_number == 2) selected @endif>2</option>
                                        <option value="3" @if($otherRenewal->vehicle_number == 3) selected @endif>3</option>
                                        </select>         
                                    </div>
                                    <div class="form-group col-lg-4">
                                        <label for="project_name" >Vehicle Type</label>
                                        <select class="form-control select2 @error('vehicle_type') is-invalid @enderror" id="vehicle_type" data-placeholder="Select Fleet" name ="vehicle_type" style="width: 100%;">
                                        <option value="" >Select Fleet</option>
                                        @if(count($vehicle) > 0)
                                            @foreach($vehicle as $v)
                                            <option value="{{$v->id}}" @if($otherRenewal->vehicle_type == $v->id) selected @endif>{{$v->vehicle_type}}</option>
                                            @endforeach
                                        @endif
                                        </select>         
                                    </div>
                                   
                                </div>
                                <div class="row">
                                    <div class="form-group col-lg-6">
                                        <label for="project_name" >Renewal</label>
                                        <select class="form-control select2 @error('renewal') is-invalid @enderror" id="renewal" data-placeholder="Select Fleet" name ="renewal" style="width: 100%;">
                                            <option value="" >Select Renewal</option>
                                            @if(count($renewals) > 0)
                                                @foreach($renewals as $renewal)
                                                <option value="{{$renewal->id}}" @if($otherRenewal->renewal_type == $renewal->id) selected @endif>{{$renewal->renewal}}</option>
                                                @endforeach
                                            @endif
                                            </select>     
                                        @error('renewal')
                                            <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-group col-lg-6">
                                        <label for="project_name" >Cost</label>
                                        <input type="text" class="form-control  @error('cost') is-invalid @enderror" value="{{$otherRenewal->cost}}" id="cost" name="cost" placeholder="Cost">
                                    </div>
                                    
                                </div>
                                <div class="row">
                                    <div class="form-group col-lg-6">
                                        <label for="project_name" >From</label>
                                        <input id="from" name="from"  require="required" value="{{$otherRenewal->from}}" class="date-picker form-control @error('from') is-invalid @enderror" placeholder="dd-mm-yyyy" type="text"  type="text" onfocus="this.type='date'" onmouseover="this.type='date'" onclick="this.type='date'" onblur="this.type='text'" onmouseout="timeFunctionLong(this)"> 
                                            <script>
                                                function timeFunctionLong(input) {
                                                    setTimeout(function() {
                                                        input.type = 'text';
                                                    }, 60000);
                                                }
                                            </script>
                                    </div>
                                    <div class="form-group col-lg-6">
                                        <label for="project_name" >To</label>
                                        <input id="from" name="to"  require="required" value="{{$otherRenewal->to}}" class="date-picker form-control @error('to') is-invalid @enderror" placeholder="dd-mm-yyyy" type="text"  type="text" onfocus="this.type='date'" onmouseover="this.type='date'" onclick="this.type='date'" onblur="this.type='text'" onmouseout="timeFunctionLong(this)"> 
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
                                   
                                    <div class="form-group col-lg-6">
                                        <label for="project_url" >Pay Ref.</label>
                                        <input type="text" class="form-control  @error('pay_ref') is-invalid @enderror" value="{{$otherRenewal->pay_ref}}" id="pay_ref" name="pay_ref" placeholder="Pay Ref.">
                                    </div>
                                    <div class="form-group col-lg-6">
                                        <label for="project_name" >Pay Date</label>
                                        <input id="pay_date" name="pay_date"  require="required" value="{{$otherRenewal->pay_date}}" class="date-picker form-control @error('to') is-invalid @enderror" placeholder="dd-mm-yyyy" type="text"  type="text" onfocus="this.type='date'" onmouseover="this.type='date'" onclick="this.type='date'" onblur="this.type='text'" onmouseout="timeFunctionLong(this)"> 
                                            <script>
                                                function timeFunctionLong(input) {
                                                    setTimeout(function() {
                                                        input.type = 'text';
                                                    }, 60000);
                                                }
                                            </script>
                                    </div>
                                </div><hr>
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
                                        <a class="btn btn-primary" href="{{route('admin.insurance.claim')}}">Back</a>
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