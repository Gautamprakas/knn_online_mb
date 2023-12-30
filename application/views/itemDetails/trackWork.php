<div class="row">
    <div class="col-md-12">
        <div class="panel panel-white">
            <div class="panel-body">
               <div class="">
                    <table border="1" >
                        <div class="caption">
                            <i class="fa fa-gift"></i><?php
                             $this->db->select("*");
                             $this->db->where("complain_number",$complain_number);
                             $this->db->from("complain_record");
                             $query=$this->db->get();
                             $res=$query->row_array();
                             // echo $res['subject'];
                             // echo $res['work_days'];
                             ?>

                        </div>

                    <thead>
                        <tr style="background: #99ff99;">
                            <td>Item Name</td>
                            <?php 
                            $workDay=(int)$res['work_days'];
                            $start_date=$res['project_start'];
                            for ($i=1; $i <=$workDay ; $i++) { 
                                $continious_data = date('d-m-y', strtotime("+$i days", strtotime($start_date)));
                                echo "<th>".$continious_data."</th>";
                            }
                            ?>

                        </tr>
                        <tbody>
                            <?php 
                            $x=1;
                            foreach ($items as $row) {
                            ?>
                            <tr>
                                <td><?php echo $row['item_desc'];?></td>
                            <?php 
                            for($i=1;$i<=$workDay;$i++){
                                $inputId="item_".$x."_".$i;
                                $continious_data = date('Y-m-d', strtotime("+$i days", strtotime($start_date)));
                                ?>
                                <td><input type="number" id="<?php echo $inputId ;?>" name="" value="" class="form-control m-b-sm" data-properties='<?php echo json_encode($row); ?>' data-date='<?php echo $continious_data ; ?>' placeholder="  "></td>

                            <?php } ?>
                            </tr>

                       
                            
                                
                            <?php
                            $x++;
                             } 
                             ?>
                        </tbody>
                    </thead>
<!--                     <tfoot>
                        <tr>
                            <td></td>
                            <?php 
                            for($i=1;$i<=$workDay;$i++){
                                $buttonId="submitWork_".$i;
                                ?>
                                <td><button type="submit" id=<?php echo $buttonId ;?> onclick="handleClick(this.id)" class="btn btn-success">Submit </button> </td>

                            <?php 
                            }
                            ?>
                        </tr>

                        
                    </tfoot> -->



                    </table>  
                </div>
                <div class="col-sm-12 form-group">
                                <label class="col-sm-4 control-label">
                                  <span class="symbol required"></span>
                                </label>
                                    <div class="col-sm-6" >
                                         <button type="submit" id='submitData' class="btn btn-success">Submit </button>
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
        var tagData='<?php echo json_encode($tags_data) ; ?>';
        tagData=JSON.parse(tagData);
        for(var tag of tagData){
            var tagId=document.getElementById(tag.tag);
            if(tagId){
                tagId.value=tag.value;
                tagId.disabled=true;

            }
        }
    document.getElementById("submitData").addEventListener("click",function(){
        var tagData='<?php echo json_encode($tags_data) ; ?>';
        tagData=JSON.parse(tagData);
        var allTagData=[];
        for(var tag of tagData){
            allTagData.push(tag.tag);
        }
        var work_id='<?php echo $complain_number ; ?>';
        var b_url='<?php echo base_url() ; ?>';
        var dataMap=new Map();
        var rowLen='<?php echo count($items); ?>';
        var rowLen=parseInt(rowLen);
        // alert("Your button id is " + buttonId);
        var col_no='<?php echo $workDay ; ?>';
        col_no=parseInt(col_no); // Use + to concatenate the buttonId with the message
        // var submitButton=document.getElementById(buttonId);
        var inputIds=[];
        for (var i = 1; i <=rowLen; i++) {
            for (var j = 1; j <=col_no; j++) {
                var ids="item_"+i+"_"+j;
            inputIds.push(ids);
            }
            
            
        }
        // console.log(allTagData);
        inputIds=inputIds.filter(item => !allTagData.includes(item));
        // console.log(inputIds);

        // console.log(inputIds);
        var inputData = [];
        for (var inputId of inputIds) {
            var inputIdElement = document.getElementById(inputId);
            var dataProperties = inputIdElement.getAttribute('data-properties');
            var dataDate = inputIdElement.getAttribute('data-date');
            var dataPropertiesValue = JSON.parse(dataProperties);

            if (inputIdElement.value) {
                var obj = {
                    'item_desc': dataPropertiesValue.item_desc,
                    'date': dataDate,
                    'value': inputIdElement.value,
                    'tag' :inputId
                };
                inputData.push(obj);
            }
        }
        // console.log(inputData);

                $.ajax({
                    type: "POST",
                    url: b_url+"index.php/grievanceController2/saveTrackWork",
                    data: {
                        work_id,work_id,
                        arr:inputData,

                    },
                    success: function(response) {
                        alert(response);
                        location.reload();
                        
                    },
                    error: function(err) {
                        // console.log(err);
                        alert("Error occured");
                    }
                    
                });
    });
    });
</script>
