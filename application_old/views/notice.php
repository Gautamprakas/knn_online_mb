                <div id="main-wrapper" class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="panel panel-white">
                            	<div class="panel-heading clearfix">
                                    <h4 class="panel-title">Enter Notice Containt and Title</h4>
                                </div>
                            	<div class="panel-body">
                                	<form class="form-horizontal" action="<?php echo base_url();?>smsControllers/sendnotice" method="post">
                                        <div class="form-group">
                                            <label for="input-Default" class="col-sm-2 control-label">Mobile Number<br/> For multiple number (Ex._9568426323,2541256234,2541232345)</label>
                                            <div class="col-sm-10">
                                                <textarea class="form-control" id="input-Default" name="mobile"></textarea>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-2 control-label">SMS Content</label>
                                            <div class="col-sm-10">
                                            	<textarea rows="6" cols="60" class="form-control" name="msg" ></textarea>
                                            </div>
                                        </div>
                                         <div class="col-sm-offset-2 col-sm-10">
                                            <button type="submit" class="btn btn-success">Send SMS</button>
                                         </div>
                                    </form>  
                                </div>
                            </div>
                        </div>
                    </div><!-- Row -->
                    
                </div><!-- Main Wrapper -->