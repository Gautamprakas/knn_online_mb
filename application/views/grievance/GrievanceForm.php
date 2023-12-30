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
            <div class="col-md-6">
                <div class="portlet box green">
                    <div class="portlet-title">
                        <div class="caption">
                            <i class="fa fa-gift"></i>Welcome To Grievance Panel  </div>
                        <div class="tools">
                            <a href="javascript:;" class="collapse"> </a>
                            <a href="#portlet-config" data-toggle="modal" class="config"> </a>
                            <a href="javascript:;" class="reload"> </a>
                            <a href="javascript:;" class="remove"> </a>
                        </div>
                    </div>
                   
                    <div class="portlet-body form">

					<form class="form-horizontal" action="<?php echo base_url()?>index.php/grievanceController/saveGrievance" method="post" enctype="multipart/form-data">
						
								<div class="col-sm-12 form-group">
							<br></br>
								<label class="col-sm-4 control-label">
									 Select Tehsil   <span class="symbol required control-label">*</span>
								</label>
								<?php 
								$this->db->distinct();
								$this->db->select("block_name");
								$branchtype = $this->db->get("block_list");
								
								?>
								
								<div class="col-sm-6">
								<select class="form-control m-b-sm" id="block_name" name="block_name" required="required">
										<option value="">-Select Tehsil- </option> 
										<?php foreach($branchtype->result() as $bt):?>
										<option value="<?php echo $bt->block_name;?>"><?php echo $bt->block_name;?></option> 
										<?php endforeach;?>
								</select>
								</div>	
						</div>
							
							<div class="col-sm-12 form-group">
								<label class="col-sm-4 control-label">
									Complainer Name  <span class="symbol required">*</span>
								</label>
									<div class="col-sm-6" >
										 <input type="text"  id = "comp_name" name ="comp_name" class="form-control m-b-sm" required="required">
									</div>	
								</div>
							<div class="col-sm-12 form-group">
								<label class="col-sm-4 control-label">
									Complainer Mobile  <span class="symbol required control-label"></span>
								</label>
								<div class="col-sm-6">
							 <input type="number"  id = "mobile_number" name = "mobile_number" class="form-control m-b-sm" min="0" >
								</div>	
							</div>	
								
							<div class="col-sm-12 form-group">
								<label class="col-sm-4 control-label">
									Father Name  <span class="symbol required"></span>
								</label>
									<div class="col-sm-6" >
										 <input type="text"  id = "f_name" name ="f_name" class="form-control m-b-sm"  >
									</div>	
								</div>

								<div class="col-sm-12 form-group">
								<label class="col-sm-4 control-label">
									Age  <span class="symbol required"></span>
								</label>
									<div class="col-sm-6" >
										 <input type="number"  id = "age" name ="age" class="form-control m-b-sm"  min="1" max="120">
									</div>	
								</div>	
								
								<div class="col-sm-12 form-group">
									<label class="col-sm-4 control-label">
										Gender   <span class="symbol required"></span>
									</label>
									<div class="col-sm-6 m-b-sm" >	
										<input type = "radio" name="gender" value ="male" checked="">Male
										<input type = "radio" name="gender" value ="female">Female
									</div>
								</div>	
							<div class="col-sm-12 form-group">
								<label class="col-sm-4 control-label">
									Address / Village  <span class="symbol required">*</span>
								</label>
									<div class="col-sm-6" >
										 <input type="text"  id = "comp_add" name ="comp_add" class="form-control m-b-sm" required="required" >
									</div>	
								</div>

								<div class="col-sm-12 form-group">
								<label class="col-sm-4 control-label">
									Pincode  <span class="symbol required"></span>
								</label>
									<div class="col-sm-6" >
										 <input type="number"  id = "pincode" name ="pincode" class="form-control m-b-sm"  min="0">
									</div>	
								</div>
							
							
								<div class="col-sm-12 form-group">
									<label class="col-sm-4 control-label">
										Type Of Grievance   <span class="symbol required">*</span>
									</label>
									<div class="col-sm-6">	
										<select class="form-control m-b-sm" id="typeof_Complain" name="typeof_Complain" required="required">
											<option value="">--Select Type--</option>
										<?php 
                                              $res = $this->db->distinct()
                                                       ->get("complain_type");
                                              foreach($res->result() as $row):
										?>
                                         <option value="<?php echo  $row->complain_type?>"><?php echo  $row->complain_type?></option>
									    <?php endforeach; ?>
									</select>
									</div>
								
								<!--<div class="col-sm-12 form-group">
									<label class="col-sm-4 control-label">
										Have you already complained for this problem?   <span class="symbol required"></span>
									</label>
									<div class="col-sm-6 m-b-sm" >	
										<input type = "radio" name="pre_status" value ="yes">Yes
										<input type = "radio" name="pre_status" value ="no" checked="">No
									</div>
								</div>-->
								<div class="col-sm-12 form-group">
									<label class="col-sm-4 control-label">
										Please Upload File(max size 2048KB)<span class="symbol required"></span>
									</label>
									<div class="col-sm-6">
										 <input type="file"  id = "file_name" name = "file_name" class="form-control  m-b-sm" >
									</div>	
								</div>
								
								<div class="col-sm-12 form-group">
								<label class="col-sm-4 control-label">
									Write Your Complain (MM: 500 char) <span class="symbol required">*</span>
									</label>
									<div class="col-sm-6">
										<textarea rows="3" name = "shikayat" class="form-control  m-b-sm " required="required" cols="1"></textarea>  
									</div>	
								</div>
							
								<div >
								 <div class="form-group form-group">
                                    <div class="col-sm-offset-2 col-sm-10">
                                    	   <div id ="bh" >
                                   			 </div>
                                        <button type="submit" id="submitLeave" class="btn btn-success">Add Complain</button>
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

 