@extends('layouts.master')

    @section('title' , 'Admin|Stock Purchase, Edit')

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
                                <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" method="post" action="{{route('admin.stock.stock-purchase.update')}}" enctype="multipart/form-data">
                                    @csrf
                                    
                                    <input type="hidden" name="id" value="{{$purchase->id}}"> 
                                <h6>Stock Purchase, Edit</h6>
                                <hr>    
                                <div class="row">
                                    <div class="form-group col-lg-4">
                                        <label for="project_name" >Type</label>
                                        <input class="form-control select2 " id="type" value="Purchase" data-placeholder="Select Fleet" name ="type" style="width: 100%;" readonly/>
                                               
                                    </div>
                                    <div class="form-group col-lg-4">
                                        <label for="project_name" >Fleet</label>
                                        <select class="form-control select2 @error('fleet') is-invalid @enderror" id="fleet" data-placeholder="Select Fleet" name ="fleet" style="width: 100%;">
                                        
                                        @if(count($fleetTypes) > 0)
                                            @foreach($fleetTypes as $f)
                                            <option value="{{$f->id}}" @if($purchase->fleet_type == $f->id) selected @endif>{{$f->fleet_type}}</option>
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
                                        <input id="from" name="date"  require="required" value="{{$purchase->date}}" class="date-picker form-control @error('from') is-invalid @enderror" placeholder="dd-mm-yyyy" type="text"  type="text" onfocus="this.type='date'" onmouseover="this.type='date'" onclick="this.type='date'" onblur="this.type='text'" onmouseout="timeFunctionLong(this)"> 
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
                                            @if(count($stockCodes) > 0)
                                                @foreach($stockCodes as $v)
                                                <option value="{{$v->id}}" @if($purchase->item_code == $v->id) selected @endif>{{$v->item_id}}</option>
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
                                        <label for="project_url" >Unit Cost</label>
                                        <input type="number" class="form-control  @error('unit_cost') is-invalid @enderror" value="{{$purchase->unit_cost}}" id="unit_cost" name="unit_cost" placeholder="Unit Cost">
                                        @error('unit_cost')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-group col-lg-4">
                                        <label for="project_url" >Qty</label>
                                        <input type="number" class="form-control  @error('qty') is-invalid @enderror" id="qty" value="{{$purchase->qty}}" name="qty" placeholder="Quantity">
                                        @error('qty')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-lg-3">
                                        <label for="project_name" >PO Ref</label>
                                        <input type="text" class="form-control  @error('po_ref') is-invalid @enderror" value="{{$purchase->po_ref}}" id="po_ref" name="po_ref" placeholder="Po Ref.">
                                        
                                        @error('po_ref')
                                            <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-group col-lg-3">
                                        <label for="project_name" >Brand</label>
                                        <input type="text" class="form-control  @error('brand') is-invalid @enderror" id="brand" name="brand" value="{{$purchase->brand}}" placeholder="Brand" readonly>
                                    </div>
                                    <div class="form-group col-lg-3">
                                        <label for="project_name" >Description</label>
                                        <input type="text" class="form-control  @error('desc') is-invalid @enderror" id="desc" name="desc" value="{{$purchase->desc}}" placeholder="Desc" readonly>
                                    </div>
                                    <div class="form-group col-lg-3">
                                        <label for="project_name" >Supplier</label>
                                        <input type="text" class="form-control  @error('supplier') is-invalid @enderror" id="supplier" value="{{$purchase->supplier}}" name="supplier" placeholder="Supplier" readonly>
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
                                        <a class="btn btn-primary" href="{{route('admin.stock.stock-purchase')}}">Back</a>
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
               
            })
        });
    </script>
@endsection