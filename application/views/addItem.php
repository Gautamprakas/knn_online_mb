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
                            <i class="fa fa-gift"></i>Add Item Details</div>
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
									Item name  <span class="symbol required control-label">*</span>
								</label>
								<div class="col-sm-6">
									<input type="text" name="father_name" class="form-control m-b-sm"  required="required" placeholder="Enter Item Details" >
								</div>	
							</div>


							<div class="col-sm-12 form-group">
								<label class="col-sm-4 control-label">
									Nos.  <span class="symbol required control-label">*</span>
								</label>
								<div class="col-sm-6">
									<input type="text" name="patrawali_date" class="form-control m-b-sm"  required="required" placeholder="Number of quanitity" >
								</div>	
							</div>

							<div class="col-sm-12 form-group">
								<label class="col-sm-4 control-label">
									length  <span class="symbol required control-label"></span>
								</label>
								<div class="col-sm-6">
									<input type="text" name="patrawali_date" class="form-control m-b-sm"  placeholder="length of item" >
								</div>	
							</div>
							<div class="col-sm-12 form-group">
								<label class="col-sm-4 control-label">
									breadth  <span class="symbol required control-label"></span>
								</label>
								<div class="col-sm-6">
									<input type="text" name="patrawali_date" class="form-control m-b-sm"  placeholder="breadth of item" >
								</div>	
							</div>
							<div class="col-sm-12 form-group">
								<label class="col-sm-4 control-label">
									Height  <span class="symbol required control-label"></span>
								</label>
								<div class="col-sm-6">
									<input type="text" name="patrawali_date" class="form-control m-b-sm"  placeholder="Height of item" >
								</div>	
							</div>
							<div class="col-sm-12 form-group">
								<label class="col-sm-4 control-label">
									Unit  <span class="symbol required control-label">*</span>
								</label>
								<div class="col-sm-6">
									<input type="text" name="patrawali_date" class="form-control m-b-sm"  placeholder="Unit of item" >
								</div>	
							</div>

							<div class="col-sm-12 form-group">
								<label class="col-sm-4 control-label">
								  <span class="symbol required"></span>
								</label>
									<div class="col-sm-6" >
										 <button type="submit" id="submitLeave" class="btn btn-success">Add Item Details</button>
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

 