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
                            <i class="fa fa-gift"></i>Payment Details</div>
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
							$tender_approval_date = '';
							$firm_name = '';

							$sno = '';
							$zone = '';
							$ward = '';
							$patrawali_sankhya = '';
							$work_name = '';
							$financial_year = '';

                    		if(isset($_POST['work_number'])){
								$this->db->where('complain_number',$_POST['work_number']);
								$res = $this->db->get("complain_record");

								if($res->num_rows()>0){
									$row = $res->row();
									$work_number = $row->complain_number;
									$dhanank_amt = $row->pincode;
									$nivida_amt = $row->nivida_amt;
									$nivida_dar = $row->nivida_dar;
									$tender_approval_date = strtotime($row->tender_approval_date)>0?$row->tender_approval_date:'';
									$firm_name = $row->firm_name;
									$sno = $row->age;
									$zone = $row->tehsil;
									$ward = $row->block_name;
									$patrawali_sankhya = $row->father_name;
									$work_name = $row->subject;
									$financial_year = $row->financial_year;
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
											$this->db->where('firm_name !=','');
											$this->db->where('cur_status','redressed');
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

					<form class="form-horizontal" action="<?php echo base_url()?>index.php/grievanceController2/savePayment" method="post" enctype="multipart/form-data">
						
						
						 	<input type="hidden" name="work_number" class="form-control m-b-sm"  required="required" readonly="readonly" value="<?php echo $work_number; ?>">

						 	<div class="col-sm-12 form-group" hidden="hidden">
								<label class="col-sm-4 control-label">
									क्रमांक<span class="symbol required">*</span>
								</label>
								<div class="col-sm-6" >
									<input type="text" name="sno" class="form-control m-b-sm"  required="required" placeholder="Enter SNo" readonly="readonly" value="<?php echo $sno; ?>">
								</div>	
							</div>


							 <div class="col-sm-12 form-group">
								<label class="col-sm-4 control-label">
									Zone<span class="symbol required">*</span>
								</label>
								<div class="col-sm-6" >
									<input type="text" name="zone" class="form-control m-b-sm"  required="required" placeholder="Enter Zone" readonly="readonly" value="<?php echo $zone; ?>">
								</div>	
							</div>


							<div class="col-sm-12 form-group">
								<label class="col-sm-4 control-label">
									Ward<span class="symbol required">*</span>
								</label>
								<div class="col-sm-6" >
									<input type="text" name="ward" class="form-control m-b-sm"  required="required" placeholder="Enter Ward" readonly="readonly" value="<?php echo $ward; ?>">
								</div>	
							</div>

							<div class="col-sm-12 form-group" >
								<label class="col-sm-4 control-label">
									File Number <span class="symbol required">*</span>
								</label>
								<div class="col-sm-6" >
									<input type="text" name="patrawali_sankhya" class="form-control m-b-sm"  required="required" placeholder="Enter File Number" value="<?php echo $patrawali_sankhya; ?>" readonly="readonly">
								</div>	
							</div>



							<div class="col-sm-12 form-group">
								<label class="col-sm-4 control-label">
									Financial Year   <span class="symbol required control-label">*</span>
								</label>
								<div class="col-sm-6">
									<!-- <select id = "financial_year" name ="financial_year" class="form-control m-b-sm" required="required">
										<option value="">--Select Financial Year--</option>
										<?php 
											/*$curyear = date('Y')+1;
											for($curyear;$curyear>2010;$curyear--){
												$fyear = sprintf("%s-%s",($curyear-1),$curyear);
										?>
											<option value="<?php echo $fyear; ?>" <?php if( $financial_year == $fyear ) echo "Selected"; ?> ><?php echo $fyear; ?></option>
										<?php }*/ ?>
									</select> -->
									<input id = "financial_year" name ="financial_year" class="form-control m-b-sm" required="required" value="<?php echo $financial_year; ?>" readonly="readonly" />
								</div>	
							</div>

							<div class="col-sm-12 form-group">
								<label class="col-sm-4 control-label">
									Work Name  <span class="symbol required control-label">*</span>
								</label>
								<div class="col-sm-6">
									<input type="text" name="work_name" class="form-control m-b-sm"  required="required" placeholder="Enter Work Name" readonly="readonly" value="<?php echo $work_name; ?>">
								</div>	
							</div>


							<div class="col-sm-12 form-group">
								<label class="col-sm-4 control-label">
									Date of dispatch for payment   <span class="symbol required control-label">*</span>
								</label>
								<div class="col-sm-6">
									<input type="text" name="date_of_dispatch_for_payment" class="form-control m-b-sm date"  required="required" placeholder="Select Date" value="" >
								</div>	
							</div>


							<div class="col-sm-12 form-group">
								<label class="col-sm-4 control-label">
									Total work done   <span class="symbol required control-label">*</span>
								</label>
								<div class="col-sm-6">
									<input type="text" name="total_work_done" class="form-control m-b-sm"  required="required" placeholder="Enter Cost" maxlength="10" onkeyup="calculate_total_payable();">
								</div>	
							</div>


							<div class="col-sm-12 form-group">
								<label class="col-sm-4 control-label">
									Security deposit    <span class="symbol required control-label">*</span>
								</label>
								<div class="col-sm-6">
									<input type="text" name="security_deposit" class="form-control m-b-sm"  required="required" placeholder="Enter Cost" maxlength="10" onkeyup="calculate_total_deduction(); calculate_total_payable();">
								</div>	
							</div>

							<div class="col-sm-12 form-group">
								<label class="col-sm-4 control-label">
									Contract late fee    <span class="symbol required control-label">*</span>
								</label>
								<div class="col-sm-6">
									<input type="text" name="contract_late_fee" class="form-control m-b-sm"  required="required" placeholder="Enter Cost" maxlength="10" onkeyup="calculate_total_deduction(); calculate_total_payable();">
								</div>	
							</div>


							<div class="col-sm-12 form-group">
								<label class="col-sm-4 control-label">
									Work late fee    <span class="symbol required control-label">*</span>
								</label>
								<div class="col-sm-6">
									<input type="text" name="work_late_fee" class="form-control m-b-sm"  required="required" placeholder="Enter Cost" maxlength="10" onkeyup="calculate_total_deduction(); calculate_total_payable();">
								</div>	
							</div>


							<div class="col-sm-12 form-group">
								<label class="col-sm-4 control-label">
									Prepayment amount    <span class="symbol required control-label">*</span>
								</label>
								<div class="col-sm-6">
									<input type="text" name="prepayment_amount" class="form-control m-b-sm"  required="required" placeholder="Enter Cost" maxlength="10" onkeyup="calculate_total_deduction(); calculate_total_payable();">
								</div>	
							</div>


							<div class="col-sm-12 form-group">
								<label class="col-sm-4 control-label">
									J.T.    <span class="symbol required control-label">*</span>
								</label>
								<div class="col-sm-6">
									<input type="text" name="jt" class="form-control m-b-sm"  required="required" placeholder="Enter Cost" maxlength="10" onkeyup="calculate_total_deduction(); calculate_total_payable();">
								</div>	
							</div>


							<div class="col-sm-12 form-group">
								<label class="col-sm-4 control-label">
									S.T.    <span class="symbol required control-label">*</span>
								</label>
								<div class="col-sm-6">
									<input type="text" name="st" class="form-control m-b-sm"  required="required" placeholder="Enter Cost" maxlength="10" onkeyup="calculate_total_deduction(); calculate_total_payable();">
								</div>	
							</div>


							<div class="col-sm-12 form-group">
								<label class="col-sm-4 control-label">
									G.S.T.    <span class="symbol required control-label">*</span>
								</label>
								<div class="col-sm-6">
									<input type="text" name="gst" class="form-control m-b-sm"  required="required" placeholder="Enter Cost" maxlength="10" onkeyup="calculate_total_deduction(); calculate_total_payable();">
								</div>	
							</div>


							<div class="col-sm-12 form-group">
								<label class="col-sm-4 control-label">
									Cess forgone     <span class="symbol required control-label">*</span>
								</label>
								<div class="col-sm-6">
									<input type="text" name="saas_forgone_cost" class="form-control m-b-sm"  required="required" placeholder="Enter Cost" maxlength="10" onkeyup="calculate_total_deduction(); calculate_total_payable();">
								</div>	
							</div>


							<div class="col-sm-12 form-group">
								<label class="col-sm-4 control-label">
									Other    <span class="symbol required control-label">*</span>
								</label>
								<div class="col-sm-6">
									<input type="text" name="other" class="form-control m-b-sm"  required="required" placeholder="Enter Cost" maxlength="10" onkeyup="calculate_total_deduction(); calculate_total_payable();">
								</div>	
							</div>




							<div class="col-sm-12 form-group">
								<label class="col-sm-4 control-label">
									Total deduction   <span class="symbol required control-label">*</span>
								</label>
								<div class="col-sm-6">
									<input type="text" name="total_deduction" class="form-control m-b-sm"  required="required" placeholder="Enter Cost" maxlength="10" readonly="readonly">
								</div>	
							</div>


							<div class="col-sm-12 form-group">
								<label class="col-sm-4 control-label">
									Total payable     <span class="symbol required control-label">*</span>
								</label>
								<div class="col-sm-6">
									<input type="text" name="total_payable" class="form-control m-b-sm"  required="required" placeholder="Enter Cost" maxlength="10" readonly="readonly">
								</div>	
							</div>



							<div class="col-sm-12 form-group">
								<label class="col-sm-4 control-label">
									Date of payment    <span class="symbol required control-label">*</span>
								</label>
								<div class="col-sm-6">
									<input type="text" name="date_of_payment" class="form-control m-b-sm date"  required="required" placeholder="Select Date" value="" >
								</div>	
							</div>


							<div class="col-sm-12 form-group">
								<label class="col-sm-4 control-label">
									Date of sending letter from Municipal Commissioner's office    <span class="symbol required control-label">*</span>
								</label>
								<div class="col-sm-6">
									<input type="text" name="date_of_sending_letter_from_unicipal_commissioner_office" class="form-control m-b-sm date"  required="required" placeholder="Select Date" value="" >
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
										 <button type="submit" id="submitLeave" class="btn btn-success">Add Payment Details</button>
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

	function calculate_total_deduction(){
		total_work_done = parseFloat(document.getElementsByName('total_work_done')[0].value);
		security_deposit = parseFloat(document.getElementsByName('security_deposit')[0].value);
		contract_late_fee = parseFloat(document.getElementsByName('contract_late_fee')[0].value);
		work_late_fee = parseFloat(document.getElementsByName('work_late_fee')[0].value);
		prepayment_amount = parseFloat(document.getElementsByName('prepayment_amount')[0].value);
		security_deposit = parseFloat(document.getElementsByName('security_deposit')[0].value);
		jt = parseFloat(document.getElementsByName('jt')[0].value);
		st = parseFloat(document.getElementsByName('st')[0].value);
		gst = parseFloat(document.getElementsByName('gst')[0].value);
		saas_forgone_cost = parseFloat(document.getElementsByName('saas_forgone_cost')[0].value);
		other = parseFloat(document.getElementsByName('other')[0].value);

		total_deduction = security_deposit + contract_late_fee + work_late_fee + prepayment_amount + security_deposit + jt + st + gst + saas_forgone_cost + other;

		document.getElementsByName('total_deduction')[0].value = total_deduction.toFixed(3); 
	}

	function calculate_total_payable(){
		total_work_done = parseFloat(document.getElementsByName('total_work_done')[0].value);
		total_deduction = parseFloat(document.getElementsByName('total_deduction')[0].value);

		total_payable = total_work_done - total_deduction;

		document.getElementsByName('total_payable')[0].value = total_payable.toFixed(3); 
	}
</script>

 