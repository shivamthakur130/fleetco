@extends('layouts.master')

    @section('title' , 'Admin|Insurance Claim Edit')

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
                                <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" method="post" action="{{route('admin.insurance.claim.update')}}" enctype="multipart/form-data">
                                    @csrf
                                    
                                    
                                <h6>Insurance Claim Details</h6>
                                <hr>    
                                <input type="hidden" name="id" value="{{$insuranceClaim->id}}">
                                <div class="row">
                                    <div class="form-group col-lg-4">
                                        <label for="project_name" >Fleet</label>
                                        <select class="form-control select2 @error('fleet') is-invalid @enderror" id="fleet" data-placeholder="Select Fleet" name ="fleet" style="width: 100%;">
                                        @if(count($fleet) > 0)
                                            @foreach($fleet as $f)
                                            <option value="{{$f->id}}" @if($insuranceClaim->id == $f->id) selected @endif>{{$f->fleet_type}}</option>
                                            @endforeach
                                        @endif
                                        </select>         
                                    </div>
                                    <div class="form-group col-lg-4">
                                        <label for="project_name" >Vehicle Number</label>
                                        <select class="form-control select2" id="vehicle_number" data-placeholder="Select Vehicle Number" name ="vehicle_number" style="width: 100%;">
                                        <option value="1"  @if($insuranceClaim->vehicle_number == 1) selected @endif>1</option>
                                        <option value="2" @if($insuranceClaim->vehicle_number == 2) selected @endif>2</option>
                                        <option value="3" @if($insuranceClaim->vehicle_number == 3) selected @endif>3</option>
                                        </select>         
                                    </div>
                                    <div class="form-group col-lg-4">
                                        <label for="project_name" >Vehicle Type</label>
                                        <select class="form-control select2 @error('vehicle_type') is-invalid @enderror" id="vehicle_type" data-placeholder="Select Fleet" name ="vehicle_type" style="width: 100%;">
                                        <option value="" >Select Fleet</option>
                                        @if(count($vehicle) > 0)
                                            @foreach($vehicle as $v)
                                            <option value="{{$v->id}}" @if($insuranceClaim->vehicle_type == $v->id) selected @endif >{{$v->vehicle_type}}</option>
                                            @endforeach
                                        @endif
                                        </select>         
                                    </div>
                                   
                                </div>
                                <div class="row">
                                    <div class="form-group col-lg-4">
                                        <label for="project_name" >Date</label>
                                        <input id="birthday" name="date"  require="required" value="{{$insuranceClaim->date}}" class="date-picker form-control @error('vehicle_year') is-invalid @enderror" placeholder="dd-mm-yyyy" type="text"  type="text" onfocus="this.type='date'" onmouseover="this.type='date'" onclick="this.type='date'" onblur="this.type='text'" onmouseout="timeFunctionLong(this)">
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
                                    <div class="form-group col-lg-4">
                                        <label for="project_name" >Acci. Ref</label>
                                        <select class="form-control select2 @error('acc_ref') is-invalid @enderror " id="acc_ref" data-placeholder="Select Vehicle Number" name ="acc_ref" style="width: 100%;">
                                        <option value="" >Select Accident Ref</option>
                                        <option value="4" @if($insuranceClaim->accident_ref == 4) selected @endif>4</option>
                                        <option value="5" @if($insuranceClaim->accident_ref == 5) selected @endif>5</option>
                                        </select>         
                                    </div>
                                    <div class="form-group col-lg-4">
                                        <label for="project_name" >Insurer</label>
                                        <select class="form-control select2 @error('insurer') is-invalid @enderror" id="insurer" data-placeholder="Select Fleet" name ="insurer" style="width: 100%;">
                                        <option value="" >Select Insurer</option>
                                        @if(count($insurance) > 0)
                                            @foreach($insurance as $ins)
                                            <option value="{{$ins->id}}" @if($insuranceClaim->insurance == $ins->id) selected @endif>{{$ins->name}}</option>
                                            @endforeach
                                        @endif
                                        </select>         
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-lg-6">
                                        <label for="project_name" >Claim</label>
                                        <input type="text" class="form-control  @error('claim') is-invalid @enderror" value="{{$insuranceClaim->claim}}" id="claim" name="claim" placeholder="Claim">
                                            @error('claim')
                                            <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                    </div>
                                    <div class="form-group col-lg-6">
                                        <label for="project_name" >Recp. Ref</label>
                                        <input type="text" class="form-control  @error('recp_ref') is-invalid @enderror" value="{{$insuranceClaim->recepient_ref}}" id="recp_ref" name="recp_ref" placeholder="Recp. Ref">
                                            @error('recp_ref')
                                            <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                    </div>
                                   
                                </div>
                               
                               
                                <div class="row">
                                   
                                    <div class="form-group col-lg-12">
                                        <label for="project_url" >Remark</label>
                                        <textarea name="remark" class="form-control  @error('remark') is-invalid @enderror"  id="remark" cols="10" rows="3" placeholder="Remark">{{$insuranceClaim->remarks}}</textarea>
                                    </div>
                                </div><hr>
                                <div class="row">
                                    <div class="form-group col-lg-12">
                                        <label for="project_url" >Eneterd By: </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                        {{$insuranceClaim->enterd_by}}
                                    </div>
                                </div>
                                <div class="row">
                                <div class="form-group col-lg-12">
                                        <label for="project_url" >System Date: </label>&nbsp;&nbsp;
                                        <span class="text-bold">{{$insuranceClaim->system_date}}</span>
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