					<div class="row">
                        <div class="col-md-12">
                            <div class="panel panel-white">
                            		
            <div class="panel-body">
             <center> <div class="btn btn-success">
               		<h4>Engineering List</h4>
               	</div>  
               	</center>
                       
               <div class="">
                <table id="sample_1"  class="table table-striped table-bordered table-hover table-checkable order-column" >
                    <thead>
                    	<tr style="background: #9999ff;">
                        	<th>Sno</th>
                            <th>Work Number</th>
                            <!-- <th>कार्य अवधि</th> -->
                            <!-- <th>निविदा स्वीकृति दिनांक</th> -->
                            <th>Work</th>
                        	  <th>Recommended by</th>
                            <th>Estimated Cost</th>
                            <th>Sanctioned Cost</th>
                            <th>Budget Head</th>
                            <th>Department</th>

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
                   $this->db->where("cur_status","pending");
                   $this->db->order_by("complain_date ASC");
                   $val= $this->db->get("complain_record");
                    if($val->num_rows()>0)
                    {
                    	$i = 0; 
                        foreach($val->result() as $row):
                    	if(1==1 || $row->complainer_name){
                    ?>
                        <tr style="background: #ccccff;">
                            <td><?php echo ++$i;?></td>
                            <td>
                            <a href="<?php echo base_url();?>index.php/grievanceController/pendingAction/<?php echo $row->complain_number;?>"><?php echo $row->complain_number;?>
                                
                            </a></td>
<!--Remaining Time Start-->                                             
                                                <!-- <td><?php 
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
                                                ?></td> -->
<!--Remaining Time End-->  
                            <!-- <td><?php //echo date("Y-m-d",strtotime($row->complain_date))?></td> -->
                           <td><?php echo $row->complain;?></td>
                            <td><?php echo $row->complainer_name;?></td>
                            <td><?php echo $row->pincode;?></td>
                            <td><?php echo $row->mobile_number;?></td>
                            <td><?php echo $row->address;?></td>
                            <td><?php echo $row->related_department;?></td>


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