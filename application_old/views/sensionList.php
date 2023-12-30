					<?php $user = $this->session->userdata("login_type");?>
					<div class="row">
                        <div class="col-md-12">
                            <div class="panel panel-white">
                                <div class="panel-body">
                                   <div class="table-responsive">
                                    <center> <div class="btn btn-success">
                                   		<h4>आज की स्वीकृत अवकाश सूची</h4>
                                   	</div>  </center>
                                    <table id="sample_1"  class="table table-striped table-bordered table-hover table-checkable order-column" >
                                        <thead>
                                        	<tr>
                                            	<th>#</th>
                                            	 <th>युडायस कोड </th>
                                                <th>विकास खण्ड  </th>
                                                <th>न्याय पंचायत  </th>
                                                 <th>स्कूल  </th>
                                                <th>अध्यापक का नाम  </th>
                                                <th>दूरभाष </th>
                                                
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php 
                                       
									$msg1 = "a";$msg = 0; $date2 = date("Y-m-d");$a=1; $s=1;
										if($user =="beo"){
											$uname = $this->session->userdata("username");
											$this->db->where("username",$uname);
											$v = $this->db->get("general_settings")->row();
											$this->db->where("block_name",$v->fax_number);
											$this->db->where("date_of_sms",$date2);
											$t1 = $this->db->get("sms_report");
										}else{
											$this->db->where("date_of_sms",$date2);
											$t1 = $this->db->get("sms_report");
										}
                                        	if($t1->num_rows()>0)
                                        	{
                                        		foreach($t1->result() as $t):
                                        		 $udios= $t->Name;
                                        		$this->db->where("udios",$udios);
                                        		$v1 =$this->db->get("school_teachers");
                                        		 if($v1->num_rows()>0){
                                        		$v=$v1->row();
                                        		
                                        		
                                        		
                                        	if(($t->ht =="S")||($t->at1 =="S")||($t->at2 =="S")||($t->at3 =="S")||($t->at4 =="S")||($t->at5 =="S")||($t->at6 =="S")||($t->an1 =="S")||($t->an2 =="S")||($t->at3 =="S")||($t->sm1 =="S")||($t->sm2 =="S")){
                                        		?>	
	                                        			<?php if(($t->ht =="S")){
	                                        				?>
	                                        				<tr>
	                                        				<td>
                                        					<?php echo $a;?>
                                        				</td>
	                                        			
	                                        			
	                                        		<td>
	                                        				<?php echo $v->udios;?>
	                                        			</td>
	                                        			<td>
	                                        				<?php echo $v->block;?>
	                                        			</td>
	                                        			<td>
	                                        				<?php echo $v->nyay_panchayat;?>
	                                        			</td>
	                                        			<td>
	                                        				<?php echo $v->school_name;?>
	                                        			</td>
	                                        				
	                                        				<td><?php echo $v->head_teacher;?></td>
	                                        				<td><?php echo $v->head_mobile;?></td></tr>
	                                        				<?php }
	                                        				
	                                        				if(($t->at1 =="S")){
	                                        					?>
	                                        				<tr>	<td>
                                        					<?php echo $a;?>
                                        				</td>
	                                        			
	                                        			
	                                        		<td>
	                                        				<?php echo $v->udios;?>
	                                        			</td>
	                                        			<td>
	                                        				<?php echo $v->block;?>
	                                        			</td>
	                                        			<td>
	                                        				<?php echo $v->nyay_panchayat;?>
	                                        			</td>
	                                        			<td>
	                                        				<?php echo $v->school_name;?>
	                                        			</td>
	                                        			<td><?php echo $v->assistent_teacher1;?></td>
	                                        				<td><?php echo $v->assistent_mobile1;?></td></tr>
	                                        				<?php }
	                                        				if(($t->at2 =="S")){
	                                        					?>
	                                        				<tr>	<td>
                                        					<?php echo $a;?>
                                        				</td>
	                                        			
	                                        			
	                                        		<td>
	                                        				<?php echo $v->udios;?>
	                                        			</td>
	                                        			<td>
	                                        				<?php echo $v->block;?>
	                                        			</td>
	                                        			<td>
	                                        				<?php echo $v->nyay_panchayat;?>
	                                        			</td>
	                                        			<td>
	                                        				<?php echo $v->school_name;?>
	                                        			</td>
	                                        			<td><?php echo $v->assistent_teacher2;?></td>
                                        					     <td><?php echo $v->assistent_mobile2;?></td></tr>
                                        					      <?php }
                                        					      if(($t->at3 =="S")){
                                        					      	?>
                                        					      <tr>	<td>
                                        					<?php echo $a;?>
                                        				</td>
	                                        			
	                                        			
	                                        		<td>
	                                        				<?php echo $v->udios;?>
	                                        			</td>
	                                        			<td>
	                                        				<?php echo $v->block;?>
	                                        			</td>
	                                        			<td>
	                                        				<?php echo $v->nyay_panchayat;?>
	                                        			</td>
	                                        			<td>
	                                        				<?php echo $v->school_name;?>
	                                        			</td><td>
                                        					      	<?php echo $v->assistent_teacher3;?></td>
                                        					        <td><?php echo $v->assistent_mobile3;?></td></tr>
                                        					          <?php }
                                        					          if(($t->at4 =="S")){
                                        					          	?>
                                        					          	<tr><td>
                                        					<?php echo $a;?>
                                        				</td>
	                                        			
	                                        			
	                                        		<td>
	                                        				<?php echo $v->udios;?>
	                                        			</td>
	                                        			<td>
	                                        				<?php echo $v->block;?>
	                                        			</td>
	                                        			<td>
	                                        				<?php echo $v->nyay_panchayat;?>
	                                        			</td>
	                                        			<td>
	                                        				<?php echo $v->school_name;?>
	                                        			</td><td><?php echo $v->assistent_teacher4;?></td>
                                        					         <td><?php echo $v->assistent_mobile4;?></td></tr>
                                        					           <?php }			
                                        					           if(($t->at5 =="S")){
                                        					           	?>
                                        					           	<tr><td>
                                        					<?php echo $a;?>
                                        				</td>
	                                        			
	                                        			
	                                        		<td>
	                                        				<?php echo $v->udios;?>
	                                        			</td>
	                                        			<td>
	                                        				<?php echo $v->block;?>
	                                        			</td>
	                                        			<td>
	                                        				<?php echo $v->nyay_panchayat;?>
	                                        			</td>
	                                        			<td>
	                                        				<?php echo $v->school_name;?>
	                                        			</td><td><?php echo $v->assistent_teacher5;?></td>
                                        					          <td><?php echo $v->assistent_mobile5;?></td></tr>
                                        					            <?php }
                                        					            if(($t->at6 =="S")){
                                        					            	?>
                                        					            	<tr><td>
                                        					<?php echo $a;?>
                                        				</td>
	                                        			
	                                        			
	                                        		<td>
	                                        				<?php echo $v->udios;?>
	                                        			</td>
	                                        			<td>
	                                        				<?php echo $v->block;?>
	                                        			</td>
	                                        			<td>
	                                        				<?php echo $v->nyay_panchayat;?>
	                                        			</td>
	                                        			<td>
	                                        				<?php echo $v->school_name;?>
	                                        			</td><td><?php echo $v->assistent_teacher6;?></td>
                                        					             <td><?php echo $v->assistent_mobile6;?></td></tr>
                                        					              <?php }   
                                        					             if(($t->an1 =="S")){
                                        					             	?>
                                        					             	<tr><td>
                                        					<?php echo $a;?>
                                        				</td>
	                                        			
	                                        			
	                                        		<td>
	                                        				<?php echo $v->udios;?>
	                                        			</td>
	                                        			<td>
	                                        				<?php echo $v->block;?>
	                                        			</td>
	                                        			<td>
	                                        				<?php echo $v->nyay_panchayat;?>
	                                        			</td>
	                                        			<td>
	                                        				<?php echo $v->school_name;?>
	                                        			</td><td><?php echo $v->anudeshak1;?></td>
                                        					             <td><?php echo $v->anudeshak1_mobile;?></td></tr>
                                        					            <?php }
                                        					            if(($t->an2 =="S")){
                                        					            ?>
                                        					          <tr>  <td>
                                        					<?php echo $a;?>
                                        				</td>
	                                        			
	                                        			
	                                        		<td>
	                                        				<?php echo $v->udios;?>
	                                        			</td>
	                                        			<td>
	                                        				<?php echo $v->block;?>
	                                        			</td>
	                                        			<td>
	                                        				<?php echo $v->nyay_panchayat;?>
	                                        			</td>
	                                        			<td>
	                                        				<?php echo $v->school_name;?>
	                                        			</td><td><?php echo $v->anudeshak2;?></td>
                                        					            <td><?php echo $v->anudeshak2_mobile;?></td></tr>
                                        					           <?php } 
                                        					           if(($t->an3 =="S")){
                                        					           ?>
                                        					         <tr>  <td>
                                        					<?php echo $a;?>
                                        				</td>
	                                        			
	                                        			
	                                        		<td>
	                                        				<?php echo $v->udios;?>
	                                        			</td>
	                                        			<td>
	                                        				<?php echo $v->block;?>
	                                        			</td>
	                                        			<td>
	                                        				<?php echo $v->nyay_panchayat;?>
	                                        			</td>
	                                        			<td>
	                                        				<?php echo $v->school_name;?>
	                                        			</td><td><?php echo $v->anudeshak3;?></td>
                                        					           <td><?php echo $v->anudeshak3_mobile;?></td></tr>
                                        					         <?php } 
                                        					            if(($t->sm1 =="S")){
                                        					           	?>
                                        					           <tr>	<td>
                                        					<?php echo $a;?>
                                        				</td>
	                                        			
	                                        			
	                                        		<td>
	                                        				<?php echo $v->udios;?>
	                                        			</td>
	                                        			<td>
	                                        				<?php echo $v->block;?>
	                                        			</td>
	                                        			<td>
	                                        				<?php echo $v->nyay_panchayat;?>
	                                        			</td>
	                                        			<td>
	                                        				<?php echo $v->school_name;?>
	                                        			</td><td><?php echo $v->sm1;?></td>
                                        					           <td><?php echo $v->sm1_mobile;?></td></tr>
                                        					           <?php }  
                                        		 if(($t->sm2 =="S")){
                                        					       	?>
                                        					       <tr>	<td>
                                        					<?php echo $a;?>
                                        				</td>
	                                        			
	                                        			
	                                        		<td>
	                                        				<?php echo $v->udios;?>
	                                        			</td>
	                                        			<td>
	                                        				<?php echo $v->block;?>
	                                        			</td>
	                                        			<td>
	                                        				<?php echo $v->nyay_panchayat;?>
	                                        			</td>
	                                        			<td>
	                                        				<?php echo $v->school_name;?>
	                                        			</td><td><?php echo $v->sm2;?></td>
                                        					         <td><?php echo $v->sm2_mobile;?></td></tr>
                                        					      <?php }  
                                        					                                                                                       				
	                                        				?>
	                                        			
                                        			
                                        			<?php 
                                        			$a++;
                                        	}
                                        	
                                        	
                                        		 }
                                        		 endforeach;
                                        }
                                        else {
                                        	$msg1 = "Please Upload Csv File ";
                                        	$msg=true;
                                        }?>
                                      
                                        </tbody>
                                       </table>  
                                    </div>
                                </div>
                            </div>
						</div>
					</div>