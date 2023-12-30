<div class="page-content-inner">
                            <div class="row">
                                <div class="col-md-12">
									<div class="portlet light ">
										<div class="portlet box green ">
                                        <div class="portlet-title">
                                            <div class="caption">
                                                <i class="fa fa-gift"></i>Grievance Panel  </div>
                                            <div class="tools">
                                                <a href="#" class="collapse"> </a>
                                                <a href="#portlet-config" data-toggle="modal" class="config"> </a>
                                                <a href="#" class="reload"> </a>
                                                <a href="#" class="remove"> </a>
                                            </div>
                                      </div>
                             <div class="portlet-body">
                             <div>
                             		<!--Welcome to Grievance Panel  ......-->
                             </div>
                             <div class="row">
            <div class="col-md-12">
                <div class="portlet box green">
                    <div class="portlet-title">
                        <div class="caption">
                            <i class="fa fa-gift"></i>Change Status of Grievance </div>
                        <div class="tools">
                            <a href="javascript:;" class="collapse"> </a>
                            <a href="#portlet-config" data-toggle="modal" class="config"> </a>
                            <a href="javascript:;" class="reload"> </a>
                            <a href="javascript:;" class="remove"> </a>
                        </div>
                    </div>
                   
                    <div class="portlet-body form" style="background: #ccffcc;">
<?php
       if($cid = $this->uri->segment(3))#ccffcc
      {
      	
        $fc2 = $this->session->userdata("shop_id");
      	$this->db->where("complain_number",$cid);
      	$this->db->where("forward_count >=",$fc2);
      	$this->db->order_by("forward_count","Asc");
        $res = $this->db->get("complain_record");
        if($res->num_rows()>0)
        {
        	$rows = $res->result();
        }
        else
        {
        	exit("record not found");
        }
      }
      else
      {
      	redirect(base_url("apanel"));
      }
?>
<style type="text/css">
	label{
		font-weight: bold;
		font-size: 15px;
	}
</style>

					<form class="form-horizontal" action="<?php echo "#";?>" method="post" enctype="multipart/form-data">
						

	<div class="col-sm-12 form-group">
		 <br><br>
		<div class="col-sm-6">
		     <label class="col-sm-4 ">
			      Complain Number  <span class="symbol required"></span>
		     </label>
			 <div class="col-sm-6" >
				 <input type="text"  id = "cnumber" name ="cnumber" class="form-control m-b-sm" readonly="readonly" value="<?php echo $cid; ?>">
			 </div>		
		</div>

		<div class="col-sm-6">
		     <label class="col-sm-4 ">
			     Complainer  <span class="symbol required"></span>
		    </label>
			<div class="col-sm-6" >
				 <?php echo $rows[0]->complainer_name; ?>
			</div>		
		</div>
	</div>


	<div class="col-sm-12 form-group">
		<div class="col-sm-6">
		     <label class="col-sm-4 ">
			      Gender  <span class="symbol required"></span>
		     </label>
			 <div class="col-sm-6" >
				 <?php echo $rows[0]->gender; ?>
			 </div>		
		</div>

		<div class="col-sm-6">
		     <label class="col-sm-4 ">
			     Age  <span class="symbol required"></span>
		    </label>
			<div class="col-sm-6" >
				 <?php echo $rows[0]->age; ?>
			</div>		
		</div>
	</div>


	<div class="col-sm-12 form-group">
		<div class="col-sm-6">
		     <label class="col-sm-4 ">
			      Mobile  <span class="symbol required"></span>
		     </label>
			 <div class="col-sm-6" >
				 <?php echo $rows[0]->mobile_number; ?>
			 </div>		
		</div>

		<div class="col-sm-6">
		     <label class="col-sm-4 ">
			     Tehsil  <span class="symbol required"></span>
		    </label>
			<div class="col-sm-6" >
				 <?php echo $rows[0]->block_name; ?>
			</div>		
		</div>
	</div>


	<div class="col-sm-12 form-group">
		<div class="col-sm-6">
		     <label class="col-sm-4 ">
			      Address  <span class="symbol required"></span>
		     </label>
			 <div class="col-sm-6" >
				 <?php echo $rows[0]->address; ?>
			 </div>		
		</div>
		<div class="col-sm-6">
		     <label class="col-sm-4 ">
			      Pincode  <span class="symbol required"></span>
		     </label>
			 <div class="col-sm-6" >
				 <?php echo $rows[0]->pincode; ?>
			 </div>		
		</div>
	</div>

	<div class="col-sm-12 form-group">
		<div class="col-sm-6">
		     <label class="col-sm-4 ">
			      Complain Date  <span class="symbol required"></span>
		     </label>
			 <div class="col-sm-6" >
				 <?php echo $rows[0]->complain_date; ?>
			 </div>		
		</div>
		<div class="col-sm-6">
		     <label class="col-sm-4 ">
			      Complain Type  <span class="symbol required"></span>
		     </label>
			 <div class="col-sm-6" >
				 <?php echo $rows[0]->complain_type; ?>
			 </div>		
		</div>
	</div>

	<div class="col-sm-12 form-group">
		<div class="col-sm-12">
		     <label class="col-sm-2">
			      Complain <span class="symbol required"></span>
		     </label>
			 <div class="col-sm-10" >
				 <?php echo $rows[0]->complain; ?>
			 </div>		
		</div>
	</div>

	<div class="col-sm-12 form-group">
		<div class="col-sm-6">
		     <label class="col-sm-4">
			      Complain File <span class="symbol required"></span>
		     </label>
			 <div class="col-sm-6" >
			 	<?php $file = $rows[0]->uploaded_file;?>
			 	 <a href="<?php echo base_url("assets/complain/$file"); ?>" target="_blank"> <?php echo $file ?></a>
			 </div>		
		</div>
		<div class="col-sm-6">
		     <label class="col-sm-4">
			      Complain Status <span class="symbol required"></span>
		     </label>
			 <div class="col-sm-6" >
				 <?php if($rows[0]->cur_status == "pending"){
				 	    echo "Pending";
				       }else
				       if($rows[0]->cur_status == "redressed")
				       {
				       	 echo "Redressed";
				       }else
                       if($rows[0]->cur_status == "unredressed")
				       {
                          echo "UnRedressed";
				       }else{
				       	  echo "Under Process";
				       }
				        ?>
			 </div>		
		</div>
	</div>      
 

 <div class="col-sm-12 form-group">
 	<hr style="border-color: black">
 </div>
		



