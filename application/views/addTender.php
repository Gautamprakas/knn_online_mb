<div class="page-content-inner">
                            <div class="row">
                                <div class="col-md-12">
									<div class="portlet light ">
										<div class="portlet box green ">
                                        <div class="portlet-title">
                                            <div class="caption">
                                                <i class="fa fa-gift"></i>Work Panel  </div>
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
                            <i class="fa fa-gift"></i>Tender Details</div>
                        <div class="tools">
                            <a href="javascript:;" class="collapse"> </a>
                            <a href="#portlet-config" data-toggle="modal" class="config"> </a>
                            <a href="javascript:;" class="reload"> </a>
                            <a href="javascript:;" class="remove"> </a>
                        </div>
                    </div>
                   
                    <div class="portlet-body form">
                    	<?php 

                    		$work_number = '';
							$dhanank_amt = '';
							$nivida_amt = '';
							$nivida_dar = '';
							$tender_date = '';
							$tender_approval_date = '';
							$tender_opening_date = '';
							$tender_closing_date = '';
							$firm_name = '';
							$firm_registration_category = '';
							$firm_registration_validity = '';

                    		if(isset($_POST['work_number'])){
								$this->db->where('complain_number',$_POST['work_number']);
								$res = $this->db->get("complain_record");

								if($res->num_rows()>0){
									$row = $res->row();
									$work_number = $row->complain_number;
									$dhanank_amt = $row->mobile_number;
									$nivida_amt = $row->nivida_amt;
									$nivida_dar = $row->nivida_dar;
									$tender_date = strtotime($row->tender_date)>0?$row->tender_date:'';
									$tender_approval_date = strtotime($row->tender_approval_date)>0?$row->tender_approval_date:'';
									$tender_opening_date = strtotime($row->tender_opening_date)>0?$row->tender_opening_date:'';
									$tender_closing_date = strtotime($row->tender_closing_date)>0?$row->tender_closing_date:'';
									$firm_name = $row->firm_name;
									$firm_registration_category = $row->firm_registration_category;
									$firm_registration_validity = $row->firm_registration_validity;
								}
                    		}
                    		
                    	?>


                    <form class="form-horizontal" action="" method="post">
                    	<div class="col-sm-12 form-group">
						 	<br>
								<?php 
                                 if($error = $this->session->flashdata("dep"))
                                   echo $error; 
                                ?>
							</br>
								<label class="col-sm-4 control-label">
									Work Number  <span class="symbol required control-label">*</span>
								</label>
								<div class="col-sm-6">
									<?php 
											//$this->db->where('firm_name','');
											$this->db->where('cur_status','solved');
											$res = $this->db->get("complain_record");
									?>
									<select name="work_number" id="work_number" class="form-control m-b-sm"  required="required" onchange="this.form.submit()">
										<option value="">--Select Work Number--</option>
										<?php foreach($res->result() as $row){ ?>
											<option value="<?php echo $row->complain_number; ?>" <?php if($row->complain_number==$work_number){ echo 'selected'; } ?> ><?php echo $row->complain_number; ?></option>
										<?php }?>
									</select>
								</div>	
							</div>
                    </form>

					<form class="form-horizontal" action="<?php echo base_url()?>index.php/grievanceController2/saveTender" method="post" enctype="multipart/form-data">
						
						
						 	<input type="hidden" name="work_number" class="form-control m-b-sm"  required="required" readonly="readonly" value="<?php echo $work_number; ?>">


							 <div class="col-sm-12 form-group">
								<label class="col-sm-4 control-label">
									Sanctioned Cost<span class="symbol required">*</span>
								</label>
								<div class="col-sm-6" >
									<input type="text" name="dhanank_amt" class="form-control m-b-sm"  required="required" placeholder="Enter Sanctioned Cost" maxlength="10" readonly="readonly" value="<?php echo $dhanank_amt; ?>">
								</div>	
							</div>

							<div class="col-sm-12 form-group">
								<label class="col-sm-4 control-label">
									Percent Below   <span class="symbol required control-label">*</span>
								</label>
								<div class="col-sm-6">
									<input type="text" name="nivida_dar" class="form-control m-b-sm"  required="required" placeholder="Enter Dar" value="<?php echo $nivida_dar; ?>" maxlength="10" onkeyup="calculate_tender_cost();">
								</div>	
							</div>

							<div class="col-sm-12 form-group" >
								<label class="col-sm-4 control-label">
									Tender Amt <span class="symbol required">*</span>
								</label>
								<div class="col-sm-6" >
									<input type="text" name="nivida_amt" class="form-control m-b-sm"  required="required" placeholder="Enter Tender" readonly="readonly" maxlength="10" value="<?php echo $nivida_amt; ?>" onkeyup="calculate_nivida_dar();">
								</div>	
							</div>



							<div class="col-sm-12 form-group">
								<label class="col-sm-4 control-label">
									Tender Date   <span class="symbol required control-label">*</span>
								</label>
								<div class="col-sm-6">
									<input type="text" name="tender_date" class="form-control m-b-sm date"  required="required" placeholder="Select Tender Date" value="<?php echo $tender_date; ?>" >
								</div>	
							</div>


							<div class="col-sm-12 form-group">
								<label class="col-sm-4 control-label">
									Opening Date   <span class="symbol required control-label">*</span>
								</label>
								<div class="col-sm-6">
									<input type="text" name="tender_opening_date" class="form-control m-b-sm date"  required="required" placeholder="Select Opening Date" value="<?php echo $tender_opening_date; ?>" >
								</div>	
							</div>


							<div class="col-sm-12 form-group">
								<label class="col-sm-4 control-label">
									Firm Name  <span class="symbol required">*</span>
								</label>
								<div class="col-sm-6" >
									<textarea name="firm_name" class="form-control m-b-sm" placeholder="Enter Firm Name" required="required"><?php echo $firm_name; ?></textarea>
								</div>	
							</div>


							<div class="col-sm-12 form-group">
								<label class="col-sm-4 control-label">
									Firm Registration Status  <span class="symbol required">*</span>
								</label>
								<div class="col-sm-6" >
									<div class="col-sm-6">
										<select name="firm_registration_category" class="form-control m-b-sm" id="firm_registration_category" required="required">
											<option value="">Select Category</option>
											<option value="Plant" <?php if($firm_registration_category=="Plant") echo "selected"; ?> >Plant</option>
											<option value="Super A" <?php if($firm_registration_category=="Super A") echo "selected"; ?> >Super A</option>
											<option value="A" <?php if($firm_registration_category=="A") echo "selected"; ?> >A</option>
											<option value="B" <?php if($firm_registration_category=="B") echo "selected"; ?> >B</option>
											<option value="C" <?php if($firm_registration_category=="C") echo "selected"; ?> >C</option>
											<option value="D" <?php if($firm_registration_category=="D") echo "selected"; ?> >D</option>
										</select>
									</div>
									<div class="col-sm-6">
										<select name="firm_registration_validity" class="form-control m-b-sm" id="firm_registration_validity" required="required">
											<option value="">Select Validity</option>
											<?php for($i=2019;$i<=2029;$i++){ ?>
												<option value="<?php echo $i; ?>" <?php if($firm_registration_validity==$i) echo "selected"; ?> ><?php echo $i; ?></option>
											<?php } ?>
										</select>
									</div>

								</div>	
							</div>


							<div class="col-sm-12 form-group">
								<label class="col-sm-4 control-label">
									Tender Approval Date   <span class="symbol required control-label">*</span>
								</label>
								<div class="col-sm-6">
									<input type="text" name="tender_approval_date" class="form-control m-b-sm date"  required="required" placeholder="Select Approval Date" value="<?php echo $tender_approval_date; ?>" >
								</div>	
							</div>



							<div class="col-sm-12 form-group">
								<label class="col-sm-4 control-label">
									Closing Date   <span class="symbol required control-label">*</span>
								</label>
								<div class="col-sm-6">
									<input type="text" name="tender_closing_date" class="form-control m-b-sm date"  required="required" placeholder="Select Closing Date" value="<?php echo $tender_closing_date; ?>" >
								</div>	
							</div>


							


							<div class="col-sm-12 form-group">
									<label class="col-sm-4 control-label">
										File(max size 2048KB)<span class="symbol required"></span>
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
										 <button type="submit" id="submitLeave" class="btn btn-success">Add Tender Details</button>
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

	function calculate_nivida_dar(){
		dhanank_amt = parseFloat(document.getElementsByName('dhanank_amt')[0].value);
		nivida_amt = parseFloat(document.getElementsByName('nivida_amt')[0].value);

		nivida_dar = ( dhanank_amt - nivida_amt ) / dhanank_amt;

		document.getElementsByName('nivida_dar')[0].value = nivida_dar.toFixed(3); 
	}
	
	function calculate_tender_cost(){
		dhanank_amt = parseFloat(document.getElementsByName('dhanank_amt')[0].value);
		nivida_dar = parseFloat(document.getElementsByName('nivida_dar')[0].value);

		nivida_amt = dhanank_amt + ( ( dhanank_amt * nivida_dar ) / 100 );

		document.getElementsByName('nivida_amt')[0].value = nivida_amt.toFixed(3); 
	}
</script>

 