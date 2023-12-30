					<div class="row">
                        <div class="col-md-12">
                            <div class="panel panel-white">
                            		
                                <div class="panel-body">
                                 <center> <div class="btn btn-success">
                                   		<h4>Payment List</h4>
                                   	</div>  
                                   	</center>
                                           
                                   <div class="">
                                    <table id="sample_1"  class="table table-striped table-bordered table-hover table-checkable order-column" >
                                        <thead>
                                        	<tr style="background: #99ff99;">
                                            	  <!--<th>sno</th>
                                                <th>Complain number </th>
                                                <th>Complain Date</th>
                                                <th>Assign Date</th>
                                                <th>Status</th>
                                                <th>Solved Date</th>
                                                <th>Complain Type </th>
                                            	  <th>Complainer</th>
                                                <th>Mobile</th>
                                                <th>Address</th>
                                                <th>Pincode</th>-->

                                                  <th>Sno</th>
                                                  <th>Action</th>
                                                  <th>Work Number</th>
                                                  <!-- <th>कार्य का दिनांक</th>
                                                  <th>कार्य की स्तिथि</th>
                                                  <th>निस्तारित होने का दिनांक</th>
                                                  <th>कार्य का प्रकार</th>
                                                  <th>नाम</th>
                                                  <th>नंबर</th>
                                                  <th>पता</th> -->
                                                  <!-- <th>पिनकोड</th> -->

                                                  <th>Department</th>
                                                  <th>Work</th>
                                                  <th>Financial Year</th>
                                                  <th>Date of dispatch for payment</th>
                                                  <th>Total work done</th>
                                                  <!-- <th>जमानती धनराशि</th>
                                                  <th>अनुबन्ध विलम्ब शुल्क</th>
                                                  <th>कार्य विलम्ब शुल्क</th>
                                                  <th>पूर्व भुगतान धनराशि</th>
                                                  <th>J.T.</th>
                                                  <th>S.T.</th>
                                                  <th>G.S.T.</th>
                                                  <th>सेस forgone धनांक</th>
                                                  <th>अन्य</th> -->
                                                  <th>Total deduction</th>
                                                  <th>Total payable</th>
                                                  <th>Date of payment</th>
                                                  <th>Date of sending letter from Municipal Commissioner's office</th>
                                                  


                                                  <th>Estimated Cost</th>
                                                <th>Tender Amt</th>
                                                <th>Percent Below</th>
                                                <th>Tender Date</th>
                                                <th>Approval Date</th>
                                                <th>Opening Date</th>
                                                <th>Closing Date</th>
                                                <th>Firm Name</th>
                                                <th>Firm Registration Category</th>
                                                <th>Firm Regidtration Validity</th>

                                                  <th>Sanctioned Cost</th>
                                                <th>File Number</th>
                                                <th>File Date</th>
                                                <th>Financial Year</th>
                                                <th>Ward</th>
                                                <th>Name of Corporator</th>
                                                <th>Approved Date</th>
                                                <th>Date of dispatch to Hon'ble Mayor for approval</th>
                                                <th>Date of dispatch to the concerned department from the office of the Municipal Commissioner</th>

                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php 
                                       $oid = $this->session->userdata("username");
                                       $fc = $this->session->userdata("shop_id");
                                       $this->db->where("cur_status","redressed");
                                       $this->db->where("forward_count",$fc);
                                       $this->db->where("officer_id",$oid);
                                       $this->db->order_by("solved_date ASC");
                                       $val= $this->db->get("complain_record");
                                        if($val->num_rows()>0)
                                        {
                                        	$i = 0; 
                                            foreach($val->result() as $row):
                                        	
                                        ?>
                                            <tr style="background: #ccffcc;">
                                                <td><?php echo ++$i;?></td>
                                                <td>
                                                    <form action="<?php echo base_url("grievanceController2/addPayment"); ?>" method="post" target="_blank">
                                                        <input type="hidden" name="work_number" value="<?php echo $row->complain_number; ?>">
                                                        <input type="submit" value="Add Payment" class="btn btn-info">
                                                    </form>
                                                </td>
                                                <td>
                                                <a href="<?php echo base_url();?>index.php/grievanceController/redressedAction/<?php echo $row->complain_number;?>"><?php echo $row->complain_number;?>
                                                    
                                                </a></td>
                                                <!-- <td><?php //echo date("Y-m-d",strtotime($row->complain_date));?></td> -->
                                                <!--<td><?php //echo $row->assign_date;?></td>-->
                                                <!-- <td><?php //echo $row->cur_status;?></td>
                                               <td><?php //echo $row->solved_date;?></td>
                                                <td><?php //echo $row->complain_type;?></td>
                                                <td><?php //echo $row->complainer_name;?></td>
                                                <td><?php //echo $row->mobile_number;?></td>
                                                <td><?php //echo $row->address;?></td> -->
                                                <!-- <td><?php //echo $row->pincode;?></td> -->

                                                <td><?php echo $row->related_department;?></td>
                                                <td><?php echo $row->subject;?></td>

                                                <?php 
                                                    $this->db->where('complain_number',$row->complain_number);
                                                    $this->db->order_by("datetime","DESC");
                                                    $res2 = $this->db->get('payment');
                                                    if($res2->num_rows()>0){
                                                        $row2 = $res2->row();
                                                ?>
                                                
                                                <td><?php echo $row2->financial_year;?></td>
                                                <td><?php echo $row2->date_of_dispatch_for_payment != "0000-00-00"?$row2->date_of_dispatch_for_payment:"";?></td>
                                                <td><?php echo $row2->total_work_done;?></td>
                                                <!-- <td><?php //echo $row2->security_deposit;?></td>
                                                <td><?php //echo $row2->contract_late_fee;?></td>
                                                <td><?php //echo $row2->work_late_fee;?></td>
                                                <td><?php //echo $row2->prepayment_amount;?></td>
                                                <td><?php //echo $row2->jt;?></td>
                                                <td><?php //echo $row2->st;?></td>
                                                <td><?php //echo $row2->gst;?></td>
                                                <td><?php //echo $row2->saas_forgone_cost;?></td>
                                                <td><?php //echo $row2->other;?></td> -->
                                                <td><?php echo $row2->total_deduction;?></td>
                                                <td><?php echo $row2->total_payable;?></td>
                                                <td><?php echo $row2->date_of_payment != "0000-00-00"?$row2->date_of_payment:"";?></td>
                                                <td><?php echo $row2->date_of_sending_letter_from_unicipal_commissioner_office != "0000-00-00"?$row2->date_of_sending_letter_from_unicipal_commissioner_office:"";?></td>

                                                <?php }else{ ?>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <!-- <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td> -->
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                 
                                                <?php } ?>

                                                 


                                                <td><?php echo $row->pincode;?></td>
                                                <td><?php echo $row->nivida_amt;?></td>
                                                <td><?php echo $row->nivida_dar;?></td>
                                                <td><?php echo $row->tender_date != '0000-00-00'? $row->tender_date : ''; ?></td>
                                                <td><?php echo $row->tender_approval_date != '0000-00-00'? $row->tender_approval_date : ''; ?></td>
                                                <td><?php echo $row->tender_opening_date;?></td>
                                                <td><?php echo $row->tender_closing_date;?></td>
                                                <td><?php echo $row->firm_name;?></td>
                                                <td><?php echo $row->firm_registration_category;?></td>
                                                <td><?php echo $row->firm_registration_validity;?></td>

                                                <td><?php echo $row->mobile_number;?></td>
                                                <td><?php echo $row->father_name;?></td>
                                                <td><?php echo $row->patrawali_date;?></td>
                                                <td><?php echo $row->financial_year;?></td>
                                                <td><?php echo $row->block_name;?></td>
                                                <td><?php echo $row->village;?></td>
                                                <td><?php echo $row->gender;?></td>
                                                <td><?php echo $row->mahapaura_approval_date;?></td>
                                                <td><?php echo $row->nagar_ayukat_approval_date;?></td>
                                                
                                                
                                                 
                                            </tr>
                                  <?php      endforeach;
                                        }
                                        else {
                                        echo "No Record found";
                                        }
                                   ?>
                                        </tbody>
                                       </table>  
                                    </div>
                                </div>
                            </div>
						</div>
					</div>