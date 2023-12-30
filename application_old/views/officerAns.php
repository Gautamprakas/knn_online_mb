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
	 							<h4 class="panel-title">complain Book    <span class="text-bold">Record</span></h4>
	 						</div>
	 						<div class="panel-body">
	 						<div id = "filelist">
	 						
	 						<div class="col-sm-6">
												 
                                                        <div class="portlet box red">
                                                            <div class="portlet-title">
                                                                <div class="caption">
                                                                    <i class="fa fa-gift"></i>Complainer Details  </div>
                                                                <div class="tools">
                                                                    <a href="javascript:;" class="collapse"> </a>
                                                                    <a href="#portlet-config" data-toggle="modal" class="config"> </a>
                                                                    <a href="javascript:;" class="reload"> </a>
                                                                    <a href="javascript:;" class="remove"> </a>
                                                                </div>
                                                            </div>
                                                           
                                                            <div class="portlet-body form">	
                                                       			<form method="post" action="<?php echo base_url();?>apanel/officerAns" enctype="multipart/form-data">
																 <div class="col-sm-8">
                                                              
																		<label class="col-sm-4 control-label">
																			Complain Number  <span class="symbol required control-label"></span>
																		</label>
																		
																		<div class="col-sm-7">
																		
										                                  <input type="text" class="form-control" name ="complain_Number"  />
																		</div>	
																</div>
																<div class="col-sm-4">
																
																	<button> Submit</button>
																
																</div>
																</form>	
																
															</div>
															
	 						</div>
	 					</div>	
	 					<?php if($this->input->post("complain_Number")){?>
	 					<?php if($gt->num_rows()<1){  echo "record not found";?>
                             

                              <?php }else{ ?>

	 
	 						<div class="col-sm-6">
	 							<form method="post" action="<?php echo base_url();?>apanel/updatedStatus" enctype="multipart/form-data">
																     
	 							<div class="portlet box green">
                                <div class="portlet-title">
                                    <div class="caption">
                                        <i class="fa fa-gift"></i> Complain Handler Office</div>
                                    <div class="tools">
                                        <a href="javascript:;" class="collapse"> </a>
                                        <a href="#portlet-config" data-toggle="modal" class="config"> </a>
                                        <a href="javascript:;" class="reload"> </a>
                                        <a href="javascript:;" class="remove"> </a>
                                    </div>
                                </div>
                                
                                
                                <div class="portlet-body form">
                                <?php $raj= $gt->row();?>
                                <div class="col-sm-12">
                                  
											<label class="col-sm-4 control-label">
												Officer Name  <span class="symbol required control-label"></span>
											</label>
										 <input type="hidden" class="form-control" name ="complain_Number" value="<?php echo $raj->complain_number;?>" />
												
											<div class="col-sm-7">
											<?php echo $raj->officer_name;?>
			                                  <input type="hidden" class="form-control" name ="officer_name" value="<?php echo $raj->officer_name;?>" />
											</div>	
									</div>
									<?php 
											$this->db->where("block",$raj->block_name);
											$this->db->where("officer_name",$raj->officer_name);
											$this->db->where("patal_name",$raj->department);
											$query = $this->db->get("officers_list");
											$myRow = $query->row();
								   ?>
                                <div class="col-sm-12">
                                  
											<label class="col-sm-4 control-label">
											Mobile Number  <span class="symbol required control-label"></span>
											</label>
											
											<div class="col-sm-7">
											<?php echo $myRow->mobile1;?>
			                                  <input type="hidden" class="form-control" name ="mobile1" value="<?php echo $myRow->mobile1;?>" />
											</div>	
									</div>
									 <div class="col-sm-12">
                                  
											<label class="col-sm-4 control-label">
												Mobile Number 2  <span class="symbol required control-label"></span>
											</label>
											
											<div class="col-sm-7">
											<?php echo $myRow->mobile2;?>
			                                  <input type="hidden" class="form-control" name ="mobile2" value="<?php echo $myRow->mobile2;?>" />
											</div>	
									</div>
									 <div class="col-sm-12">
                                  
											<label class="col-sm-4 control-label">
												E-mail 1   <span class="symbol required control-label"></span>
											</label>
											
											<div class="col-sm-7">
											<?php echo $myRow->email1;?>
			                                  <input type="hidden" class="form-control" name ="email1" value="<?php echo $myRow->email1;?>" />
											</div>	
									</div>
									 <div class="col-sm-12">
                                  
											<label class="col-sm-4 control-label">
												E-mail 2   <span class="symbol required control-label"></span>
											</label>
											
											<div class="col-sm-7">
											<?php echo $myRow->email2;?>
			                                  <input type="hidden" class="form-control" name ="email2" value="<?php echo $myRow->email2;?>" />
											</div>	
									</div>
									<div class="col-sm-12">
                                  
											<label class="col-sm-4 control-label">
												Change Status  <span class="symbol required control-label"></span>
											</label>
											
											<div class="col-sm-7">
											<select class="form-control m-b-sm" id="status" name="status" required="required">
			                                  							<option value="">-Change Status-</option>
																		<option value="pending">Pending</option>
																		<option value="transfer">Transfer</option>
																		<option value="solved">Solved</option>
																		<option value="discard">Discard </option>
											</select>
											</div>		
									</div>
									
									<div class="col-sm-12">
                                  
											<label class="col-sm-4 control-label">
												Your Explaination  <span class="symbol required control-label"></span>
											</label>
											
											<div class="col-sm-7">
											<textarea rows="4" cols="50" name ="y_explain">
											
											</textarea>
			                                  </div>		
									</div>
									<div class="col-sm-12">																		<label class="col-sm-4 control-label">
												Upload File  <span class="symbol required control-label"></span>
											</label>
											<div class="col-sm-7">
			                                  <input type="file" class="form-control" name ="ansfile"  />
											</div>		
									</div>
									<div class="col-sm-12">
									<div class="col-sm-7">
											<button type= "submit">Submit</button>
			                                 </div>		
									</div>
                                </div>
			</div>   
			</form>            
	</div>
<?php 	} }?>
</div>
	 						
				</div>
				
			</div>
		
	  </div>
	  </form>
	       		  