
 <script src="<?php echo base_url();?>assets/global/plugins/jquery.min.js" type="text/javascript"></script>

        <script src="<?php echo base_url();?>assets/global/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url();?>assets/global/plugins/js.cookie.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url();?>assets/global/plugins/bootstrap-hover-dropdown/bootstrap-hover-dropdown.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url();?>assets/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url();?>assets/global/plugins/jquery.blockui.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url();?>assets/global/plugins/uniform/jquery.uniform.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url();?>assets/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js" type="text/javascript"></script>
        <!-- END CORE PLUGINS -->
        <!-- BEGIN PAGE LEVEL PLUGINS -->
        <script src="<?php echo base_url();?>assets/global/scripts/datatable.js" type="text/javascript"></script>
        <script src="<?php echo base_url();?>assets/global/plugins/datatables/datatables.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url();?>assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.js" type="text/javascript"></script>
        <!-- END PAGE LEVEL PLUGINS -->
        <!-- BEGIN THEME GLOBAL SCRIPTS -->
        <script src="<?php echo base_url();?>assets/global/scripts/app.min.js" type="text/javascript"></script>
        <!-- END THEME GLOBAL SCRIPTS -->
        <!-- BEGIN PAGE LEVEL SCRIPTS -->
        <script src="<?php echo base_url();?>assets/pages/scripts/table-datatables-colreorder.min.js" type="text/javascript"></script>
        <!-- END PAGE LEVEL SCRIPTS -->
        <!-- BEGIN THEME LAYOUT SCRIPTS -->
        <script src="<?php echo base_url();?>assets/layouts/layout3/scripts/layout.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url();?>assets/layouts/layout3/scripts/demo.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url();?>assets/layouts/global/scripts/quick-sidebar.min.js" type="text/javascript"></script>



        <!--<script src="<?php echo base_url()?>assets/plugins/jquery/jquery-2.1.3.min.js"></script>-->
      <script src="<?php echo base_url()?>assets/plugins/bootstrap/js/bootstrap.min.js"></script>
      <script src="<?php echo base_url()?>assets/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
        <!-- END THEME LAYOUT SCRIPTS -->



<script>
    jQuery(document).ready(function() {
        var options={
        format: 'yyyy-mm-dd',
        /*container: container,*/
        todayHighlight: true,
        autoclose: true
      };
        $(".date").datepicker(options);
        

    });
  </script>


<script type="text/javascript">
  
  jQuery(document).ready(function(){

       $.post("<?php echo base_url("grievanceController2/getTehsil"); ?>",{},function(data){
          $("#tehsil").html(data);
        });

       $("#tehsil").change(function(){
          
          var tehsil = $("#tehsil").val();
          $.post("<?php echo base_url("grievanceController2/getBlock"); ?>",
            {
              tehsil : tehsil
            },
            function(data){
            $("#block").html(data);
          });
       });


       $("#block").change(function(){

          var tehsil = $("#tehsil").val();
          var block = $("#block").val();
          $.post("<?php echo base_url("grievanceController2/getVillage"); ?>",
            {
              tehsil : tehsil,
              block : block
            },
            function(data){
            $("#village").html(data);
          });
       });

  });
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/chosen/1.8.7/chosen.jquery.js"></script>





















