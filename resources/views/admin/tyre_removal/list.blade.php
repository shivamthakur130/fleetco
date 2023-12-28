@extends('layouts.master')

    @section('title' , 'Admin|Tyre Removal')

@section('main-content')

  
        <!-- page content -->
        <div class="right_col" role="main">
          <!-- top tiles -->
          <div class="">
            
            <div class="clearfix"></div>
            <div class="row">
              
              <div class="col-md-12 col-sm-12 ">
                <div class="x_panel">
                @if(session()->has('message'))    
                <div class="alert alert-success alert-dismissible ml-3 mr-3">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <!-- <h5><i class="icon fas fa-check"></i> Alert!</h5> -->
                    {{ session()->get('message') }}
                </div>
                @endif

                @if(session()->has('error'))    
                <div class="alert alert-danger alert-dismissible ml-3 mr-3">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                  <!-- <h5><i class="icon fas fa-check"></i> Alert!</h5> -->
                  {{ session()->get('error') }}
                </div>
                @endif
                  <div class="x_title">
                  <a href="{{route('admin.tyre.removal.create')}}" class="btn btn-primary btn-sm ml-3 float-right" >Add New</a>
                    
                    <div class="clearfix"></div>
                  </div>
                    <div class="x_content">
                        <div class="row">
                          <div class="col-sm-12">
                            <div class="card-box table-responsive">
                    
                                <table id="datatable-buttons" class="table table-striped table-bordered" style="width:100%">
                                <thead>
                                    <tr>
                                    <th>Sr No.</th>
                                    <th>Type </th>
                                    <th>Fleet</th>
                                    <th>Date</th>
                                    <th>Tyre Code</th>
                                    <th>Brand</th>
                                    <th>Desc</th>
                                    <th>Supplier</th>
                                    <th>Rate</th>
                                    <th>Qty</th>
                                    <th>Cost</th>
                                    <th>Enterd By</th>
                                    <th>Action</th>
                                    </tr>
                                </thead>
                                    <tbody>
                                        @foreach($tyreRemovals as $si)
                                            <tr>
                                                <td>{{ $loop->index+1 }}</td>
                                                <td>{{$si->type}}</td>
                                                <td>
                                                    @if(count($fleetTypes) > 0) 
                                                        @foreach($fleetTypes as $fl) 
                                                            @if($fl->id == $si->fleet)  
                                                            {{ $fl->fleet_type}} 
                                                            @endif 
                                                        @endforeach 
                                                    @endif  
                                                </td>
                                                <td>{{$si->date}}</td>

                                                <td>
                                                @if(count($stockCodes) > 0) 
                                                        @foreach($stockCodes as $sc) 
                                                            @if($sc->id == $si->tyre_code)  
                                                            {{ $sc->item_id}} 
                                                            @endif 
                                                        @endforeach 
                                                    @endif  
                                                  </td>
                                                <td>{{$si->brand}}</td>
                                                <td>{{$si->desc}}</td>
                                                <td>{{$si->supplier}}</td>
                                                <td>{{$si->unit_cost}}</td>
                                                <td>{{$si->qty}}</td>
                                                
                                                <td>{{$si->unit_cost * $si->qty}}</td>
                                                <td>{{$si->enterd_by}}</td>
                                                <td>
                                                  <a href="{{route('admin.tyre.removal.edit', $si->unique_id)}}" class = " btn btn-primary btn-sm "><i class="fa fa-edit"></i>
                                                  </a>
                                                  <a href="{{route('admin.tyre.removal.delete', $si->id)}}" class = " btn btn-danger btn-sm " onclick="return confirm('Are you sure?')"><i class="fa fa-trash"></i>
                                                  </a>
                                                </td>


                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            </div>
                        </div>
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
    
    <!-- Custom Theme Scripts -->
    <script src="{{ asset('assets/js/custom.min.js')}}"></script>

    <!-- Datatables -->
    <script src="{{ asset('vendors/datatables.net/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{ asset('vendors/datatables.net-bs/js/dataTables.bootstrap.min.js')}}"></script>
    <script src="{{ asset('vendors/datatables.net-buttons/js/dataTables.buttons.min.js')}}"></script>
    <script src="{{ asset('vendors/datatables.net-buttons-bs/js/buttons.bootstrap.min.js')}}"></script>
    <script src="{{ asset('vendors/datatables.net-buttons/js/buttons.flash.min.js')}}"></script>
    <script src="{{ asset('vendors/datatables.net-buttons/js/buttons.html5.min.js')}}"></script>
    <script src="{{ asset('vendors/datatables.net-buttons/js/buttons.print.min.js')}}"></script>
    <script src="{{ asset('vendors/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js')}}"></script>
    <script src="{{ asset('vendors/datatables.net-keytable/js/dataTables.keyTable.min.js')}}"></script>
    <script src="{{ asset('vendors/datatables.net-responsive/js/dataTables.responsive.min.js')}}"></script>
    <script src="{{ asset('vendors/datatables.net-responsive-bs/js/responsive.bootstrap.js')}}"></script>
    <script src="{{ asset('vendors/datatables.net-scroller/js/dataTables.scroller.min.js')}}"></script>
    <script src="{{ asset('vendors/jszip/dist/jszip.min.js')}}"></script>
    <script src="{{ asset('vendors/pdfmake/build/pdfmake.min.js')}}"></script>
    <script src="{{ asset('vendors/pdfmake/build/vfs_fonts.js')}}"></script>

@endsection