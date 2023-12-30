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
                            <i class="fa fa-gift"></i>Add Complainer Details</div>
                        <div class="tools">
                            <a href="javascript:;" class="collapse"> </a>
                            <a href="#portlet-config" data-toggle="modal" class="config"> </a>
                            <a href="javascript:;" class="reload"> </a>
                            <a href="javascript:;" class="remove"> </a>
                        </div>
                    </div>
                   
                    <div class="portlet-body form">

					<form class="form-horizontal" action="<?php echo base_url()?>index.php/grievanceController2/saveGrievance" method="post" enctype="multipart/form-data">
						
						

                          
						 <div class="col-sm-12 form-group">
							<br>
								<?php 
                                 if($error = $this->session->flashdata("dep"))
                                   echo $error; 
                                ?>
							</br>
								<label class="col-sm-4 control-label">
									 Complainer Name  <span class="symbol required control-label"></span>
								</label>
								<div class="col-sm-6">
									<input type="text" name="complainer_name" class="form-control m-b-sm"  required="required" placeholder="Enter Complainer Name" >
								</div>	
						</div>
                           
                           <div class="col-sm-12 form-group">
								<label class="col-sm-4 control-label">
									Mobile  <span class="symbol required"></span>
								</label>
								<div class="col-sm-6" >
									<input type="text" name="mobile" class="form-control m-b-sm"  required="required" placeholder="Enter Complainer Mobile Number" pattern="[789][0-9]{9}" title="enter 10 digit mobile number" maxlength="10">
								</div>	
							</div>


							 <div class="col-sm-12 form-group">
								<label class="col-sm-4 control-label">
									Address  <span class="symbol required"></span>
								</label>
								<div class="col-sm-6" >
									<textarea name="address" class="form-control m-b-sm" placeholder="Enter Address"></textarea>
								</div>	
							</div>
 

						   <div class="col-sm-12 form-group">
								<label class="col-sm-4 control-label">
									Tehsil  <span class="symbol required"></span>
								</label>
								<div class="col-sm-6" >
									<select id = "tehsil" name ="tehsil" class="form-control m-b-sm" required="required">
									</select>
								</div>	
							</div>

							<div class="col-sm-12 form-group" >
								<label class="col-sm-4 control-label">
									Block <span class="symbol required"></span>
								</label>
								<div class="col-sm-6" >
									<select id = "block" name ="block" class="form-control m-b-sm" required="required">
									</select>
								</div>	
							</div>
							
							<div class="col-sm-12 form-group">
								<label class="col-sm-4 control-label">
									Village  <span class="symbol required"></span>
								</label>
								<div class="col-sm-6" >
									<select id = "village" name ="village" class="form-control m-b-sm" required="required">
									</select>
								</div>	
							</div>

								<div class="col-sm-12 form-group">
								<label class="col-sm-4 control-label">
								  <span class="symbol required"></span>
								</label>
									<div class="col-sm-6" >
										 <button type="submit" id="submitLeave" class="btn btn-success">Add Complainer Details</button>
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

 