<div class="page-content-inner">
                            <div class="row">
                                <div class="col-md-12">
									<div class="portlet light ">
										<div class="portlet box green ">
                                        <div class="portlet-title">
                                            <div class="caption">
                                                <i class="fa fa-gift"></i>Grievance Panel  </div>
                                            <div class="tools">
                                                <a href="#" class="collapse"> </a>
                                                <a href="#portlet-config" data-toggle="modal" class="config"> </a>
                                                <a href="#" class="reload"> </a>
                                                <a href="#" class="remove"> </a>
                                            </div>
                                      </div>
                             <div class="portlet-body">
                             <div>
                             		<!--Welcome to Grievance Panel  ......-->
                             </div>
                             <div class="row">
            <div class="col-md-12">
                <div class="portlet box green">
                    <div class="portlet-title">
                        <div class="caption">
                            <i class="fa fa-gift"></i>Edit Department</div>
                        <div class="tools">
                            <a href="javascript:;" class="collapse"> </a>
                            <a href="#portlet-config" data-toggle="modal" class="config"> </a>
                            <a href="javascript:;" class="reload"> </a>
                            <a href="javascript:;" class="remove"> </a>
                        </div>
                    </div>
                   
                    <div class="portlet-body form">
					<form class="form-horizontal">
                    <div class="col-lg-12 form-group">
					  <br>
						<?php
                               $dep_types = $this->db->distinct()
                                                 ->select("dep_type")->order_by("dep_type","ASC")
                                                 ->get("officers_list")->result();
					   ?>
					           <div class="col-sm-12 form-group">
								<label class="col-sm-4 control-label">
									Select Type  <span class="symbol required"></span>
								</label>
								<div class="col-sm-6 ">
									<select class="form-control m-b-sm" name="dep_type" id="dep_type">
										<option value="">--Select Type--</option>
										<?php foreach($dep_types as $dep_type): ?>
											<option value="<?php echo $dep_type->dep_type ?>">
											<?php echo $dep_type->dep_type ?>
											</option>
										<?php endforeach; ?>
									</select>
								</div>
                               </div>


                               <div class="col-sm-12 form-group" id="dep_nameDIV">
                                <label class="col-sm-4 control-label">
                                    Department  <span class="symbol required"></span>
                                </label>
                                <div class="col-sm-6 ">
                                    <select class="form-control m-b-sm" name="dep_name" id="dep_name">
                                    </select>
                                </div>
                               </div>


                               <div class="col-sm-12 form-group" id="teh_nameDIV">
                                <label class="col-sm-4 control-label">
                                    Tehsil  <span class="symbol required"></span>
                                </label>
                                <div class="col-sm-6 ">
                                    <select class="form-control m-b-sm" name="teh_name" id="teh_name">
                                    </select>
                                </div>
                               </div>
								
					  </div>

                      <div id="editDepartment">
                      	
                      </div>
					</form>
            </div>
            </div>
 
  
        </div>	
</div>

</div>
</div>
</div>
</div>

</div>

 