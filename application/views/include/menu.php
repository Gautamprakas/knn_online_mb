			<div class="page-sidebar sidebar horizontal-bar">
                <div class="page-sidebar-inner">
                <?php $user = $this->session->userdata("login_type");?>
                    <ul class="menu accordion-menu">
                        <li class="nav-heading"><span>Navigation</span></li>                  
                       
                        <li><a href="<?php echo base_url();?>index.php/grievanceController2/addGrievance"><span class="menu-icon glyphicon glyphicon-plus"></span><p>Add Project</p><span class="arrow"></span></a>
                        </li>  
                        <li><a href="<?php echo base_url();?>index.php/grievanceController2/addItem"><span class="menu-icon glyphicon glyphicon-plus"></span><p>Add Description of Item</p><span class="arrow"></span></a>
                        </li>        
                        <li class="droplink"><a href="#"><span class="menu-icon icon-notebook"></span><p>Report</p><span class="arrow"></span></a>
                            <ul class="sub-menu">
                                  <li ><a href="<?php echo base_url("index.php/grievanceController2/work_wise_report"); ?>">Work Wise</a>
                                  </li>
                                   
                            </ul>
                        </li>

                        <li class="droplink"><a href="#"><span class="menu-icon glyphicon glyphicon-wrench"></span><p>Other</p><span class="arrow"></span></a>
                            <ul class="sub-menu">
                                <li><a href="<?php echo base_url("index.php/apanel/changePassword")?>">Change Password</a></li>
                                <!-- <li><a href="<?php //echo base_url("index.php/apanel/resetPassword")?>">दूसरे का पासवर्ड रिसेट करें</a></li> -->
                                <li><a href="<?php echo base_url();?>login/logout">Logout</a></li>
                            </ul>
                        </li>
                    </ul>
                </div><!-- Page Sidebar Inner -->
            </div><!-- Page Sidebar -->