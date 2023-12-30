<?php
class LoginModel extends CI_Model{
	
	function validate(){
		// get username password and check is it for admin,employee or student.
		
		// check is it for admin
        $this->db->where("username", $this->input->post("uid"));
        $this->db->where("password", md5($this->input->post("pass")));
        $general = $this->db->get("general_settings");
        $res = $general->row();
        if($general->num_rows >= 1){
        	$uses = [
                        "user_name" => $res->username,
                        "in_date"     => date("Y-m-d H:i:s"),
                        "login_type" => $res->login_type
                    ];
            $this->db->insert("last_uses",$uses);
            $loginData = array(
        			"login_type" => $res->login_type,
        			"shop_id" => $res->shop_id,
        			"shop_name" => $res->shop_name,
        			"address_1" => $res->address_1,
        			"address_2" => $res->address_2,
        			"city" => $res->city,
        			"state" => $res->state,
        			"pin" => $res->pin,
        			"phone_number" => $res->phone_number,
        			/*"district_code" => $res->distic_code,*/
        			"mobile_number" => $res->mobile_number,
        			"username" => $res->username,
        			"head_name" => $res->head_name,
        			"photo" => $res->image,
        			"logo" => $res->logo,
        			"fsd" => $res->finance_start_date,
        			"is_login" => true,
        			"is_lock" => true,
        			"login_date" => date("d-M-Y"),
        			"login_time" => date("H:i:s")
        	);
            return $loginData;
        }
    }
    function todayAttendance(){ 
    	/*$date = date("Y-m-d");
    	
    	$this->db->where("DATE(complain_date)", $date);
    	$atten =  $this->db->get("complain_record");
    	if($atten->num_rows()>0){
    		
    		$data['tcomplain']=$atten->num_rows();
    	}
    	else{
    		$data['tcomplain']=0;
    	}*/
        $date = date("Y-m-d");
        $luser = $this->session->userdata("login_type");
        $username = $this->session->userdata("username"); 
        if($luser == "admin")
        {
            $this->db->where("DATE(complain_date)",$date);
            $val = $this->db->get("complain_record");
            $data["todaysComplain"] = $val->num_rows()>0?$val->num_rows():0;

            $this->db->where("DATE(complain_date)",$date);
            $this->db->where("cur_status","Pending");
            $val= $this->db->get("complain_record");
            $data["todaysPending"] = $val->num_rows()>0?$val->num_rows():0;

            $this->db->where("decision_date",$date);
            $this->db->where("cur_status","Redressed");
            $val= $this->db->get("complain_record");
            $data["todaysRedressed"] = $val->num_rows()>0?$val->num_rows():0;

          
            $where ="(assign_date = '$date' AND cur_status = 'Assign') OR ".
                    "(solved_date = '$date' AND cur_status = 'Solved')";
            $this->db->where($where);
            $val= $this->db->get("complain_record");
            $data["todaysUnderProcess"] = $val->num_rows()>0?$val->num_rows():0;

            $this->db->where("decision_date",$date);
            $this->db->where("cur_status","UnRedressed");
            $val= $this->db->get("complain_record");
            $data["todaysUnRedressed"] = $val->num_rows()>0?$val->num_rows():0;

        }
        else
        {
            $this->db->where("officer_id",$username);
            $this->db->where("DATE(assign_date)",$date);
            $val = $this->db->get("complain_record");
            $data["todaysComplain"] = $val->num_rows()>0?$val->num_rows():0;


            $this->db->where("officer_id",$username);
            $this->db->where("decision_date",$date);
            $this->db->where("cur_status","Redressed");
            $val= $this->db->get("complain_record");
            $data["todaysRedressed"] = $val->num_rows()>0?$val->num_rows():0;

            
            $where = "officer_id = '$username' AND ".
                     "((assign_date = '$date' AND cur_status = 'Assign') OR ".
                     "(solved_date = '$date' AND cur_status = 'Solved'))";
            $this->db->where($where);
            $val= $this->db->get("complain_record");
            $data["todaysUnderProcess"] = $val->num_rows()>0?$val->num_rows():0;

            $this->db->where("officer_id",$username);
            $this->db->where("decision_date",$date);
            $this->db->where("cur_status","UnRedressed");
            $val= $this->db->get("complain_record");
            $data["todaysUnRedressed"] = $val->num_rows()>0?$val->num_rows():0;
        }
    	return $data;
    }




