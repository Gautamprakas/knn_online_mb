<?php 
$ward = isset($_GET["ward"])?$_GET["ward"]:'';
$type = isset($_GET["type"])?$_GET["type"]:'';
?>



<div class="row">
    <div class="col-md-12">
        <div class="panel panel-white">
            <div class="panel-body">
                <center>

                    <form action="" method="get">
                        <div class="col-sm-3 form-group">
                            <label class="col-sm-4 control-label">
                                Ward  <span class="symbol required"></span>
                            </label>
                            <div class="col-sm-8" >
                                <select name ="ward" class="form-control m-b-sm">
                                    <option value="">Select Ward</option>
                                    <?php for( $i=1 ; $i <= 110 ; $i++ ){ ?>
                                        <option value="<?php echo $i; ?>" <?php if($ward==$i) echo "selected"; ?> ><?php echo $i; ?></option>
                                    <?php } ?>
                                </select>
                            </div>  
                        </div>
                        <div class="col-sm-3 form-group">
                            <label class="col-sm-4 control-label">
                                Type  <span class="symbol required"></span>
                            </label>
                            <div class="col-sm-8" >
                                <select name ="type" class="form-control m-b-sm" required="required">
                                    <option value="">Select Type</option>
                                    <option value="sanction_cost" <?php if($type=="sanction_cost") echo "selected"; ?> >Sanction Cost</option>
                                    <option value="tender_cost" <?php if($type=="tender_cost") echo "selected"; ?> >Tender Cost</option>
                                    <option value="payment_cost" <?php if($type=="payment_cost") echo "selected"; ?> >Payment Cost</option>
                                    <option value="engineering" <?php if($type=="engineering") echo "selected"; ?> >Engineering</option>
                                    <option value="tender" <?php if($type=="tender") echo "selected"; ?> >Tender</option>
                                    <option value="payment" <?php if($type=="payment") echo "selected"; ?> >Payment</option>
                                </select>
                            </div>  
                        </div>
                        <div class="col-sm-3 form-group">
                            <label class="col-sm-2 control-label">
                                <span class="symbol required"></span>
                            </label>
                            <div class="col-sm-6" >
                                <button type="submit" class="btn btn-success">Submit</button>
                            </div>  
                        </div>
                    </form>  

                </center>
               <div class="">
                    <table id="sample_1"  class="table table-striped table-bordered table-hover table-checkable order-column" >


<?php if( $type == "sanction_cost" ){ ?>

                    <thead>
                        <tr style="background: #99ff99;">
                            <th>Sno</th>
                            <th>Work Number</th>
                            <th>File Number</th>
                            <th>File Date</th>
                            <th>Financial Year</th>
                            <th>Department</th>
                            <th>Ward</th>
                            <th>Name of Corporator </th>
                            <th>Budget Head</th>
                            <th>Work</th>
                            <th>Recommended by</th>
                            <th>Estimated Cost</th>
                            <th>Sanctioned Cost</th>
                            <th>Approved Date</th>
                            <th>Date of dispatch to Hon'ble Mayor for approval</th>
                            <th>Date of dispatch to the concerned department from the office of the Municipal Commissioner</th>
                        </tr>
                    </thead>
                    <tbody>
                            <?php 
                                $i = 0;
                                $res = $this->db->query(" SELECT * FROM complain_record WHERE block_name = '$ward' ");
                                $result = $res->result();
                                foreach($result as $row){
                            ?>
                                <tr>
                                    <td><?php echo ++$i; ?></td>
                                    <td><?php echo $row->complain_number; ?></td>
                                    <td><?php echo $row->father_name; ?></td>
                                    <td><?php echo $row->patrawali_date; ?></td>
                                    <td><?php echo $row->financial_year; ?></td>
                                    <td><?php echo $row->related_department; ?></td>
                                    <td><?php echo $row->block_name; ?></td>
                                    <td><?php echo $row->village; ?></td>
                                    <td><?php echo $row->address; ?></td>
                                    <td><?php echo $row->subject; ?></td>
                                    <td><?php echo $row->complainer_name; ?></td>
                                    <td><?php echo $row->pincode; ?></td>
                                    <td><?php echo $row->mobile_number; ?></td>
                                    <td><?php echo $row->gender; ?></td>
                                    <td><?php echo $row->mahapaura_approval_date; ?></td>
                                    <td><?php echo $row->nagar_ayukat_approval_date; ?></td>
                                </tr>
                            <?php } ?>
                    </tbody>
<?php } ?>





