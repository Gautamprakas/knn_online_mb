					<div class="row">
                        <div class="col-md-12">
                            <div class="panel panel-white">
                            		
                                <div class="panel-body">
                                 <center> <div class="btn btn-success">
                                   		<h4>अनिस्तारित शिकायतों की सूची </h4>
                                   	</div>  
                                   	</center>
                                           
                                   <div class="table-responsive">
                                    <table id="sample_1"  class="table table-striped table-bordered table-hover table-checkable order-column" >
                                        <thead>
                                        	<tr style="background: #ff9999;">
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

                                                 <th>क्रमांक</th>
                                                  <th>शियाकत संख्या</th>
                                                  <th>शिकायत का दिनांक</th>
                                                  <th>शिकायत की स्तिथि</th>
                                                  <th>अनिस्तारित होने का दिनांक</th>
                                                  <th>शिकायत का प्रकार</th>
                                                  <th>शिकायतकर्ता का नाम</th>
                                                  <th>शिकायतकर्ता का नंबर</th>
                                                  <th>पता</th>
                                                  <th>पिनकोड</th> 
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php 
                                       $oid = $this->session->userdata("username");
                                       $fc = $this->session->userdata("shop_id");
                                       $this->db->where("cur_status","unredressed");
                                       $this->db->where("forward_count",$fc);
                                       $this->db->where("officer_id",$oid);
                                       $this->db->order_by("solved_date ASC");
                                       $val= $this->db->get("complain_record");
                                        if($val->num_rows()>0)
                                        {
                                        	$i = 0; 
                                            foreach($val->result() as $row):
                                        	
                                        ?>
                                            <tr style="background: #ffcccc;">
                                                <td><?php echo ++$i;?></td>
                                                <td>
                                                <a href="<?php echo base_url();?>index.php/grievanceController/unredressedAction/<?php echo $row->complain_number;?>"><?php echo $row->complain_number;?>
                                                    
                                                </a></td>
                                                <td><?php echo date("Y-m-d",strtotime($row->complain_date));?></td>
                                                <!--<td><?php echo $row->assign_date;?></td>-->
                                                <td><?php echo $row->cur_status;?></td>
                                                <td><?php echo $row->solved_date;?></td>
                                                <td><?php echo $row->complain_type;?></td>
                                                <td><?php echo $row->complainer_name;?></td>
                                                <td><?php echo $row->mobile_number;?></td>
                                                <td><?php echo $row->address;?></td>
                                                <td><?php echo $row->pincode;?></td>
                                                
                                                 
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