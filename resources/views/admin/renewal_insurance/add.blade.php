@extends('layouts.master')

    @section('title' , 'Admin|Renewal Insurance Create')

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
                                <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" method="post" action="{{route('admin.renewal.insurance.save')}}" enctype="multipart/form-data">
                                    @csrf
                                    
                                    
                                <h6>Renewal Insurance Details</h6>
                                <hr>    
                                
                                <div class="row">
                                    <div class="form-group col-lg-4">
                                        <label for="project_name" >Fleet</label>
                                        <select class="form-control select2 @error('fleet') is-invalid @enderror" id="fleet" data-placeholder="Select Fleet" name ="fleet" style="width: 100%;">
                                        <option value="" >Select Fleet</option>
                                        @if(count($fleet) > 0)
                                            @foreach($fleet as $f)
                                            <option value="{{$f->id}}" >{{$f->fleet_type}}</option>
                                            @endforeach
                                        @endif
                                        </select>         
                                    </div>
                                    <div class="form-group col-lg-4">
                                        <label for="project_name" >Vehicle Number</label>
                                        <select class="form-control select2" id="vehicle_number" data-placeholder="Select Vehicle Number" name ="vehicle_number" style="width: 100%;">
                                        <option value="0" >Select Vehicle Number</option>
                                        <option value="1" >1</option>
                                        <option value="2" >2</option>
                                        <option value="3" >3</option>
                                        </select>         
                                    </div>
                                    <div class="form-group col-lg-4">
                                        <label for="project_name" >Vehicle Type</label>
                                        <select class="form-control select2 @error('vehicle_type') is-invalid @enderror" id="vehicle_type" data-placeholder="Select Fleet" name ="vehicle_type" style="width: 100%;">
                                        <option value="" >Select Fleet</option>
                                        @if(count($vehicle) > 0)
                                            @foreach($vehicle as $v)
                                            <option value="{{$v->id}}" >{{$v->vehicle_type}}</option>
                                            @endforeach
                                        @endif
                                        </select>         
                                    </div>
                                   
                                </div>
                                <div class="row">
                                    <div class="form-group col-lg-4">
                                        <label for="project_name" >Renewal</label>
                                        <input type="text" class="form-control  @error('renewal') is-invalid @enderror" id="renewal" name="renewal" placeholder="Renewal">
                                        <!-- <input id="birthday" name="date"  require="required" class="date-picker form-control @error('vehicle_year') is-invalid @enderror" placeholder="dd-mm-yyyy" type="text"  type="text" onfocus="this.type='date'" onmouseover="this.type='date'" onclick="this.type='date'" onblur="this.type='text'" onmouseout="timeFunctionLong(this)"> -->
												<!-- <script>
													function timeFunctionLong(input) {
														setTimeout(function() {
															input.type = 'text';
														}, 60000);
													}
												</script> -->
                                        @error('renewal')
                                            <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-group col-lg-4">
                                        <label for="project_name" >Premium</label>
                                        <input type="text" class="form-control  @error('premium') is-invalid @enderror" id="premium" name="premium" placeholder="Premium">
                                    </div>
                                    <div class="form-group col-lg-4">
                                        <label for="project_name" >Insurer</label>
                                        <select class="form-control select2 @error('insurer') is-invalid @enderror" id="insurer" data-placeholder="Select Fleet" name ="insurer" style="width: 100%;">
                                        <option value="" >Select Insurer</option>
                                        @if(count($insurance) > 0)
                                            @foreach($insurance as $ins)
                                            <option value="{{$ins->id}}" >{{$ins->name}}</option>
                                            @endforeach
                                        @endif
                                        </select>         
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-lg-6">
                                        <label for="project_name" >From</label>
                                        <input id="from" name="from"  require="required" class="date-picker form-control @error('from') is-invalid @enderror" placeholder="dd-mm-yyyy" type="text"  type="text" onfocus="this.type='date'" onmouseover="this.type='date'" onclick="this.type='date'" onblur="this.type='text'" onmouseout="timeFunctionLong(this)"> 
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
                                        <input id="from" name="to"  require="required" class="date-picker form-control @error('to') is-invalid @enderror" placeholder="dd-mm-yyyy" type="text"  type="text" onfocus="this.type='date'" onmouseover="this.type='date'" onclick="this.type='date'" onblur="this.type='text'" onmouseout="timeFunctionLong(this)"> 
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
                                        <input type="text" class="form-control  @error('pay_ref') is-invalid @enderror" id="pay_ref" name="pay_ref" placeholder="Pay Ref.">
                                    </div>
                                    <div class="form-group col-lg-6">
                                        <label for="project_name" >Pay Date</label>
                                        <input id="pay_date" name="pay_date"  require="required" class="date-picker form-control @error('to') is-invalid @enderror" placeholder="dd-mm-yyyy" type="text"  type="text" onfocus="this.type='date'" onmouseover="this.type='date'" onclick="this.type='date'" onblur="this.type='text'" onmouseout="timeFunctionLong(this)"> 
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


@endsection