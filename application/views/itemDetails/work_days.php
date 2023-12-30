<div class="page-content-inner">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="portlet light ">
                                        <div class="portlet box green ">
                                        <div class="portlet-title">
                                            <div class="caption">
                                                <i class="fa fa-gift"></i>Project Panel  </div>
                                            <div class="tools">
                                                <a href="#" class="collapse"> </a>
                                                <a href="#portlet-config" data-toggle="modal" class="config"> </a>
                                                <a href="#" class="reload"> </a>
                                                <a href="#" class="remove"> </a>
                                            </div>
                                      </div>
                             <div class="portlet-body">
                             <div>
                                    <!--Welcome to Work Panel  ......-->
                             </div>
                             <div class="row">
            <div class="col-md-12">
                <div class="portlet box green">
                    <div class="portlet-title">
                        <div class="caption">
                            <i class="fa fa-gift"></i><?php
                             $this->db->select("subject,work_days,project_start");
                             $this->db->where("complain_number",$complain_number);
                             $this->db->from("complain_record");
                             $query=$this->db->get();
                             $res=$query->row_array();
                             echo $res['subject'];
                             
                             if($res['work_days']){
                                $isSubmit=$res['work_days'];
                                $startDate=$res['project_start'];
                             }else{
                                $isSubmit=$res['work_days'];
                                $startDate=$res['project_start'];
                             }
                             ?>

                            </div>
                            <div id="complain-data" data-complain-number="<?php echo $complain_number; ?>"></div>

                        <div class="tools">
                            <a href="javascript:;" class="collapse"> </a>
                            <a href="#portlet-config" data-toggle="modal" class="config"> </a>
                            <a href="javascript:;" class="reload"> </a>
                            <a href="javascript:;" class="remove"> </a>
                        </div>
                    </div>
                </center>
            <div class="portlet-body form">


                <form class="form-horizontal" action=""   method="post" enctype="multipart/form-data">
                        
                        
                         <div class="col-sm-12 form-group">
                            <br>
                                <?php 
                                 if($error = $this->session->flashdata("dep"))
                                   echo $error; 
                                ?>
                            </br>
                        </div>

                        <div class="col-sm-12 form-group">
                                <label class="col-sm-4 control-label">
                                    Days :<span class="symbol required control-label">*</span>
                                </label>
                                <div class="col-sm-6">
                                    <input type="number" id="days" name="days" class="form-control m-b-sm" placeholder="Enter number Of Days " >
                                </div>  
                        </div>
                        <div class="col-sm-12 form-group">
                                <label class="col-sm-4 control-label">
                                    Project Start On :<span class="symbol required control-label">*</span>
                                </label>
                                <div class="col-sm-6">
                                    <input type="date" id="startDate" name="startDate" class="form-control m-b-sm" placeholder="Enter number Of Days " >
                                </div>  
                        </div>

                            
                            

                            <div class="col-sm-12 form-group">
                                <label class="col-sm-4 control-label">
                                  <span class="symbol required"></span>
                                </label>
                                    <div class="col-sm-6" >
                                         <button type="submit" id="submitLeave" class="btn btn-success">Submit </button>
                                    </div>  
                            </div>
                                                    


                            
                        </div>
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

</div>
<script>
$(document).ready(function(){
    var submitButton=document.getElementById("submitLeave");
    var inputDays=document.getElementById("days");
    var startDateId=document.getElementById("startDate");

    var isSubmit='<?php echo $isSubmit; ?>';
    var startOn='<?php echo $startDate; ?>';
    if(isSubmit){
        inputDays.value=isSubmit;
        inputDays.disabled=true;
        submitButton.disabled=true;
        startDateId.value=startOn;
        startDateId.disabled=true;
    }
    console.log(isSubmit);
    var work_id='<?php echo $complain_number ;?>';
    var days;
    var b_url = '<?php echo base_url(); ?>';
    document.getElementById("submitLeave").addEventListener("click", function(event){
        days = document.getElementById("days").value;
        var submitButton=document.getElementById("submitLeave"); // Fetch days value here
        var startDate=document.getElementById("startDate").value;

        $.ajax({
            type: "POST",
            url: b_url + "index.php/grievanceController2/save_work_days",
            data: {
                days: days,
                work_id:work_id,
                startDate:startDate,
            },
            success: function(response) {

                submitButton.style.display = 'none'; // Hide the submit button
            
                alert(response);
                location.reload();
            },
            error: function(response) {
                alert("Error Occured ...");
                
            }
        });
    });
    event.preventDefault();
});
</script>


<script>
    jQuery('input[name=pincode]').on('keyup',function(){
        estimated_cost = parseInt(jQuery(this).val());
        mayor_approval_cost = 1000000;
        if( estimated_cost > mayor_approval_cost ){
            jQuery('input[name=mahapaura_approval_date]').prop('disabled',false);
            jQuery('input[name=mahapaura_approval_date]').parent().parent().show();
        }else{
            jQuery('input[name=mahapaura_approval_date]').prop('disabled',true);
            jQuery('input[name=mahapaura_approval_date]').parent().parent().hide();
        }
    });

    jQuery('input[name=file_type]').on('change',function(){
        file_type = jQuery(this).val();

        if( file_type == 'Estimated' ){
            jQuery('select[name=address]').attr('required','required');
            jQuery('input[name=pincode]').attr('required','required');
            jQuery('input[name=mobile_number]').attr('required','required');

            jQuery('select[name=address]').parent().parent().show();
            jQuery('input[name=pincode]').parent().parent().show();
            jQuery('input[name=mobile_number]').parent().parent().show();
        }

        if( file_type == 'Others' ){
            jQuery('select[name=address]').removeAttr('required');
            jQuery('input[name=pincode]').removeAttr('required');
            jQuery('input[name=mobile_number]').removeAttr('required');

            jQuery('select[name=address]').parent().parent().hide();
            jQuery('input[name=pincode]').parent().parent().hide();
            jQuery('input[name=mobile_number]').parent().parent().hide();
        }
    });
</script>
