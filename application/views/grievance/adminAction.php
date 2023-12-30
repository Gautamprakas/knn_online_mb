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

					<form class="form-horizontal" action="<?php echo "#";?>" method="post" enctype="multipart/form-data">
						
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
									Complainer  <span class="symbol required"></span>
								</label>
									<div class="col-sm-6" >
										 <?php echo $row->complainer_name; ?>
									</div>	
								</div>

								<div class="col-sm-12 form-group">
								<label class="col-sm-4 text-right">
									Gender  <span class="symbol required"></span>
								</label>
									<div class="col-sm-6" >
										 <?php echo $row->gender; ?>
									</div>	
								</div>

								<div class="col-sm-12 form-group">
								<label class="col-sm-4 text-right">
									Mobile  <span class="symbol required"></span>
								</label>
									<div class="col-sm-6" >
										 <?php echo $row->mobile_number; ?>
									</div>	
								</div>

								<div class="col-sm-12 form-group">
								<label class="col-sm-4 text-right">
									Address  <span class="symbol required"></span>
								</label>
									<div class="col-sm-6" >
										 <?php echo $row->address; ?>
									</div>	
								</div>


								<div class="col-sm-12 form-group">
								<label class="col-sm-4 text-right">
									Pincode  <span class="symbol required"></span>
								</label>
									<div class="col-sm-6" >
										 <?php echo $row->pincode; ?>
									</div>	
								</div>
                                
                                <div class="col-sm-12 form-group">
								<label class="col-sm-4 text-right">
									Complain Date <span class="symbol required"></span>
								</label>
									<div class="col-sm-6" >
										 <?php echo $row->complain_date; ?>
									</div>	
								</div>

								<div class="col-sm-12 form-group">
								<label class="col-sm-4 text-right">
									Complain  <span class="symbol required"></span>
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
                                                </a>
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
								<label class="col-sm-4 text-right">
									Assign Date <span class="symbol required"></span>
								</label>
									<div class="col-sm-6" >
										 <?php echo $row->assign_date; ?>
									</div>	
								</div>

								<div class="col-sm-12 form-group">
								<label class="col-sm-4 text-right">
									Department <span class="symbol required"></span>
								</label>
									<div class="col-sm-6" >
										 <?php echo $row->department; ?>
									</div>	
								</div>

								<div class="col-sm-12 form-group">
								<label class="col-sm-4 text-right">
									Officer Name <span class="symbol required"></span>
								</label>
									<div class="col-sm-6" >
										 <?php echo $row->officer_name; ?>
									</div>	
								</div>
								
								<div class="col-sm-12 form-group">
								<label class="col-sm-4 text-right">
									Explaination 
									</label>
									<div class="col-sm-6">
										  <?php echo $row->explaination; ?>
									</div>	
								</div>

								<div class="col-sm-12 form-group">
									<label class="col-sm-4 text-right">
										Officer File <span class="symbol required"></span>
									</label>
									<div class="col-sm-6">
										  <a href="<?php echo base_url("assets/complain/$row->uploaded_file_bydep");?>" target="_blank">
                                                  <?php echo $row->uploaded_file_bydep; ?>  
                                                </a>
									</div>	
								</div>
								<div >
								 <div class="form-group form-group">
                                    <div class="col-sm-offset-5 col-sm-2">
                                    	   
                                        <button type="button" id="redress" class="btn btn-success">Redress</button>
                                        <button type="button" id="unredress" class="btn btn-danger">UnRedress</button>
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

 