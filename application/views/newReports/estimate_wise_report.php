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
                            <th>SOR/Non SOR</th>
                            <th>Quantity</th>
                            <th>Description of Work</th>
                            <th>Rate</th>
                            <th>Unit</th>
                            <th>Amount With GST</th>
                        </tr>
                    </thead>
                    <tbody>
                            <?php 
                            $total=0;
                            if($result!=''){
                                $i = 0;
                                foreach($result as $row){
                                    $total=$total+(float)$row['amount_with_gst'];
                            ?>
                                <tr>
                                    <td><?php echo ++$i; ?></td>
                                    <td><?php echo $row['sor_non_sor']; ?></td>
                                    <td><?php echo $row['quantity_req']; ?></td>
                                    <td><?php echo $row['item']; ?></td>
                                    <td><?php echo $row['rate']; ?></td>
                                    <td><?php echo $row['unit']; ?></td>
                                    <td><?php echo $row['amount_with_gst']; ?></td>
                            <?php }} ?>
                    </tbody>
                     <tfoot>
                      <!--   <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td>Total </td>
                            <td><?php echo $total ;?></td>
                        </tr> -->
    <!--                     <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <?php $gst=$total*0.18; ?>
                            <td>Add 18% for G.S.T</td>
                            <td><?php echo $gst; ?></td>
                        </tr> -->
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td>Grand Total</td>
                            <td><?php echo $total;?></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td>Net Total</td>
                            <td><?php echo ceil($total);?></td>
                        </tr>

                    </tfoot>



                </table>  
                </div>
            </div>
        </div>
    </div>
</div>