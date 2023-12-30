
					<div class="page-content-inner">
                            <div class="row">
                                <div class="col-md-12">
									<div class="portlet light ">
										<div class="portlet box green ">
                                        <div class="portlet-title">
                                            <div class="caption">
                                                <i class="fa fa-gift"></i>Leave Panel </div>
                                            <div class="tools">
                                                <a href="#" class="collapse"> </a>
                                                <a href="#portlet-config" data-toggle="modal" class="config"> </a>
                                                <a href="#" class="reload"> </a>
                                                <a href="#" class="remove"> </a>
                                            </div>
                                      </div>
					</div>
					
					
					
					
					
					
					
					
					<div class="panel-body">
						<?php 
							$row = $this->db->get("sms")->row();
							$adm = $row->sms_not_receieve;
							$fee_submit = $row->leave;
							$purchase = $row->karyavahi;
							
						?>
						<table class="table">
								<thead>
									<tr>
										<th>SMS Not Receieved</th>
										<th>Leave</th>
										<th>Karyavahi</th>
										
									</tr>
								</thead>
								<tbody>
									<tr>
										<td>
											<button class="btn green <?php if($adm == 'yes'){echo "btn green"; }else{echo "btn red";}?>" id="sms_not_receieve" value="sms_not_receieve">
												<i class="<?php if($adm == 'yes'){echo "fa fa-check"; }else{echo "fa fa-times fa fa-white";}?>"></i> 
												<?php if($adm == 'yes'){echo "YES"; }else{echo "NO";}?>
											</button>
										</td>
										<td>
											<button class="btn green <?php if($fee_submit == 'yes'){echo "btn green"; }else{echo "btn red";}?>" id="leave" value="leave">
												<i class="<?php if($fee_submit == 'yes'){echo "fa fa-check"; }else{echo "fa fa-times fa fa-white";}?>"></i> 
												<?php if($fee_submit == 'yes'){echo "YES"; }else{echo "fa fa-times fa fa-white";}?>
											</button>
										</td>
										<td>
											<button class="btn green <?php if($purchase == 'yes'){echo "btn green"; }else{echo "btn red";}?>" id="karyavahi" value="karyavahi">
												<i class="<?php if($purchase == 'yes'){echo "fa fa-check"; }else{echo "fa fa-times fa fa-white";}?>"></i> 
												<?php if($purchase == 'yes'){echo "YES"; }else{echo "NO";}?>
											</button>
										</td>
										
									</tr>
								</tbody>
							</table>
							<div id="smsSetting"></div>
							<div></div>
						</div>
					</div>
				</div>
			</div>
			</div>
			
		<div class="col-sm-13">	
	<div class="row" id = "basic">
			<!-- end: FORM WIZARD PANEL -->
	</div>	
	</div>			
	
</div>	
	