<?php 
      $luser = $this->session->userdata("login_type");
      $username = $this->session->userdata("username"); 
 ?>
					<div class="row">
                        <div class="col-md-12">
                            <div class="panel panel-white">
                            		
                                <div class="panel-body">
                                 <center> <div class="btn btn-success">
                                   		<h4>Todays Assigned Complains </h4>
                                   	</div>  
                                   	</center>
                                           
                                   <div class="table-responsive">
                                    <table id="sample_1"  class="table table-striped table-bordered table-hover table-checkable order-column" >
                                        <thead>
                                        	<tr style="background: #ffff7f;">
                                            	<th>sno</th>
                                                <th>Block</th>
                                                <th>Complain number </th>
                                                <th>Status </th>
                                                <th>Complain Date</th>
                                                <th>Assign Date</th>
                                                <th>Department</th>
                                                <th>Officer Name</th>
                                                <th>District Comment</th>
                                                <th>Complain Type </th>
                                            	  <th>Complainer</th>
                                                <th>Gender</th>
                                                <th>Mobile</th>
                                                <th>Address</th>
                                                <th>Pincode</th>
                                                <th>Complainer File</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php
                                        $date = date("Y-m-d");
                                       if($luser == "admin")
                                       {
                                           
                                  $where ="(assign_date = '$date' AND cur_status = 'Assign') OR ".
                                          "(solved_date = '$date' AND cur_status = 'Solved')";
                                           $this->db->where($where);
                                           $this->db->order_by("cur_status DESC,complain_date ASC");
                                           $val= $this->db->get("complain_record");
                                           
                                       }
                                       else
                                       {
                                      $where = "officer_id = '$username' AND ".
                                             "((assign_date = '$date' AND cur_status = 'Assign') OR ".
                                             "(solved_date = '$date' AND cur_status = 'Solved'))";
                                           $this->db->where($where);
                                           $this->db->order_by("cur_status ASC,complain_date ASC");
                                           $val= $this->db->get("complain_record");
                                           
                                       }
                                        if($val->num_rows()>0)
                                        {
                                        	$i = 0; 
                                            foreach($val->result() as $row):
                                        	if($row->complainer_name){
                                        ?>
                                            <tr style="background: #ffffcc;">
                                                <td><?php echo ++$i;?></td>
                                                <td><?php echo $row->block_name?></td>
                                                <td>
                    <?php 
                          if($luser == "admin")
                          {
                            if($row->cur_status == "Solved")
                            {?>
                              
                                  <a href="<?php echo base_url("index.php/grievanceController/adminAction/$row->complain_number");?>">
                                                <?php echo $row->complain_number;?>
                                 </a>

                            <?php }
                            else
                            { ?>
                                 <a href="<?php echo base_url("index.php/grievanceController/viewAssigned/$row->complain_number");?>">
                                                <?php echo $row->complain_number;?>
                                 </a>

                            <?php }
                          }
                          else
                          {
                            if($row->cur_status == "Solved")
                            { ?>
                              
                                <a href="<?php echo base_url("index.php/grievanceController/viewSolved/$row->complain_number");?>">
                                                <?php echo $row->complain_number;?>
                                 </a>

                           <?php }
                            else
                            { ?>
                               
                                <a href="<?php echo base_url("index.php/grievanceController/assignAction/$row->complain_number");?>">
                                                <?php echo $row->complain_number;?>
                                 </a>

                            <?php }
                          }
                    ?>                            
                                                </td>
                                                <td><?php echo $row->cur_status;?></td>
                                                <td><?php echo $row->complain_date;?></td>
                                                <td><?php echo $row->assign_date;?></td>
                                                <td><?php echo $row->department;?></td>
                                                <td><?php echo $row->officer_name;?></td>
                                                <td><?php echo $row->comment;?></td>
                                                <td><?php echo $row->complain_type;?></td>
                                                <td><?php echo $row->complainer_name;?></td>
                                                <td><?php echo $row->gender;?></td>
                                                <td><?php echo $row->mobile_number;?></td>
                                                <td><?php echo $row->address;?></td>
                                                <td><?php echo $row->pincode;?></td>
                                                 <td>
                                                <a href="<?php echo base_url("assets/complain/$row->uploaded_file");?>" target="_blank">
                                                  <?php echo $row->uploaded_file; ?>  
                                                </a></td>
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