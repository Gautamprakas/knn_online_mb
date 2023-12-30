<?php

$connection=mysqli_connect("localhost","vdsa_sam","Vdai@1234db#");
					$db=mysqli_select_db($connection,'vdsai_knn_engineering_mis_old');					
					$query="";
					$query_run="";			     
					if(!empty($_REQUEST['id']))
					{
                    $query="SELECT * FROM complain_record as crd ON cdt.ward_no= crd.block_name LEFT JOIN corporate_table as ct ON ct.Ward_No=crd.block_name where cdt.comp_type='".$_REQUEST['id']."'";
					$query_run=mysqli_query($connection,$query);
					}
					else
					{
					$query="SELECT cdt.block_name,cdt.complain,cdt.pincode,crd.Address,wl.icon FROM complain_record as cdt JOIN corporate_table as crd ON cdt.block_name= crd.Ward_No LEFT JOIN ward_list as wl ON cdt.block_name=wl.ward_num";
					$query_run=mysqli_query($connection,$query);
					  }

					


					$report = array();
                   
					while($row = mysqli_fetch_array($query_run))
					{

						   $report[]=$row;		    
						   
					}
					if( count($report) > 0 ){
			           
			            $response["status_code"] = "200";
						$response["status_message"] = "location list found";
						$response["result"]  = $report;	
			       }else{

			       	    $response["status_code"] = "404";
						$response["status_message"] = "location list not found";
						$response["result"]  = null;
			       }
			       
			       echo json_encode($response);



			     


?>