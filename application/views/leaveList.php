 	<?php $user = $this->session->userdata("login_type");?>
 	<div class="row">
                        <div class="col-md-12">
                            <div class="panel panel-white">
                            		
                                <div class="panel-body">
                              
                                           
                                   <div class="table-responsive">
                                   
                                    <table id="sample_1"  class="table table-striped table-bordered table-hover table-checkable order-column" >
                                        <thead>
																		<tr>
																			<th>क्रम स.</th>
																			<th>यु डायस कोड </th>
																			<th>अध्यापक का नाम</th>
																			<th>अवकाश का प्रकार </th>
																			<th>प्रारंभ तिथि </th>
																			<th>अंतिम तिथि</th>
																			<th>अवकाश  कारण </th>
																				<th>प्रार्थना पत्र देखे </th>
																			
																		</tr>
																	</thead>
																	<tbody>
																		<?php $i=1;
																		if($user =="admin"){
																			$this->db->where("status","Pending");
																			$ed= $this->db->get("employee_leave");
																		}else{
																			$uname = $this->session->userdata("username");
																			$this->db->where("username",$uname);
																			$v = $this->db->get("general_settings")->row();
																			$this->db->where("status","Pending");
																			$this->db->where("block_name",$v->fax_number);
																			$ed= $this->db->get("employee_leave");
																		}
																			if($ed->num_rows()>0){
																			foreach($ed->result() as $row): ?>
																		<tr>
																			<td><?php echo $i;?></td>
																			<td><?php echo $row->udios;?></td>
																			<td><?php echo $row->teacher_id;?></td>
																			<td><?php echo $row->leave_type;?></td>
																			<td><?php echo $row->start_date;?></td>
																			<td><?php echo $row->end_date;?></td>
																			<td><?php echo $row->reason;?></td>
																			<td><a href="<?php echo base_url();?>assets/uploadPdf/<?php echo $row->attch_ment;?>"><?php echo $row->attch_ment;?></a></td>
																			
																	</tr>
																	<?php $i++; endforeach;
																		}?>
																	</tbody>
																	 
																	  </tbody>
                                       </table>  
                                    </div>
                                </div>
                            </div>
						</div>
					</div>