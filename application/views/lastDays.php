<link href="<?php echo base_url()?>assets/css/modern.min.css" rel="stylesheet" type="text/css"/>
        <link href="<?php echo base_url()?>assets/css/custom.css" rel="stylesheet" type="text/css"/>
        
        <script src="<?php echo base_url()?>assets/plugins/3d-bold-navigation/js/modernizr.js"></script>
       
        
        <link href="<?php echo base_url()?>assets/global/plugins/simple-line-icons/simple-line-icons.min.css" rel="stylesheet" type="text/css" />
       
        <link href="<?php echo base_url()?>assets/global/plugins/uniform/css/uniform.default.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url()?>assets/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css" rel="stylesheet" type="text/css" />
          <link href="<?php echo base_url()?>assets/global/plugins/datatables/datatables.min.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url()?>assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.css" rel="stylesheet" type="text/css" />
         <link href="<?php echo base_url()?>assets/global/css/components.min.css" rel="stylesheet" id="style_components" type="text/css" />
        <link href="<?php echo base_url()?>assets/global/css/plugins.min.css" rel="stylesheet" type="text/css" />
        <!-- END THEME GLOBAL STYLES -->
        <!-- BEGIN THEME LAYOUT STYLES -->
        <link href="<?php echo base_url()?>assets/layouts/layout3/css/layout.min.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url()?>assets/layouts/layout3/css/themes/default.min.css" rel="stylesheet" type="text/css" id="style_color" />
      
      

	<div class="row">
			<div class="col-sm-12">
				<!-- start: FORM WIZARD PANEL -->
				<div class="panel panel-white">
					<div class="panel-heading">
						<h4 class="panel-title">पिछले 5 दिनों से लगातार SMS  <span class="text-bold">न भेंजे वाले विद्यालयों की सूची</span></h4>
					</div>
					<div class="panel-body">
						<div>
							</div>
						<div id="wizard" class="swMain">
		 							<div class="table-responsive">
		 							<?php   $date = date("Y-m-d");
		 									$stamp = strtotime($date);
		 									$day = date("d", $stamp); 
    										$month = date("m", $stamp);
    										$year = date("Y", $stamp); ?>
                                    <table class="table table-striped table-bordered table-hover" id="sample_1">
                                       <thead>
											<tr>
											<th>क्रम स.</th>
											<th>यु  डायस कोड </th>
											<th>विद्यालय का नाम </th>
											<th>प्रधानाध्यापक </th>
											<th>प्रधानाध्यापक मोबाइल</th>
											<?php for($i=0;$i<7;$i++){?>
											
											<th><?php echo $day-$i."-".$month."-".$year;?> </th>
											<?php }?>
											</tr>
											</thead>
											<tbody>
												
											<?php $g=1; $j=1;
											 	
											 	$this->db->where("block",$block);
											 	$org = $this->db->get("school_teachers");
											 	foreach($org->result() as $sr):
											
											 	?><tr>
											 	<td><?php echo $j;?></td>
											 	<td><?php echo $sr->udios;
											 
											 	?></td>
											 	<td><?php echo $sr->school_name;?></td>
											 	<td><?php echo $sr->head_teacher;?></td>
											 	<td><?php echo $sr->head_mobile;?></td>
											 	
											 <?php 	 for($i=0;$i<7;$i++){
											 	$date3 = $month."-".($day-$i);
											 	$stamp1 = $year."-".$date3;
											 	$this->db->where("name",$sr->udios);
											 	$this->db->where("date_of_sms",$stamp1);
											 	$v = $this->db->get("sms_report");
											 	if($v->num_rows()>0){
											 	
											 	?>
											 	<td><?php echo "YES";?></td>
											<?php }else{ ?><td><?php echo "NO";?></td><?php }}?>
											 </tr><?php 
											$j++;endforeach; 
											 	
											?>
												
											
											</tbody>
										</table>
								 	</div>
								 </div>
							</div>
						</div>
					</div>		 	
				</div>
					
 		   <script src="<?php echo base_url();?>assets/global/plugins/jquery.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url();?>assets/global/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url();?>assets/global/plugins/js.cookie.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url();?>assets/global/plugins/bootstrap-hover-dropdown/bootstrap-hover-dropdown.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url();?>assets/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url();?>assets/global/plugins/jquery.blockui.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url();?>assets/assets/global/plugins/uniform/jquery.uniform.min.js" type="text/javascript"></script>
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
        <!-- END THEME LAYOUT SCRIPTS -->
    <script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','../../../../../www.google-analytics.com/analytics.js','ga');
  ga('create', 'UA-37564768-1', 'keenthemes.com');
  ga('send', 'pageview');
</script>
			 