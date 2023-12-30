<?php 
$item = isset($_GET["item"])?$_GET["item"]:'';
?>



<div class="row">
    <div class="col-md-12">
                        <div class="caption">
                            <i class="fa fa-gift"></i><h3>Project :<?php
                             $this->db->select("subject");
                             $this->db->where("complain_number",$complain_number);
                             $this->db->from("complain_record");
                             $query=$this->db->get();
                             $res=$query->row_array();
                             echo $res['subject'];
                             ?></h3>

                        </div>
        <div class="panel panel-white">
            <div class="panel-body">
                <center>

                    <form action="" method="get">
                        <div class="col-sm-3 form-group">
                        <label class="col-sm-4 control-label">
                            Select Item  <span class="symbol required">*</span>
                        </label>
                        <div class="col-sm-6" >
                            <select id = "item" name ="item" class="form-control m-b-sm" required="required">
                                <option value="">--Select Item--</option>
                                <?php
                                    $this->db->select("item");
                                    $this->db->from("item_details");
                                    $query = $this->db->get();
                                    $result=$query->result_array();
                                    foreach($result as $row){
                                ?>
                                <option value="<?php echo $row['item']; ?>"><?php echo $row['item']; ?></option>
                                <?php } ?>
                            </select>
                        </div>  

                        </div>
                        <div class="col-sm-3 form-group">
                            <label class="col-sm-2 control-label">
                                <span class="symbol required"></span>
                            </label>
                            <div class="col-sm-6" >
                                <button type="submit" class="btn btn-success">Submit</button>
                            </div>  
                        </div>
                    </form>  
                    </center>
                    <div class="">


<?php if( $item!='' ){ 
                    $res = $this->db->query(" SELECT * FROM item_details WHERE Item = '$item' ");
                    $result = $res->result();
                    foreach($result as $row){
                            ?>
                            <h4>Item Details</h4>

                                <tr>
                                    <td><span style="font-weight: bold;">Item Name  :</span><?php echo $row->Item; ?></td>
                                </tr><br>
                                <tr>
                                <td><span style="font-weight: bold">Nos  :</span><?php echo $row->nos; ?>
                                </tr><br>
                                <tr>
                                <td><span style="font-weight: bold">Area  :</span><?php echo $row->area.$row->unit; ?></td>
                                </tr><br>
                                <tr>
                                <td><span style="font-weight: bold">Price  :</span><?php echo $row->rate; ?></td>
                                </tr>
                            <?php } ?>

<div class="portlet-body form">


                    <form class="form-horizontal" action="<?php echo base_url()?>index.php/grievanceController2/saveItem" method="post" enctype="multipart/form-data">
                        
                        
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
                                    Select Item  <span class="symbol required">*</span>
                                </label>
                                <div class="col-sm-6" >
                                    <select id = "related_department" name ="related_department" class="form-control m-b-sm" required="required">
                                        <option value="">--Select Item--</option>
                                        <?php
                                            $this->db->select("item");
                                            $this->db->from("item_details");
                                            $query = $this->db->get();
                                            $result=$query->result_array();
                                            foreach($result as $row){
                                        ?>
                                        <option value="<?php echo $row['item']; ?>"><?php echo $row['item']; ?></option>
                                        <?php } ?>
                                    </select>
                                </div>  
                            </div>


                            <div class="col-sm-12 form-group">
                                <label class="col-sm-4 control-label">
                                    Quantity  <span class="symbol required control-label">*</span>
                                </label>
                                <div class="col-sm-6">
                                    <input type="number" name="quantity" class="form-control m-b-sm"  required="required" placeholder="Number of quanitity" >
                                </div>  
                            </div>

                            <div class="col-sm-12 form-group">
                                <label class="col-sm-4 control-label">
                                    Unit  <span class="symbol required control-label">*</span>
                                </label>
                                <div class="col-sm-6">
                                    <input type="text" name="unit" class="form-control m-b-sm"  placeholder="Unit of item" >
                                </div>  
                            </div>

                            <div class="col-sm-12 form-group">
                                <label class="col-sm-4 control-label">
                                  <span class="symbol required"></span>
                                </label>
                                    <div class="col-sm-6" >
                                         <button type="submit" id="submitLeave" class="btn btn-success">Get Estimate</button>
                                    </div>  
                            </div>

                            
                                
                                
                                </div>
                                </div>  
                             </form> 
                                          
                     
                            </div>

                    
<?php } ?>



 
                </div>

                
            </div>
        </div>

    </div>
</div>