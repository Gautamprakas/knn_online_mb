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
                            <i class="fa fa-gift"></i>Welcome To Grievance Panel  </div>
                        <div class="tools">
                            <a href="javascript:;" class="collapse"> </a>
                            <a href="#portlet-config" data-toggle="modal" class="config"> </a>
                            <a href="javascript:;" class="reload"> </a>
                            <a href="javascript:;" class="remove"> </a>
                        </div>
                    </div>

                   
                   
                    <div class="portlet-body form">
                    
                     <form class="form-horizontal" action="<?php echo base_url()?>index.php/grievanceController/editGrievanceDetails" method="post" enctype="multipart/form-data">
                               <div class="col-sm-12 form-group">
                               	<br><br>
									<label class="col-sm-4 control-label">
										Enter Grievance Number<span class="symbol required"></span>
									</label>
									<div class="col-sm-4 " >
										<input type="number"  id = "gid" name ="gid" class="form-control m-b-sm" required="required" 
                                        value="<?php if(isset($_POST["gid"])) echo $_POST["gid"]; ?>" 
										>
									</div>
									<div>
										<input type="submit" name="submit" value="Submit" class="btn btn-success">
									</div>
								</div>	
                    </form>

                    

<?php if(isset($_POST["submit"])): ?>

<?php 
        $this->db->where("complain_number",$_POST["gid"]);
        $res = $this->db->get("complain_record");
        if($res->num_rows()>0)
        { 	
        	$record = $res->row();
?>
					<form class="form-horizontal" action="<?php echo base_url()?>index.php/grievanceController/updateGrievance" method="post" enctype="multipart/form-data">
						<input type="hidden" name="complain_number" value="<?php echo $record->complain_number; ?>">
								<div class="col-sm-6 form-group">
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
										<option value="<?php echo $bt->block_name;?>"
                                          <?php if($record->block_name == $bt->block_name) echo "Selected"; ?>
										><?php echo $bt->block_name;?></option> 
										<?php endforeach;?>
								</select>
								</div>	
						</div>
							
							<div class="col-sm-6 form-group">
								<br></br>
								<label class="col-sm-4 control-label">
									Complainer Name  <span class="symbol required">*</span>
								</label>
									<div class="col-sm-6" >
										 <input type="text"  id = "comp_name" name ="comp_name" class="form-control m-b-sm" required="required" value="<?php echo $record->complainer_name; ?>">
									</div>	
								</div>
							<div class="col-sm-6 form-group">
								<label class="col-sm-4 control-label">
									Complainer Mobile  <span class="symbol required control-label"></span>
								</label>
								<div class="col-sm-6">
							 <input type="number"  id = "mobile_number" name = "mobile_number" class="form-control m-b-sm" min="0" 
                              value="<?php echo $record->mobile_number; ?>"
							 >
								</div>	
							</div>	
								
							<div class="col-sm-6 form-group">
								<label class="col-sm-4 control-label">
									Father Name  <span class="symbol required"></span>
								</label>
									<div class="col-sm-6" >
										 <input type="text"  id = "f_name" name ="f_name" class="form-control m-b-sm"  
                                         value="<?php echo $record->father_name; ?>"
										 >
									</div>	
								</div>

								<div class="col-sm-6 form-group">
								<label class="col-sm-4 control-label">
									Age  <span class="symbol required"></span>
								</label>
									<div class="col-sm-6" >
										 <input type="number"  id = "age" name ="age" class="form-control m-b-sm"  min="1" max="120"
                                         value="<?php echo $record->age; ?>"
										 >
									</div>	
								</div>	
								
								<div class="col-sm-6 form-group">
									<label class="col-sm-4 control-label">
										Gender   <span class="symbol required"></span>
									</label>
									<div class="col-sm-6 " >
									    <select name="gender" class="form-control m-b-sm">
									    	<option value ="male" 
									    	<?php if($record->gender == "male") echo "Selected"; ?>
									    	>Male</option>
									    	<option value ="female"
                                            <?php if($record->gender == "female") echo "Selected"; ?>
									    	>FeMale</option>
									    </select>	
										
									</div>
								</div>	

							<div class="col-sm-6 form-group">
								<label class="col-sm-4 control-label">
									Address / Village  <span class="symbol required">*</span>
								</label>
									<div class="col-sm-6" >
										 <input type="text"  id = "comp_add" name ="comp_add" class="form-control m-b-sm" required="required" 
                                         value="<?php echo $record->address; ?>"
										 >
									</div>	
								</div>

								<div class="col-sm-6 form-group">
								<label class="col-sm-4 control-label">
									Pincode  <span class="symbol required"></span>
								</label>
									<div class="col-sm-6" >
										 <input type="number"  id = "pincode" name ="pincode" class="form-control m-b-sm"  min="0"
										 value="<?php echo $record->pincode; ?>"
										 >
									</div>	
								</div>
							
							
								<div class="col-sm-6 form-group">
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
                                         <option value="<?php echo  $row->complain_type?>"
                                           <?php if($record->complain_type == $row->complain_type) echo "Selected"; ?>
                                         	>
                                         	<?php echo  $row->complain_type?></option>
									    <?php endforeach; ?>
									</select>
									</div>
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
								<div class="col-sm-6 form-group">
									<label class="col-sm-4 control-label">
										Replace File(max size 2048KB)<span class="symbol required"></span>
									</label>
									<div class="col-sm-6">
										 <input type="file"  id = "file_name" name = "file_name" class="form-control  m-b-sm" >
										 <a href="<?php echo base_url("assets/complain/$record->uploaded_file"); ?>" target="_blank">
										 	<?php echo $record->uploaded_file;?>
										 </a>
									</div>	
								</div>
								
								<div class="col-sm-6 form-group">
								<label class="col-sm-4 control-label">
									Write Your Complain (MM: 500 char) <span class="symbol required">*</span>
									</label>
									<div class="col-sm-6">
										<textarea rows="3" name = "shikayat" class="form-control  m-b-sm " required="required" cols="1"><?php echo $record->complain; ?></textarea>  
									</div>	
								</div>
							
								<div >
								 <div class="form-group form-group">
                                    <div class="col-sm-offset-5 col-sm-2">
                                    	   <div id ="bh" >
                                   			 </div>
                                        <button type="submit" id="submitLeave" class="btn btn-success">Update Complain</button>

                                    </div>
                                </div>
                                <br>
								
								</div>
								</div>	
							 </form> 

<?php }else{ echo "Record not found"; } endif; ?>				                      
                     
                			</div>
            </div>
            </div>
 
            <div class="col-md-0" id = "prevDisplay">
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

 