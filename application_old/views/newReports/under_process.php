          <div class="row">
                        <div class="col-md-12">
                            <div class="panel panel-white">
                                
                                <div class="panel-body">
                                 <center> <div class="btn btn-success">
                                      <h4>समयावधि के उपरान्त लंबित शिकायत</h4>
                                    </div>  
                                    </center>
                                           
                                   <div class="table-responsive">
                                    <table id="sample_1"  class="table table-striped table-bordered table-hover table-checkable order-column" >
                                        <thead>
                                          <tr style="background: #99ff99;">
                                                <th>क्र.स.</th>
                                                <th>शिकायत संख्या</th>
                                                <th>शिकायतकर्ता का नाम</th>
                                                <th>संबंधित विभाग</th>
                                                <th>शिकायत का दिनांक</th>
                                                <th>शिकायत निस्तारण को दिया गया समय</th>
                                                <th>निस्तारण होने की दी गयी तिथि</th>
                                                <th>दिए गये समय के बाद लंबित समय</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php 
                                       $oid = $this->session->userdata("username");
                                       $fc = $this->session->userdata("shop_id");
                                       $this->select("complain_record.*");
                                       $this->db->where("department","Admin Office");
                                       $this->db->where_in("cur_status",["assign","forward","solved","review"]);
                                       $this->db->where("forward_count",$fc);
                                       $this->db->where("officer_id",$oid);
                                       $this->db->order_by("complain_date ASC");
                                       $val= $this->db->get();
                                        if($val->num_rows()>0)
                                        {
                                          $i = 0; 
                                            foreach($val->result() as $row):

                                            $date1 = date_create(date('Y-m-d', strtotime($row->complain_date."+15 days")));
                                            $date2 = date_create(date('Y-m-d'));
                                    
                                            $diff  = date_diff($date1,$date2);
                                            //echo $diff->format("%a");

                                            if(date('Y-m-d', strtotime($row->complain_date."+15 days"))< date('Y-m-d'))
                                            {                                           
                                          
                                        ?>
                                            <tr style="background: #ccffcc;">
                                                <td><?php echo ++$i;?></td>
                                                <td>
                                                <a href="<?php echo base_url();?>index.php/grievanceController/redressedAction/<?php echo $row->complain_number;?>"><?php echo $row->complain_number;?>
                                                    
                                                </a></td>


                                                <td><?php echo $row->complainer_name;?></td>
                                                <td><?php echo $row->department;?></td>
                                                <td><?php echo date("Y-m-d",strtotime($row->complain_date));?></td>
                                               <td><?php echo $row->max_days_to_solve?></td>

                                               <td> <?php echo date('Y-m-d', strtotime($row->complain_date."+15 days")); ?></td>           
                                               <td><?php echo $diff->format("%a days");?></td>
                                                
                                                 
                                            </tr>
                                         <?php }
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