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
	 							<h4 class="panel-title">Department  <span class="text-bold">Information</span></h4>
	 						</div>
	 						<div class="panel-body">
	 					
	 						<table class="table table-striped table-bordered table-hover" id="sample_1">
	 							
	 								<thead>
	 	                                        	<tr style="background-color:#fbe0e0">
	 	                                        		
	 	                                            	<th><font color="#020915">Sr no.</font> </th>
	 	                                            	<!--<th><font color="#020915">Block</font> </th>-->
                                                   <th><font color="#020915">Office Type</font></th>
	 	                                                <th><font color="#020915">Office Name</font></th>
	 	                                                <th><font color="#020915">Username</font></th>
	 	                                                 <th><font color="#020915">Officer name</font></th>
	 	                                                 <th><font color="#020915">Mobile</font></th>
	 	                                                 
	 	                                                 <th><font color="#020915">E-mail</font></th>
	 	                                                 
	 	                                                  <!--<th><font color="#020915">Total Handle</font></th>
	 	                                                   <th><font color="#020915">Assgined</font></th>
	 	                                                    <th><font color="#020915">Solved</font></th>
	 	                                                     <th><font color="#020915">Redressed</font></th>
	 	                                                   <th><font color="#020915">UnRedressed</font></th>-->
	 	                                              </tr>
	 	                  	 </thead>		
					<tbody>		
						 <?php 
                               $i = 1;   
                             $oall=   $this->db->get("officers_list");
                               foreach($oall->result() as $r):
                                    	?>
                                        <tr style="background-color:#fbf6f6">
                                            <td><?php echo $i;?></td>
                                            <!--<td ><?php echo $r->block;?></td>-->
                                            <td ><?php echo $r->dep_type;?></td>
                                            <td ><?php echo $r->patal_name;?></td>
                                            <td ><?php echo $r->username;?></td>
                                            <td><?php echo  $r->officer_name;?></td>
                                            <td><?php echo  $r->mobile1;?></td>
                                            
                                            <td><?php echo  $r->email1;?></td>
                                             <?php
                                                   $this->db->where("officer_id",$r->username);
                                                   $v = $this->db->get("complain_record");
                                                   $th = $v->num_rows()>0?$v->num_rows():0;
                                             ?>
                                             <!-- <td><?php echo $th; ?></td>
                                              <?php
                                                   $this->db->where("officer_id",$r->username);
                                                   $this->db->where("cur_status","Assign");
                                                   $v = $this->db->get("complain_record");
                                                   $ta = $v->num_rows()>0?$v->num_rows():0;
                                             ?>
                                               <td><?php echo $ta; ?></td>
                                                <?php
                                                   $this->db->where("officer_id",$r->username);
                                                   $this->db->where("cur_status","Solved");
                                                   $v = $this->db->get("complain_record");
                                                   $ts = $v->num_rows()>0?$v->num_rows():0;
                                             ?>
                                                <td><?php echo $ts; ?></td>
                                                 <?php
                                                   $this->db->where("officer_id",$r->username);
                                                   $this->db->where("cur_status","Redressed");
                                                   $v = $this->db->get("complain_record");
                                                   $ta = $v->num_rows()>0?$v->num_rows():0;
                                             ?>
                                                 <td><?php echo $ta; ?></td>

                                                 <?php
                                                   $this->db->where("officer_id",$r->username);
                                                   $this->db->where("cur_status","UnRedressed");
                                                   $v = $this->db->get("complain_record");
                                                   $tu = $v->num_rows()>0?$v->num_rows():0;
                                             ?>
                                                 <td><?php echo $tu; ?></td>-->
                                        </tr>
                                        
                                <?php 
                                   $i++; endforeach;
                                   ?>
						
	 								</tbody>
	 					</table>	
				</div>
				
			</div>
		
	  </div>
	  
	 
	       		  