    function todayBlockComplains($blockName){
    	$date = date("Y-m-d");
    	
        $this->db->where("DATE(complain_date)", $date);
    	$this->db->where("block_name",$blockName);
    	$atten =  $this->db->get("complain_record");
    	$data["tc"] = $atten->num_rows()>0?$atten->num_rows():0;

        $this->db->where("DATE(complain_date)", $date);
        $this->db->where("cur_status","Pending");
        $this->db->where("block_name",$blockName);
        $p =  $this->db->get("complain_record");
        $data["tp"] = $p->num_rows()>0?$p->num_rows():0;
    	

    	
        $where = "block_name = '$blockName' AND ".
                 "((assign_date = '$date' AND cur_status = 'Assign') OR ".
                 "(solved_date = '$date' AND cur_status = 'Solved'))";
        $this->db->where($where);
        $up= $this->db->get("complain_record");
        $data["tup"] = $up->num_rows()>0?$up->num_rows():0;
        
        
        $this->db->where("DATE(decision_date)", $date);
        $this->db->where("cur_status","Redressed");
        $this->db->where("block_name",$blockName);
        $r =  $this->db->get("complain_record");
        $data["tr"] = $r->num_rows()>0?$r->num_rows():0;

        $this->db->where("DATE(decision_date)", $date);
        $this->db->where("cur_status","UnRedressed");
        $this->db->where("block_name",$blockName);
        $u =  $this->db->get("complain_record");
        $data["tur"] = $u->num_rows()>0?$u->num_rows():0;
    	
    	
    	return $data;
    }

