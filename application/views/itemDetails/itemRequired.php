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
                                            $this->db->select("*");
                                            $this->db->from("item_details");
                                            $query = $this->db->get();
                                            $result=$query->result_array();
                                            foreach($result as $row){
                                        ?>
                                        <option value="<?php echo $row['Item']; ?>" data-properties='<?php echo json_encode($row);?>'><?php echo $row['Item']; ?></option>
                                        <?php } ?>
                                    </select>
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
                            <div class="col-sm-12 form-group">
                                <label class="col-sm-4 control-label">
                                    Unit of Item :  <span class="symbol required control-label"></span>
                                </label>
                                <div class="col-sm-6">
                                    <span id="unitOutput"></span>
                                    
                                </div>  
                            </div>
                            <div class="col-sm-12 form-group">
                                <label class="col-sm-4 control-label">
                                    Enter Nos :<span class="symbol required control-label">*</span>
                                </label>
                                <div class="col-sm-6">
                                    <input type="number" id="nos1" name="nos1" class="" style="width: 50px;" required="required" placeholder="" > X
                                    <input type="number" id="nos2" name="nos2" class="" style="width: 50px;" required="required" placeholder="" >


                                </div>  
                            </div>
                            <div class="col-sm-12 form-group">
                                <label class="col-sm-4 control-label">
                                    Lenght of Item<span class="symbol required control-label">*</span>
                                </label>
                                <div class="col-sm-6">
                                    <input type="number" id="length" name="length" class="form-control m-b-sm"  required="required" placeholder="Enter Length Of Item " >
                                </div>  
                            </div>
                            
                            
                            <div class="col-sm-12 form-group">
                                <label class="col-sm-4 control-label">
                                    Breadth of Item<span class="symbol required control-label">*</span>
                                </label>
                                <div class="col-sm-6">
                                    <input type="number" id="breadth" name="breadth" class="form-control m-b-sm" placeholder="Enter Breadth Of Item " >
                                </div>  
                            </div>
                            <div class="col-sm-12 form-group">
                                <label class="col-sm-4 control-label">
                                    Height of Item<span class="symbol required control-label"></span>
                                </label>
                                <div class="col-sm-6">
                                    <input type="number" id="height" name="height" class="form-control m-b-sm"placeholder="Enter Height of Item " >
                                </div>  
                            </div>
                            <div class="col-sm-12 form-group">
                                <label class="col-sm-4 control-label">
                                    Taking %<span class="symbol required control-label"></span>
                                </label>
                                <div class="col-sm-6">
                                    <input type="number" id="taking" name="taking" value="100" class="form-control m-b-sm"placeholder="Enter taking  " >
                                </div>  
                            </div>
                            <div class="col-sm-12 form-group">
                                <label class="col-sm-4 control-label">
                                    <button type="submit" id="areaCalculateButton" class="">Total Area </button><span class="symbol required control-label"></span>
                                </label>
                                <div class="col-sm-6">
                                    <span id="areaCalculate"></span>
                                </div>  
                                <div class="col-sm-6">
                                    <span id="takingCalculate"></span>
                                </div>  
                            </div>
                            <div class="col-sm-12 form-group">
                                <label class="col-sm-4 control-label">
                                  <span class="symbol required"></span>
                                </label>
                                    <div class="col-sm-6" >
                                         <button type="submit" id="submitLeave" class="btn btn-success">Submit Details </button>
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
    var length;
    var breadth;
    var height;
    var nos1;
    var nos2;
    var area;
    var takingArea;
    var work_id;
    var taking;
    var sorNonsor;
    var unit;
    var item_desc;
    var item_id;
    var total_amt;
    var rate
        document.getElementById("areaCalculateButton").addEventListener("click",function(event){
         length=parseFloat(document.getElementById("length").value);
         breadth=parseFloat(document.getElementById("breadth").value);
         height=parseFloat(document.getElementById("height").value);
         taking=parseFloat(document.getElementById("taking").value);
         nos1=parseFloat(document.getElementById("nos1").value);
         nos2=parseFloat(document.getElementById("nos2").value);
         areaCalculate=document.getElementById("areaCalculate");
         takingCalculate=document.getElementById("takingCalculate");
        console.log(length);
        console.log(breadth);
        console.log(height);
        if(length && breadth && height){
            area=length*breadth*height*nos1*nos2;
            console.log(area);
        }else if(length && breadth){
            area=length*breadth*nos1*nos2;
            console.log(area);
        }else if(length){
            area=length*nos1*nos2;
            console.log(area);
        }else{
            area=0;
        }
        takingArea=(area*taking)/100;
        areaCalculate.textContent="Calculated Area is :" +area;
        takingCalculate.textContent="Say area is :" +takingArea;  

        total_amt=takingArea*rate;
        console.log(total_amt);

        event.preventDefault();
    });

    var spanElement=document.getElementById("sorNonsor");
    var outputItem = document.getElementById("descOutput");
    var unitOutput=document.getElementById("unitOutput");
    var b_url='<?php echo base_url();?>';
    work_id = document.getElementById("complain-data").getAttribute("data-complain-number");

      $("#item").chosen({
        width: "95%",
        no_results_text: "Oops, nothing found!",
        allow_single_deselect: true,
      });

      // Bind the change event inside the chosen() function callback
      $("#item").on("change", function() {
            var selectedOption = $(this).find('option:selected'); // Get the selected option
            var properties = selectedOption.data('properties'); // Access data-properties attribute using 
            if (properties) {
            var jsonData = properties;
            spanElement.textContent=jsonData['sor/non_sor'];
            outputItem.textContent = jsonData.Item;
            unitOutput.textContent=jsonData.unit;
            sorNonsor=jsonData['sor/non_sor'];
            unit=jsonData.unit;
            item_desc=jsonData.Item;
            item_id=jsonData.item_id;
            rate=parseFloat(jsonData.rate);
            console.log(rate);

            // console.log(jsonData);
        }
    
        document.getElementById("submitLeave").addEventListener("click",function(){


                        // Move the AJAX request here to ensure that quantityReq and total_amt are defined
                $.ajax({
                    type: "POST",
                    url: b_url+"index.php/grievanceController2/saveItemRequired",
                    data: {
                        item_id:item_id,
                        work_id: work_id,
                        item_desc: item_desc,
                        sor_non_sor:sorNonsor,
                        unit:unit,
                        nos1:nos1,
                        nos2:nos2,
                        length:length,
                        height:height,
                        breadth:breadth,
                        area:area,
                        taking:taking,
                        quantity:takingArea,
                        total_amt:total_amt,
                        rate:rate,
                    },
                    success: function(response) {
                        alert(response);
                        // window.location.href = b_url+"index.php/grievanceController2/itemRequired/"+work_id;
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