<?php foreach($rows as $row): ?>
      
      <div class="col-sm-12 form-group">
		
		     <label class="col-sm-6 control-label" style="font-weight: bold;text-decoration:underline; font-size:120%; text-transform: uppercase; "> 
			      <?php 
			            if($row->officer_id == "Admin")
			            {
			            	echo "Admin";
			            }
			            else
			            {
			            	$res= $this->db->where("username",$row->officer_id)
			                          ->get("officers_list")
			                          ->row();
			                echo $res->dep_type;
			            }
			      ?>  <span class="symbol required"></span>
		     </label>	
		
	 </div>


      <div class="col-sm-12 form-group">
		<div class="col-sm-6">
		     <label class="col-sm-4 ">
			      Office  <span class="symbol required"></span>
		     </label>
			 <div class="col-sm-6" >
				 <?php echo $row->department; ?>
			 </div>		
		</div>
		<div class="col-sm-6">
		     <label class="col-sm-4 ">
			      Officer Name   <span class="symbol required"></span>
		     </label>
			 <div class="col-sm-6" >
				 <?php echo $row->officer_name; ?>
			 </div>		
		</div>
	</div>

<?php if($row->forward_count != 0): ?>
	 <div class="col-sm-12 form-group">
		<div class="col-sm-6">
		     <label class="col-sm-4 ">
			      Come From  <span class="symbol required"></span>
		     </label>
			 <div class="col-sm-6" >
			 	 <?php $dep = $this->db->where("username",$row->come_from)
			 	                ->get("officers_list");
			 	 ?>
				 <?php if($dep->num_rows>0)
				         echo $dep->row()->patal_name;
				       else
				        echo "Admin Office"; 
				 ?>
			 </div>		
		</div>
		<div class="col-sm-6">
		     <label class="col-sm-4 ">
			     With Comment   <span class="symbol required"></span>
		     </label>
			 <div class="col-sm-6" >
				 <?php echo $row->comment; ?>
			 </div>		
		</div>
	</div>
