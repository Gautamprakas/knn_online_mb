					<div class="row">
                        <div class="col-md-12">
                            <div class="panel panel-white">
                            		
                                <div class="panel-body">
                                 <center> <div class="btn btn-success">
                                   		<h4>कुल शिकायतें</h4>
                                   	</div>  
                                   	</center>
                                           
                                   <div class="table-responsive">
                                    <table id="sample_1"  class="table table-striped table-bordered table-hover table-checkable order-column" >
                                        <thead>
                                        	<tr style="background: #99ff99;">
                                            	  <th>क्र.स.</th>
                                                <th>विभाग</th>
                                                <th>कुल शिकायत</th>
                                                <th>कार्यवाही लंबित</th>
                                                <th>कार्यवाही गतिमान</th>
                                                <th>निस्तारित</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php /*
                                       $oid = $this->session->userdata("username");
                                       $fc = $this->session->userdata("shop_id");
                                       //$this->db->where("department","Admin Office");
                                       //$this->db->where_in("cur_status",["assign","forward","solved","review"]);
                                       //$this->db->where("forward_count",$fc);
                                       //$this->db->where("officer_id",$oid);
                                       //$this->db->order_by("complain_date ASC");
                                       /*$this->db->distinct();
                                       $this->db->select("department,officer_name,email1,mobile1");
                                       
                                       $val= $this->db->get("officers_list");*/

                                       /*$this->db->select("officers_list.patal_name,complain_record.complain_number, if(complain_record.complain_number is not NULL,COUNT(*),0) as count",FALSE);
                                       $this->db->from("complain_record");
                                       $this->db->join("officers_list","complain_record.officer_id = officers_list.username ","right");
                                       $this->db->group_by("officers_list.patal_name");
                                       $this->db->order_by("patal_name");
                                       $val = $this->db->get();

                                       /*echo "<pre>";
                                       print_r($val->result());*/
                                       /* if($val->num_rows()>0)
                                        {
                                        	$i = 0; 
                                            foreach($val->result() as $row):

                                          	
                                        ?>
                                            <!--<tr style="background: #ccffcc;">
                                                <td><?php echo ++$i;?></td>
                                                <td><?php echo $row->patal_name;?></td>
                                                <td><?php echo $row->count;?></td>
                                                 
                                            </tr>-->
                                         <?php
                                       endforeach;
                                        }
                                        else {
                                        echo "No Record found";
                                        }*/
                                   ?>




                                   <?php
                                          $cur_date = date("Y-m-d");

                                          $this->db->group_by("username"); 
                                          $this->db->order_by("patal_name");
                                          $res = $this->db->get("officers_list");
                                          $i = 0;
                                          foreach($res->result() as $row){

                                            $this->db->where("officer_id",$row->username);
                                            $this->db->group_by("complain_number");
                                            $TotalRes = $this->db->get("complain_record");

                                            $this->db->where_in("cur_status",["solved","redressed"]);
                                            $this->db->where("officer_id",$row->username);
                                            $this->db->group_by("complain_number");
                                            $SolvedRes = $this->db->get("complain_record");

                                            $this->db->where_in("cur_status",["assign","forward","review"]);
                                            $this->db->where("officer_id",$row->username);
                                            $this->db->where("if(timestamp(last_date_to_solve)>0,datediff(last_date_to_solve,'$cur_date'),(15 - datediff('$cur_date',complain_date))) >=","0");
                                            $this->db->group_by("complain_number");
                                            $UnderProcessRes = $this->db->get("complain_record");


                                             $this->db->where_in("cur_status",["assign","forward","review"]);
                                            $this->db->where("officer_id",$row->username);
                                            $this->db->where("if(timestamp(last_date_to_solve)>0,datediff(last_date_to_solve,'$cur_date'),(15 - datediff('$cur_date',complain_date))) <","0");
                                            $this->db->group_by("complain_number");
                                            $PendingRes = $this->db->get("complain_record");

                                            $array[] = [

                                                "patal_name" => $row->patal_name,
                                                "username" => $row->username,
                                                "total" => $TotalRes->num_rows(),
                                                "pending" => $PendingRes->num_rows(),
                                                "underprocess" => $UnderProcessRes->num_rows(),
                                                "solved" => $SolvedRes->num_rows()
                                            ];

                                            for($j = 0; $j < count($array); $j ++) {
                                                for($i = 0; $i < count($array)-1; $i ++){

                                                    if($array[$i]["total"] < $array[$i+1]["total"]) {
                                                        $temp = $array[$i+1];
                                                        $array[$i+1]=$array[$i];
                                                        $array[$i]=$temp;
                                                    }       
                                                }
                                            }

                                  }
                                           
                                          $i = 0;
                                          foreach($array as $row):
                                  ?>
                                           <tr>
                                             <td><?php echo ++$i; ?></td>
                                             <td><?php echo $row["patal_name"]; ?></td>
                                             <td>
                                              <a href="<?php echo base_url("grievanceController2/getDetails/total/{$row["username"]}"); ?>">
                                              <?php echo $row["total"]; ?>
                                              </a>
                                             </td>
                                             <td>
                                              <a href="<?php echo base_url("grievanceController2/getDetails/pending/{$row["username"]}"); ?>">
                                              <?php echo $row["pending"]; ?>
                                              </a>
                                            </td>
                                             <td>
                                              <a href="<?php echo base_url("grievanceController2/getDetails/underprocess/{$row["username"]}"); ?>">
                                              <?php echo $row["underprocess"]; ?>
                                              </a>
                                            </td>
                                             <td>
                                              <a href="<?php echo base_url("grievanceController2/getDetails/solved/{$row["username"]}"); ?>">
                                              <?php echo $row["solved"]; ?>
                                              </a>
                                            </td>
                                           </tr>
                                  <?php
                                          endforeach;
                                   ?>
                                        </tbody>
                                       </table>  
                                    </div>
                                </div>
                            </div>
						</div>
					</div>