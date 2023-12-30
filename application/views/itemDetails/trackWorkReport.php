<div class="row">
    <div class="col-md-12">
        <div class="panel panel-white">
            <div class="panel-body">
               <div class="">
               <?php foreach ($subject as $row) { ?>
                    <h3>Name of Work ::<?php echo $row['subject'] ;?></h3>
                <?php } ?>     

                    <table id="sample_1"  class="table table-striped table-bordered table-hover table-checkable order-column" >

                    <thead>

                        <tr style="background: #99ff99;">

                            <th>Sr.No.</th>
                            <th>Description of work</th>
                            <th>Date</th>
                            <th>Value</th>
                            <th>Record Date</th>
                            
                        </tr>
                    </thead>
                    <tbody>
                            <?php 
                            $total=0;
                            if($result!=''){
                                $i = 0;
                                foreach($result as $row){
                                    
                            ?>
                                <tr>
                                    <td><?php echo ++$i; ?></td>
                                    <td><?php echo $row['item_desc']; ?></td>
                                    <td><?php echo $row['date']; ?></td>
                                    <td><?php echo $row['value']; ?></td>
                                    <td><?php echo $row['record_date']; ?></td>
                            <?php }} ?>
                    </tbody>
                



                </table>  
                </div>
            </div>
        </div>
    </div>
</div>