<?php endif; ?>
      
      <div class="col-sm-12 form-group">
		<div class="col-sm-6">
		     <label class="col-sm-4 ">
			      Assign Date  <span class="symbol required"></span>
		     </label>
			 <div class="col-sm-6" >
				 <?php echo $row->assign_date; ?>
			 </div>		
		</div>
		<div class="col-sm-6">
		     <label class="col-sm-4 ">
			      Solved Date   <span class="symbol required"></span>
		     </label>
			 <div class="col-sm-6" >
				 <?php if(strtotime($row->solved_date)<=0)
				       echo "not solved";
				       else
				       	echo $row->solved_date;
				 ?>
			 </div>		
		</div>
	</div>

	<div class="col-sm-12 form-group">
		<div class="col-sm-6">
		     <label class="col-sm-4 ">
			      Forward Date  <span class="symbol required"></span>
		     </label>
			 <div class="col-sm-6" >
				 <?php if(strtotime($row->forward_date)<=0)
				       echo "not forwarded"; 
				       else
				       	echo $row->forward_date;
				 ?>
			 </div>		
		</div>
		<div class="col-sm-6">
		     <label class="col-sm-4 ">
			      Explaination   <span class="symbol required"></span>
		     </label>
			 <div class="col-sm-6" >
				 <?php if($row->explaination == "")
				       echo "not define";
				       else
				       	echo $row->explaination;
				 ?>
			 </div>		
		</div>
	</div>

	<div class="col-sm-12 form-group">
		<div class="col-sm-6">
		     <label class="col-sm-4 ">
			      Forward To  <span class="symbol required"></span>
		     </label>
			 <div class="col-sm-6" >
				 <?php 
                      if(strtotime($row->forward_date)<=0)
				      {
				      	  echo "not forwarded";

				      }
				      else
				      {
				      	 $fc = $row->forward_count;
				      	 $fc++;
				      	 echo $rows[$fc-$fc2]->department;
				      }

				 ?>
			 </div>		
		</div>
		<div class="col-sm-6">
		     <label class="col-sm-4 ">
			      File   <span class="symbol required"></span>
		     </label>
			 <div class="col-sm-6" >
				 <a href="<?php echo base_url("assets/complain/$row->uploaded_file_bydep"); ?>" target="_blank"><?php echo $row->uploaded_file_bydep; ?></a>
			 </div>		
		</div>
	</div>

	<div class="col-sm-12 form-group">
		<div class="col-sm-6">
		     <label class="col-sm-4 ">
			      Comment  <span class="symbol required"></span>
		     </label>
			 <div class="col-sm-6" >
				 <?php if($row->forward_count != 3 && isset($fc)) echo $rows[$fc-$fc2]->comment; ?>
				 <?php unset($fc); ?>
			 </div>		
		</div>
		<div class="col-sm-6">
		     <label class="col-sm-4 ">
			      Complain Status  <span class="symbol required"></span>
		     </label>
			 <div class="col-sm-6" >
				 <?php echo $row->cur_status; ?>
			 </div>		
		</div>
	</div>
    

    <div class="col-sm-12 form-group">
 	<hr style="border-color: black">
    </div>

<?php endforeach; ?>

								
<?php if($this->session->userdata("username")  == "Admin"): ?>
								 <div class="form-group form-group">
                                    <div class="col-sm-offset-5 col-sm-2">
                                    	   
                                        <button type="button" id="redress" class="btn btn-success">निस्तारित</button>
                                        <button type="button" id="unredress" class="btn btn-danger">अनिस्तारित</button>
                                    </div>
                                </div>
                                </div>
   <?php endif; ?>                             
								
								
								<div >
		 <div class="form-group form-group">
            <div class="col-sm-offset-5 col-sm-2">
            	   <div id ="bh" >
           			 </div>
               
            </div>
        </div>
        
		
		</div>	
							 </form> 
					                      
                     
                			</div>
            </div>
            </div>
 
            <div class="col-md-6" id = "prevDisplay">
                <div class="portlet box green">
                    <div class="portlet-title">
                        <div class="caption">
                            <i class="fa fa-gift"></i>Grievances   </div>
                        <div class="tools">
                            <a href="javascript:;" class="collapse"> </a>
                            <a href="#portlet-config" data-toggle="modal" class="config"> </a>
                            <a href="javascript:;" class="reload"> </a>
                            <a href="javascript:;" class="remove"> </a>
                        </div>
                    </div>
                    <div id = "prevGrie" class="portlet-body form">
                        
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

 