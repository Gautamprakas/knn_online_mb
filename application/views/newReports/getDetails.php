<?php
      $reportType = $this->uri->segment(3);
      $userid     = $this->uri->segment(4);
?>					

          <div class="row">
                        <div class="col-md-12">
                            <div class="panel panel-white">
                            		
                                <div class="panel-body">
                                 <center> <div class="btn btn-success">
                                   		<?php
                                            if($reportType == "total")
                                              echo "<h4>कुल शिकायतें (Total Complain)</h4>";

                                            if($reportType == "pending")
                                              echo "<h4>कार्यवाही लंबित (Pending)</h4>";

                                            if($reportType == "underprocess")
                                              echo "<h4>कार्यवाही गतिमान (Under Process)</h4>";

                                            if($reportType == "solved")
                                              echo "<h4>निस्तारित शिकायतों (Redressed)</h4>";
                                      ?>
                                   	</div>  
                                   	</center>
                                           
                                   <div class="table-responsive">
                                    <table id="sample_1"  class="table table-striped table-bordered table-hover table-checkable order-column" >
                                        <thead>
                                        	<tr style="background: #99ff99;;">
                                            	<th>क्रमांक</th>
                                                <th>शियाकत संख्या</th>
                                                <th>निर्देश</th>
                                                <!--<th>शियाकत निवारण का समय</th>-->
                                                <th>शिकायत का दिनांक</th>
                                                <th>विभाग</th>
                                                <th>शिकायत का प्रकार</th>
                                                <th>शिकायतकर्ता का नाम</th>
                                                <th>शिकायतकर्ता का नंबर</th>
                                                <th>पता</th>
                                                <th>पिनकोड</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                <?php 
                            
                            /*if($this->session->userdata("login_type") == "admin")
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
                            }*/
                        $cur_date = date("Y-m-d");

                         if($reportType == "total"){
                            $this->db->select("*");
                            $this->db->select("if(timestamp(last_date_to_solve)>0,datediff(last_date_to_solve,'$cur_date'),(15 - datediff('$cur_date',complain_date))) as remng",false);
                            $this->db->where("officer_id",$userid);
                            $this->db->group_by("complain_number");
                            $val = $this->db->get("complain_record");
                         }

                         if($reportType == "solved"){
                            $this->db->select("*");
                            $this->db->select("if(timestamp(last_date_to_solve)>0,datediff(last_date_to_solve,'$cur_date'),(15 - datediff('$cur_date',complain_date))) as remng",false);
                            $this->db->where_in("cur_status",["solved","redressed"]);
                            $this->db->where("officer_id",$userid);
                            $this->db->group_by("complain_number");
                            $val = $this->db->get("complain_record");
                         }

                         if($reportType == "underprocess"){
                            $this->db->select("*");
                            $this->db->select("if(timestamp(last_date_to_solve)>0,datediff(last_date_to_solve,'$cur_date'),(15 - datediff('$cur_date',complain_date))) as remng",false);
                            $this->db->where_in("cur_status",["assign","forward","review"]);
                            $this->db->where("officer_id",$userid);
                            $this->db->where("if(timestamp(last_date_to_solve)>0,datediff(last_date_to_solve,'$cur_date'),(15 - datediff('$cur_date',complain_date))) >=","0");
                            $this->db->group_by("complain_number");
                            $val = $this->db->get("complain_record");
                         }


                        if($reportType == "pending"){
                            $this->db->select("*");
                            $this->db->select("if(timestamp(last_date_to_solve)>0,datediff(last_date_to_solve,'$cur_date'),(15 - datediff('$cur_date',complain_date))) as remng",false);
                            $this->db->where_in("cur_status",["assign","forward","review"]);
                            $this->db->where("officer_id",$userid);
                            $this->db->where("if(timestamp(last_date_to_solve)>0,datediff(last_date_to_solve,'$cur_date'),(15 - datediff('$cur_date',complain_date))) <","0");
                            $this->db->group_by("complain_number");
                            $val = $this->db->get("complain_record");
                        }


                                        if($val->num_rows()>0)
                                        {
                                        	$i = 0; 
                                            foreach($val->result() as $row):
                                        
                                        ?>
                                       
                                            <tr>
                                                <td><?php echo ++$i;?></td>
                                                <td>
                                                <a href="<?php echo base_url();?>index.php/grievanceController/forwardedAction/<?php echo $row->complain_number;?>"><?php echo $row->complain_number;?>
                                                    
                                                </a></td>
                                                <td><?php echo $row->comment;?></td>
<!--Remaining Time Start-->                                             
                                               <!-- <td><?php echo $row->remng; ?></td>-->
<!--Remaining Time End-->  
                                                <td><?php echo date("Y-m-d",strtotime($row->complain_date));?></td>
                                                
                                                
                                                 <td><?php echo $row->department;?></td>
                                                <td><?php echo $row->complain_type;?></td>
                                                <td><?php echo $row->complainer_name;?></td>
                                                <td><?php echo $row->mobile_number;?></td>
                                                <td><?php echo $row->address;?></td>
                                                <td><?php echo $row->pincode;?></td>
                                                
                                                 
                                            </tr>
                                  <?php    endforeach;
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