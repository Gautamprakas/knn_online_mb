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
                             $this->db->select("subject");
                             $this->db->where("complain_number",$complain_number);
                             $this->db->from("complain_record");
                             $query=$this->db->get();
                             $res=$query->row_array();
                             echo $res['subject'];
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
                                    Select Description Item  <span class="symbol required">*</span>
                                </label>
                                <div class="col-sm-6" >
                                    <select id = "item" name ="item" class="form-control m-b-sm" required="required">
                                        <option value="">--Select Item--</option>
                                        <?php
                                            $this->db->select("item_desc,SUM(quantity) as total_quantity,SUM(total_amount) as toal_amount,unit,sor_non_sor,rate");
                                            $this->db->from("quantity_required");
                                            $this->db->group_by("item_id");
                                            $query = $this->db->get();
                                            $result=$query->result_array();
                                            foreach($result as $row){
                                        ?>
                                        <option value="<?php echo $row['item_desc']; ?>" data-properties='<?php echo json_encode($row);?>'><?php echo $row['item_desc']; ?></option>
                                        <?php } ?>
                                    </select>
                                </div>  
                            </div>
                            <div class="col-sm-12 form-group">
                                <label class="col-sm-4 control-label">
                                    GST : <span class="symbol required control-label"></span>
                                </label>
                                <div class="col-sm-6">
                                    <input type="radio" name="gst" id="gst18" value="18" checked >
                                    <label>18%</label>
                                    <input type="radio" name="gst" id="gst28" value="28">
                                    <label>28%</label>
                                    
                                </div>  
                            </div>
                            
                            
                            <div class="col-sm-12 form-group">
                                <label class="col-sm-4 control-label">
                                    Sor/Non Sor : <span class="symbol required control-label"></span>
                                </label>
                                <div class="col-sm-6">
                                    <span id="sorNonsor"></span>
                                    
                                </div>  
                            </div>
                            <div class="col-sm-12 form-group">
                                <label class="col-sm-4 control-label">
                                    Description of Item :  <span class="symbol required control-label"></span>
                                </label>
                                <div class="col-sm-6">
                                    <span id="descOutput"></span>
                                    
                                </div>  
                            </div>
                       <!--      <div class="col-sm-12 form-group">
                                <label class="col-sm-4 control-label">
                                    Nos : <span class="symbol required control-label"></span>
                                </label>
                                <div class="col-sm-6">
                                    <span id="nosOutput"></span>
                                    
                                </div>  
                            </div> -->
                            <div class="col-sm-12 form-group">
                                <label class="col-sm-4 control-label">
                                    Rate : <span class="symbol required control-label"></span>
                                </label>
                                <div class="col-sm-6">
                                    <span id="rateOutput"></span>
                                    
                                </div>  
                            </div>
                            <!-- <div class="col-sm-12 form-group">
                                <label class="col-sm-4 control-label">
                                    Area : <span class="symbol required control-label"></span>
                                </label>
                                <div class="col-sm-6">
                                    <span id="areaOutput"></span>
                                    
                                </div>  
                            </div> -->
                            <div class="col-sm-12 form-group">
                                <label class="col-sm-4 control-label">
                                    Unit : <span class="symbol required control-label"></span>
                                </label>
                                <div class="col-sm-6">
                                    <span id="unitOutput"></span>
                                    
                                </div>  
                            </div>

                        

<!--                             <div class="col-sm-12 form-group">
                                <label class="col-sm-4 control-label">
                                    Total Quantity Requi <span class="symbol required control-label">*</span>
                                </label>
                                <div class="col-sm-6">
                                    <input type="number" id="quantity" name="area" class="form-control m-b-sm"  required="required" placeholder="Enter Area " >
                                </div>  
                            </div> -->
                            <div class="col-sm-12 form-group">
                                <label class="col-sm-4 control-label">
                                    Quantity Required:  <span class="symbol required control-label"></span>
                                </label>
                                <div class="col-sm-6">
                                    <span id="num_items_req"></span>
                                </div>  
                            </div>
                            <div class="col-sm-12 form-group">
                                <label class="col-sm-4 control-label">
                                    Total Amount:  <span class="symbol required control-label"></span>
                                </label>
                                <div class="col-sm-6">
                                    <span id="total_amount"></span>
                                </div>  
                            </div>
                            <div class="col-sm-12 form-group">
                                <label class="col-sm-4 control-label">
                                    Total Amount With GST : <span class="symbol required control-label"></span>
                                </label>
                                <div class="col-sm-6">
                                    <span id="total_amt_gst"></span>
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

