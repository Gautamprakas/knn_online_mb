					<div class="row">
                        <div class="col-md-12">
                            <div class="panel panel-white">
                            		
                                <div class="panel-body">
                                 <center> <div class="btn btn-success">
                                   		<h4>पंजीकृत शिकायतें</h4>
                                   	</div>  
                                   	</center>
                                           
                                   <div class="table-responsive">
                                    <table id="sample_1"  class="table table-striped table-bordered table-hover table-checkable order-column" >
                                        <thead>
                                        	<tr style="background: #99ff99;">
                                            	  <th>क्र.स.</th>
                                                <th>शिकायत संख्या</th>
                                                <th>शिकायत का दिनांक</th>
                                                <th>शिकायत निस्तारण को दिया गया समय</th>
                                                <th>शिकायत का प्रकार</th>
                                                <th>संबंधित विभाग</th>
                                                <th>शिकायतकर्ता का नाम</th>
                                                <th>शिकायतकर्ता का नंबर</th>
                                                <th>शिकायतकर्ता का पता</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php 
                                       $oid = $this->session->userdata("username");
                                       $fc = $this->session->userdata("shop_id");
                                       //$this->db->where("cur_status !=","solved");
                                       $this->db->where("forward_count",$fc+1);
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
                                                <a href="<?php echo base_url();?>index.php/grievanceController/redressedAction/<?php echo $row->complain_number;?>"><?php echo $row->complain_number;?>
                                                    
                                                </a></td>
                                                 <td><?php echo date("Y-m-d",strtotime($row->complain_date));?></td>
                                                 <td><?php echo $row->max_days_to_solve;?></td>
                                                 <td><?php echo $row->complain_type;?></td>
                                                 <td><?php echo $row->department;?></td>
                                                <td><?php echo $row->complainer_name;?></td>
                                                 <td><?php echo $row->mobile_number;?></td>
                                                  <td><?php echo $row->address;?></td>
                                               
                                                 
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