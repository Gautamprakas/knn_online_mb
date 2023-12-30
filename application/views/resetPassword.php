<div class="page-content-inner">
                            <div class="row">
                                <div class="col-md-12">
									<div class="portlet light ">
										<div class="portlet box green ">
                                        <div class="portlet-title">
                                            <div class="caption">
                                                <i class="fa fa-gift"></i>Grievance Panel  </div>
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
                    </div>
                   
                    <div class="portlet-body form" style="background: #ffffcc;">

<style type="text/css">
	label{
		font-weight: bold;
		font-size: 15px;
	}
</style>

					<form class="form-horizontal" action="<?php echo base_url("index.php/apanel/resetAction");?>" method="post" enctype="multipart/form-data">
						
								 <div class="col-sm-12 form-group">
								 <br>
                                  <?php 
                                 if($error = $this->session->flashdata("cp"))
                                   echo $error; 
                                ?>
								 <br>
								<label class="col-sm-4 control-label">
									Employee ID <span class="symbol required"></span>
								</label>
									<div class="col-sm-6" >
										 <input type="text"  id = "emp_id" name ="emp_id" class="form-control m-b-sm" required="required" placeholder="Enter Employee ID">
									</div>	
								</div>
                                
                                <div class="col-sm-12 form-group">
								<label class="col-sm-4 control-label">
									Reset Password  <span class="symbol required"></span>
								</label>
									<div class="col-sm-6" >
										 <input type="password"  id = "reset" name ="reset" class="form-control m-b-sm"  required="required" placeholder="Enter New Password">
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

        </div>	
</div>

</div>
</div>
</div>
</div>

</div>

 