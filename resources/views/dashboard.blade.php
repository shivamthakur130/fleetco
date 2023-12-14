@extends('layouts.master')

    @section('title' , 'Admin|Dashboard')

@section('main-content')

 

        <!-- page content -->
        <div class="right_col" role="main">
          <!-- top tiles -->
          <div class="row" style="display: inline-block;" >
          <div class="tile_count">
            <div class="col-md-3 col-sm-4  tile_stats_count">
              <span class="count_top"><i class="fa fa-user"></i> Total Users</span>
              <div class="count">{{count($users)}}</div>
              <!-- <span class="count_bottom"><i class="green">4% </i> From last Week</span> -->
            </div>
            <div class="col-md-3 col-sm-4  tile_stats_count">
              <span class="count_top"><i class="fa fa-users"></i> Total Groupes</span>
              <div class="count green">{{count($roles)}}</div>
             
            </div>
            <div class="col-md-3 col-sm-4  tile_stats_count">
              <span class="count_top"><i class="fa fa-user"></i> Total Orders</span>
              <div class="count">{{count($orders)}}</div>
              <!-- <span class="count_bottom"><i class="red"><i class="fa fa-sort-desc"></i>12% </i> From last Week</span> -->
            </div>
            <div class="col-md-3 col-sm-4  tile_stats_count">
              <span class="count_top"><i class="fa fa-user"></i> Total Drivers</span>
              <div class="count green">{{count($drivers)}}</div>
              <!-- <span class="count_bottom"><i class="green"><i class="fa fa-sort-asc"></i>34% </i> From last Week</span> -->
            </div>
            <div class="col-md-3 col-sm-4  tile_stats_count">
              <span class="count_top"><i class="fa fa-user"></i> Total Customers</span>
              <div class="count green">{{count($customers)}}</div>
            </div>
          </div>
        </div>
          <!-- /top tiles -->

         
          <br />

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
    <!-- Chart.js -->
    <script src="{{ asset('vendors/Chart.js/dist/Chart.min.js')}}"></script>
    <!-- gauge.js -->
    <script src="{{ asset('vendors/gauge.js/dist/gauge.min.js')}}"></script>
    <!-- bootstrap-progressbar -->
    <script src="{{ asset('vendors/bootstrap-progressbar/bootstrap-progressbar.min.js')}}"></script>
    <!-- iCheck -->
    <script src="{{ asset('vendors/iCheck/icheck.min.js')}}"></script>
    <!-- Skycons -->
    <script src="{{ asset('vendors/skycons/skycons.js')}}"></script>
    <!-- Flot -->
    <script src="{{ asset('vendors/Flot/jquery.flot.js')}}"></script>
    <script src="../vendors/Flot/jquery.flot.pie.js')}}"></script>
    <script src="{{ asset('vendors/Flot/jquery.flot.time.js')}}"></script>
    <script src="{{ asset('vendors/Flot/jquery.flot.stack.js')}}"></script>
    <script src="{{ asset('vendors/Flot/jquery.flot.resize.js')}}"></script>
    <!-- Flot plugins -->
    <script src="{{ asset('vendors/flot.orderbars/js/jquery.flot.orderBars.js')}}"></script>
    <script src="{{ asset('vendors/flot-spline/js/jquery.flot.spline.min.js')}}"></script>
    <script src="{{ asset('vendors/flot.curvedlines/curvedLines.js')}}"></script>
    <!-- DateJS -->
    <script src="{{ asset('vendors/DateJS/build/date.js')}}"></script>
    <!-- JQVMap -->
    <script src="{{ asset('vendors/jqvmap/dist/jquery.vmap.js')}}"></script>
    <script src="{{ asset('vendors/jqvmap/dist/maps/jquery.vmap.world.js')}}"></script>
    <script src="{{ asset('vendors/jqvmap/examples/js/jquery.vmap.sampledata.js')}}"></script>
    <!-- bootstrap-daterangepicker -->
    <script src="{{ asset('vendors/moment/min/moment.min.js')}}"></script>
    <script src="{{ asset('vendors/bootstrap-daterangepicker/daterangepicker.js')}}"></script>

    <!-- Custom Theme Scripts -->
    <script src="{{ asset('assets/js/custom.min.js')}}"></script>



@endsection