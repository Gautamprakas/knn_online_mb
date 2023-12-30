<?php 

class api_model extends CI_Model{

	public function attendance_from_app( $eid , $start_date , $end_data )
	{
		$query = $this->db->distinct()
		                  ->select("DATE(dateTime) as date")
		                  ->from("upload_attendance")
		                  ->where(

				                  	 [
				                  	      "EnNo"          =>    $eid,
				                  	      "In_out"               =>    "1",
				                  	      "DATE(DateTime_in) >="    =>    $start_date,
				                  	      "DATE(DateTime_in) <="    =>    $end_data    
				                  	 ]                        
		                  	      )
		                  ->get();
	   return $query->result();
	}


	
	public function attendance_from_biometric( $eid , $start_date , $end_data )
	{
		$query = $this->db->distinct()
		                  ->select("DATE(DateTime) as date")
		                  ->from("upload_attendance")
		                  ->where(

				                  	 [
				                  	      "EnNo"                 =>    $eid,
				                  	      "In_Out"               =>    "DutyOn",
				                  	      "DATE(DateTime) >="    =>    $start_date,
				                  	      "DATE(DateTime) <="    =>    $end_data    
				                  	 ]                        
		                  	      )
		                  ->get();
	   return $query->result();

	}


	public function holidays( $start_date , $end_data )
	{
		$query = $this->db->distinct()
		                  ->select("DATE(sdate) as date")
		                  ->from("holidays_list")
		                  ->where(

				                  	 [
				                  	      "DATE(sdate) >="    =>    $start_date,
				                  	      "DATE(sdate) <="    =>    $end_data    
				                  	 ]                        
		                  	      )
		                  ->get();
	   return  $query->result();
	}



	public function nextRecordId( $table_name )
	{
	   $database = $this->db->database;
	   $query = "SHOW TABLE STATUS FROM $database WHERE name LIKE '$table_name'";
       //$query = "select Auto_increment from information_schema.tables where table_name='upload_attendance';";
       return $this->db->query($query)->row()->Auto_increment;
	}

 	

	public function uploadImageFromBase64( $location , $base64 , $image_name)//only JPEG/JPG format supported.
	{
		if(!isset($base64) || empty($base64))
			return "";
		if( !file_exists($location) )
		{
		    if( !mkdir($location,0777,true) )
		        exit("error to make upload directory");
		}
		$imageString = base64_decode($base64);
		$imageInfo   = getimagesizefromstring($imageString);
		$arr = explode("/",$imageInfo["mime"]);
		

		if(strcasecmp("image",$arr[0])!=0||(strcasecmp("jpeg",$arr[1])!=0&&strcasecmp("jpg",$arr[1])!=0))
		    return -1;
		$image_url = $location.$image_name.".jpg";
		$imageResourceId = @imagecreatefromstring($imageString) or die("image not created");
		imagejpeg($imageResourceId,$image_url) or die("image not move");
		imagedestroy($imageResourceId);

		return $image_name.".jpg";
	}

	


	public function getEmployeeDetail( $eid )
	{
		$query = $this->db->where("employee_id",$eid)
		                  ->from("school_teachers")
		                  ->get();
		return $query->row();
	}


	


	public function insertGroupAttendance2( $emps_object , $table_name  )
	{
	    if( !isset($emps_object->image) || empty($emps_object->image) )
	    	return (object) [
				                   "id" => $emps_object->timestamp,
				                   "status" => "0",
				                   "error" => "image not faound"
		                    ];
		

		$image_url = $this->uploadImageFromBase64( "assets/app_attendance/" , $emps_object->image ,
			$table_name);
		if( $image_url == -1 )
			return (object) [
				                   "id" => $emps_object->timestamp,
				                   "status" => "0",
				                   "error" => "image must be JPEG/jpg"
		                    ];
		

		foreach ($emps_object->employee as  $emp_id) 
		{
			$data[] = [
                       "EnNo"           =>  $emp_id,
                       "Name"           =>  $this->getEmployeeDetail($emp_id)->teacher_name,
                       "branch_id"      =>  $emps_object->branch_id,
                       "In_Out"         =>  $emps_object->inout,
                       "DateTime_in"       =>  date("Y-m-d h:i:s",($emps_object->timestamp/1000)),
                       "latitude_in"       =>  $emps_object->lat,
                       "longitude_in"      =>  $emps_object->longitude,
                       "image_url"      =>  $image_url
			          ];
		}
		$this->db->insert_batch( $table_name , $data );
		return (object) [
		                   "id" => $emps_object->timestamp,
		                   "status" => "1" 
		                ];
	}
	
	
	
	
	
