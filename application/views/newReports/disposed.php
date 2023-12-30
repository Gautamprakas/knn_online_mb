					<div class="row">
                        <div class="col-md-12">
                            <div class="panel panel-white">
                            		
                                <div class="panel-body">
                                 <center> <div class="btn btn-success">
                                   		<h4>निस्तारित</h4>
                                   	</div>  
                                   	</center>
                                           
                                   <div class="table-responsive">
                                    <table id="sample_1"  class="table table-striped table-bordered table-hover table-checkable order-column" >
                                        <thead>
                                        	<tr style="background: #99ff99;">
                                            	  <th>क्र.स.</th>
                                                <th>शिकायत संख्या</th>
                                                <th>संबंधित विभाग</th>
                                                <th>शिकायत का दिनांक</th>
                                                <th>निस्तारण की तिथि</th>
                                                <th>निस्तारण में लगा कुल समय</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php 
                                       $oid = $this->session->userdata("username");
                                       $fc = $this->session->userdata("shop_id");
                                       $this->db->where("cur_status","redressed");
                                       $this->db->where("forward_count",$fc+1);
                                       //$this->db->where("officer_id",$oid);
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
                                                <td><?php echo $row->department;?></td>
                                                <td><?php echo date("Y-m-d",strtotime($row->complain_date));?></td>
                                                <?php $date1 = date_create(date("Y-m-d",strtotime($row->complain_date)));
                                                      $date2 = date_create($row->solved_date);
                                              
                                                      $diff  = date_diff($date1,$date2);
                                                ?>
                                               <td><?php echo $row->solved_date;?></td>
                                               <td><?php echo $diff->format("%a days");?></td>
                                                
                                                 
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