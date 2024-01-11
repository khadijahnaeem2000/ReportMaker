<script>
  $(document).ready(function(){
    $('.colorpicker1').colorpicker()
     window.viewer_modal = function($src = ''){
      start_loader()
      var t = $src.split('.')
      t = t[1]
      if(t =='mp4'){
        var view = $("<video src='"+$src+"' controls autoplay></video>")
      }else{
        var view = $("<img src='"+$src+"' />")
      }
      $('#viewer_modal .modal-content video,#viewer_modal .modal-content img').remove()
      $('#viewer_modal .modal-content').append(view)
      $('#viewer_modal').modal({
              show:true,
              backdrop:'static',
              keyboard:false,
              focus:true
            })
            end_loader()  

  }
  
    $("input[data-bootstrap-switch]").each(function(){
      $(this).bootstrapSwitch('state', $(this).prop('checked'));
    })
  })
</script>

    </div>
    <!-- ./wrapper -->
   
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
      $.widget.bridge('uibutton', $.ui.button)
    </script>
    <!-- Bootstrap 4 -->
    <script src="{{ asset('ReportMaker/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    <!-- ChartJS -->
    <!-- <script src="{{ asset('ReportMaker/plugins/chart.js/Chart.min.js')}}"></script> -->
    <!-- Sparkline -->
    <!-- <script src="{{ asset('ReportMaker/plugins/sparklines/sparkline.js')}}"></script> -->
    <!-- Select2 -->
    <script src="{{ asset('ReportMaker/plugins/select2/js/select2.full.min.js')}}"></script>
    <!-- JQVMap -->
    <script src="{{ asset('ReportMaker/plugins/jqvmap/jquery.vmap.min.js')}}"></script>
    <script src="{{ asset('ReportMaker/plugins/jqvmap/maps/jquery.vmap.usa.js')}}"></script>
    <!-- jQuery Knob Chart -->
    <!-- <script src="{{ asset('ReportMaker/plugins/jquery-knob/jquery.knob.min.js')}}"></script> -->
    <!-- daterangepicker -->
    <script src="{{ asset('ReportMaker/plugins/moment/moment.min.js')}}"></script>
    <!-- <script src="{{ asset('ReportMaker/plugins/daterangepicker/daterangepicker.js')}}"></script> -->
    <!-- Tempusdominus Bootstrap 4 -->
    <script src="{{ asset('ReportMaker/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js')}}"></script>
    <!-- Summernote -->
    <!-- <script src="{{ asset('ReportMaker/plugins/summernote/summernote-bs4.min.js')}}"></script>
    <script src="{{ asset('ReportMaker/plugins/datatables/jquery.dataTables.min.js')}}"></script>
    <script src="{{ asset('ReportMaker/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
    <script src="{{ asset('ReportMaker/plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script> -->
    <script src="{{ asset('ReportMaker/plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>
    <script src="{{ asset('ReportMaker/plugins/bootstrap-switch/js/bootstrap-switch.min.js')}}"></script>
    <!-- overlayScrollbars -->
    <!-- <script src="{{ asset('plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js')}}"></script> -->
    <!-- AdminLTE App -->
    <script src="{{ asset('ReportMaker/dist/js/adminlte.js')}}"></script>
  