<?php if( $type == "tender_cost" ){ ?>
                    <thead>
                        <tr style="background: #99ff99;">
                            <th>Sno</th>
                            <th>Work Number</th>
                            <th>File Number</th>
                            <th>File Date</th>
                            <th>Financial Year</th>
                            <th>Department</th>
                            <th>Ward</th>
                            <th>Name of Corporator </th>
                            <th>Budget Head</th>
                            <th>Work</th>
                            <th>Recommended by</th>
                            <th>Estimated Cost</th>
                            <th>Sanctioned Cost</th>
                            <th>Approved Date</th>
                            <th>Date of dispatch to Hon'ble Mayor for approval</th>
                            <th>Date of dispatch to the concerned department from the office of the Municipal Commissioner</th>

                            <th>Tender Amt</th>
                            <th>Percent Below</th>
                            <th>Tender Date</th>
                            <th>Approval Date</th>
                            <th>Opening Date</th>
                            <th>Closing Date</th>
                            <th>Firm Name</th>
                            <th>Firm Registration Category</th>
                            <th>Firm Registration Validity</th>
                        </tr>
                    </thead>
                    <tbody>
                            <?php 
                                $i = 0;
                                $res = $this->db->query(" SELECT * FROM complain_record WHERE block_name = '$ward' ");
                                $result = $res->result();
                                foreach($result as $row){
                            ?>
                                <tr>
                                    <td><?php echo ++$i; ?></td>
                                    <td><?php echo $row->complain_number; ?></td>
                                    <td><?php echo $row->father_name; ?></td>
                                    <td><?php echo $row->patrawali_date; ?></td>
                                    <td><?php echo $row->financial_year; ?></td>
                                    <td><?php echo $row->related_department; ?></td>
                                    <td><?php echo $row->block_name; ?></td>
                                    <td><?php echo $row->village; ?></td>
                                    <td><?php echo $row->address; ?></td>
                                    <td><?php echo $row->subject; ?></td>
                                    <td><?php echo $row->complainer_name; ?></td>
                                    <td><?php echo $row->pincode; ?></td>
                                    <td><?php echo $row->mobile_number; ?></td>
                                    <td><?php echo $row->gender; ?></td>
                                    <td><?php echo $row->mahapaura_approval_date; ?></td>
                                    <td><?php echo $row->nagar_ayukat_approval_date; ?></td>

                                    <td><?php echo $row->nivida_amt; ?></td>
                                    <td><?php echo $row->nivida_dar; ?></td>
                                    <td><?php echo $row->tender_date; ?></td>
                                    <td><?php echo $row->tender_approval_date; ?></td>
                                    <td><?php echo $row->tender_opening_date; ?></td>
                                    <td><?php echo $row->tender_closing_date; ?></td>
                                    <td><?php echo $row->firm_name; ?></td>
                                    <td><?php echo $row->firm_registration_category; ?></td>
                                    <td><?php echo $row->firm_registration_validity; ?></td>

                                </tr>
                            <?php } ?>
                    </tbody>
<?php } ?>





