<?php
$connection=mysqli_connect("localhost","vdsa_sam","Vdai@1234db#");
					$db=mysqli_select_db($connection,'vdsai_knn_engineering_mis_old');					
					$sql="";
					$sql_query="";	
                if(!empty($_REQUEST['ward']))
					{
                    $sql="SELECT count(cmp.gender) as approve_date, sum(cmp.pincode) as cost,cmp.tehsil,cr.Address,cmp.cur_status,cmp.block_name FROM complain_record as cmp JOIN corporate_table as cr on cr.Ward_No=cmp.block_name  WHERE cmp.block_name='".$_REQUEST['ward']."' order by cmp.gender"  ;
					$sql_query=mysqli_query($connection,$sql);               
                      }
                   $report = array();
                   
					while($row = mysqli_fetch_array($sql_query))
					{

						   $report[]=$row;		    
						   
					}
					if( count($report) > 0 ){
			           
			            $datares["status_code"] = "200";
						$datares["status_message"] = "location list found";
						$datares["result"]  = $report;	
			       }else{

			       	    $datares["status_code"] = "404";
						$datares["status_message"] = "location list not found";
						$datares["result"]  = null;
			       }
			       
			      
			  

			    echo json_encode($datares);
?>