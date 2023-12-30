<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class api extends CI_Controller{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('api_model');
		$this->load->library('form_validation');
		//exit();
	}

	

	public function attendance_detail()
	{
		$this->form_validation->set_rules('eid','employee_id','required|numeric');
		$this->form_validation->set_rules('strat_date','strat_date','required');
		$this->form_validation->set_rules('end_date','end_date','required');
		if( !$this->form_validation->run() )
			exit('data require');
		$eid         =  $this->input->post('eid');
		$strat_date  =  $this->input->post('date');
		$end_date    =  date("Y-m-d",time());
		if(strtotime($end_date)<strtotime($strat_date))
    	    exit("we can't predict the future.");
		$assoc_dates =  $this->getDatesBetween( $strat_date ,$end_date );
		//$attendance  =  $this->api_model->holidays( $strat_date ,$end_date );
		//$assoc_dates =  $this->applyAttendanceOnDates( $assoc_dates , $attendance );
	   // $attendance  =  $this->api_model->attendance_from_biometric( $eid , $strat_date , $end_date );
	    //$assoc_dates =  $this->applyAttendanceOnDates( $assoc_dates , $attendance );
	    $attendance  =  $this->api_model->attendance_from_app( $eid , $strat_date , $end_date );
	    $assoc_dates =  $this->applyAttendanceOnDates( $assoc_dates , $attendance );
		echo json_encode($this->output_attendance_detail($assoc_dates));

	}



	public function upload_attendance()
	{
		$this->form_validation->set_rules('json','json','required');
		if( !$this->form_validation->run() )
			exit('data require');
		$json = json_decode($this->input->post('json'));
		if( json_last_error() != JSON_ERROR_NONE )
			exit('invalid json format');
		foreach ($json as $emps_object) 
		{
			$res[] = $this->api_model->insertGroupAttendance( $emps_object , "upload_attendance");//upload_attendance table
		}
		echo json_encode($res,JSON_NUMERIC_CHECK|JSON_UNESCAPED_SLASHES);
	}

	

	private function getDatesBetween( $strat_date , $end_date )
	{
	    $i = 0;
	    do
	    {
	    	list($currdate,$day) = explode(',',date("Y-m-d,N",strtotime($strat_date."+".($i++)."day")));
	        if( $day == 7 )
	        	$arr[$currdate] = 'yes';
	        else
	        	$arr[$currdate] = 'no';
	    }while(strcmp($currdate, $end_date) != 0);
	    return $arr;
	}

	

	private function applyAttendanceOnDates( $assoc_dates , $attendance )
	{
		foreach( $attendance as $obj ){
			$assoc_dates[$obj->date] = 'yes';
		}
		return $assoc_dates;
	}

	

	private function output_attendance_detail( $assoc_dates )
	{
		foreach ($assoc_dates as $key => $value) {
			$obj = new StdClass;
			$obj->$key = $value;
			$output[] = $obj;
            unset($obj);
		}
		return $output;
	}


   private function dbconnection()
   {
   	    $dbname = $this->db->database;
		$user   = $this->db->username;
		$pass   = $this->db->password;
		$host   = $this->db->hostname;
		$con    = mysqli_connect($host,$user,$pass,$dbname,3306) or die("could not connect with db");
		mysqli_query($con,'SET character_set_results=utf8');
		mysqli_query($con,'SET names=utf8');
		mysqli_query($con,'SET character_set_client=utf8');
		mysqli_query($con,'SET character_set_connection=utf8');
		mysqli_query($con,'SET character_set_results=utf8');
		mysqli_query($con,'SET collation_connection=utf8_general_ci');
		return $con;
   }


	
	public function empLeave2()
	{
		$eid       = $this->input->post("eid");
		$leaveType = $this->input->post("leave_type");
		$startDate = $this->input->post("start_date");
		$endDate   = $this->input->post("end_date");
		$bid       = $this->input->post("branch_id");
		$reason    = $this->input->post("reason");
		//$desgn     = $this->input->post("designation");
		$reqDate   = $this->input->post("request_date");

		if(empty($eid)||empty($leaveType)||empty($startDate)||empty($endDate)||empty($bid)||empty($reason)||empty($reqDate))
			die("data require");
		$con = $this->dbconnection();      //include_once('dbconnection.php');
		$col = 'teacher_id,leave_type,start_date,end_date,udios,reason,request_date,status';
		$values = "'$eid','$leaveType','$startDate','$endDate','$bid','$reason','$reqDate','Pending'";
		$query = "insert into employee_leave($col) values($values)";
		$result = mysqli_query($con,$query) or die("query error");
		if($result)
			echo 'success';
		else
			echo 'leave not uploaded';
		mysqli_close($con);
	}
	
	
	
	public function empLeave()
	{
		$data  =  [
		              "teacher_id"   => $this->input->post("eid"),
		              "leave_type"   => $this->input->post("leave_type"),
		              "start_date"   => $this->input->post("start_date"),
		              "end_date"     => $this->input->post("end_date"),
		              "udios"        => $this->input->post("branch_id"),
		              "reason"       => $this->input->post("reason"),
		              "request_date" => $this->input->post("request_date"),
		              "status"       => "Pending"
		          ];
		
		$recodFound = $this->db->where(
		                                  [
		                                      "teacher_id"   => $data["teacher_id"],
		                                      "start_date"   => $data["start_date"],
		                                      "end_date"     => $data["end_date"],
		                                      "request_date" => $data["request_date"]
		                                  ]
		                              )
		                   ->get("employee_leave");
		if($recodFound->num_rows() > 0)
		{
		    $res = $this->db->where("sno",$recodFound->row()->sno)
		                    ->update("employee_leave",["leave_type"=>$data["leave_type"],"reason"=>$data["reason"]]);
		}
		else
		{
		    $res = $this->db->insert("employee_leave",$data);
		}
		if($res)
			echo 'success';
		else
			echo 'leave not uploaded';
	}


     public function roster()
     {
     	$eid = $this->input->post("eid");
		if(!isset($eid)||empty($eid))
		 die("data require");
		$con = $this->dbconnection();    //include_once("dbconnection.php");
		date_default_timezone_set('Asia/Kolkata');
		$date = date("Y-m-d",time());
		$query = "select duty from roster where employee_id = '$eid' and date1 = '$date'";
		$result = mysqli_query($con,$query) or die("query error");
		$obj = mysqli_fetch_object($result);
		if($obj)
		$roster = 'yes';
		else
		$roster = 'no';
		echo $roster;
		mysqli_close($con);
     }


     public function signup()
     {
     	
     	$eid = $this->input->post("eid");
		$otp = $this->input->post("otp");
		if(!isset($eid)||!isset($otp)||empty($eid)||empty($otp))
		  die("data require");
		$con = $this->dbconnection();     //require_once("dbconnection.php");
		$query = " select password,registered from school_teachers where employee_id='$eid' ";    //change
		$result = mysqli_query($con,$query) or die("error");
		if(mysqli_num_rows($result) > 0)
		{
		    $object = mysqli_fetch_object($result);
		    if($object->registered == "yes")
		       die("already registered");
		    if($object->password == $otp)
		    {
		        $query = " update school_teachers set registered='yes' where employee_id='$eid' ";  //chnage
		        mysqli_query($con,$query);
		       
		        $query = "select * from school_teachers where employee_id='$eid'";         //change         //employee record
		        $result = mysqli_query($con,$query);
		        $employee= mysqli_fetch_object($result);
		        
		        $query  = "select distinct employee_id,employee_name from school_teachers where officer_id = '$employee->officer_id'"; //change
		        $result = mysqli_query($con,$query);
		        while($arr = mysqli_fetch_object($result))
		        {
		            $colleague[] = (object) $arr;
		        } 
		        
		        $record["record"]=(object)Array("employee"=>$employee,"colleague"=>$colleague);
		        $recordJson = json_encode($record);
		        echo $recordJson;
		        
		    }else{
		        die("otp not match");
		    }
		}else{
		    die("invalid employee id");
		}
		mysqli_close($con);
	 }
			


	public function jandarshan()
	{
		$id        = $this->input->post('id');
		$req       = $this->input->post('req');
		$res       = $this->input->post('res');
		$timestamp = $this->input->post('timestamp');
 
		if(!isset($id)||!isset($req)||!isset($res)||!isset($timestamp))
			die("data require");
		$con = $this->dbconnection();    //include_once("dbconnection.php");
		$remaining_request = (int)$req-(int)$res;
		$query = "insert into jandarshan(id,request,request_sorted,timestamp,remaining_request) values('$id','$req','$res','$timestamp','$remaining_request')";
		if( mysqli_query($con,$query) )
			echo "success";
		else
			echo "fail";
		mysqli_close($con);
	}



	public function attendanceResponse()
	{
		$eid = $this->input->post("eid");
		$startDate = $this->input->post("date");
		if(!isset($eid)||empty($eid)||!isset($startDate)||empty($startDate))
		  die("data require");
		date_default_timezone_set('Asia/Kolkata');
		$con = $this->dbconnection();
		function getDatesAssocArray($startDate, $endDate)
		{
		     if(strtotime($endDate)<strtotime($startDate))
		    	die("we can't predict the future.");
		    $i = 0;
		    do
		    {
		    	$currdate = date("Y-m-d",strtotime($startDate."+".($i++)."day"));
		    	$arr[$currdate] = 'no';
		    }while(strcmp($currdate, $endDate) != 0);
		    return $arr;
		}
		$endDate= date("Y-m-d",time());
		$allDates = getDatesAssocArray($startDate,$endDate);
	        $query = "select distinct DATE(DateTime_in) as DateTime from upload_attendance where EnNo='$eid' and  DATE(DateTime_in) Between '$startDate' and '$endDate'";
		$result = mysqli_query($con,$query) or die("query error1");
		$i = 0;
		while($obj = mysqli_fetch_object($result))
		{
		     $allDates[$obj->DateTime] = 'yes';   
		}

		/*$query = "select distinct DATE(dateTime) as DateTime from attendance_table where employee_id='$eid' and  DATE(dateTime) Between '$startDate' and '$endDate'";
		$result = mysqli_query($con,$query) or die("query error2");
		$i = 0;
		while($obj = mysqli_fetch_object($result))
		{
		     $allDates[$obj->DateTime] = 'yes';   
		}*/


		foreach ($allDates as $key => $value) {
			$object = new stdClass();
			$object->$key = $value;
			$arr[] = $object;
			unset($object);
		}
		unset($allDates);
		mysqli_close($con);
		echo json_encode($arr);
	}




   public function signup2()
   {
   	    $eid = $this->input->post("eid");
		$otp = $this->input->post("otp");
		if(!isset($eid)||!isset($otp)||empty($eid)||empty($otp))
		  die("data require");
		$admin    = ["table"=>"general_settings","id_col"=>"username"];
		$employee = ["table"=>"school_teachers","id_col"=>"teacher_id"];
		if( $emp = $this->api_model->search_employee($eid,$otp,$admin["id_col"],$admin["table"]) )
		{
			if( $emp->registered == "no" )
			{
				$this->api_model->make_employee_registered($eid,$admin["id_col"],$admin["table"]);
				if($emp->login_type == "admin")
				{
					//echo "get admin";
					$output["record"] = (object) [
						                     "login_type" => $emp->login_type,
						                     "employee"   => $emp,
						                     "blocks"     => $this->api_model->get_block_by_admin()
						                ];
				}else{
					//echo "get beo";
					$output["record"] = (object) [
						                     "login_type"      => $emp->login_type,
						                     "employee"        => $emp,
						                     "nyay_panchayats" => $this->api_model->get_nprc_by_block($emp->username)
						                ];
				}
			}else{
				die("already registered");
			}
		}
		else if( $emp = $this->api_model->search_employee($eid,$otp,$employee["id_col"],$employee["table"]) )
		{
			if( $emp->registered == "no" )
			{
				$this->api_model->make_employee_registered($eid,$employee["id_col"],$employee["table"]);
				if($emp->login_type == "employee")
				{
					//echo "get teacher";
					$output["record"] = (object) [
					                     "login_type" => $emp->login_type,
					                     "employee"   => $emp,
					                     "colleague"  => $this->api_model->get_colleague($emp->udios)
					                ];
				}else{
					//echo "get nyay_panchayat";
			$output["record"] = (object) [
			                     "login_type" => $emp->login_type,
			                     "employee"   => $emp,
			                     "colleague"  => $this->api_model->get_colleague($emp->udios),
			                     "schools"    => $this->api_model->get_school_by_nprc($emp->nyay_panchayat,$emp->block)
			                ];
				}

			}else{
				die("already registered");
			}
		}
		else
		{
			die("invalid id/password");
		}
        echo json_encode($output,JSON_UNESCAPED_SLASHES);

   }
   
   
   
   public function grievance()
   {
       //add grievance
       if(empty($this->input->post("cnum")))
       	  die("data require");
       $data = [
                    "complainer_name" => $this->input->post("complainer"),
                    "father_name"     => $this->input->post("father"),
                    "address"         => $this->input->post("address"),
                    "pincode"         => $this->input->post("pin"),
                    "block_name"      => $this->input->post("block"),
                    "mobile_number"   => $this->input->post("mobile"),
                    "complain"        => $this->input->post("complain"),
                    "gender"          => $this->input->post("gender"),
                    "age"             => $this->input->post("age"),
                    "complain_type"   => $this->input->post("ctype"),
                    "complain_date"   => date("Y-m-d H:i:s",($this->input->post("cdate")/1000)),
                    "assign_date"     => date("Y-m-d H:i:s",($this->input->post("cdate")/1000)),
                    "complain_number" => $this->input->post("cnum"),
                    "cur_status"      => "pending",
                    "department"      => "Admin Office",
                    "officer_name"    => "Admin",
                    $data["officer_name"] => "Admin",
                    "forward_count"   => "0",
                    "uploaded_file"   => $this->api_model->uploadImageFromBase64("assets/complain/",
                    	                                                    $this->input->post("image"),
                    	                                                     $this->input->post("cnum"))
                  
       
               ];
               
       $q = $this->db->where("complain_number",$data["complain_number"])
                     ->get("complain_record");
       if($q->num_rows()>0)
       {
         echo "repeated complain number";
       }
       else
       {
          $this->db->insert("complain_record",$data);
          echo "success";
       }
   
   }


   public function grievanceDetail()
   {
   		$officer_id = $this->input->post("officer_id");
   		if(!isset($officer_id))
   		{
   			die("data required");
   		} 

		$output	    =  $this->db->select("complain_number,complainer_name")
				 			    ->where("officer_id",$officer_id)
			   				    ->get("complain_record")->result();


   		 echo json_encode($output,JSON_UNESCAPED_SLASHES);
   }

   public function inspection()
   {
   	$data = $this->input->post();

   	$insert["complain_number"] 		= $data["complain_number"];
   	$insert["officer_id"] 			= $data["officer_id"];
   	$insert["location"] 			= $data["location"];
   	$insert["comment"] 				= $data["comment"];
   	$insert["timestamp"] 			= date("Y-m-d H:i:s",$data["timestamp"]/1000);
   	$insert["record_datetime"] 		= date("Y-m-d H:i:s");
   	$insert["image"] 				= $this->api_model->uploadImageFromBase64("assets/inspection/",$data["image"],$data["complain_number"].date("YmdHis"));

   	$id = $this->db->insert("inspection",$insert);

   	if($id){

        	$response["status_code"] = "200";
        	$response["status_message"] = "data added successfully";
        }else{
        	$response["status_code"] = "500";
        	$response["status_message"] = "server error";
        	$response["result"] = null;
        }
        echo json_encode($response);
   }

   public function reminder_api()
   {
   	   $this->db->distinct();
   	   $this->db->select("complain_record.officer_id,complain_record.complain_date");
   	   $this->db->select("complain_record.last_date_to_solve");
   	   $this->db->select("complain_record.complain_number");
   	   $this->db->select("officers_list.email1");
   	   $this->db->from("complain_record");
   	   $this->db->join("officers_list","complain_record.officer_id = officers_list.username");
	   $this->db->where_in("complain_record.cur_status",["assign","forward","pending","review"]);
	   //$this->db->where("forward_count",$fc+1);
	   $this->db->order_by("complain_record.complain_date ASC");
	   $val= $this->db->get();

	   // echo "<pre>";
	   //print_r($val->result());

	   foreach($val->result() as $row) 
	   {
	   		if($row->last_date_to_solve == "0000-00-00")
	   		{
	   			$complain_date 		= date('Y-m-d', strtotime($row->complain_date));
	   			$current_date 		= date_create(date('Y-m-d'));
	   			$last_date_to_solve = date_create(date('Y-m-d', strtotime($row->complain_date."15 days")));

	   			$diff  = date_diff($current_date,$last_date_to_solve);
                //echo "<pre>";
                //echo $diff->format("%a");

                if(strtotime(date('Y-m-d', strtotime($row->complain_date."15 days")))>=strtotime(date('Y-m-d')) && $diff->format("%a")<=3)
                {   
                                
	               $insert["officer_id"] 		= $row->officer_id;
	               $insert["complain_number"]	= $row->complain_number;
	               $insert["email"]      		= $row->email1;
	               $insert["due_date"]			= date('Y-m-d', strtotime($row->complain_date."15 days"));

	               $response[] = $insert;
            	}

            	if(strtotime(date('Y-m-d', strtotime($row->complain_date."15 days")))<strtotime(date('Y-m-d')))
            	{
            	   $insert["officer_id"] 		= $row->officer_id;
	               $insert["complain_number"]	= $row->complain_number;
	               $insert["email"]      		= $row->email1;

	               $timeover[] = $insert; 
            	}

	   		}
	   		else
	   		{
	   			$complain_date		= date('Y-m-d', strtotime($row->complain_date));
	   			$current_date 		= date_create(date('Y-m-d'));
	   			$last_date_to_solve	= date_create(date('Y-m-d',strtotime($row->last_date_to_solve)));

	   			echo "<pre>";

	   			$diff  = date_diff($current_date,$last_date_to_solve);
           
                if(strtotime(date('Y-m-d', strtotime($row->last_date_to_solve)))>=strtotime(date('Y-m-d')) && $diff->format("%a")<=3)
                {   
                                
	               $insert["officer_id"] 		= $row->officer_id;
	               $insert["complain_number"]	= $row->complain_number;
	               $insert["email"]      		= $row->email1;
	               $insert["due_date"]			= date('Y-m-d',strtotime($row->last_date_to_solve));

	               $response[] = $insert;
            	}

            	if(strtotime(date('Y-m-d', strtotime($row->last_date_to_solve)))<strtotime(date('Y-m-d')))
                {   
                                
	               $insert["officer_id"] 		= $row->officer_id;
	               $insert["complain_number"]	= $row->complain_number;
	               $insert["email"]      		= $row->email1;

	               $timeover[] = $insert;
            	}
	   		}   		
	   }
	   $reminder[]["reminder"] = $response;
	   $reminder[]["timeover"] = $timeover;
	   echo json_encode($reminder);
   }


} 