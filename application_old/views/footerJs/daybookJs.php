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

	 
	$("#country_id").keyup(function(){
		var cid=$("#country_id").val();
		$.post("<?php echo site_url("daybookController/getDetails");?>", {cid : cid}, function(data){
			$("#basic").html(data);
		});
		var cid=$("#country_id").val();
		$.post("<?php echo site_url("customerController/printCustomerRecord");?>", {cid : cid}, function(data){
			$("#valtable").html(data);
		});
	});	

	$("#box_no").keyup(function(){
		var cid = $("#box_no").val();
		$.post("<?php echo site_url("customerController/checkCustomerbox");?>", {cid : cid}, function(data){
			$("#basic").html(data);
		});
		var cid=$("#box_no").val();
		$.post("<?php echo site_url("customerController/printCustomerRecordbox");?>", {cid : cid}, function(data){
			$("#valtable").html(data);
		});
	});

	$("#submit1").click(function(){
		var sdate1 = $("#sdate1").val();
		var edate1 = $("#edate1").val();
		var genders = document.getElementsByName("radio1");

		for(var i = 0; i < genders.length; i++) {
		   if(genders[i].checked == true) {
		       selectedGender = genders[i].value;
		   }
		 }
		 
		$.post("<?php echo site_url("daybookController/printdbDetails");?>", {sdate1 : sdate1,edate1 : edate1,selectedGender : selectedGender }, function(data){
			$("#details").html(data);
		});
		
	});

	$("#submit2").click(function(){
		var sdate1 = $("#sdate1").val();
		var edate1 = $("#edate1").val();
		var genders = document.getElementsByName("radio1");

		for(var i = 0; i < genders.length; i++) {
		   if(genders[i].checked == true) {
		       selectedGender = genders[i].value;
		   }
		 }
		 
		$.post("<?php echo site_url("daybookController/personaldbDetails");?>", {sdate1 : sdate1,edate1 : edate1,selectedGender : selectedGender }, function(data){
			$("#personaldetails").html(data);
		});
		
	});
});



</script>