<script >
$(document).ready(function() {
    var b_url='<?php echo base_url();?>';
    var quantity;
    var total_amt;
    var gst;
    var item;
    var work_id = document.getElementById("complain-data").getAttribute("data-complain-number");
    var unit;
    var rate;
    var sor;
    var item_id;
    var spanElement=document.getElementById("sorNonsor");
    var outputItem = document.getElementById("descOutput");
    var outputRate = document.getElementById("rateOutput");
    var num_items_req = document.getElementById("num_items_req");
    // var outputArea = document.getElementById("areaOutput");
    var outputUnit = document.getElementById("unitOutput");
    var totalAmount = document.getElementById("total_amount");
    var outputGst = document.getElementById("total_amt_gst");
    // var outputSection = document.getElementById("output");
    // var outputSection2 = document.getElementById("output2");
      $("#item").chosen({
        width: "95%",
        no_results_text: "Oops, nothing found!",
        allow_single_deselect: true,
      });

      // Bind the change event inside the chosen() function callback
      $("#item").on("change", function() {
            var selectedOption = $(this).find('option:selected'); // Get the selected option
            var properties = selectedOption.data('properties'); // Access data-properties attribute using 
            var selectedGst=$('input[name="gst"]').val();
            console.log(selectedGst);
                $('input[name="gst"]').change(function(){
                    selectedGst=$(this).val();
                    selectedGst=parseFloat(selectedGst);
                    console.log(selectedGst);
                    if (properties) {
            var jsonData = properties;
            
            console.log(jsonData);
            sor=jsonData.sor_non_sor;
            unit=jsonData.unit;
            total_amt=parseFloat(jsonData.toal_amount);
            var amountGST=(total_amt+(total_amt*selectedGst)/100);
            amountGST=amountGST.toFixed(2);
            outputGst.textContent=amountGST;


        } 
            });
            selectedGst=parseFloat(selectedGst);

            var selectedOption = $(this).find('option:selected'); // Get the selected option
            var properties = selectedOption.data('properties'); // Access data-properties attribute using 
            if (properties) {
            var jsonData = properties;
            
            console.log(jsonData);
            // Set the content of the output elements
            sor=jsonData.sor_non_sor;
            item=jsonData.item_desc;
            rate=jsonData.rate;
            quantity=jsonData.total_quantity;
            unit=jsonData.unit;
            spanElement.textContent=jsonData.sor_non_sor;
            outputItem.textContent = jsonData.item_desc;
            outputRate.textContent =jsonData.rate;
            outputUnit.textContent = jsonData.unit;
            num_items_req.textContent =jsonData.total_quantity;
            totalAmount.textContent = jsonData.toal_amount;
            total_amt=parseFloat(jsonData.toal_amount);
            var amountGST=total_amt+(total_amt*selectedGst)/100;
            amountGST=amountGST.toFixed(2);
            outputGst.textContent=amountGST;


        } 
        

        document.getElementById("submitLeave").addEventListener("click",function(){


                        // Move the AJAX request here to ensure that quantityReq and total_amt are defined
                $.ajax({
                    type: "POST",
                    url: b_url+"index.php/grievanceController2/saveEstimate",
                    data: {
                        item:item,
                        work_id:work_id,
                        unit:unit,
                        rate:rate,
                        sor_non_sor:sor,
                        quantity:quantity,
                        amount_with_gst:amountGST,
                        total_amt:total_amt,
                        gst:selectedGst,
                    },
                    success: function(response) {
                        alert(response);
                        // window.location.href = b_url+"index.php/grievanceController2/estimateItem/"+work_id;
                    },
                    error: function(err) {
                        alert("Error occurred");
                    }
                });
        });

      });

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