    public function grievanceCount()
    {
        list($start_date,$end_date) = getStartEndDate();

        $this->db->where("cur_status","pending");
        $this->db->where("gender BETWEEN '$start_date' AND '$end_date'");
        $this->db->order_by("complain_date ASC");
        $val= $this->db->get("complain_record");
        $data["pending"] = $val->num_rows();

        $cur_date = date("Y-m-d");

       $uid = $this->session->userdata("username");
       $where = "come_from = '$uid' and (cur_status = 'assign' or cur_status = 'forward' or cur_status = 'review') and timestamp(last_date_to_solve) > 0 and datediff(last_date_to_solve,'$cur_date')>=0";
       $this->db->where($where);
       $val = $this->db->get("complain_record");
       $data["underProcessAccToLastDate"] = $val->num_rows();


       $where = "come_from = '$uid' and (cur_status = 'assign' or cur_status = 'forward' or cur_status = 'review') and timestamp(last_date_to_solve) <= 0 and (datediff('$cur_date',complain_date) - 15) <= 0";
       $this->db->where($where);
       $val = $this->db->get("complain_record");
       $data["UnderProcessAccToLast15Days"] = $val->num_rows();




       $where = "come_from = '$uid' and (cur_status = 'assign' or cur_status = 'forward' or cur_status = 'review') and timestamp(last_date_to_solve) > 0 and datediff(last_date_to_solve,'$cur_date')<0";
       $this->db->where($where);
       $val = $this->db->get("complain_record");
       $data["pendingAccToLastDate"] = $val->num_rows();


       $where = "come_from = '$uid' and (cur_status = 'assign' or cur_status = 'forward' or cur_status = 'review') and timestamp(last_date_to_solve) <= 0 and (datediff('$cur_date',complain_date) - 15) > 0";
       $this->db->where($where);
       $val = $this->db->get("complain_record");
       $data["pendingAccToLast15Days"] = $val->num_rows();




        $fc = $this->session->userdata("shop_id");
       $oid = $this->session->userdata("username");
       $this->db->where("cur_status","assign");
       $this->db->where("officer_id",$oid);
       $this->db->where("forward_count",$fc);
       $this->db->order_by("assign_date ASC");
       $val= $this->db->get("complain_record");
       $data["assign"] = $val->num_rows();

       $uid = $this->session->userdata("username");
    $where = "come_from = '$uid' and (cur_status = 'assign' or cur_status = 'forward' or cur_status = 'review')";
        $this->db->where($where);
        $this->db->order_by("assign_date ASC");
        $val= $this->db->get("complain_record");   
        $data["forwarded"]=$val->num_rows();

        $uid = $this->session->userdata("username");
        $this->db->where("officer_id",$uid);     
        $this->db->where("cur_status","review");
        $this->db->order_by("solved_date ASC");
        $val= $this->db->get("complain_record");
        $data["review"] = $val->num_rows();

         $uid = $this->session->userdata("username");
        $this->db->where("officer_id",$uid);
        $this->db->where("cur_status","solved");
        $this->db->where("tender_approval_date BETWEEN '$start_date' AND '$end_date'");
        $this->db->order_by("solved_date ASC");
        $val= $this->db->get("complain_record");
        $data["solved"] = $val->num_rows();

        $oid = $this->session->userdata("username");
       $fc = $this->session->userdata("shop_id");
       $this->db->where("cur_status","redressed");
       $this->db->where("complain_number IN (SELECT DISTINCT complain_number FROM payment WHERE date_of_payment BETWEEN '$start_date' AND '$end_date')");
       $this->db->where("forward_count",$fc);
       $this->db->where("officer_id",$oid);
       $this->db->order_by("solved_date ASC");
       $val= $this->db->get("complain_record");
       $data["redressed"] = $val->num_rows();

       $oid = $this->session->userdata("username");
       $fc = $this->session->userdata("shop_id");
       $this->db->where("cur_status","unredressed");
       $this->db->where("forward_count",$fc);
       $this->db->where("officer_id",$oid);
       $this->db->order_by("solved_date ASC");
       $val= $this->db->get("complain_record");
       $data["unredressed"] = $val->num_rows();


       $id = $this->session->userdata("username");
      /* if($this->session->userdata("login_type") == "admin")
       {
          $days = $this->db->where("dep_type",$id)
                           ->get("delay")
                           ->row()->days;
       }
       else
       {
          $dep = $this->db->where("username",$id)
                          ->get("officers_list")
                          ->row()->dep_type;
         $days = $this->db->where("dep_type",$dep)
                          ->get("delay")
                          ->row()->days;
       }*/
       $today = date("Y-m-d"); 
       $this->db->where("officer_id",$id);
       $this->db->where("DATEDIFF('$today',assign_date) <=","max_days_to_solve"/*$days*/);
       $this->db->where_in("cur_status",["assign","pending","forward","review"]);
       $val = $this->db->get("complain_record");
       $data["gup"] = $val->num_rows();

       $this->db->where("officer_id",$id);
       $this->db->where("DATEDIFF('$today',assign_date) >","max_days_to_solve"/*$days*/);
       $this->db->where_in("cur_status",["assign","pending","forward","review"]);
       $val = $this->db->get("complain_record");
       $data["gp"] = $val->num_rows();


       $res = $this->db->query("
        SELECT 
         related_department,
         count(*) as total,
         COUNT(IF(cur_status='pending' AND gender BETWEEN '$start_date' AND '$end_date',1,null)) as engineering,
         COUNT(IF(cur_status='solved' AND tender_approval_date BETWEEN '$start_date' AND '$end_date',1,null)) as tender, 
         COUNT(IF(cur_status='redressed' AND complain_number IN (SELECT DISTINCT complain_number FROM payment WHERE date_of_payment BETWEEN '$start_date' AND '$end_date'),1,null)) as account
        FROM complain_record GROUP BY related_department;
       ");
       $array[] = array('department', 'Engineering', 'Tender', 'Accounting');
       foreach($res->result() as $row){
        $array[] = array($row->related_department, $row->engineering, $row->tender, $row->account );
       }
       $data['dep_wise_report'] = $array;



       return $data;                       
    }


    function getDonutChartData( $type = '' ){
        
        $data = array();
        $ward = array();
        list($start_date,$end_date) = getStartEndDate();

        switch ( $type ) { 
            case 'sanction_cost':
                $res = $this->db->query("
                    SELECT 
                    block_name as ward,
                    sum(CAST(mobile_number AS DECIMAL(13,2))) as 'sanction_cost'
                    FROM
                    complain_record
                    WHERE gender BETWEEN '$start_date' AND '$end_date'
                    GROUP BY
                    block_name
                    ORDER BY
                    CAST(block_name AS unsigned) 
                ");
                $result = $res->result();
                foreach($result as $row){
                    $data[] = array("label"=>"Ward - ".$row->ward,"value"=>round($row->sanction_cost));
                    $ward[] = $row->ward;
                }
                break;


            case 'tender_cost':
                $res = $this->db->query("
                    SELECT 
                    block_name as ward,
                    sum(CAST(nivida_amt AS DECIMAL(13,2))) as 'tender_cost'
                    FROM
                    complain_record
                    WHERE tender_approval_date BETWEEN '$start_date' AND '$end_date'
                    GROUP BY
                    block_name
                    ORDER BY
                    CAST(block_name AS unsigned) 
                ");
                $result = $res->result();
                foreach($result as $row){
                    $data[] = array("label"=>"Ward - ".$row->ward,"value"=>round($row->tender_cost));
                    $ward[] = $row->ward;
                }
                break;


            case 'payment':
                $res = $this->db->query("
                    SELECT 
                    block_name as ward,
                    sum(CAST(total_payable AS DECIMAL(13,2))) as 'payment_cost'
                    FROM
                    payment
                    WHERE date_of_payment BETWEEN '$start_date' AND '$end_date'
                    GROUP BY
                    block_name
                    ORDER BY
                    CAST(block_name AS unsigned) 
                ");
                $result = $res->result();
                foreach($result as $row){
                    $data[] = array("label"=>"Ward - ".$row->ward,"value"=>round($row->payment_cost));
                    $ward[] = $row->ward;
                }
                break;



            case 'engineering':
                $res = $this->db->query("
                    SELECT 
                    block_name as ward,
                    count(block_name) as engineering_count
                    FROM 
                    complain_record
                    WHERE
                    cur_status = 'pending' AND 
                    gender BETWEEN '$start_date' AND '$end_date'
                    GROUP BY
                    block_name
                    ORDER BY
                    CAST(block_name AS unsigned)
                ");
                $result = $res->result();
                foreach($result as $row){
                    $data[] = array("label"=>"Ward - ".$row->ward,"value"=>round($row->engineering_count));
                    $ward[] = $row->ward;
                }
                break;



            case 'tender':
                $res = $this->db->query("
                    SELECT 
                    block_name as ward,
                    count(block_name) as tender_count
                    FROM 
                    complain_record
                    WHERE
                    cur_status = 'solved' AND 
                    tender_approval_date BETWEEN '$start_date' AND '$end_date'
                    GROUP BY
                    block_name
                    ORDER BY
                    CAST(block_name AS unsigned)
                ");
                $result = $res->result();
                foreach($result as $row){
                    $data[] = array("label"=>"Ward - ".$row->ward,"value"=>round($row->tender_count));
                    $ward[] = $row->ward;
                }
                break;




            case 'payment':
                $res = $this->db->query("
                    SELECT 
                    block_name as ward,
                    count(block_name) as payment_count
                    FROM 
                    complain_record
                    WHERE
                    cur_status = 'redressed' AND 
                    complain_number IN (SELECT DISTINCT complain_number FROM payment WHERE date_of_payment BETWEEN '$start_date' AND '$end_date')
                    GROUP BY
                    block_name
                    ORDER BY
                    CAST(block_name AS unsigned)
                ");
                $result = $res->result();
                foreach($result as $row){
                    $data[] = array("label"=>"Ward - ".$row->ward,"value"=>round($row->payment_count));
                    $ward[] = $row->ward;
                }
                break;



            
            default:
                // code...
                break;
        }

        if(count($ward)>0){
            $res = $this->db->distinct()->select("block")->where_not_in("block",$ward)->order_by("CAST(block AS unsigned)")->get("temprary3");
            foreach($res->result() as $row){
                $data[] = array("label"=>"Ward - ".$row->block,"value"=>0);
            }
        }else{
            $res = $this->db->distinct()->select("block")->order_by("CAST(block AS unsigned)")->get("temprary3");
            foreach($res->result() as $row){
                $data[] = array("label"=>"Ward - ".$row->block,"value"=>0.001);
            }
        }

        return $data;
    }
   
    
}