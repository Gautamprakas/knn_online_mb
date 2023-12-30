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
                   
                    <div class="portlet-body form" style="background: #ccccff;">
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

					<form class="form-horizontal" action="<?php echo base_url("index.php/grievanceController/assign")?>" method="post" enctype="multipart/form-data">
						
								 <div class="col-sm-12 form-group">
								 <br><br>
								<label class="col-sm-4 control-label">
									Complain Number  <span class="symbol required"></span>
								</label>
									<div class="col-sm-6" >
										 <input type="text"  id = "cnumber" name ="cnumber" class="form-control m-b-sm" readonly="readonly" value="<?php echo $cid; ?>">
									</div>	
								</div>
								<div class="col-sm-12 form-group">
							
								<label class="col-sm-4 text-right">
									 Complainer <span class="symbol pull-right"></span>
								</label>
									<div class="col-sm-6" >
										 <?php echo $row->complainer_name; ?>
									</div>	
								</div>

								<div class="col-sm-12 form-group">
							
								<label class="col-sm-4 text-right">
									 Gender <span class="symbol pull-right"></span>
								</label>
									<div class="col-sm-6" >
										 <?php echo $row->gender; ?>
									</div>	
								</div>

								<div class="col-sm-12 form-group">
							
								<label class="col-sm-4 text-right">
									 Mobile <span class="symbol pull-right"></span>
								</label>
									<div class="col-sm-6" >
										 <?php echo $row->mobile_number; ?>
									</div>	
								</div>

								<div class="col-sm-12 form-group">
							
								<label class="col-sm-4 text-right">
									 Address <span class="symbol pull-right"></span>
								</label>
									<div class="col-sm-6" >
										 <?php echo $row->address; ?>
									</div>	
								</div>

								<div class="col-sm-12 form-group">
							
								<label class="col-sm-4 text-right">
									 Pincode <span class="symbol pull-right"></span>
								</label>
									<div class="col-sm-6" >
										 <?php echo $row->pincode; ?>
									</div>	
								</div>

								<div class="col-sm-12 form-group">
							
								<label class="col-sm-4 text-right">
									 Complain Date<span class="symbol pull-right"></span>
								</label>
									<div class="col-sm-6" >
										 <?php echo $row->complain_date; ?>
									</div>	
								</div>

								<div class="col-sm-12 form-group">
							
								<label class="col-sm-4 text-right">
									 Complain <span class="symbol pull-right"></span>
								</label>
									<div class="col-sm-6" >
										 <?php echo $row->complain; ?>
									</div>	
								</div>
                               
                               <div class="col-sm-12 form-group">
								
								<label class="col-sm-4 text-right">
									Complain Type  <span class="symbol required"></span>
								</label>
									<div class="col-sm-6" >
										 <?php echo $row->complain_type; ?>
									</div>	
								</div>

								<div class="col-sm-12 form-group">
							
								<label class="col-sm-4 text-right">
									File  <span class="symbol required"></span>
								</label>
									<div class="col-sm-6" >
										 <a href="<?php echo base_url("assets/complain/$row->uploaded_file");?>" target="_blank">
                                                  <?php echo $row->uploaded_file; ?>  
                                                </a></td>
									</div>	
								</div>
                              
                              <div class="col-sm-12 form-group">
									<label class="col-sm-4 text-right">
										Block  <span class="symbol required"></span>
									</label>
									<div class="col-sm-6">	
										<?php echo $row->block_name; ?>
									</div>
								</div>
                               
                               <div class="col-sm-12 form-group">
									<label class="col-sm-4 control-label">
										Chnage Status  <span class="symbol required"></span>
									</label>
									<div class="col-sm-6">	
										<select class="form-control m-b-sm" id="typeof_Complain" name="status" required="required">
										<option value="">-Select Status- </option>
										<option value="Assign">Assign</option> 
										<option value="Solved">Solved</option> 
									</select>
									</div>
								</div>

                               
                               

								<div class="col-sm-12 form-group">
		
								<label class="col-sm-4 control-label">
									 Select Department  <span class="symbol required control-label"></span>
								</label>
								<?php 
										if($this->session->userdata("login_type") == "admin")
										{
											$this->db->where("dep_type","department");
										   $branchtype = $this->db->get("officers_list");
										}
										else
										{
                                           $type = $uid = $this->session->userdata("username");
                                                   $this->db->where("username",$uid)
                                                     ->get("officers_list")
                                                     ->row()->dep_type;

                                           $branchtype =  $this->db->where("dep_type",$type)
                                                     ->get("officers_list");
										}
								?>
								
								<div class="col-sm-6">
								<select class="form-control m-b-sm" id="block_name" name="dep" required="required">
										<option value="">-Select Department- </option> 
										<?php foreach($branchtype->result() as $bt):?>
										<option value="<?php echo $bt->sno;?>"><?php echo $bt->patal_name;?></option> 
										<?php endforeach;?>
								</select>
								</div>	
						</div>
							
							
							
								
							

								
							

							
							
								
								
								
								
								<div class="col-sm-12 form-group">
								<label class="col-sm-4 control-label">
									Write Comment(MM: 500 char)  
									</label>
									<div class="col-sm-6">
										<textarea rows="3" name = "comment" class="form-control  m-b-sm " required="required" cols="1"></textarea>  
									</div>	
								</div>
							
								<div >
								 <div class="form-group form-group">
                                    <div class="col-sm-offset-5 col-sm-2">
                                    	   <div id ="bh" >
                                   			 </div>
                                        <button type="submit" id="submitLeave" class="btn btn-success">Submit</button>
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

 