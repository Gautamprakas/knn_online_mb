<?php $user = $this->session->userdata("login_type");?>
<div class="page-content-inner">
                            <div class="row">
                                <div class="col-md-12 ">
									<div class="portlet light ">
										<div class="portlet box yellow ">
                                        <div class="portlet-title">
                                            <div class="caption">
                                                <i class="fa fa-gift"></i>SMS न भेजने वाले विद्यालय  </div>
                                            <div class="tools">
                                                <a href="#" class="collapse"> </a>
                                                <a href="#portlet-config" data-toggle="modal" class="config"> </a>
                                                <a href="#" class="reload"> </a>
                                                <a href="#" class="remove"> </a>
                                            </div>
                                      </div>
                                     </div> 
					<div class="panel-body">
						<div class="note note-success"> Note:- Please wait for few second after select date and block.</div>
						<div id="wizard" class="swMain">
							<div class="form-group">
								<div class="col-sm-5">
									<label class="col-sm-5 control-label">
										<h4><strong>दिनांक  </strong>  <span class="symbol required"></span></h4>
									</label>
									<div class="col-sm-6">
	                                    <input type="date" class="form-control"  id="sdate1" name ="sdate1"  required="required" />
	                                   
	                                </div>	
								</div>
								
								<div class="col-sm-6">
									<label class="col-sm-5 control-label">
										<h4><strong>विकास खण्ड  </strong><span class="symbol required"></h4></span>
									</label>
									<div class="col-sm-6">
											<select class="form-control m-b-sm" id="status1" name="status1" required="required">
											<option value="">-विकास खण्ड चुने -</option>
											
											<?php 
											if($user =="beo"){
											$uname = $this->session->userdata("username");
											$this->db->where("username",$uname);
											$v = $this->db->get("general_settings")->row();?>
											<option value="<?php echo $v->fax_number?>"><?php echo $v->fax_number;?></option>
											<?php }else{
											$this->db->distinct();
													$this->db->select('block');
													$val = $this->db->get("school_teachers");
													foreach($val->result() as $b):?>
											<option value="<?php echo $b->block;?>"><?php echo $b->block;?></option>
											<?php endforeach; }?>
											
										</select>
									</div>	
								</div>
							</div>
							<div></div>
						</div>
					</div>
				</div>
			</div>
			</div>
			
			
					
	
</div>	
<div class="row" id = "basic1">
			<!-- end: FORM WIZARD PANEL -->
	</div>
	
		