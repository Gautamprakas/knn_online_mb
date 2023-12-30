<div class="row">
    <div class="col-md-12">
        <div class="panel panel-white">
        		
            <div class="panel-body">
             <center> <div class="btn btn-success">
               		<h4>पुनर्विचार कार्यों की सूची</h4>
               	</div>  
               	</center>
                       
               <div class="">
                <table id="sample_1"  class="table table-striped table-bordered table-hover table-checkable order-column" >
                    <thead>
                    	<tr style="background: #ffff7f;">
                        	  <!--<th>sno</th>
                            <th>Complain number </th>
                            <th>Remaining Time</th>
                            <th>Complain Date</th>
                            <th>Status</th>
                            <th>Solved Date</th>
                            <th>Office</th>
                            <th>Related Officer</th>
                            <th>Complain Type </th>
                        	  <th>Complainer</th>
                            <th>Mobile</th>
                            <th>Address</th>
                            <th>Pincode</th>-->

                            <th>क्रमांक</th>
                            <th>कार्य संख्या</th>
                            <th>कार्य निवारण का समय</th>
                            <th>कार्य का दिनांक</th>
                            <th>कार्य की स्तिथि</th>
                            <th>विभाग द्वारा निस्तारित होने का दिनांक</th>
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
        $this->db->where("officer_id",$uid);
        $this->db->where("cur_status","review");
        $this->db->order_by("solved_date ASC");
        $val= $this->db->get("complain_record");
        }
        else
       {
        $oid = $this->session->userdata("username");
        $this->db->where("officer_id",$oid);
        $this->db->where("cur_status","review");
        $this->db->order_by("solved_date ASC");
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
                            <a href="<?php echo base_url();?>index.php/grievanceController/reviewAction/<?php echo $row->complain_number;?>"><?php echo $row->complain_number;?>
                                
                            </a></td>
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
                            <td><?php echo $row->cur_status;?></td>


                <?php 
                       $fc = $this->session->userdata("shop_id");
                       $uid = $this->session->userdata("username");
                       $fc++;
                       $prev = $this->db->where("complain_number",$row->complain_number)
                                ->where("forward_count",$fc)
                                ->get("complain_record")->row();
                ?>
                            <td><?php echo $prev->solved_date;?></td>
                            <td><?php echo $prev->department;?></td>
                            <td><?php echo $prev->officer_name;?></td>  
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