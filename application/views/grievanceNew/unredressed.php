					<div class="row">
                        <div class="col-md-12">
                            <div class="panel panel-white">
                            		
                                <div class="panel-body">
                                 <center> <div class="btn btn-success">
                                   		<h4>Others Files List </h4>
                                   	</div>  
                                   	</center>
                                           
                                   <div class="">
                                    <table id="sample_1"  class="table table-striped table-bordered table-hover table-checkable order-column" >
                                        <thead>

                                            <tr style="background: #ff9999;">
                                                <th>Sno</th>
                                                <th>Work Number</th>

                                                <th>Work</th>
                                                <th>Recommended by</th>
                                                <!-- <th>Estimated Cost</th>
                                                <th>Sanctioned Cost</th>
                                                <th>Budget Head</th> -->
                                                <th>Department</th>

                                                <th>File Number</th>
                                                <th>File Date</th>
                                                <th>Financial Year</th>
                                                <th>Ward</th>
                                                <th>Name of Corporator</th>
                                                <th>Approved Date</th>
                                                <!-- <th>Date of dispatch to Hon'ble Mayor for approval</th> -->
                                                <th>Date of dispatch to the concerned department from the office of the Municipal Commissioner</th>
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
                                                <td><?php echo $row->complain_number;?></a></td>

                                                <td><?php echo $row->complain;?></td>
                                                <td><?php echo $row->complainer_name;?></td>
                                                <!-- <td><?php //echo $row->pincode;?></td>
                                                <td><?php //echo $row->mobile_number;?></td>
                                                <td><?php //echo $row->address;?></td> -->
                                                <td><?php echo $row->related_department;?></td>


                                                <td><?php echo $row->father_name;?></td>
                                                <td><?php echo $row->patrawali_date;?></td>
                                                <td><?php echo $row->financial_year;?></td>
                                                <td><?php echo $row->block_name;?></td>
                                                <td><?php echo $row->village;?></td>
                                                <td><?php echo $row->gender;?></td>
                                                <!-- <td><?php //echo $row->mahapaura_approval_date;?></td> -->
                                                <td><?php echo $row->nagar_ayukat_approval_date;?></td>
                            
                                                
                                                 
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