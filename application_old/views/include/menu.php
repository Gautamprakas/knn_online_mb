			<div class="page-sidebar sidebar horizontal-bar">
                <div class="page-sidebar-inner">
                <?php $user = $this->session->userdata("login_type");?>
                    <ul class="menu accordion-menu">
                        <li class="nav-heading"><span>Navigation</span></li>
<?php if($user!="op"){ ?>                        
                        <li class="active"><a href="<?php echo base_url();?>apanel/"><span class="menu-icon icon-speedometer"></span><p>डैशबोर्ड</p></a></li>
                   <?php if($user == "admin"): ?>  
                       <li class="droplink"><a href="#"><span class="menu-icon icon-globe"></span><p>शिकायत प्रणाली</p><span class="arrow"></span></a>
                            <ul class="sub-menu">
                               <?php if($user=="admin"){?> 
                                <li><a href="<?php echo base_url();?>apanel/officer_list">अधिकारियों की सूची</a></li>
                                <?php } ?>
                                <li><a href="<?php echo base_url();?>grievanceController/searchGrievance">शिकायत खोजें</a></li>
                                <!-- <li><a href="<?php echo base_url();?>apanel/officerAns">Officer Explaination</a></li>
                                  <li><a href="<?php echo base_url();?>apanel/cws">Complain With Status</a></li>-->
                                 <!-- <li><a href="<?php echo base_url();?>index.php/grievanceController/searchComplain">Search  </a></li>-->
                            </ul>
                        </li>
                    <?php endif; ?>
                           <li class="droplink"><a href="#"><span class="menu-icon icon-notebook"></span><p>शिकायत की अंतिम स्थिति</p><span class="arrow"></span></a>
                            <ul class="sub-menu">
                                <li><a href="<?php echo base_url("index.php/grievanceController/redressed");?>">निस्तारित</a></li>
                                <li><a href="<?php echo base_url("index.php/grievanceController/unredressed");?>">अनिस्तारित</a></li>
                               
                                 <!--<li><a href="#">Critical Complains</a></li>-->
                            </ul>
                        </li>

                        </li>
                           <li class="droplink"><a href="#"><span class="menu-icon icon-notebook"></span><p>शिकायत जिनमें कार्यवाही प्रचलित हैं</p><span class="arrow"></span></a>
                            <ul class="sub-menu">
                                <?php if($user=="admin"){?> 
                               <li><a href="<?php echo base_url("index.php/grievanceController/pending");?>">नईं शिकायत</a></li>
                               <?php } ?>
                                <?php if($user != "admin"): ?>
                                <li><a href="<?php echo base_url("index.php/grievanceController/assign2");?>">सन्दर्भित</a></li>
                                <?php endif; ?>
                                <li><a href="<?php echo base_url("index.php/grievanceController/forwarded");?>">अग्रसारित</a></li>
                                <?php if($this->session->userdata("shop_id") != 3): ?>
                                 <li><a href="<?php echo base_url("index.php/grievanceController/review");?>">पुनर्विचार</a></li>
                                <?php endif; ?>
                                  <li><a href="<?php echo base_url("index.php/grievanceController/solved");?>">निस्तारित कार्मिक स्तर</a></li>
                            </ul>
                        </li>
                       
                         <?php if($user=="admin"){?>
                        <li class="droplink"><a href="#"><span class="menu-icon glyphicon glyphicon-pencil"></span><p> सुधार</p><span class="arrow"></span></a>
                            <ul class="sub-menu">
                                <!--<li ><a href="#">Employee Details</a></li>-->
                               <li ><a href="<?php echo base_url("index.php/grievanceController/addDepartment"); ?>">विभाग जोड़े</a></li>
                                <li ><a href="<?php echo base_url("index.php/grievanceController/editDepartment"); ?>">विभाग संशोधित करें</a></li>
                                 <li ><a href="<?php echo base_url("index.php/grievanceController/addComplainType"); ?>">शिकायत का प्रकार जोड़ें</a></li>
                            </ul>
                        </li>
                         <?php }?>



<?php } ?>                         
                       
                        <li class="droplink"><a href="#"><span class="menu-icon glyphicon glyphicon-plus"></span><p> शिकायत का विवरण</p><span class="arrow"></span></a>
                            <ul class="sub-menu">
<?php if($user == "op" || $user == "admin"){ ?>                              
                             <!--<li><a href="<?php echo base_url();?>index.php/grievanceController/gHome">शिकायत दर्ज करें</a></li>-->
                            
                             <li><a href="<?php echo base_url();?>index.php/grievanceController2/addGrievance">शिकायतकर्ता का विवरण जोड़ें</a></li>
<?php } ?>                              
<?php if($user != "op"){ ?>                            
                             <!--<li><a href="<?php echo base_url();?>index.php/grievanceController2/detailsOfCnumber">शिकायतकर्ता की शिकायत जोड़ें</a></li>-->
                             <li><a href="<?php echo base_url();?>index.php/grievanceController/editGrievanceDetails">शिकायत संशोधित करें</a></li>
<?php } ?>                             
                              <!--<li><a href="#"> Know Status Of Complain  </a></li>-->
                               
                            </ul>
                        </li>


                        <?php if($user=="admin"){?>
                        <li class="droplink"><a href="#"><span class="menu-icon icon-notebook"></span><p>रिपोर्ट</p><span class="arrow"></span></a>
                            <ul class="sub-menu">
                                <!--<li ><a href="#">Employee Details</a></li>-->
                               <li ><a href="<?php echo base_url("index.php/grievanceController2/complain_detail"); ?>">पंजीकृत शिकायतें</a></li>
                                <li ><a href="<?php echo base_url("index.php/grievanceController2/disposed"); ?>">निस्तारित</a></li>
                                 <li ><a href="<?php echo base_url("index.php/grievanceController2/pending_beyond_disposal_time"); ?>">समयावधि के उपरान्त लंबित शिकायत</a></li>
                                  <li ><a href="<?php echo base_url("index.php/grievanceController2/pending_under_process"); ?>">समयावधि के अंतर्गत लंबित शिकायत</a>
                                  </li>
                                   <li ><a href="<?php echo base_url("index.php/grievanceController2/officers_list"); ?>">अधिकारियों की सूची</a>
                                  </li>
                                  <li ><a href="<?php echo base_url("index.php/grievanceController2/totalcomplaintdepwise"); ?>">कुल शिकायतें</a>
                                  </li>
                            </ul>
                        </li>
                         <?php }?>

                        
                        
                        
                        <li class="droplink"><a href="#"><span class="menu-icon glyphicon glyphicon-wrench"></span><p>अन्य</p><span class="arrow"></span></a>
                            <ul class="sub-menu">
                                <li><a href="<?php echo base_url("index.php/apanel/changePassword")?>">अपना पासवर्ड बदले</a></li>
                                <li><a href="<?php echo base_url("index.php/apanel/resetPassword")?>">दूसरे का पासवर्ड रिसेट करें</a></li>
                                <li><a href="<?php echo base_url();?>login/logout">लॉग आउट</a></li>
                            </ul>
                        </li>
                    </ul>
                </div><!-- Page Sidebar Inner -->
            </div><!-- Page Sidebar -->