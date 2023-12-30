<div class="page-content-inner">
                            <div class="row">
                                <div class="col-md-12">
									<div class="portlet light ">
										<div class="portlet box green ">
                                        <div class="portlet-title">
                                            <div class="caption">
                                                <i class="fa fa-gift"></i>Project Panel  </div>
                                            <div class="tools">
                                                <a href="#" class="collapse"> </a>
                                                <a href="#portlet-config" data-toggle="modal" class="config"> </a>
                                                <a href="#" class="reload"> </a>
                                                <a href="#" class="remove"> </a>
                                            </div>
                                      </div>
                             <div class="portlet-body">
                             <div>
                             		<!--Welcome to Work Panel  ......-->
                             </div>
                             <div class="row">
            <div class="col-md-12">
                <div class="portlet box green">
                    <div class="portlet-title">
                        <div class="caption">
                            <i class="fa fa-gift"></i>Add Project Details</div>
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
								<!-- <label class="col-sm-4 control-label">
									क्रमांक  <span class="symbol required control-label">*</span>
								</label>
								<div class="col-sm-6">
									<input type="text" name="age" class="form-control m-b-sm"  required="required" placeholder="Enter Serial No" >
								</div>	 -->
							</div>

							<div class="col-sm-12 form-group">
								<label class="col-sm-4 control-label">
									Project Type  <span class="symbol required control-label">*</span>
								</label>
								<div class="col-sm-6">

									<label class="radio-inline">
									  <input type="radio" name="file_type" id="file_type_estimated" value="Estimated" checked="checked"> Estimate
									</label>
								</div>	
							</div>
							<br>


							<div class="col-sm-12 form-group">
								<label class="col-sm-4 control-label">
									Project Number  <span class="symbol required control-label">*</span>
								</label>
								<div class="col-sm-6">
									<input type="text" name="father_name" class="form-control m-b-sm"  required="required" placeholder="Enter Project Number" >
								</div>	
							</div>


							<div class="col-sm-12 form-group">
								<label class="col-sm-4 control-label">
									Project Date  <span class="symbol required control-label">*</span>
								</label>
								<div class="col-sm-6">
									<input type="text" name="patrawali_date" class="form-control m-b-sm date"  required="required" placeholder="Select Project Date" >
								</div>	
							</div>


							<div class="col-sm-12 form-group">
								<label class="col-sm-4 control-label">
									Financial Year  <span class="symbol required control-label">*</span>
								</label>
								<div class="col-sm-6">
									<select id = "financial_year" name ="financial_year" class="form-control m-b-sm" required="required">
										<option value="">--Select Financial Year--</option>
										<?php 
											$curyear = date('Y') + 1;
											for($curyear;$curyear>2010;$curyear--){
												$fyear = sprintf("%s-%s",($curyear-1),$curyear);
										?>
											<option value="<?php echo $fyear; ?>"><?php echo $fyear; ?></option>
										<?php } ?>
									</select>
								</div>	
							</div>


							<div class="col-sm-12 form-group">
								<label class="col-sm-4 control-label">
									Department  <span class="symbol required">*</span>
								</label>
								<div class="col-sm-6" >
									<select id = "related_department" name ="related_department" class="form-control m-b-sm" required="required">
										<option value="">--Select Department--</option>
										<?php
											$this->db->where('dep_type','department');
											$this->db->order_by('patal_name');
											$res = $this->db->get('officers_list');
											foreach($res->result() as $row){
										?>
										<option value="<?php echo $row->patal_name; ?>"><?php echo $row->patal_name; ?></option>
										<?php } ?>
									</select>
								</div>	
							</div>


							 <div class="col-sm-12 form-group">
								<label class="col-sm-4 control-label">
									Zone<span class="symbol required">*</span>
								</label>
								<div class="col-sm-6" >
									<select id = "tehsil" name ="tehsil" class="form-control m-b-sm" required="required">
									</select>
								</div>	 
							</div>

							<div class="col-sm-12 form-group" >
								<label class="col-sm-4 control-label">
									Ward <span class="symbol required">*</span>
								</label>
								<div class="col-sm-6" >
									<select id = "block" name ="block" class="form-control m-b-sm" required="required">
									</select>
								</div>	
							</div>


							<div class="col-sm-12 form-group">
								<label class="col-sm-4 control-label">
									 Name of Corporator  <span class="symbol required"></span>
								</label>
								<div class="col-sm-6" >
									<select id = "village" name ="village" class="form-control m-b-sm" required="required">
									</select>
								</div>	
							</div>


							<div class="col-sm-12 form-group">
								<label class="col-sm-4 control-label">
									Budget Head  <span class="symbol required">*</span>
								</label>
								<div class="col-sm-6" >
									<select id = "" name ="address" class="form-control m-b-sm" required="required">
										<option value="">--Select Budget Head--</option>
										<option value="Nagar Nigam Nidhi">Nagar Nigam Nidhi</option>
										<option value="14th finance commission">14th finance commission</option>
										<option value="15th Finance Commission">15th Finance Commission</option>
									</select>
								</div>	
							</div>

							


							<div class="col-sm-12 form-group">
								<label class="col-sm-4 control-label">
									Work Name  <span class="symbol required">*</span>
								</label>
								<div class="col-sm-6" >
									<textarea name="subject" class="form-control m-b-sm" placeholder="Enter Work Name" required="required"></textarea>
								</div>	
							</div>

							<div class="col-sm-12 form-group" hidden="hidden">
								<label class="col-sm-4 control-label">
									Description  <span class="symbol required">*</span>
								</label>
								<div class="col-sm-6" >
									<textarea name="complain" class="form-control m-b-sm" placeholder="Enter Description"></textarea>
								</div>	
							</div>


                          
						 <div class="col-sm-12 form-group">
							
								<label class="col-sm-4 control-label">
									Recommended by  <span class="symbol required control-label">*</span>
								</label>
								<div class="col-sm-6">
									<input type="text" name="complainer_name" class="form-control m-b-sm"  required="required" placeholder="Recommended by" >
								</div>	
						</div>

							<!-- <div class="col-sm-12 form-group">
								<label class="col-sm-4 control-label">
									Estimated Cost  <span class="symbol required control-label">*</span>
								</label>
								<div class="col-sm-6">
									<input type="text" name="pincode" class="form-control m-b-sm"  required="required" placeholder="Enter Estimated Cost" maxlength="10">
								</div>	
							</div>

							<div class="col-sm-12 form-group">
								<label class="col-sm-4 control-label">
									Sanctioned Cost  <span class="symbol required control-label">*</span>
								</label>
								<div class="col-sm-6">
									<input type="text" name="mobile_number" class="form-control m-b-sm"  required="required" placeholder="Enter Sanctioned Cost" maxlength="10">
								</div>	
							</div>

							<div class="col-sm-12 form-group">
								<label class="col-sm-4 control-label">
									Approval Date  <span class="symbol required control-label">*</span>
								</label>
								<div class="col-sm-6">
									<input type="text" name="gender" class="form-control m-b-sm date"  required="required" placeholder="Select Date" >
								</div>	
							</div>


							


							

							<div class="col-sm-12 form-group" hidden="hidden">
								<label class="col-sm-4 control-label">
									Date of dispatch to Hon'ble Mayor for approval  <span class="symbol required control-label">*</span>
								</label>
								<div class="col-sm-6">
									<input type="text" name="mahapaura_approval_date" class="form-control m-b-sm date"  required="required" placeholder="Select Date" disabled="disabled">
								</div>	
							</div>


							<div class="col-sm-12 form-group">
								<label class="col-sm-4 control-label">
									Date of dispatch to the concerned department from the office of the Municipal Commissioner  <span class="symbol required control-label">*</span>
								</label>
								<div class="col-sm-6">
									<input type="text" name="nagar_ayukat_approval_date" class="form-control m-b-sm date"  required="required" placeholder="Select Date" >
								</div>	
							</div> -->


							<div class="col-sm-12 form-group">
									<label class="col-sm-4 control-label">
										Project(max size 2048KB)<span class="symbol required"></span>
									</label>
									<div class="col-sm-6">
										 <input type="file"  id = "file_name" name = "file_name" class="form-control  m-b-sm" >
									</div>	
								</div>

								<div class="col-sm-12 form-group">
								<label class="col-sm-4 control-label">
								  <span class="symbol required"></span>
								</label>
									<div class="col-sm-6" >
										 <button type="submit" id="submitLeave" class="btn btn-success">Add Project Details</button>
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


