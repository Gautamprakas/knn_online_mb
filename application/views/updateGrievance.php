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
                            <i class="fa fa-gift"></i>Add Grievance detail</div>
                        <div class="tools">
                            <a href="javascript:;" class="collapse"> </a>
                            <a href="#portlet-config" data-toggle="modal" class="config"> </a>
                            <a href="javascript:;" class="reload"> </a>
                            <a href="javascript:;" class="remove"> </a>
                        </div>
                    </div>
                   
                    <div class="portlet-body form">

<form class="form-horizontal" action="#" method="post" enctype="multipart/form-data">
   
						 <div class="col-sm-12 form-group">
							<br>
								<?php 
                                 if($error = $this->session->flashdata("dep"))
                                   echo $error; 
                                ?>
							</br>
								<label class="col-sm-4 control-label">
									 Complain Number  <span class="symbol required control-label"></span>
								</label>
								<div class="col-sm-4">
									<input type="text" name="complain_number" class="form-control m-b-sm"  required="required" placeholder="Enter Complain Number" value="<?php if(isset($_POST["complain_number"]))  echo $_POST["complain_number"];?>">
	
								</div>
								<div class="col-sm-4" >
										 <button type="submit" id="submitLeave" class="btn btn-success">Submit</button>
									</div>	
						</div>
								
								</div>
								</div>	
							 </form> 



<hr>

<?php if(isset($_POST["complain_number"])) : ?>

<?php
       $this->db->select("*");
       $this->db->where("complain_number",$_POST["complain_number"]);
       $this->db->where("cur_status","new");
       $res = $this->db->get("complain_record");
       if( $res->num_rows() < 1){
       	echo "Record Not Found";
       }
       else{

        $row = $res->row();
?>	


					<form class="form-horizontal" action="<?php echo base_url()?>index.php/grievanceController2/updateGrievance" method="post" enctype="multipart/form-data">
						
						
                    <input type="hidden" name="complain_number" value="<?php echo $row->complain_number; ?>">
                          
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
									<input type="text" name="complainer_name" class="form-control m-b-sm"  required="required"  readonly value="<?php echo $row->complainer_name; ?>">
								</div>	
						</div>
                           
                           <div class="col-sm-12 form-group">
								<label class="col-sm-4 control-label">
									Mobile  <span class="symbol required"></span>
								</label>
								<div class="col-sm-6" >
									<input type="text" name="mobile" class="form-control m-b-sm"  required="required"  pattern="[789][0-9]{9}" title="enter 10 digit mobile number" maxlength="10" readonly value="<?php echo $row->mobile_number; ?>">
								</div>	
							</div>
 

						   <div class="col-sm-12 form-group">
								<label class="col-sm-4 control-label">
									Address  <span class="symbol required"></span>
								</label>
								<div class="col-sm-6" >
									<textarea id = "address" name ="address" class="form-control m-b-sm"  required="required" readonly><?php echo $row->address; ?></textarea>
								</div>	
							</div>

						   <div class="col-sm-12 form-group">
								<label class="col-sm-4 control-label">
									Tehsil  <span class="symbol required"></span>
								</label>
								<div class="col-sm-6" >
									<input type="text" id = "tehsil" name ="tehsil" class="form-control m-b-sm"  required="required" readonly value="<?php echo $row->tehsil; ?>">
								</div>	
							</div>

							<div class="col-sm-12 form-group" >
								<label class="col-sm-4 control-label">
									Block <span class="symbol required"></span>
								</label>
								<div class="col-sm-6" >
									<input type="text" id = "block" name ="block" class="form-control m-b-sm"  required="required" readonly value="<?php echo $row->block_name; ?>">
								</div>	
							</div>


							<div class="col-sm-12 form-group">
								<label class="col-sm-4 control-label">
									Village  <span class="symbol required"></span>
								</label>
								<div class="col-sm-6" >
									<input type="text" id = "village" name ="village" class="form-control m-b-sm"  required="required" readonly value="<?php echo $row->village; ?>">
								</div>	
							</div>

							
                            	<div class="col-sm-12 form-group">
									<label class="col-sm-4 control-label">
										Complain Type<span class="symbol required"></span>
									</label>
									<div class="col-sm-6">
										 <select class="form-control  m-b-sm" name="complain_type">
										 	<option value="">--Select Complain Type--</option>
                                         <?php 
                                         
                                         $this->db->distinct();
                                         $this->db->select("complain_type_hindi,complain_type");
                                         $this->db->where("complain_type_hindi !=","");
                                         $res = $this->db->get("complain_type");
                                         foreach($res->result() as $row): ?>   
                                            <option value="<?php echo $row->complain_type_hindi; ?>">
                                            	<?php echo $row->complain_type_hindi; ?>
                                            </option>
                                          <?php endforeach; ?>
										 </select>
									</div>	
								</div>


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
										<textarea rows="3" name = "complain" class="form-control  m-b-sm " required="required" cols="1"></textarea>  
									</div>	
								</div>

								<div class="col-sm-12 form-group">
								<label class="col-sm-4 control-label">
								  <span class="symbol required"></span>
								</label>
									<div class="col-sm-6" >
										 <button type="submit" id="submitLeave" class="btn btn-success">Submit</button>
									</div>	
								</div>

							
                                
								
								</div>
								</div>	
							 </form> 
<?php } endif; ?>				                      
                     
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

 