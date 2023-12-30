<?php 
      $luser = $this->session->userdata("login_type");
      $username = $this->session->userdata("username"); 
 ?>
     
					<div class="row">
                        <div class="col-md-12">
                            <div class="panel panel-white">
                            		
                                <div class="panel-body">
                                 <center> <div class="btn btn-success">
                                   		<h4>Todays Complains </h4>
                                   	</div>  
                                   	</center>
                                           
                                   <div class="table-responsive">
                                    <table id="sample_1"  class="table table-striped table-bordered table-hover table-checkable order-column" >
                                        <thead>
                                        	<tr>
                                            	<th>Sno</th>
                                                <th>Block</th>
                                                <th>Complain number</th>
                                                <th>Status</th>
                                                <th>Complain Date</th>
                                                <th>Complainer</th>
                                                <th>Mobile</th>
                                                <th>Gender</th>
                                                <th>Father Name</th>
                                                <th>Address</th>
                                                <th>Pincode</th>
                                                <th>Compalin Type </th>
                                                <th></th>
                                                <th>Complain</th>
                                                <th>Assign Date</th>
                                                <th>Forward To</th>
                                                <th>Officer Name</th>
                                                <th>Officer Solved On</th>
                                                <th>Officer Explaination</th>
                                                <th>Redressed/UnRedressed Date</th>
                                                <th>Complainer File</th>
                                                <th>Officer File</th>


                                            
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php 

                                       if($luser == "admin")
                                       {
                                          $this->db->where("DATE(complain_date)",date("Y-m-d"));
                                          $this->db->order_by("complain_date DESC");
                                          $val= $this->db->get("complain_record");
                                       }
                                       else
                                       {
                                          $this->db->where("officer_id",$username);
                                          $this->db->where("DATE(assign_date)",date("Y-m-d"));
                                          $this->db->order_by("complain_date DESC");
                                          $val= $this->db->get("complain_record");
                                       }

                                        if($val->num_rows()>0)
                                        {
                                        	$i = 1; foreach($val->result() as $row):
                                        	if($row->complainer_name){
                                        ?>
                                            <tr>
                                                <td><?php echo $i;?></td>
                                                <td><?php echo $row->block_name;?></td>
                                                 <td><a href="<?php echo base_url();?>index.php/grievanceController/printComplain/<?php echo $row->complain_number;?>"><?php echo $row->complain_number;?></a></td>
                                                <td><?php echo $row->cur_status;?></td>
                                                <td><?php echo $row->complain_date;?></td>
                                                <td><?php echo $row->complainer_name;?></td>
                                                <td><?php echo $row->mobile_number;?></td>
                                                <td><?php echo $row->gender;?></td>
                                                <td><?php echo $row->father_name;?></td>
                                                <td><?php echo $row->address;?></td>
                                                <td><?php echo $row->pincode;?></td>
                                                <td><?php echo $row->complain_type;?></td>
                                                <td></td>
                                                <td><?php echo $row->complain;?></td>
                                                <td><?php echo $row->assign_date;?></td>
                                                <td><?php echo $row->department;?></td>
                                                <td><?php echo $row->officer_name;?></td>
                                                <td><?php echo $row->solved_date;?></td>
                                                <td><?php echo $row->explaination;?></td>
                                                <td><?php echo $row->decision_date;?></td>
                                                <td>
                                                <a href="<?php echo base_url("assets/complain/$row->uploaded_file");?>" target="_blank">
                                                  <?php echo $row->uploaded_file; ?>  
                                                </a></td>
                                                <td>
                                                <a href="<?php echo base_url("assets/complain/$row->uploaded_file_bydep");?>" target="_blank">
                                                  <?php echo $row->uploaded_file_bydep; ?>  
                                                </a></td>
                                            </tr>
                                        <?php $i++;} endforeach;
                                        }
                                        else {
                                        echo "No Record found";
                                        }?>
                                        </tbody>
                                       </table>  
                                    </div>
                                </div>
                            </div>
						</div>
					</div>