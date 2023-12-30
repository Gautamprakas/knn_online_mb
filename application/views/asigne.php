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
      
        
 <form method="post" action="<?php echo base_url();?>apanel/saveTransferCom" enctype="multipart/form-data">
	  <div class="col-sm-12">
	 					<!-- start: FORM WIZARD PANEL -->
	 					<div class="panel panel-white">
	 						<div class="panel-heading">
	 							<h4 class="panel-title">Service Book    <span class="text-bold">Record</span></h4>
	 						</div>
	 						<div class="panel-body">
	 						<div id = "filelist">
	 						<?php $this->db->where("complain_number",$complain_Number);
	 							$f = $this->db->get("complain_record")->row();
	 							
	 							?>
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
                                                            Complain Number <?php echo $complain_Number;?> Details				  
															<div class="col-sm-12">
                                                              
																		<label class="col-sm-4 control-label">
																			School Code  <span class="symbol required control-label"></span>
																		</label>
																		<div class="col-sm-7">
																		<?php echo $f->school_code;?>
										                                  <input type="hidden" class="form-control" name ="complain_Number" value="<?php echo $complain_Number;?>" />
																		</div>	
																</div>
																<div class="col-sm-12">
                                                              
																		<label class="col-sm-4 control-label">
																			Designation  <span class="symbol required control-label"></span>
																		</label>
																		
																		<div class="col-sm-7">
																		<?php echo $f->designation;?>
										                                  <input type="hidden" class="form-control" name ="designation" value="<?php echo $f->designation;?>" />
																		</div>	
																	</div>
																	
																<div class="col-sm-12">
                                                              
																		<label class="col-sm-4 control-label">
																			Complainer Name  <span class="symbol required control-label"></span>
																		</label>
																		
																		<div class="col-sm-7">
																		<?php echo $f->complainer_name;?>
										                                  <input type="hidden" class="form-control" name ="complainer_name" value="<?php echo $f->complainer_name;?>" />
																		</div>	
																	</div>	
																	
																<div class="col-sm-12">
                                                              
																		<label class="col-sm-4 control-label">
																			Complain Type  <span class="symbol required control-label"></span>
																		</label>
																		
																		<div class="col-sm-7">
																		<?php echo $f->complain_type;?>
										                                  <input type="hidden" class="form-control" name ="complain_type" value="<?php echo $f->complain_type;?>" />
																		</div>	
																</div>	
																<div class="col-sm-12">
                                                              
																		<label class="col-sm-4 control-label">
																			Complain  <span class="symbol required control-label"></span>
																		</label>
																		
																		<div class="col-sm-7">
																		<?php echo $f->complain;?>
										                                  <input type="hidden" class="form-control" name ="complain" value="<?php echo $f->complain;?>" />
																		</div>	
																</div>	
																<div class="col-sm-12">
                                                              
																		<label class="col-sm-4 control-label">
																			Complain Date  <span class="symbol required control-label"></span>
																		</label>
																		
																		<div class="col-sm-7">
																		<?php echo $f->complain_date;?>
										                                  <input type="hidden" class="form-control" name ="complain_date" value="<?php echo $f->complain_date;?>" />
																		</div>	
																</div>	
																<div class="col-sm-12">
                                                              
																		<label class="col-sm-4 control-label">
																			Cur Status  <span class="symbol required control-label"></span>
																		</label>
																		
																		<div class="col-sm-7">
																		<?php echo $f->cur_status;?>
										                                  <input type="hidden" class="form-control" name ="cur_status" value="<?php echo $f->cur_status;?>" />
																		</div>	
																</div>
																<div class="col-sm-12">
                                                              
																		<label class="col-sm-4 control-label">
																			Assigne  <span class="symbol required control-label"></span>
																		</label>
																		
																		<div class="col-sm-7">
																		<?php echo $f->assigne;?>
										                                  <input type="hidden" class="form-control" name ="assigne" value="<?php echo $f->assigne;?>" />
																		</div>	
																</div>
															</div>
	 						</div>
	 					</div>	
	 						<div class="col-sm-6">
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
                                                            <?php $this->db->where("patal_name",$f->complain_type);
                                                           $raj =  $this->db->get("officers_list")->row();?>
                                                            <div class="col-sm-12">
                                                              
																		<label class="col-sm-4 control-label">
																			Officer Name  <span class="symbol required control-label"></span>
																		</label>
																		
																		<div class="col-sm-7">
																		<?php echo $raj->officer_name;?>
										                                  <input type="hidden" class="form-control" name ="officer_name" value="<?php echo $raj->officer_name;?>" />
																		</div>	
																</div>
                                                            <div class="col-sm-12">
                                                              
																		<label class="col-sm-4 control-label">
																			Mobile Number  <span class="symbol required control-label"></span>
																		</label>
																		
																		<div class="col-sm-7">
																		<?php echo $raj->mobile1;?>
										                                  <input type="hidden" class="form-control" name ="mobile1" value="<?php echo $raj->mobile1;?>" />
																		</div>	
																</div>
																 <div class="col-sm-12">
                                                              
																		<label class="col-sm-4 control-label">
																			Mobile Number 2  <span class="symbol required control-label"></span>
																		</label>
																		
																		<div class="col-sm-7">
																		<?php echo $raj->mobile2;?>
										                                  <input type="hidden" class="form-control" name ="mobile2" value="<?php echo $raj->mobile2;?>" />
																		</div>	
																</div>
																 <div class="col-sm-12">
                                                              
																		<label class="col-sm-4 control-label">
																			E-mail 1   <span class="symbol required control-label"></span>
																		</label>
																		
																		<div class="col-sm-7">
																		<?php echo $raj->email1;?>
										                                  <input type="hidden" class="form-control" name ="email1" value="<?php echo $raj->email1;?>" />
																		</div>	
																</div>
																 <div class="col-sm-12">
                                                              
																		<label class="col-sm-4 control-label">
																			E-mail 2   <span class="symbol required control-label"></span>
																		</label>
																		
																		<div class="col-sm-7">
																		<?php echo $raj->email2;?>
										                                  <input type="hidden" class="form-control" name ="email2" value="<?php echo $raj->email2;?>" />
																		</div>	
																</div>
																 <div class="col-sm-12">
                                                              
																		
																		<div class="col-sm-7">
																		
										                                  <?php if($f->cur_status=="Pending"){
										                                  echo '<input type="submit" class="btn btn-success" name ="school_code" value="Send To Handle this">';}else{
										                                  echo '<h2>'.$f->cur_status.'</h2>';}?> 

																		</div>	
																</div>
                                                            </div>
                                                           
                                                            
                                                        
                                   </div>                         
	 						</div>
	 					</div>
	 						
				</div>
				
			</div>
		
	  </div>
	  </form>
	       		  