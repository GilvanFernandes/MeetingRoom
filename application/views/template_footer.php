<footer class="main-footer">
  <div class="pull-right hidden-xs">
    <b>Version</b> 2.3.7
  </div>
  <strong>Copyright &copy; 2014-2016 <a href="http://almsaeedstudio.com">Almsaeed Studio</a>.</strong> All rights
  reserved.
</footer>

<!-- jQuery 2.2.3 -->
<script src="<?php echo base_url()."front/plugins/jQuery/jquery-2.2.3.min.js"; ?>" ></script>
<!-- Bootstrap 3.3.6 -->
<script src="<?php echo base_url()."front/bootstrap/js/bootstrap.min.js"; ?>" ></script>
<!-- Select2 -->
<script src="<?php echo base_url()."front/plugins/select2/select2.full.min.js"; ?>" ></script>
<!-- InputMask -->
<script src="<?php echo base_url()."front/plugins/input-mask/jquery.inputmask.js"; ?>" ></script>
<script src="<?php echo base_url()."front/plugins/input-mask/jquery.inputmask.extensions.js"; ?>" ></script>
<script src="<?php echo base_url()."front/plugins/input-mask/jquery.inputmask.date.extensions.js"; ?>" ></script>
<!-- date-range-picker -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.11.2/moment.min.js"></script>
<!-- bootstrap datepicker -->
<script src="<?php echo base_url()."front/plugins/daterangepicker/daterangepicker.js"; ?>" ></script>

<script src="<?php echo base_url()."front/plugins/datepicker/bootstrap-datepicker.js"; ?>" ></script>
<!-- bootstrap color picker -->
<script src="<?php echo base_url()."front/plugins/colorpicker/bootstrap-colorpicker.min.js"; ?>" ></script>
<!-- bootstrap time picker -->
<script src="<?php echo base_url()."front/plugins/timepicker/bootstrap-timepicker.js"; ?>" ></script>
<!-- SlimScroll 1.3.0 -->
<script src="<?php echo base_url()."front/plugins/slimScroll/jquery.slimscroll.min.js"; ?>" ></script>
<!-- iCheck 1.0.1 -->
<script src="<?php echo base_url()."front/plugins/iCheck/icheck.min.js"; ?>" ></script>
<!-- FastClick -->
<script src="<?php echo base_url()."front/plugins/fastclick/fastclick.js"; ?>" ></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url()."front/dist/js/app.min.js"; ?>" ></script>
<!-- AdminLTE for demo purposes -->
<script src="<?php echo base_url()."front/dist/js/demo.js"; ?>" ></script>

<script >
$(function () {
  //Initialize Select2 Elements
  $(".select2").select2();

  //Datemask dd/mm/yyyy
  $("#datemask").inputmask("dd/mm/yyyy", {"placeholder": "dd/mm/yyyy"});
  //Datemask2 mm/dd/yyyy
  $("#datemask2").inputmask("mm/dd/yyyy", {"placeholder": "mm/dd/yyyy"});
  //Money Euro
  $("[data-mask]").inputmask();

  //Date range picker
  $('#reservation').daterangepicker();
  //Date range picker with time picker
  $('#reservationtime').daterangepicker({timePicker: true, timePickerIncrement: 30, format: 'MM/DD/YYYY h:mm A'});

  //Date picker
  $('#datepicker').datepicker({
    autoclose: true
  });

  //iCheck for checkbox and radio inputs
  $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
    checkboxClass: 'icheckbox_minimal-blue',
    radioClass: 'iradio_minimal-blue'
  });
  //Red color scheme for iCheck
  $('input[type="checkbox"].minimal-red, input[type="radio"].minimal-red').iCheck({
    checkboxClass: 'icheckbox_minimal-red',
    radioClass: 'iradio_minimal-red'
  });
  //Flat red color scheme for iCheck
  $('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
    checkboxClass: 'icheckbox_flat-green',
    radioClass: 'iradio_flat-green'
  });

  //Colorpicker
  $(".my-colorpicker1").colorpicker();
  //color picker with addon
  $(".my-colorpicker2").colorpicker();

  //Timepicker
  $(".timepicker").timepicker({
    showInputs: false
  });
});
</script>
</body>
</html>
