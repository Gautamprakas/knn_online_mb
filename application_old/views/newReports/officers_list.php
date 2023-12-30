					<div class="row">
                        <div class="col-md-12">
                            <div class="panel panel-white">
                            		
                                <div class="panel-body">
                                 <center> <div class="btn btn-success">
                                   		<h4>अधिकारियों की सूची</h4>
                                   	</div>  
                                   	</center>
                                           
                                   <div class="table-responsive">
                                    <table id="sample_1"  class="table table-striped table-bordered table-hover table-checkable order-column" >
                                        <thead>
                                        	<tr style="background: #99ff99;">
                                            	  <th>क्र.स.</th>
                                                <th>विभाग</th>
                                                <th>अधिकारी का पदनाम</th>
                                                <th>Email ID</th>
                                                <th>Mobile Number</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php 
                                       $oid = $this->session->userdata("username");
                                       $fc = $this->session->userdata("shop_id");
                                       //$this->db->where("department","Admin Office");
                                       //$this->db->where_in("cur_status",["assign","forward","solved","review"]);
                                       //$this->db->where("forward_count",$fc);
                                       //$this->db->where("officer_id",$oid);
                                       //$this->db->order_by("complain_date ASC");
                                       $this->db->distinct();
                                       $this->db->select("department,officer_name,email1,mobile1");
                                 
                                       $val= $this->db->get("officers_list");
                                        if($val->num_rows()>0)
                                        {
                                        	$i = 0; 
                                            foreach($val->result() as $row):

                                          	
                                        ?>
                                            <tr style="background: #ccffcc;">
                                                <td><?php echo ++$i;?></td>

                                                <td><?php echo $row->department;?></td>
                                                <td><?php echo $row->officer_name;?></td>
                                                <td><?php echo $row->mobile1;?></td>
                                                <td><?php echo $row->email1;?></td>
                                              
                                                
                                                 
                                            </tr>
                                         <?php
                                       endforeach;
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