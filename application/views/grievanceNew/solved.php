<div class="row">
    <div class="col-md-12">
        <div class="panel panel-white">
        		
            <div class="panel-body">
             <center> <div class="btn btn-success">
               		<h4>Tender List</h4>
               	</div>  
               	</center>
                       
               <div class="">
                <table id="sample_1"  class="table table-striped table-bordered table-hover table-checkable order-column" >
                    <thead>
                    	<tr style="background: #99ff99;">
                        	<!--<th>sno</th>
                            <th>Complain number </th>
                            <th>Remaining Time</th>
                            <th>Complain Date</th>
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
                            <!-- <th>कार्य निवारण का समय</th>
                            <th>कार्य का दिनांक</th>
                            <th>कार्य की स्तिथि</th>
                            <th>कार्मिक स्तर पर निस्तारित होने का दिनांक</th>
                            <th>कार्य का प्रकार</th>
                            <th>नाम</th>
                            <th>नंबर</th>
                            <th>पता</th> -->
                            <!-- <th>पिनकोड</th> -->
                            <th>Department</th>

                            <th>Work</th>
                            <th>Sanctioned Cost</th>
                            <th>Tender Amt</th>
                            <th>Percent Below</th>
                            <th>Tender Date</th>
                            <th>Approval Date</th>
                            <th>Opening Date</th>
                            <th>Closing Date</th>
                            <th>Firm Name</th>
                            <th>Firm Registration Category</th>
                            <th>Firm Registration Validity</th>
                            <!-- <th>File</th> -->
                            

                            <th>Budget Head</th>
                            <th>Estimated Cost</th>
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
        
        if($this->session->userdata("login_type") == "admin")
        {
        $uid = $this->session->userdata("username");
        $this->db->where("officer_id",$uid);
        $this->db->where("cur_status","solved");
        $this->db->order_by("solved_date ASC");
        $val= $this->db->get("complain_record");
        }
        else
       {
        $oid = $this->session->userdata("username");
        $this->db->where("officer_id",$oid);
        $this->db->where("cur_status","solved");
        $this->db->order_by("solved_date ASC");
        $val= $this->db->get("complain_record");
        }
                    if($val->num_rows()>0)
                    {
                    	$i = 0; 
                        foreach($val->result() as $row):
                    	if($row->complainer_name){
                    ?>
                        <tr style="background: #ccffcc;">
                            <td><?php echo ++$i;?></td>
                            <td>
                                <form action="<?php echo base_url("grievanceController2/addTender"); ?>" method="post" target="_blank">
                                    <input type="hidden" name="work_number" value="<?php echo $row->complain_number; ?>">
                                    <input type="submit" value="Add Tender" class="btn btn-info">
                                </form>
                            </td>
                            <td>
                            <a href="<?php echo base_url();?>index.php/grievanceController/solvedAction/<?php echo $row->complain_number;?>"><?php echo $row->complain_number;?>
                                
                            </a></td>
<!--Remaining Time Start-->                                             
                                                <!--<td><?php 
                                                          /*$current_timestamp  = time();
                                                          $complain_timestamp = strtotime($row->complain_date);

                                                          if(strtotime($row->last_date_to_solve) > 0)
                                                          {
                                                              $last_timestamp = strtotime($row->last_date_to_solve);
                                                              $remaining_days = ceil((($last_timestamp - $current_timestamp)/86400));
                                                          }
                                                          else
                                                          {
                                                              $ctype = $this->db->where("complain_type",$row->complain_type)
                                                                                ->get("complain_type");
                                                              if($ctype->num_rows()>0)
                                                              {
                                                                 $days = floor((($current_timestamp - $complain_timestamp )/86400));
                                                                 $remaining_days = ($ctype->row()->days - $days); 
                                                              }
                                                              else
                                                              {
                                                                 $days = floor((($current_timestamp - $complain_timestamp )/86400));
                                                                 $remaining_days = ($row->max_days_to_solve - $days); 
                                                              }                  
                                                          }
                                                      
                                                          if($remaining_days < 0)
                                                          {
                                                             echo "Time Over";
                                                          }
                                                          else
                                                          {
                                                            echo $remaining_days." days";
                                                          }*/
                                                ?></td>-->
<!--Remaining Time End-->  
                            <!-- <td><?php //echo date("Y-m-d",strtotime($row->complain_date));?></td>
                            <td><?php //echo $row->cur_status;?></td>
                            <td><?php //echo $row->solved_date;?></td>
                            <td><?php //echo $row->complain_type;?></td>
                            <td><?php //echo $row->complainer_name;?></td>
                            <td><?php //echo $row->mobile_number;?></td>
                            <td><?php //echo $row->address;?></td> -->
                            <!-- <td><?php //echo $row->pincode;?></td> -->

                            <td><?php echo $row->related_department;?></td>
                            <td><?php echo $row->subject;?></td>
                            <td><?php echo $row->mobile_number;?></td>
                            <td><?php echo $row->nivida_amt;?></td>
                            <td><?php echo $row->nivida_dar;?></td>
                            <td><?php echo $row->tender_date != '0000-00-00'? $row->tender_date : ''; ?></td>
                            <td><?php echo $row->tender_approval_date != '0000-00-00'? $row->tender_approval_date : ''; ?></td>
                            <td><?php echo $row->tender_opening_date;?></td>
                            <td><?php echo $row->tender_closing_date;?></td>
                            <td><?php echo $row->firm_name;?></td>
                            <td><?php echo $row->firm_registration_category;?></td>
                            <td><?php echo $row->firm_registration_validity;?></td>
                            <!-- <td><?php //echo $row->nivida_file;?></td> -->

                            

                            <td><?php echo $row->address;?></td>
                            <td><?php echo $row->pincode;?></td>
                            <td><?php echo $row->father_name;?></td>
                            <td><?php echo $row->patrawali_date;?></td>
                            <td><?php echo $row->financial_year;?></td>
                            <td><?php echo $row->block_name;?></td>
                            <td><?php echo $row->village;?></td>
                            <td><?php echo $row->gender;?></td>
                            <td><?php echo $row->mahapaura_approval_date;?></td>
                            <td><?php echo $row->nagar_ayukat_approval_date;?></td>
                            
                             
                        </tr>
              <?php     } endforeach;
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