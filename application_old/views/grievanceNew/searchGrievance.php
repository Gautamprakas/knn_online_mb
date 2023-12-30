<form action="<?php echo base_url("index.php/grievanceController/searchGrievance"); ?>" method ="post" role="form" class="form-horizontal" id="form">
            <div id="wizard" class="swMain">
             
               <div class="form-group">
               <div class="col-sm-5">
                  <label class="col-sm-4 control-label">
                   Select Department <span class="symbol required"></span>
                  </label>
                  <div class="col-sm-7">
                       <select class="form-control show-tick" id="department" name="department" >
                                  <option value="">Select Department</option>
                                  <option value="all">All Department</option>
                          <?php
                              $this->db->distinct();
                              $this->db->select('department');
                              $value = $this->db->get("complain_record");
                              foreach($value->result() as $b):
                          ?>
                          <option value="<?php echo $b->department;?>"><?php echo $b->department;?></option>
                          <?php endforeach; ?>
                     </select>
                  </div>  
                </div>

                <div class="col-sm-5">
                  <label class="col-sm-4 control-label">
                   Select Category :<span class="symbol required"></span>
                  </label>
                  <div class="col-sm-7">
                      <select class="form-control show-tick" id="category" name="category" placeholder ="Select Department">
                                  <option value="">Select Category</option>
                            <?php
                                $this->db->distinct();
                                $this->db->select("complain_type");
                                $val = $this->db->get("complain_record");
                                foreach($val->result() as $b):
                            ?>
                            <option value="<?php echo $b->complain_type;?>"
                              ><?php echo $b->complain_type;?></option>
                            <?php endforeach; ?>
                     </select>
                  </div>  
                </div>
              </div>

                <div class="form-row text-center">
                  <div class="col-12">
                      <button type="submit" class="btn btn-success  btn-lg" name="viewReport" style=" background:##ff0000"><strong>Get Report</strong></button>
                  </div>  
                </div>

              </div>
              
          </div>
        
      </form>

					<div class="row">
                        <div class="col-md-12">
                            <div class="panel panel-white">
                            		
                                <div class="panel-body">
      <?php 
           @$department = $_POST["department"];
            @$category = $_POST["category"];

        if(!isset($department) && !isset($category))
          {
              $val = $this->db->where("forward_count","0")
                              ->get("complain_record");
          }
        else{    
        $this->db->select('*');
        $this->db->from('complain_record');
        if(isset($department) && !empty($department) && $department!= "all")
          $this->db->where("complain_record.department",$department);
        if(isset($category) && !empty($category) && $category!= "all")
          $this->db->where("complain_record.complain_type",$category);
        $val=$this->db->get();
      }
      ?>
                                 <center> <div class="btn btn-success">
                                   		<h4>सभी शिकायतों की सूची  </h4>
                                      <h4></h4>
                                      <h4><?php echo $department;echo $category;?> कुल शिकायत संख्या <?php print_r($val->num_rows());?> </h4>
                                   	</div>  
                                   	</center>
                                           
                                   <div class="table-responsive">
                                    <table id="sample_1"  class="table table-striped table-bordered table-hover table-checkable order-column" >
                                        <thead>
                                        	<tr>
                                            	<th>sno</th>
                                                <th>Complain number </th>
                                                <th>Status</th>
                                                <th>Remaining Time</th>
                                                <th>Complain Date</th>
                                                <th>Solved Date</th>
                                                <th>Department</th>
                                                <th>Complain Type </th>
                                            	  <th>Complainer</th>
                                                <th>Mobile</th>
                                                <th>Address</th>
                                                <th>Pincode</th>
                                            </tr>
                                        </thead>
                                        <tbody>
      
                                     <?php

                                        if($val->num_rows()>0)
                                        {
                                        	$i = 0; 
                                            foreach($val->result() as $row):
                                        	
                                        ?>
                                            <tr>
                                                <td><?php echo ++$i;?></td>
                                                <td>
                                                <a href="<?php echo base_url();?>index.php/grievanceController/displayAllDetails/<?php echo $row->complain_number;?>"><?php echo $row->complain_number;?>
                                                    
                                                </a></td>
                                                <td><?php echo $row->cur_status;?></td>
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
                                                <td><?php echo $row->solved_date;?></td>
                                                <td><?php echo $row->department;?></td>
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