<?php if( $type == "payment_cost" ){ ?>
                    <thead>
                        <tr style="background: #99ff99;">
                            <th>Sno</th>
                            
                            <th>Work Number</th>
                            <th>File Number</th>
                            <th>File Date</th>
                            <th>Financial Year</th>
                            <th>Department</th>
                            <th>Ward</th>
                            <th>Name of Corporator </th>
                            <th>Budget Head</th>
                            <th>Work</th>
                            <th>Recommended by</th>
                            <th>Estimated Cost</th>
                            <th>Sanctioned Cost</th>
                            <th>Approved Date</th>
                            <th>Date of dispatch to Hon'ble Mayor for approval</th>
                            <th>Date of dispatch to the concerned department from the office of the Municipal Commissioner</th>

                            <th>Tender</th>
                            <th>Percent Below</th>
                            <th>Tender Date</th>
                            <th>Approval Date</th>
                            <th>Opening Date</th>
                            <th>Closing Date</th>
                            <th>Firm Name</th>
                            <th>Firm Registration Category</th>
                            <th>Firm Registration Validity</th>

                            <th>Date of dispatch for payment</th>
                            <th>Total work done</th>
                            <th>Total deduction</th>
                            <th>Total payable</th>
                            <th>Date of payment</th>
                            <th>Date of sending letter from Municipal Commissioner's office</th>
                        </tr>
                    </thead>
                    <tbody>
                            <?php 
                                $i = 0;
                                $res = $this->db->query(" SELECT * FROM payment WHERE block_name = '$ward' ");
                                $result = $res->result();
                                foreach($result as $row2){
                                    $row = $this->db->get_where("complain_record",array("complain_number"=>$row2->complain_number))->row();
                            ?>
                                <tr>
                                    <td><?php echo ++$i; ?></td>
                                    
                                    <td><?php echo $row->complain_number; ?></td>
                                    <td><?php echo $row->father_name; ?></td>
                                    <td><?php echo $row->patrawali_date; ?></td>
                                    <td><?php echo $row->financial_year; ?></td>
                                    <td><?php echo $row->related_department; ?></td>
                                    <td><?php echo $row->block_name; ?></td>
                                    <td><?php echo $row->village; ?></td>
                                    <td><?php echo $row->address; ?></td>
                                    <td><?php echo $row->subject; ?></td>
                                    <td><?php echo $row->complainer_name; ?></td>
                                    <td><?php echo $row->pincode; ?></td>
                                    <td><?php echo $row->mobile_number; ?></td>
                                    <td><?php echo $row->gender; ?></td>
                                    <td><?php echo $row->mahapaura_approval_date; ?></td>
                                    <td><?php echo $row->nagar_ayukat_approval_date; ?></td>

                                    <td><?php echo $row->nivida_amt; ?></td>
                                    <td><?php echo $row->nivida_dar; ?></td>
                                    <td><?php echo $row->tender_date; ?></td>
                                    <td><?php echo $row->tender_approval_date; ?></td>
                                    <td><?php echo $row->tender_opening_date; ?></td>
                                    <td><?php echo $row->tender_closing_date; ?></td>
                                    <td><?php echo $row->firm_name; ?></td>
                                    <td><?php echo $row->firm_registration_category; ?></td>
                                    <td><?php echo $row->firm_registration_validity; ?></td>

                                    <td><?php echo $row2->date_of_dispatch_for_payment != "0000-00-00"?$row2->date_of_dispatch_for_payment:"";?></td>
                                    <td><?php echo $row2->total_work_done;?></td>
                                    <td><?php echo $row2->total_deduction;?></td>
                                    <td><?php echo $row2->total_payable;?></td>
                                    <td><?php echo $row2->date_of_payment != "0000-00-00"?$row2->date_of_payment:"";?></td>
                                    <td><?php echo $row2->date_of_sending_letter_from_unicipal_commissioner_office != "0000-00-00"?$row2->date_of_sending_letter_from_unicipal_commissioner_office:"";?></td>
                                </tr>
                            <?php } ?>
                    </tbody>
<?php } ?>




<?php if( $type == "engineering" ){ ?>
                    <thead>
                        <tr style="background: #99ff99;">
                            <th>Sno</th>
                            <th>Work Number</th>
                            <th>File Number</th>
                            <th>File Date</th>
                            <th>Financial Year</th>
                            <th>Department</th>
                            <th>Ward</th>
                            <th>Name of Corporator </th>
                            <th>Budget Head</th>
                            <th>Work</th>
                            <th>Recommended by</th>
                            <th>Estimated Cost</th>
                            <th>Sanctioned Cost</th>
                            <th>Approved Date</th>
                            <th>Date of dispatch to Hon'ble Mayor for approval</th>
                            <th>Date of dispatch to the concerned department from the office of the Municipal Commissioner</th>
                        </tr>
                    </thead>
                    <tbody>
                            <?php 
                                $i = 0;
                                $res = $this->db->query(" SELECT * FROM complain_record WHERE block_name = '$ward' AND cur_status = 'pending' ");
                                $result = $res->result();
                                foreach($result as $row){
                            ?>
                                <tr>
                                    <td><?php echo ++$i; ?></td>
                                    <td><?php echo $row->complain_number; ?></td>
                                    <td><?php echo $row->father_name; ?></td>
                                    <td><?php echo $row->patrawali_date; ?></td>
                                    <td><?php echo $row->financial_year; ?></td>
                                    <td><?php echo $row->related_department; ?></td>
                                    <td><?php echo $row->block_name; ?></td>
                                    <td><?php echo $row->village; ?></td>
                                    <td><?php echo $row->address; ?></td>
                                    <td><?php echo $row->subject; ?></td>
                                    <td><?php echo $row->complainer_name; ?></td>
                                    <td><?php echo $row->pincode; ?></td>
                                    <td><?php echo $row->mobile_number; ?></td>
                                    <td><?php echo $row->gender; ?></td>
                                    <td><?php echo $row->mahapaura_approval_date; ?></td>
                                    <td><?php echo $row->nagar_ayukat_approval_date; ?></td>
                                </tr>
                            <?php } ?>
                    </tbody>
<?php } ?>





