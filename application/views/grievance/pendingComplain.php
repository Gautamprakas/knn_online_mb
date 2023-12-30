					<div class="row">
                        <div class="col-md-12">
                            <div class="panel panel-white">
                            		
                                <div class="panel-body">
                                 <center> <div class="btn btn-success">
                                   		<h4>List Of Pending Complains </h4>
                                   	</div>  
                                   	</center>
                                           
                                   <div class="table-responsive">
                                    <table id="sample_1"  class="table table-striped table-bordered table-hover table-checkable order-column" >
                                        <thead>
                                        	<tr style="background: #7f7fff;">
                                            	<th>sno</th>
                                                <th>Block</th>
                                                <th>Complain number </th>
                                                <th>Date & Time </th>
                                                <th>Complain Type </th>
                                            	<th>Complainer</th>
                                                <th>Age</th>
                                                <th>Gender</th>
                                                <th>Father Name</th>
                                                <th>Mobile</th>
                                                <th>Address</th>
                                                <th>Pincode</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php 
                                       $this->db->where("cur_status","Pending");
                                       $this->db->order_by("complain_date ASC");
                                       $val= $this->db->get("complain_record");
                                        if($val->num_rows()>0)
                                        {
                                        	$i = 0; 
                                            foreach($val->result() as $row):
                                        	if($row->complainer_name){
                                        ?>
                                            <tr style="background: #ccccff;">
                                                <td><?php echo ++$i;?></td>
                                                <td><?php echo $row->block_name?></td>
                                                <td>
                                                <a href="<?php echo base_url();?>index.php/grievanceController/assignForm/<?php echo $row->complain_number;?>"><?php echo $row->complain_number;?>
                                                    
                                                </a></td>
                                                <td><?php echo $row->complain_date;?></td>
                                                <td><?php echo $row->complain_type;?></td>
                                                <td><?php echo $row->complainer_name;?></td>
                                                <td><?php echo $row->age;?></td>
                                                <td><?php echo $row->gender;?></td>
                                                <td><?php echo $row->father_name;?></td>
                                                <td><?php echo $row->mobile_number;?></td>
                                                <td><?php echo $row->address;?></td>
                                                <td><?php echo $row->pincode;?></td>
                                                
                                                 
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