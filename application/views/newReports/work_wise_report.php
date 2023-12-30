<div class="row">
    <div class="col-md-12">
        <div class="panel panel-white">
            <div class="panel-body">
               <div class="">
                    <table id="sample_1"  class="table table-striped table-bordered table-hover table-checkable order-column" >

                    <thead>
                        <tr style="background: #99ff99;">
                            <th>Sr.No</th>
                            <th>Items Required</th>
                            <th>Description of Item</th>
                            <th>Estimated Cost</th>
                            <th>Work Days</th>
                            <th>Track Work </th> 
                            <th>Report</th>                          
                            <th>Project Number</th>
                            <th>Project Date</th>
                            <th>Financial Year</th>
                            <th>Department</th>
                            <th>Ward</th>
                            <th>Name of Corporator </th>
                            <th>Budget Head</th>
                            <th>Work</th>
                            <th>Recommended by</th>
                            <!-- <th>Estimated Cost</th> -->
                            <!-- <th>Sanctioned Cost</th> -->
                            <!-- <th>Approved Date</th> -->
                            <!-- <th>Date of dispatch to the concerned department from the office of the Municipal Commissioner</th> -->
                        </tr>
                    </thead>
                    <tbody>
                            <?php 
                                $i = 0;
                                foreach($result as $row){
                            ?>
                                <tr>
                                    <td><?php echo ++$i; ?></td>
                                    <td><a href="itemRequired\<?php echo $row['complain_number'] ;?>" onclick="">Items Required</a></td>
                                    <td><a href="estimateItem\<?php echo $row['complain_number'] ;?>" onclick="">Estimate</a></td>
                                    <td><a href="abstractReport\<?php echo $row['complain_number'] ;?>" onclick="">Abstract Cost</a></td>
                                    <td><a href="workDays\<?php echo $row['complain_number'] ;?>" onclick="">Enter work days</a></td>
                                    <td><a href="trackWork\<?php echo $row['complain_number'] ;?>" onclick="">Track Work</a></td>
                                    <td><a href="trackWorkReport\<?php echo $row['complain_number'] ;?>" onclick="">Report</a></td>
                                    <td><?php echo $row['father_name']; ?></td>
                                    <td><?php echo $row['patrawali_date']; ?></td>
                                    <td><?php echo $row['financial_year']; ?></td>
                                    <td><?php echo $row['related_department']; ?></td>
                                    <td><?php echo $row['block_name']; ?></td>
                                    <td><?php echo $row['village']; ?></td>
                                    <td><?php echo $row['address']; ?></td>
                                    <td><?php echo $row['subject']; ?></td>
                                    <td><?php echo $row['complainer_name']; ?></td>
                                    <!-- <td><?php echo $row['pincode']; ?></td>
                                    <td><?php echo $row['mobile_number']; ?></td> -->
                                    <!-- <td><?php echo $row['gender']; ?></td> -->
                                    <!-- <td><?php echo $row['nagar_ayukat_approval_date']; ?></td> -->
                                </tr>
                            <?php } ?>
                    </tbody>



                    </table>  
                </div>
            </div>
        </div>
    </div>
</div>