<?php if( $type == "tender" ){ ?>
                    <thead>
                        <tr style="background: #99ff99;">
                            <th>Sno</th>
                            <th>Work Number</th>
                            <th>File Number</th>
                            <th>File Date</th>
                            <th>Financial Year</th>
                            <th>Department</th>
                            <th>Ward</th>
                            <th>Name of Corporator </th>
                            <th>Budget Head</th>
                            <th>Work</th>
                            <th>Recommended by</th>
                            <th>Estimated Cost</th>
                            <th>Sanctioned Cost</th>
                            <th>Approved Date</th>
                            <th>Date of dispatch to Hon'ble Mayor for approval</th>
                            <th>Date of dispatch to the concerned department from the office of the Municipal Commissioner</th>

                            <th>Tender</th>
                            <th>Tender Date</th>
                            <th>Percent Below</th>
                            <th>Approval Date</th>
                            <th>Opening Date</th>
                            <th>Closing Date</th>
                            <th>Firm Name</th>
                            <th>Firm Registration Category</th>
                            <th>Firm Registration Validity</th>
                        </tr>
                    </thead>
                    <tbody>
                            <?php 
                                $i = 0;
                                $res = $this->db->query(" SELECT * FROM complain_record WHERE block_name = '$ward' AND cur_status = 'solved' ");
                                $result = $res->result();
                                foreach($result as $row){
                            ?>
                                <tr>
                                    <td><?php echo ++$i; ?></td>
                                    <td><?php echo $row->complain_number; ?></td>
                                    <td><?php echo $row->father_name; ?></td>
                                    <td><?php echo $row->patrawali_date; ?></td>
                                    <td><?php echo $row->financial_year; ?></td>
                                    <td><?php echo $row->related_department; ?></td>
                                    <td><?php echo $row->block_name; ?></td>
                                    <td><?php echo $row->village; ?></td>
                                    <td><?php echo $row->address; ?></td>
                                    <td><?php echo $row->subject; ?></td>
                                    <td><?php echo $row->complainer_name; ?></td>
                                    <td><?php echo $row->pincode; ?></td>
                                    <td><?php echo $row->mobile_number; ?></td>
                                    <td><?php echo $row->gender; ?></td>
                                    <td><?php echo $row->mahapaura_approval_date; ?></td>
                                    <td><?php echo $row->nagar_ayukat_approval_date; ?></td>

                                    <td><?php echo $row->nivida_amt; ?></td>
                                    <td><?php echo $row->nivida_dar; ?></td>
                                    <td><?php echo $row->tender_date; ?></td>
                                    <td><?php echo $row->tender_approval_date; ?></td>
                                    <td><?php echo $row->tender_opening_date; ?></td>
                                    <td><?php echo $row->tender_closing_date; ?></td>
                                    <td><?php echo $row->firm_name; ?></td>
                                    <td><?php echo $row->firm_registration_category; ?></td>
                                    <td><?php echo $row->firm_registration_validity; ?></td>

                                </tr>
                            <?php } ?>
                    </tbody>
<?php } ?>





