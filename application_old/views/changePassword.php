<div class="page-content-inner">
                            <div class="row">
                                <div class="col-md-12">
									<div class="portlet light ">
										<div class="portlet box green ">
                                        <div class="portlet-title">
                                            <div class="caption">
                                                <i class="fa fa-gift"></i>Grievance Panel  </div>
                                            <div class="tools">
                                                <a href="#" class="collapse"> </a>
                                                <a href="#portlet-config" data-toggle="modal" class="config"> </a>
                                                <a href="#" class="reload"> </a>
                                                <a href="#" class="remove"> </a>
                                            </div>
                                      </div>
                             <div class="portlet-body">
                             <div>
                             		<!--Welcome to Grievance Panel  ......-->
                             </div>
                             <div class="row">
            <div class="col-md-12">
                <div class="portlet box green">
                    <div class="portlet-title">
                        <div class="caption">
                            <i class="fa fa-gift"></i>Change Status of Grievance </div>
                        <div class="tools">
                            <a href="javascript:;" class="collapse"> </a>
                            <a href="#portlet-config" data-toggle="modal" class="config"> </a>
                            <a href="javascript:;" class="reload"> </a>
                            <a href="javascript:;" class="remove"> </a>
                        </div>
                    </div>
                   
                    <div class="portlet-body form" style="background: #ffffcc;">
<?php
      $cid = $this->uri->segment(3);
      $this->db->where("complain_number",$cid);
      $res = $this->db->get("complain_record");
      $row = $res->row();
?>
<style type="text/css">
	label{
		font-weight: bold;
		font-size: 15px;
	}
</style>

					<form class="form-horizontal" action="<?php echo base_url("index.php/apanel/updatePassword");?>" method="post" enctype="multipart/form-data">
						
								 <div class="col-sm-12 form-group">
								 <br>
                                  <?php 
                                 if($error = $this->session->flashdata("cp"))
                                   echo $error; 
                                ?>
								 <br>
								<label class="col-sm-4 control-label">
									Old Password <span class="symbol required"></span>
								</label>
									<div class="col-sm-6" >
										 <input type="text"  id = "opass" name ="opass" class="form-control m-b-sm" required="required" placeholder="Old Password">
									</div>	
								</div>
                                
                                <div class="col-sm-12 form-group">
								<label class="col-sm-4 control-label">
									New Password  <span class="symbol required"></span>
								</label>
									<div class="col-sm-6" >
										 <input type="password"  id = "npass" name ="npass" class="form-control m-b-sm"  required="required" placeholder="New Password">
									</div>		
								</div> 

								<div class="col-sm-12 form-group">
								<label class="col-sm-4 control-label">
									Confirm Password  <span class="symbol required"></span>
								</label>
									<div class="col-sm-6" >
										 <input type="password"  id = "cpass" name ="cpass" class="form-control m-b-sm" required="required" placeholder="Confirm Password">
									</div>		
								</div>

								
								<div >
								 <div class="form-group form-group">
                                    <div class="col-sm-offset-5 col-sm-2">
                                    	   
                                        <button type="submit" id="r" class="btn btn-success">Submit</button>
                                    </div>
                                </div>
                                
								
								</div>
								</div>	
							 </form> 
					                      
                     
                			</div>
            </div>
            </div>
 
            <div class="col-md-6" id = "prevDisplay">
                <div class="portlet box green">
                    <div class="portlet-title">
                        <div class="caption">
                            <i class="fa fa-gift"></i>Grievances   </div>
                        <div class="tools">
                            <a href="javascript:;" class="collapse"> </a>
                            <a href="#portlet-config" data-toggle="modal" class="config"> </a>
                            <a href="javascript:;" class="reload"> </a>
                            <a href="javascript:;" class="remove"> </a>
                        </div>
                    </div>
                    <div id = "prevGrie" class="portlet-body form">
                        
                    </div>
                </div>
            </div>

        </div>	
</div>

</div>
</div>
</div>
</div>

</div>

 