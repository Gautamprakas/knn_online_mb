		<link href="<?php echo base_url()?>assets/css/modern.min.css" rel="stylesheet" type="text/css"/>
        <link href="<?php echo base_url()?>assets/css/custom.css" rel="stylesheet" type="text/css"/>
        <script src="<?php echo base_url()?>assets/plugins/jquery/jquery-2.1.3.min.js"></script>
        <script src="<?php echo base_url()?>assets/plugins/jquery-ui/jquery-ui.min.js"></script>
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
      
        
<div class="col-sm-12">
	 					<!-- start: FORM WIZARD PANEL -->
	 					<div class="panel panel-white">
	 						<div class="panel-heading">
	 							<h4 class="panel-title">School   <span class="text-bold">Information</span></h4>
	 						</div>
	 						<div class="panel-body">
	 					
	 						<table class="table table-striped table-bordered table-hover" id="sample_1">
	 							
	 								<thead>
	 	                                        	<tr style="background-color:#673918">
	 	                                        		
	 	                                            	<th><font color="#fefcfa">Sr no.</font> </th>
	 	                                                <th><font color="#fefcfa">School Code</font></th>
	 	                                                 <th><font color="#fefcfa">Designation</font></th>
	 	                                                  <th><font color="#fefcfa">Complainer Name</font></th>
	 	                                                   <th><font color="#fefcfa">Complain Type</font></th>
	 	                                                    <th><font color="#fefcfa">Date</font></th>
	 	                                                     <th><font color="#fefcfa">Complain Number</font></th>
	 	                                                  <th><font color="#fefcfa">Status</font></th>
	 	                                                   <th><font color="#fefcfa">Complain</font></th>
	 	                                               
	 	                                              	                                            </tr>
	 	                  	 </thead>		
					<tbody>		
	 								 <?php 
	 	                                   $i = 1;   
	 	                                 $oall=   $this->db->get("complain_record");
	 	                                   foreach($oall->result() as $r):
	 	                                        	?>
	 	                                            <tr style="background-color:#ffae60" >
	 	                                                <td><?php echo $i;?></td>
	 	                                                <td ><?php echo $r->school_code;?></td>
	 	                                                 <td ><?php echo $r->designation;?></td>
	 	                                                 <td ><?php echo $r->complainer_name;?></td>
	 	                                                 <td ><?php echo $r->complain_type;?></td>
	 	                                                   <td ><?php echo $r->complain_date;?></td>
	 	                                                    <td ><?php echo $r->complain_number;?></td>
	 	                                                     
	 	                                                      <td ><?php echo $r->cur_status;?></br>
	 	                                                      <?php if($r->cur_status=='YES'){
	 	                                                      echo "Wait for Responce";
	 	                                                      
	 	                                                      }
	 	                                                      else{
	 	                                                      ?><a href="<?php echo base_url();?>index.php/apanel/asigneProblem/<?php echo $r->complain_number;?>"><font color="FFFFCC">Assigne</font></a>
	 	                                                      <?php }?></td>
	 	                                                      <td ><?php echo $r->complain;?></td>
	 	                                            </tr>
	 	                                             <script>
														  $("#ser<?php echo $i;?>").click(function(){
															  
																var teacher_code = $("#ser<?php echo $i;?>").val();
																alert(teacher_code);
																$.post("<?php echo site_url("apanel/getfilelist");?>", {teacher_code : teacher_code}, function(data){
																	$("#filelist").html(data);
																});
																
																
															});
													
													
													
														  </script>
	 	                                    <?php 
	 	                                       $i++; endforeach;
	 	                                       ?>
	 								
	 								</tbody>
	 					</table>	
				</div>
				
			</div>
		
	  </div>
	  
	  <div class="col-sm-6">
	 					<!-- start: FORM WIZARD PANEL -->
	 					<div class="panel panel-white">
	 						<div class="panel-heading">
	 							<h4 class="panel-title">Service Book    <span class="text-bold">Record</span></h4>
	 						</div>
	 						<div class="panel-body">
	 						<div id = "filelist">
	 						
	 						
	 						</div>
	 					
	 						
				</div>
				
			</div>
		
	  </div>
	 
	       		  