<script>
	jQuery('input[name=pincode]').on('keyup',function(){
		estimated_cost = parseInt(jQuery(this).val());
		mayor_approval_cost = 1000000;
		if( estimated_cost > mayor_approval_cost ){
			jQuery('input[name=mahapaura_approval_date]').prop('disabled',false);
			jQuery('input[name=mahapaura_approval_date]').parent().parent().show();
		}else{
			jQuery('input[name=mahapaura_approval_date]').prop('disabled',true);
			jQuery('input[name=mahapaura_approval_date]').parent().parent().hide();
		}
	});

	jQuery('input[name=file_type]').on('change',function(){
		file_type = jQuery(this).val();

		if( file_type == 'Estimated' ){
			jQuery('select[name=address]').attr('required','required');
			jQuery('input[name=pincode]').attr('required','required');
			jQuery('input[name=mobile_number]').attr('required','required');

			jQuery('select[name=address]').parent().parent().show();
			jQuery('input[name=pincode]').parent().parent().show();
			jQuery('input[name=mobile_number]').parent().parent().show();
		}

		if( file_type == 'Others' ){
			jQuery('select[name=address]').removeAttr('required');
			jQuery('input[name=pincode]').removeAttr('required');
			jQuery('input[name=mobile_number]').removeAttr('required');

			jQuery('select[name=address]').parent().parent().hide();
			jQuery('input[name=pincode]').parent().parent().hide();
			jQuery('input[name=mobile_number]').parent().parent().hide();
		}
	});
</script>

 