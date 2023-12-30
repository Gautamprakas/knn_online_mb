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
                            <i class="fa fa-gift"></i>Add Department</div>
                        <div class="tools">
                            <a href="javascript:;" class="collapse"> </a>
                            <a href="#portlet-config" data-toggle="modal" class="config"> </a>
                            <a href="javascript:;" class="reload"> </a>
                            <a href="javascript:;" class="remove"> </a>
                        </div>
                    </div>
                   
                    <div class="portlet-body form">

					<form class="form-horizontal" action="<?php echo base_url()?>index.php/grievanceController/insertDepartment" method="post" enctype="multipart/form-data">
						
						

                          
						 <div class="col-sm-12 form-group">
							<br>
								<?php 
                                 if($error = $this->session->flashdata("dep"))
                                   echo $error; 
                                ?>
							</br>
								<label class="col-sm-4 control-label">
									 Select Type   <span class="symbol required control-label"></span>
								</label>
								<?php 
								$this->db->distinct();
								$this->db->select("dep_type");
								$this->db->order_by("dep_type","ASC");
								$branchtype = $this->db->get("officers_list");
								?>
								
								<div class="col-sm-4">
								<select class="form-control m-b-sm" id="dep_type" name="dep_type" required="required">
										<option value="">--Select type-- </option> 
										<?php foreach($branchtype->result() as $bt):?>
										<option value="<?php echo $bt->dep_type;?>"><?php echo $bt->dep_type;?></option> 
										<?php endforeach;?>
								</select>
								</div>	
						</div>

						   <div class="col-sm-12 form-group" id="dep_nameDIV">
								<label class="col-sm-4 control-label">
									Department  <span class="symbol required"></span>
								</label>
									<div class="col-sm-6" >
										<select id = "dep_name" name ="dep_name" class="form-control m-b-sm" required="required">
										</select>
									</div>	
								</div>

							<div class="col-sm-12 form-group" id="teh_nameDIV">
								<label class="col-sm-4 control-label">
									Tehsil  <span class="symbol required"></span>
								</label>
									<div class="col-sm-6" >
										<select id = "teh_name" name ="teh_name" class="form-control m-b-sm" required="required">
										</select>
									</div>	
								</div>	
							
							<div class="col-sm-12 form-group">
								<label class="col-sm-4 control-label">
									Selected Type Name  <span class="symbol required"></span>
								</label>
									<div class="col-sm-6" >
										 <input type="text"  id = "depart_name" name ="depart_name" class="form-control m-b-sm" required="required">
									</div>	
								</div>
							<div class="col-sm-12 form-group">
								<label class="col-sm-4 control-label">
									Officer Name  <span class="symbol required control-label"></span>
								</label>
								<div class="col-sm-6">
							 <input type="text"  id = "officer_name" name = "officer_name" class="form-control m-b-sm" min="0" required="required">
								</div>	
							</div>	

							<div class="col-sm-12 form-group">
								<label class="col-sm-4 control-label">
									Mobile  <span class="symbol required"></span>
								</label>
									<div class="col-sm-6" >
										 <input type="number"  id = "mobile" name ="mobile" class="form-control m-b-sm"  required="required">
									</div>	
								</div>
								
							<div class="col-sm-12 form-group">
								<label class="col-sm-4 control-label">
									Email  <span class="symbol required"></span>
								</label>
									<div class="col-sm-6" >
										 <input type="emial"  id = "email" name ="email" class="form-control m-b-sm"  >
									</div>	
								</div>

								<div class="col-sm-12 form-group">
								<label class="col-sm-4 control-label">
								  <span class="symbol required"></span>
								</label>
									<div class="col-sm-6" >
										 <button type="submit" id="submitLeave" class="btn btn-success">Add Department</button>
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

 