					<div class="row">
                        <div class="col-md-12">
                            <div class="panel panel-white">
                            		
                                <div class="panel-body">
                                 <center> <div class="btn btn-success">
                                   		<h4>अग्रसारित कार्यों की सूची </h4>
                                   	</div>  
                                   	</center>
                                           
                                   <div class="table-responsive">
                                    <table id="sample_1"  class="table table-striped table-bordered table-hover table-checkable order-column" >
                                        <thead>
                                        	<tr style="background: #ffff7f;">
                                            	<th>क्रमांक</th>
                                                <th>कार्य संख्या</th>

                                                <th>निर्देश</th>
                                                <th>कार्य निवारण का समय</th>
                                                <th>कार्य का दिनांक</th>
                                                <th>अग्रसारित दिनांक</th>
                                                <<!--th>शिकायत की स्तिथि</th>
                                                <th>अग्रसारित की दिनांक</th>-->
                                                <th>विभाग</th>
                                                <th>संबंधित अधिकारी</th>
                                                <th>कार्य का प्रकार</th>
                                            	  <th>नाम</th>
                                                <th>नंबर</th>
                                                <th>पता</th>
                                                <!-- <th>पिनकोड</th> -->
                                            </tr>
                                        </thead>
                                        <tbody>
                <?php 
                            
                            if($this->session->userdata("login_type") == "admin")
                            {
                            $uid = $this->session->userdata("username");
    $where = "come_from = '$uid' and (cur_status = 'assign' or cur_status = 'forward' or cur_status = 'review')";
                            $this->db->where($where);
                            $this->db->order_by("assign_date ASC");
                            $val= $this->db->get("complain_record");   
                            }
                            else
                            {
                            $oid = $this->session->userdata("username");
    $where = "come_from = '$oid' and (cur_status = 'assign' or cur_status = 'forward')";
                            $this->db->where($where);
                            $this->db->order_by("assign_date ASC");
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
                                                <td>
                                                <a href="<?php echo base_url();?>index.php/grievanceController/forwardedAction/<?php echo $row->complain_number;?>"><?php echo $row->complain_number;?>
                                                    
                                                </a></td>
                                                <td><?php echo $row->comment;?></td>
<!--Remaining Time Start-->                                             
                                                <td><?php 
                                                          $current_timestamp  = time();
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
                                                          }
                                                ?></td>
<!--Remaining Time End-->  
                                                <td><?php echo date("Y-m-d",strtotime($row->complain_date));?></td>
                                                <td><?php echo $row->assign_date;?></td>
                                                <!--<td><?php echo $row->cur_status;?></td>

                                                <td><?php 
                                                if(strtotime($row->forward_date) < 1)
                                                {
                                                  echo "not forward";
                                                }
                                                else
                                                {
                                                  echo $row->forward_date;
                                                }
                                                

                                                ?></td>-->
                                                 <td><?php echo $row->department;?></td>
                                                  <td><?php echo $row->officer_name;?></td>
                                                <td><?php echo $row->complain_type;?></td>
                                                <td><?php echo $row->complainer_name;?></td>
                                                <td><?php echo $row->mobile_number;?></td>
                                                <td><?php echo $row->address;?></td>
                                                <!-- <td><?php //echo $row->pincode;?></td> -->
                                                
                                                 
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