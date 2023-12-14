@extends('layouts.master')

    @section('title' , 'Admin|Disposal, Edit')

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
                                <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" method="post" action="{{route('admin.stock.disposal.update')}}" enctype="multipart/form-data">
                                    @csrf
                                    
                                    
                                <h6>Disposal, Edit</h6>
                                <hr>    
                                <input type="hidden" name="id" value="{{$disposal->id}}">
                                <div class="row">
                                    <div class="form-group col-lg-4">
                                        <label for="project_name" >Type</label>
                                        <input class="form-control select2 " id="type" value="Disposal" data-placeholder="Select Fleet" name ="type" style="width: 100%;" readonly/>
                                               
                                    </div>
                                    <div class="form-group col-lg-4">
                                        <label for="project_name" >Fleet</label>
                                        <select class="form-control select2 @error('fleet') is-invalid @enderror" id="fleet" data-placeholder="Select Fleet" name ="fleet" style="width: 100%;">
                                        <option value="" >Select Fleet</option>
                                        @if(count($fleetTypes) > 0)
                                            @foreach($fleetTypes as $f)
                                            <option value="{{$f->id}}" data-id="{{$f->id}}" @if($f->id == $disposal->fleet) selected @endif>{{$f->fleet_type}}</option>
                                            @endforeach
                                        @endif
                                        </select>    
                                        @error('fleet')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror     
                                    </div>
                                    
                                    <div class="form-group col-lg-4">
                                        <label for="project_name" >Date</label>
                                        <input id="from" name="date" value="{{$disposal->date}}" require="required" class="date-picker form-control @error('from') is-invalid @enderror" placeholder="dd-mm-yyyy" type="text"  type="text" onfocus="this.type='date'" onmouseover="this.type='date'" onclick="this.type='date'" onblur="this.type='text'" onmouseout="timeFunctionLong(this)"> 
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
                                    <div class="form-group col-lg-4">
                                        <label for="project_name" >Item Code</label>
                                        <select class="form-control select2 @error('item_code') is-invalid @enderror" id="item_code" data-placeholder="Select Item Code" name ="item_code" style="width: 100%;">
                                            <option value="" >Select Item Code</option>
                                            @if(count($stockCodes) > 0)
                                                @foreach($stockCodes as $v)
                                                <option value="{{$v->id}}" @if($v->id == $disposal->item_code) selected @endif>{{$v->item_id}}</option>
                                                @endforeach
                                            @endif
                                        </select>  
                                        @error('item_code')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror       
                                    </div>
                                    <div class="form-group col-lg-4">
                                        <label for="project_url" >Qty</label>
                                        <input type="number" value="{{$disposal->qty}}" class="form-control @error('qty') is-invalid @enderror" id="qty" name="qty" placeholder="Quantity">
                                        @error('qty')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                    <div class="form-group col-lg-4">
                                        <label for="project_url" >Rate</label>
                                        <input type="number" value="{{$disposal->rate}}" class="form-control  @error('rate') is-invalid @enderror" id="rate" name="rate" placeholder="Rate">
                                        @error('rate')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-lg-4">
                                        <label for="project_name" >Brand</label>
                                        <input type="text" value="{{$disposal->brand}}" class="form-control @error('brand') is-invalid @enderror" id="brand" name="brand" placeholder="Brand" readonly>
                                    </div>
                                    <div class="form-group col-lg-4">
                                        <label for="project_name" >Description</label>
                                        <input type="text" value="{{$disposal->desc}}" class="form-control @error('desc') is-invalid @enderror" id="desc" name="desc" placeholder="Desc" readonly>
                                    </div>
                                    <div class="form-group col-lg-4">
                                        <label for="project_name" >Supplier</label>
                                        <input type="text" value="{{$disposal->supplier}}" class="form-control @error('supplier') is-invalid @enderror" id="supplier" name="supplier" placeholder="Supplier" readonly>
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
                                        <a class="btn btn-primary" href="{{route('admin.stock.disposals')}}">Back</a>
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
        });
    </script>
@endsection