	public function insertGroupAttendance( $emps_object , $table_name  )
	{
	    
	   if( !isset($emps_object->image) || empty($emps_object->image) )
	    	    return (object) [
				                   "id" => $emps_object->timestamp,
				                   "status" => "0",
				                   "error" => "image not found"
		                    ];
	   
	   foreach ($emps_object->employee as  $emp_id) 
	   {
	    
	        $infound = $this->db->where([
	                                      "EnNo" => $emp_id,
	                                      "DATE(DateTime_in)" => date("Y-m-d",($emps_object->timestamp/1000))
	                                    ])
	                           ->get($table_name);
	                 
	         
	         if($infound->num_rows() > 0)
	         {
	               if($emps_object->inout==2){
	               $image_url = $this->uploadImageFromBase64( "assets/app_attendance/" , $emps_object->image ,$infound->row()->sno."_out");
		       if( $image_url == -1 )
			return (object) [
				                   "id" => $emps_object->timestamp,
				                   "status" => "0",
				                   "error" => "image must be JPEG/jpg"
		                       ];
	               $data = [
	                           "DateTime_out"  => date("Y-m-d h:i:s",($emps_object->timestamp/1000)),
	                           "latitude_out"  => $emps_object->lat,
	                           "longitude_out" => $emps_object->longitude,
	                           "In_Out"         =>  $emps_object->inout,
	                           "image_url_out" =>  $image_url
	                       ];
	               $update_out = $this->db->where("sno",$infound->row()->sno)
	                                      ->update($table_name,$data);
	          
	               }
	         }else{
	         
	         
	         
	              $image_url = $this->uploadImageFromBase64( "assets/app_attendance/" , $emps_object->image ,$this->nextRecordId($table_name)."_in");
		      if( $image_url == -1 )
			return (object) [
				                   "id" => $emps_object->timestamp,
				                   "status" => "0",
				                   "error" => "image must be JPEG/jpg"
		                       ];
	         
	         
	             $data = [
                            "EnNo"           =>  $emp_id,
                            "Name"           =>  $this->getEmployeeDetail($emp_id)->employee_name,
                            "branch_id"      =>  $emps_object->branch_id,
                            "In_Out"         =>  $emps_object->inout,
                            "DateTime_in"       =>  date("Y-m-d h:i:s",($emps_object->timestamp/1000)),
                            "latitude_in"       =>  $emps_object->lat,
                            "longitude_in"      =>  $emps_object->longitude,
                            "image_url_in"      =>  $image_url
			];
	         
	             $this->db->insert( $table_name , $data );
	         
	         
	         }
	            

		 return (object) [
		                   "id" => $emps_object->timestamp,
		                   "status" => "1" 
		                 ];			          
	   }
		
	}




	public function search_employee($eid,$pass,$id_col,$table)
	{
        if($table == "general_settings")
        {
        	$col  = "login_type,username,head_name,registered";
        	$pass = md5($pass);
        }else{
        	$col  = "udios,login_type,teacher_id,teacher_name,school_name,nyay_panchayat,block,post,registered";
        }
        $data = [
				   "$id_col"  => $eid,
				   "password" => $pass
				];
		$query = $this->db->select($col)
		                   ->where($data)
					       ->get($table);
		if( $query->num_rows() > 0 )
			return $query->row();
		else
			return false;
	}


    public function make_employee_registered($eid,$id_col,$table)
    {
    	$this->db->where("$id_col",$eid)
    	         ->update($table,["registered"=>"yes"]);
    	if( $this->db->affected_rows() > 0 )
    		return true;
    	else
    		return false;
    }


   public function get_colleague($udios)
   {
   	  $query = $this->db->select("teacher_id,teacher_name,post,udios")
   	                    ->where("udios",$udios)
   	                    ->order_by("teacher_name","ASC")
   	                    ->get("school_teachers");
   	  if($query->num_rows() > 0)
   	     return $query->result();
   	  else
   	     return false;             
   }

   public function get_school_by_nprc($nprc,$block)
   {
   	  $query = $this->db->select("udios,block,school_name")
   	                    ->where(
   	                    	     [
   	                    	        "nyay_panchayat"=>$nprc,
   	                    	        "block"=>$block
   	                    	     ]
   	                    	    )
   	                    ->group_by("udios")
   	                    ->order_by("school_name","ASC")
   	                    ->get("school_teachers");
   	  foreach ($query->result() as $school) {
   	  	//print_r($school);
   	  	 $school_arr[] = (object) [
                                      "udios"    => $school->udios,
                                      "block"    => $school->block,
                                      "school"   => $school->school_name,
                                      "teachers" => $this->get_colleague($school->udios)
   	  	                          ];
   	  }
   	  return $school_arr;
   }
   

   public function  get_nprc_by_block($block)
   {
   	  $query = $this->db->distinct()
   	                    ->select("nyay_panchayat")
   	                    ->where("block",$block)
   	                    ->get("school_teachers");
   	  foreach ($query->result() as $nprc) {
   	  	$nprc_arr[] = (object) [
                                     "nyay_panchayat" => $nprc->nyay_panchayat,
                                     "schools"        => $this->get_school_by_nprc($nprc->nyay_panchayat,$block)
   	  	                       ];
   	  }
   	  return $nprc_arr;
   }
   
   public function get_block_by_admin()
   {
   	  $query = $this->db->distinct()
   	                    ->select("block")
   	                    ->get("school_teachers");
   	  foreach ($query->result() as $block) {
   	  	$block_arr[] = (object) [
                                   "block"          	=> $block->block,
                                   "nyay_panchayats" => $this->get_nprc_by_block($block->block)
   	  	                       ];
   	  }
   	  return $block_arr;
   }

}