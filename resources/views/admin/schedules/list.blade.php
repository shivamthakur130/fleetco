@extends('layouts.master')

    @section('title' , 'Admin|Orders')

@section('main-content')

  

        <!-- page content -->
        <div class="right_col" role="main">
          <!-- top tiles -->
          <div class="">
            
            <div class="clearfix"></div>
            <div class="row">
              
              <div class="col-md-12 col-sm-12 ">
                <div class="x_panel">
                    <br />
                    <h6 class="text-center"><u>Order Schedules</u></h6>
                    <br />

                    <div id="calendar"></div>
                </div>
              </div>

            </div>
        </div>

        </div>
        <!-- /page content -->
        {{-- This is edit record modal popup--}}
      <div class="modal fade" id="modal-update-event">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <form action="javascript:void(0);" id="form-update-event">
              <div class="modal-header">
                <h4 class="modal-title">Order Detail</h4>                
              </div>
              <div class="modal-body">
                <span id="customErrorU"></span> 
                <div class="row">
                  <div class="form-group col-lg-4">
                    <label>Order Type </label>
                    <input type="text" class="form-control  @error('orderType') is-invalid @enderror" id="orderType" name="orderType" value="" placeholder="" readonly>

                  </div> 
                  <div class="form-group col-lg-4">
                    <label>Internal Id </label>
                    <input type="text" class="form-control  @error('internalId') is-invalid @enderror" id="internalId" name="internalId" value="" readonly>

                  </div>
                  <div class="form-group col-lg-4">
                    <label>Schedule Date </label>
                    <input type="datetime-local" class="form-control  @error('schedule') is-invalid @enderror" id="schedule" name="schedule" value="" readonly>

                  </div> 
                </div> 
               <div class="row">
                  <div class="form-group col-lg-4">
                    <label>Facilitator </label>
                    <input type="text" class="form-control  @error('facilitator') is-invalid @enderror" id="facilitator" name="facilitator" value="" readonly>

                  </div>
                  <div class="form-group col-lg-4">
                    <label>Customer </label>
                    <input type="text" class="form-control  @error('customer') is-invalid @enderror" id="customer" name="customer" value="" readonly>

                  </div>
                  <div class="form-group col-lg-4">
                    <label>Driver </label>
                    <input type="text" class="form-control  @error('driver') is-invalid @enderror" id="driver" name="driver" value="" readonly>

                  </div>
               </div>
              </div>
              <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
                <!-- <button type="submit" class="btn btn-primary" id="event-calender-update">Save changes</button> -->
              </div>
            </form>  
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
       <!-- /.modal-end -->
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


    <!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/fullcalendar.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/fullcalendar.js"></script> -->
    <script src='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.10/index.global.min.js'></script>
@endsection

<script>

document.addEventListener('DOMContentLoaded', function() {
  $.ajax({
    url: '{{route("admin.get-event")}}',
    //url: 'admin/get-events',
    type:"GET",
    // data:{
    //   ids:calendarIds,
    //   type:'get-event',
    // },
    dataType: "json",
    success:function(data){
      //load calendar events with this data events
      //load_calendar_events(data, calendarView);
      getEvents(data);
    }

  });  
  
});


function getEvents(data){
    

  var calendarEl = document.getElementById('calendar');
  var calendar = new FullCalendar.Calendar(calendarEl, {
    initialView: 'dayGridMonth',
    editable: true,
    eventTimeFormat: { // like '14:30:00'
      hour: '2-digit',
      minute: '2-digit',
      //second: '2-digit',
      meridiem: true
    },
    headerToolbar: {
      left: 'prev,next today',
      center: 'title',
      right: 'dayGridMonth,timeGridWeek,timeGridDay,listMonth'
    },
    events:data,
  //   events: [
  //   {
  //     id: 'test',
  //     title: 'my event',
  //     start: '2023-12-17T20:32',
  //     end: '2023-12-17T20:32',
  //     display: 'display'
    
  //   },
  //   {
  //     id: 'test',
  //     title: 'my event 2',
  //     start: '2023-12-01',
      
  //   }
    
  // ]
  eventClick: function(info){
    // alert(info.event.id);
    // console.log(info);
    $.ajax({
      url: 'calendar-event/'+info.event.id,
      type: 'GET',    
      success:function(eventData){
        console.log(eventData);
        $("#modal-update-event").modal('show');
        $("#orderType").val(eventData.order_type);
        $("#internalId").val(eventData.internal_id); 
        $("#schedule").val(eventData.schedule_date);
        $("#facilitator").val(eventData.facilitator);
        $("#customer").val(eventData.customer_name);   
        $("#driver").val(eventData.driver_name);      

      }
    });
    $("#modal-update-event").modal('show');
     //open_edit_event_modal(info);
    },
  });
    calendar.render();
}

</script>