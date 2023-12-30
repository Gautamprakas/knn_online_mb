	<script src="<?php echo base_url()?>assets/plugins/jquery/jquery-2.1.3.min.js"></script>
        <script src="<?php echo base_url()?>assets/plugins/jquery-ui/jquery-ui.min.js"></script>
        <script src="<?php echo base_url()?>assets/plugins/pace-master/pace.min.js"></script>
        <script src="<?php echo base_url()?>assets/plugins/jquery-blockui/jquery.blockui.js"></script>
        <script src="<?php echo base_url()?>assets/plugins/bootstrap/js/bootstrap.min.js"></script>
        <script src="<?php echo base_url()?>assets/plugins/jquery-slimscroll/jquery.slimscroll.min.js"></script>
        <script src="<?php echo base_url()?>assets/plugins/switchery/switchery.min.js"></script>
        <script src="<?php echo base_url()?>assets/plugins/uniform/jquery.uniform.min.js"></script>
        <script src="<?php echo base_url()?>assets/plugins/classie/classie.js"></script>
        <script src="<?php echo base_url()?>assets/plugins/waves/waves.min.js"></script>
        <script src="<?php echo base_url()?>assets/plugins/3d-bold-navigation/js/main.js"></script>
        <script src="<?php echo base_url()?>assets/plugins/summernote-master/summernote.min.js"></script>
        <script src="<?php echo base_url()?>assets/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
        <script src="<?php echo base_url()?>assets/plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.js"></script>
        <script src="<?php echo base_url()?>assets/js/modern.min.js"></script>
        <script src="<?php echo base_url()?>assets/js/pages/form-elements.js"></script>
     <script>
jQuery(document).ready(function() {

	 
	$("#edate").change(function(){
		
		var sdate = $("#sdate").val();
	if(sdate.length < 1)
	{
		alert("You Have Not Select Start Date");
	}
		var edate=$("#edate").val();
		
		$.post("<?php echo site_url("customerController/getPaidList");?>", {sdate : sdate,edate : edate }, function(data){
		
			$("#basic").html(data);
		});
		
	});	
$("#edate1").change(function(){
		
		var sdate = $("#sdate1").val();
	if(sdate1.length < 1)
	{
		alert("You Have Not Select Start Date");
	}
		var edate=$("#edate1").val();
		
		$.post("<?php echo site_url("customerController/getUnPaidList");?>", {sdate : sdate,edate : edate }, function(data){
		
			$("#basic1").html(data);
		});
		
	});	
	

	
	
});



</script>