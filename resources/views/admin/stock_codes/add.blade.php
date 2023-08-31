@extends('layouts.master')

    @section('title' , 'Admin|Fleet Type Create')

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
                                <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" method="post" action="{{route('admin.stock-code.save')}}" enctype="multipart/form-data">
                                    @csrf
                                    
                                    
                                <h6>Stock Code Details</h6>
                                <hr>    
                                <div class="row">
                                    <div class="form-group col-lg-6">
                                        <label for="project_name" >Item ID</label>
                                        <input type="text" class="form-control  @error('item_id') is-invalid @enderror" id="item_id" name="item_id" placeholder="Item ID" autofocus>
                                        @error('item_id')
                                            <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-group col-lg-6">
                                        <label for="project_name" >Brand</label>
                                        <input type="text" class="form-control  @error('brand') is-invalid @enderror" id="brand" name="brand" placeholder="Brand">
                                            @error('brand')
                                            <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                    </div>
                                    
                                </div>
                                <div class="row">
                                    <div class="form-group col-lg-6">
                                        <label for="project_name" >Description</label>
                                        <input type="text" class="form-control  @error('description') is-invalid @enderror" id="description" name="description" placeholder="Description" autofocus>
                                        @error('description')
                                            <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-group col-lg-6">
                                        <label for="category_id">Supplier</label>
                                            <select class="form-control select2" id="supplier" data-placeholder="Select Vendor" name ="supplier" style="width: 100%;">
                                                @if(count($suppliers) > 0)
                                                @foreach($suppliers as $supplier)
                                                <option value="{{$supplier->id}}" >{{$supplier->supplier_name}}</option>
                                                @endforeach
                                                @endif
                                            </select> 
                                    </div>
                                    
                                </div>
                               
                                
                                    <div class="ln_solid"></div>
                                    <div class="item form-group">
                                        <div class="col-md-6 col-sm-6 ">
                                            <a class="btn btn-primary" href="{{route('admin.stock-code')}}">Back</a>
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

    <script>
$(function () {
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