<?php if( $type == "payment" ){ ?>
                    <thead>
                        <tr style="background: #99ff99;">
                            <th>Sno</th>
                            <th>Work Number</th>
                            <th>File Number</th>
                            <th>File Date</th>
                            <th>Financial Year</th>
                            <th>Department</th>
                            <th>Ward</th>
                            <th>Name of Corporator </th>
                            <th>Budget Head</th>
                            <th>Work</th>
                            <th>Recommended by</th>
                            <th>Estimated Cost</th>
                            <th>Sanctioned Cost</th>
                            <th>Approved Date</th>
                            <th>Date of dispatch to Hon'ble Mayor for approval</th>
                            <th>Date of dispatch to the concerned department from the office of the Municipal Commissioner</th>

                            <th>Tender</th>
                            <th>Percent Below</th>
                            <th>Tender Date</th>
                            <th>Approval Date</th>
                            <th>Opening Date</th>
                            <th>Closing Date</th>
                            <th>Firm Name</th>
                            <th>Firm Registration Category</th>
                            <th>Firm Registration Validity</th>

                            <th>Date of dispatch for payment</th>
                            <th>Total work done</th>
                            <th>Total deduction</th>
                            <th>Total payable</th>
                            <th>Date of payment</th>
                            <th>Date of sending letter from Municipal Commissioner's office</th>
                        </tr>
                    </thead>
                    <tbody>
                            <?php 
                                $i = 0;
                                $res = $this->db->query(" SELECT * FROM complain_record WHERE block_name = '$ward' AND cur_status = 'redressed' ");
                                $result = $res->result();
                                foreach($result as $row){
                                    $this->db->where('complain_number',$row->complain_number);
                                    $this->db->order_by("datetime","DESC");
                                    $res2 = $this->db->get('payment');
                                    if($res2->num_rows>0){
                                        $row2 = $res2->row();
                                    }else{
                                        $row2->date_of_dispatch_for_payment = '';
                                        $row2->total_work_done = '';
                                        $row2->total_deduction = '';
                                        $row2->total_payable = '';
                                        $row2->date_of_payment = '';
                                        $row2->date_of_sending_letter_from_unicipal_commissioner_office = '';
                                    }
                            ?>
                                <tr>
                                    <td><?php echo ++$i; ?></td>
                                    <td><?php echo $row->complain_number; ?></td>
                                    <td><?php echo $row->father_name; ?></td>
                                    <td><?php echo $row->patrawali_date; ?></td>
                                    <td><?php echo $row->financial_year; ?></td>
                                    <td><?php echo $row->related_department; ?></td>
                                    <td><?php echo $row->block_name; ?></td>
                                    <td><?php echo $row->village; ?></td>
                                    <td><?php echo $row->address; ?></td>
                                    <td><?php echo $row->subject; ?></td>
                                    <td><?php echo $row->complainer_name; ?></td>
                                    <td><?php echo $row->pincode; ?></td>
                                    <td><?php echo $row->mobile_number; ?></td>
                                    <td><?php echo $row->gender; ?></td>
                                    <td><?php echo $row->mahapaura_approval_date; ?></td>
                                    <td><?php echo $row->nagar_ayukat_approval_date; ?></td>

                                    <td><?php echo $row->nivida_amt; ?></td>
                                    <td><?php echo $row->nivida_dar; ?></td>
                                    <td><?php echo $row->tender_date; ?></td>
                                    <td><?php echo $row->tender_approval_date; ?></td>
                                    <td><?php echo $row->tender_opening_date; ?></td>
                                    <td><?php echo $row->tender_closing_date; ?></td>
                                    <td><?php echo $row->firm_name; ?></td>
                                    <td><?php echo $row->firm_registration_category; ?></td>
                                    <td><?php echo $row->firm_registration_validity; ?></td>

                                    <td><?php echo $row2->date_of_dispatch_for_payment != "0000-00-00"?$row2->date_of_dispatch_for_payment:"";?></td>
                                    <td><?php echo $row2->total_work_done;?></td>
                                    <td><?php echo $row2->total_deduction;?></td>
                                    <td><?php echo $row2->total_payable;?></td>
                                    <td><?php echo $row2->date_of_payment != "0000-00-00"?$row2->date_of_payment:"";?></td>
                                    <td><?php echo $row2->date_of_sending_letter_from_unicipal_commissioner_office != "0000-00-00"?$row2->date_of_sending_letter_from_unicipal_commissioner_office:"";?></td>

                                </tr>
                            <?php } ?>
                    </tbody>
<?php } ?>



                    </table>  
                </div>
            </div>
        </div>
    </div>
</div>