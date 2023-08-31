@extends('layouts.master')

    @section('title' , 'Admin|Supplier Edit')

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
                                <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" method="post" action="{{route('admin.supplier.update')}}" enctype="multipart/form-data">
                                    @csrf
                                    
                                    <input type="hidden" name="id" value="{{$supplier->id}}">
                                <h6>Details</h6>
                                <hr>    
                                <div class="row">
                                    <div class="form-group col-lg-6">
                                        <label for="project_name" >Supplier Name</label>
                                        <input type="text" class="form-control  @error('supplier_name') is-invalid @enderror" id="supplier_name" value="{{$supplier->supplier_name}}" name="supplier_name" placeholder="Supplier Name" autofocus>
                                        @error('supplier_name')
                                            <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-group col-lg-6">
                                        <label for="project_name" >Telephone</label>
                                        <input type="number" class="form-control  @error('telephone') is-invalid @enderror" id="telephone" name="telephone" value="{{$supplier->phone}}" placeholder="Telephone Number">
                                            @error('telephone')
                                            <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                    </div>
                                    
                                </div>
                                <div class="row">
                                <div class="form-group col-lg-6">
                                        <label for="project_name" >Address</label>
                                        <input type="text" class="form-control  @error('address') is-invalid @enderror" id="address" name="address" value="{{$supplier->address}}" placeholder="Address">
                                            @error('address')
                                            <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                    </div>
                                    <div class="form-group col-lg-6">
                                        <label for="project_name" >Remark</label>
                                        <input type="text" class="form-control  @error('remark') is-invalid @enderror" id="remark" value="{{$supplier->remark}}" name="remark" placeholder="Remark" autofocus>
                                        @error('remark')
                                            <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    
                                    
                                </div>
                                
                                    <div class="ln_solid"></div>
                                    <div class="item form-group">
                                        <div class="col-md-6 col-sm-6 ">
                                            <a class="btn btn-primary" href="{{route('admin.suppliers')}}">Back</a>
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