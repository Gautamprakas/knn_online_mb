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
    	$("#status1").change(function(){
		var block=$("#status1").val();
			$.post("<?php echo site_url("brcControllers/showBrcList");?>", {block : block }, function(data){
				$("#basic1").html(data);
			});
    	 });
    	$("#status2").change(function(){
    		var block=$("#status2").val();
    			$.post("<?php echo site_url("nprcControllers/showNprcList");?>", {block : block}, function(data){
    				$("#basic2").html(data);
    			});
        	 });
    	$("#block_name").change(function(){
    		var bn = $("#block_name").val();
    		$.post("<?php echo site_url("leaveControllers/getNprc");?>", {bn : bn}, function(data){
    		
    			$("#nprc").html(data);
    		});
    		
    	});
    	$("#nprc").change(function(){
    		var bn = $("#block_name").val();
    		var nprc = $("#nprc").val();
    		$.post("<?php echo site_url("leaveControllers/getSchool");?>", {bn : bn ,nprc : nprc}, function(data){
    			
    			$("#school").html(data);
    		});
    		
    	});
    	$("#school").change(function(){
    		var school = $("#school").val();
    		var bn = $("#block_name").val();
    		var nprc = $("#nprc").val();
    		$.post("<?php echo site_url("leaveControllers/getTeacher");?>", {bn : bn ,nprc : nprc,school : school}, function(data){
    			$("#leaveEntry").show();
    			$("#name1").html(data);
    		});
    		$.post("<?php echo site_url("leaveControllers/leaveTable");?>", {school : school,bn : bn,nprc : nprc}, function(data){
    			$("#leaveTable").html(data);
    		});
    		
    	});
    
    });
	</script>
	
                          