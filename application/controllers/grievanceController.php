<?php    
class grievanceController extends CI_Controller{

/*
    forward_count :
     0 for Admin
     1 for Department
     2 for Tehshil
     3 for Village
*/
 /*
      Grievance States : new,pending,forward,assign,solved,review,redressed,unredressed.
 */

	function __construct(){
		parent::__construct();
		$this->is_login();
		
	}
	
	function is_login(){
		$is_login = $this->session->userdata('is_login');
		$is_lock = $this->session->userdata('is_lock');
		$logtype = $this->session->userdata('login_type');
		if(!$is_login){
			//echo $is_login;
			redirect(base_url()."login/index");
		}
		elseif(!$is_lock){
			redirect(base_url()."login/lockPage");
		}
	}
	function gHome(){
		
		$data['pageTitle'] = "Work Panel";
		$data['smallTitle'] = "Knn File Management  / Work Panel";
		$data['subPage'] = "";
		$data['mainContent'] = "grievance/GrievanceForm";
		$data['headerCss'] = "headerCss/grievance/grievanceCss";
		$data['footerJs'] = "footerJs/grievance/grievanceJs";
		$this->load->view("include/template",$data);
		
	}

	function editGrievanceDetails(){
		
		$data['pageTitle'] = "Work Panel";
		$data['smallTitle'] = "Knn File Management  / Work Panel";
		$data['subPage'] = "";
		$data['mainContent'] = "grievance/editGrievanceDetails";
		$data['headerCss'] = "headerCss/grievance/grievanceCss";
		$data['footerJs'] = "footerJs/grievance/grievanceJs";
		$this->load->view("include/template",$data);
		
	}

	function assignForm(){
		
		$data['pageTitle'] = "Work Panel";
		$data['smallTitle'] = "Knn File Management  / Work Panel";
		$data['subPage'] = "";
		$data['mainContent'] = "grievance/assignForm";
		$data['headerCss'] = "headerCss/grievance/grievanceCss";
		$data['footerJs'] = "footerJs/grievance/grievanceJs";
		$this->load->view("include/template",$data);
		
	}



	function assignAction(){
		
		$data['pageTitle'] = "Work Panel";
		$data['smallTitle'] = "Knn File Management  / Work Panel";
		$data['subPage'] = "";
		$data['mainContent'] = "grievance/assignAction";
		$data['headerCss'] = "headerCss/grievance/grievanceCss";
		$data['footerJs'] = "footerJs/grievance/grievanceJs";
		$this->load->view("include/template",$data);
		
	}

	function adminAction()
	{
		$data['pageTitle'] = "Work Panel";
		$data['smallTitle'] = "Knn File Management  / Work Panel";
		$data['subPage'] = "";
		$data['mainContent'] = "grievance/adminAction";
		$data['headerCss'] = "headerCss/grievance/grievanceCss";
		$data['footerJs'] = "footerJs/grievance/grievanceJs";
		$this->load->view("include/template",$data);
	}

	

	function viewAssigned()
	{
		$data['pageTitle'] = "Work Panel";
		$data['smallTitle'] = "Knn File Management  / Work Panel";
		$data['subPage'] = "";
		$data['mainContent'] = "grievance/viewAssigned";
		$data['headerCss'] = "headerCss/grievance/grievanceCss";
		$data['footerJs'] = "footerJs/grievance/grievanceJs";
		$this->load->view("include/template",$data);
	}


	function viewSolved()
	{
		$data['pageTitle'] = "Work Panel";
		$data['smallTitle'] = "Knn File Management  / Work Panel";
		$data['subPage'] = "";
		$data['mainContent'] = "grievance/viewSolved";
		$data['headerCss'] = "headerCss/grievance/grievanceCss";
		$data['footerJs'] = "footerJs/grievance/grievanceJs";
		$this->load->view("include/template",$data);
	}

	function solvedGrievance()
	{
		$cnumber                   = $this->input->post("cnumber"); 
		$data["explaination"]      = $this->input->post("explaination");
		$data["solved_date"]       = date("Y-m-d");
		$data["cur_status"]            = "Solved";

		if(!empty($_FILES['file_name']['name']))
		{
		    $this->load->library('upload');
		    $path = pathinfo($_FILES['file_name']['name']);
		    $file_name = $cnumber.time()."Officer.".$path["extension"];
		    //;time().trim($_FILES['file_name']['name']);
			// Set configuration array for uploaded photo.
			$image_path = realpath(APPPATH . '../assets/complain');
			$config['upload_path'] = $image_path;
			$config['allowed_types'] = 'gif|jpg|jpeg|png|docx|doc|pdf';
			$config['max_size'] = '2048';
			$config['file_name'] = $file_name;
			// Upload first photo and create a thumbnail of it.


		    $this->upload->initialize($config);	
		    if ($this->upload->do_upload('file_name')) {
					// ---------------------------------- Redirect Success Page ----------------------
					$data['uploaded_file_bydep']=$file_name;
			        $this->db->where("complain_number",$cnumber)
			                 ->update("complain_record",$data);
					redirect(base_url("index.php/grievanceController/assignComplain"));
			}
			else
			{
				redirect(base_url("index.php/grievanceController/assignAction/$cnumber/ImageNotUploaded_TryAgain"));
			}
		}
		else
		{
			$this->db->where("complain_number",$cnumber)
			         ->update("complain_record",$data);
			redirect(base_url("index.php/grievanceController/assignComplain"));
		}

	}
	
	function saveGrievance()
	{
		
		$user = $this->session->userdata("username");
		$data['complainer_name']	= 	$this->input->post("comp_name");
		$data['age']		        = 	$this->input->post("age");
		$data['gender']		        = 	$this->input->post("gender");
		$data['father_name']        = 	$this->input->post("f_name");
		$data['address']		    = 	$this->input->post("comp_add");
		$data['pincode']            =   $this->input->post("pincode");
		$data['block_name']	        = 	$this->input->post("block_name");
		$data['mobile_number']	    = 	$this->input->post("mobile_number");
		$data['complain']           =   $this->input->post("shikayat");
		$data['complain_type']      =   $this->input->post("typeof_Complain");
		$data['complain_date']	    = 	date('Y-m-d H:i:s');
		$data['assign_date']	    = 	date('Y-m-d H:i:s');	

		$this->db->select_max("sno","max");
		$maxObj = $this->db->get("complain_record");

		$data['complain_number']    = 	$maxObj->row()->max + 1000 ;
		$data['cur_status']		    = 	"pending";
		$data["department"]         =   "Admin Office";
		$data["officer_name"]       =    "Admin";
		$data["officer_id"]       =    "Admin";
		$data["forward_count"]      =   "0";
		//$data['pre_status']         =   $this->input->post("pre_status");
	
		
         
		    

		if(!empty($_FILES['file_name']['name']))
		{
		    $this->load->library('upload');
		    $path = pathinfo($_FILES['file_name']['name']);
		    $file_name = $data['complain_number'].time().".".$path["extension"];
		    //;time().trim($_FILES['file_name']['name']);
			// Set configuration array for uploaded photo.
			$image_path = realpath(APPPATH . '../assets/complain');
			$config['upload_path'] = $image_path;
			$config['allowed_types'] = 'gif|jpg|jpeg|png|docx|doc|pdf';
			$config['max_size'] = '2048';
			$config['file_name'] = $file_name;
			// Upload first photo and create a thumbnail of it.


		    $this->upload->initialize($config);	
		    if ($this->upload->do_upload('file_name')) {
					// ---------------------------------- Redirect Success Page ----------------------
					$data['uploaded_file']=$file_name;
			        $this->db->insert("complain_record",$data);
					redirect(base_url("index.php/grievanceController/printComplain/".$data["complain_number"]));
			}
			else
			{
				redirect(base_url("index.php/grievanceController/gHome/ImageNotUploaded_TryAgain"));
			}
		}
		else
		{
			$this->db->insert("complain_record",$data);
			redirect(base_url("index.php/grievanceController/printComplain/".$data["complain_number"]));
		}
			
				
	}


	function updateGrievance()
	{
		
		$user = $this->session->userdata("username");
		$complain_number            =   $this->input->post("complain_number");
		$data['complainer_name']	= 	$this->input->post("comp_name");
		$data['age']		        = 	$this->input->post("age");
		$data['gender']		        = 	$this->input->post("gender");
		$data['father_name']        = 	$this->input->post("f_name");
		$data['address']		    = 	$this->input->post("comp_add");
		$data['pincode']            =   $this->input->post("pincode");
		$data['block_name']	        = 	$this->input->post("block_name");
		$data['mobile_number']	    = 	$this->input->post("mobile_number");
		$data['complain']           =   $this->input->post("shikayat");
		$data['complain_type']      =   $this->input->post("typeof_Complain");
		$data['record_update_dateTime']	    = 	date('Y-m-d H:i:s');	

		//$data['pre_status']         =   $this->input->post("pre_status");
	
		
         
		    

		if(!empty($_FILES['file_name']['name']))
		{
		    $this->load->library('upload');
		    $path = pathinfo($_FILES['file_name']['name']);
		    $file_name = $complain_number.time().".".$path["extension"];
		    //;time().trim($_FILES['file_name']['name']);
			// Set configuration array for uploaded photo.
			$image_path = realpath(APPPATH . '../assets/complain');
			$config['upload_path'] = $image_path;
			$config['allowed_types'] = 'gif|jpg|jpeg|png|docx|doc|pdf';
			$config['max_size'] = '2048';
			$config['file_name'] = $file_name;
			// Upload first photo and create a thumbnail of it.


		    $this->upload->initialize($config);	
		    if ($this->upload->do_upload('file_name')) {
					// ---------------------------------- Redirect Success Page ----------------------
					$data['uploaded_file']=$file_name;
					$this->db->where("complain_number",$complain_number);
			        $this->db->update("complain_record",$data);
					redirect(base_url("index.php/grievanceController/printComplain/".$complain_number));
			}
			else
			{
				redirect(base_url("index.php/grievanceController/editGrievanceDetails/ImageNotUploaded_TryAgain"));
			}
		}
		else
		{
			$this->db->where("complain_number",$complain_number);
			$this->db->update("complain_record",$data);
			redirect(base_url("index.php/grievanceController/printComplain/".$complain_number));
		}
			
				
	}
			
		
	function searchComplain(){
		$data['pageTitle'] = "Work Panel";
		$data['smallTitle'] = "Knn File Management  / Work Panel";
		$data['subPage'] = "";
		$data['mainContent'] = "grievance/searchComplain";
		$data['headerCss'] = "headerCss/grievance/grievanceCss";
		$data['footerJs'] = "footerJs/grievance/grievanceJs";
		$this->load->view("include/template",$data);
	}

	function todaysComplain(){
		$data['pageTitle'] = "Work Panel";
		$data['smallTitle'] = "Knn File Management  / Work Panel";
		$data['subPage'] = "";
		$data['mainContent'] = "grievance/todaysComplain";
		$data['headerCss'] = "headerCss/grievance/grievanceCss";
		$data['footerJs'] = "footerJs/grievance/grievanceJs";
		$this->load->view("include/template",$data);
	}

	function solvedComplain(){
		$data['pageTitle'] = "Work Panel";
		$data['smallTitle'] = "Knn File Management  / Work Panel";
		$data['subPage'] = "";
		$data['mainContent'] = "grievance/solvedComplain";
		$data['headerCss'] = "headerCss/grievance/grievanceCss";
		$data['footerJs'] = "footerJs/grievance/grievanceJs";
		$this->load->view("include/template",$data);
	}

	function todaysRedressed(){
		$data['pageTitle'] = "Work Panel";
		$data['smallTitle'] = "Knn File Management  / Work Panel";
		$data['subPage'] = "";
		$data['mainContent'] = "grievance/todaysRedressed";
		$data['headerCss'] = "headerCss/grievance/grievanceCss";
		$data['footerJs'] = "footerJs/grievance/grievanceJs";
		$this->load->view("include/template",$data);
	}

	function pendingComplain(){
		$data['pageTitle'] = "Work Panel";
		$data['smallTitle'] = "Knn File Management  / Work Panel";
		$data['subPage'] = "";
		$data['mainContent'] = "grievance/pendingComplain";
		$data['headerCss'] = "headerCss/grievance/grievanceCss";
		$data['footerJs'] = "footerJs/grievance/grievanceJs";
		$this->load->view("include/template",$data);
	}

	function todaysPending(){
		$data['pageTitle'] = "Work Panel";
		$data['smallTitle'] = "Knn File Management  / Work Panel";
		$data['subPage'] = "";
		$data['mainContent'] = "grievance/todaysPending";
		$data['headerCss'] = "headerCss/grievance/grievanceCss";
		$data['footerJs'] = "footerJs/grievance/grievanceJs";
		$this->load->view("include/template",$data);
	}

	function assignComplain(){
		$data['pageTitle'] = "Work Panel";
		$data['smallTitle'] = "Knn File Management  / Work Panel";
		$data['subPage'] = "";
		$data['mainContent'] = "grievance/assignComplain";
		$data['headerCss'] = "headerCss/grievance/grievanceCss";
		$data['footerJs'] = "footerJs/grievance/grievanceJs";
		$this->load->view("include/template",$data);
	}

	function todaysUnderProcess(){
		$data['pageTitle'] = "Work Panel";
		$data['smallTitle'] = "Knn File Management  / Work Panel";
		$data['subPage'] = "";
		$data['mainContent'] = "grievance/todaysUnderProcess";
		$data['headerCss'] = "headerCss/grievance/grievanceCss";
		$data['footerJs'] = "footerJs/grievance/grievanceJs";
		$this->load->view("include/template",$data);
	}
	
    function notsolvedComplain(){
		$data['pageTitle'] = "Work Panel";
		$data['smallTitle'] = "Knn File Management  / Work Panel";
		$data['subPage'] = "";
		$data['mainContent'] = "grievance/notsolvedComplain";
		$data['headerCss'] = "headerCss/grievance/grievanceCss";
		$data['footerJs'] = "footerJs/grievance/grievanceJs";
		$this->load->view("include/template",$data);
	}

	function todaysUnRedressed(){
		$data['pageTitle'] = "Work Panel";
		$data['smallTitle'] = "Knn File Management  / Work Panel";
		$data['subPage'] = "";
		$data['mainContent'] = "grievance/todaysUnRedressed";
		$data['headerCss'] = "headerCss/grievance/grievanceCss";
		$data['footerJs'] = "footerJs/grievance/grievanceJs";
		$this->load->view("include/template",$data);
	}


	function printComplain(){
		$data['pageTitle'] = "Work Panel";
		$data['smallTitle'] = "Knn File Management  / Work Panel";
		$data['subPage'] = "";
		$data['mainContent'] = "grievance/printComplain";
		$data['headerCss'] = "headerCss/grievance/grievanceCss";
		$data['footerJs'] = "footerJs/grievance/grievanceJs";
		$this->load->view("include/template",$data);
	}
	
	function finalPrintCom(){
		$data['complainId'] = $this->uri->segment(3);
		$this->load->view("grievance/finalPrintCom",$data);
	}

	function finalPrintCom2(){
		$data['complainId'] = $this->uri->segment(3);
		$this->load->view("grievance/finalPrintCom2",$data);
	}

	function getName(){
		$branchType = $this->input->post("branchType");
		$designation = $this->input->post("designation");
		$user = $this->session->userdata("login_type");
		if($user=="admin"){
			$this->db->distinct();
			$this->db->select("employee_name");
			$this->db->where("designation",$designation);
			$getName = $this->db->get("employee");
		}else{
	
			$this->db->distinct();
			$this->db->select("designation");
			$this->db->where("clinic_id",$this->session->userdata("clinic_id"));
				$getName = $this->db->get("employee");}?>
				
						<option value="">-Select Name-</option>
						<?php foreach($getName->result() as $gname):?>
						<option value="<?php echo $gname->employee_name;?>"><?php echo $gname->employee_name;?></option>
						<?php endforeach;?>
					</select><?php 
			
			
		}
		
		function genOtp(){
			$mobile_number = $this->input->post("mobile_number");
			$otp = date("jn").rand(1000,10000);
			$data = array(
					'mobile_number'	=>$mobile_number,
					'otp'			=>$otp
			);
			$msg = "Your one time otp is ".$otp." for open Registration form for complain.";
			$this->db->insert("complain_record",$data);
			//sms($mobile_number,$msg);
			
			
		}



		function getPrevGrievance()
		{
			$mobile_number = $this->input->post("mobile_number");
             if(!empty($mobile_number)):
			?>
               
               <div id = "prevGrie" class="portlet-body form">
                        <!-- BEGIN FORM-->
                        <?php $this->db->where("mobile_number",$mobile_number);
                      $cr =   $this->db->get("complain_record");?>
                        	<table class="table table-striped table-bordered table-hover table-checkable order-column" id="leaveTable">
							<thead>
								<tr style="font-weight: bold;">
									<th>Sno.</th>
									<th>Complainer name </th>
									<!--<th>Complain Type</th>-->
									<!--<th>Complain </th>-->
									<th> Date </th>
									<th>Complain Number </th>
									<th>Status</th>
									
								</tr>
							</thead>
							<tbody>
								<?php if($cr->num_rows()>0){ $t=1;
								foreach( $cr->result() as $c):
								if($c->complainer_name){?>
								<tr>
									<td><?php echo $t;?></td>
									<td><?php echo $c->complainer_name;?></td>
									<!--<td><?php echo $c->complain_type;?></td>-->
									<!--<td><?php echo $c->complain;?></td>-->
									<td><?php echo $c->complain_date;?></td>
									<td><?php echo $c->complain_number;?></td>
									<td><?php echo $c->cur_status;?></td>
								
							</tr>
							<?php $t++;} endforeach;}?>
							</tbody>
							 
							</table> 
                        <!-- END FORM-->
                    </div>
			<?php
			 endif;
		}


/* Department Section Start */


	function addDepartment()
	{
		$data['pageTitle'] = "Work Panel";
		$data['smallTitle'] = "Knn File Management  / Work Panel";
		$data['subPage'] = "";
		$data['mainContent'] = "addDepartment";
		$data['headerCss'] = "headerCss/grievance/grievanceCss";
		$data['footerJs'] = "footerJs/grievance/grievanceJs";
		$this->load->view("include/template",$data);	
	}

	function insertDepartment()
	{
		
		/*print_r($this->input->post());
		die();*/
		$username = substr($this->input->post("dep_type"),0,3).mt_rand(100000,999999);

		if($this->input->post("dep_type") == "department")
		{
			$data = [
	                    "dep_type"     => $this->input->post("dep_type"),
	                    "department"   => $this->input->post("depart_name").",".$this->input->post("dep_type"),
	                    "tehsil"       => $this->input->post("depart_name").",".$this->input->post("dep_type"),
	                    "patal_name"   => $this->input->post("depart_name").",".$this->input->post("dep_type"),
	                    "officer_name" => $this->input->post("officer_name"),
	                    "mobile1"      => $this->input->post("mobile"),
	                    "email1"       => $this->input->post("email"),
	                    "status"       => "Active",
	                    "add_by"       => $this->session->userdata("username"),
	                    "username"     => $username
		           ];
		}

		if($this->input->post("dep_type") == "tehsil")
		{
			$data = [
	                    "dep_type"     => $this->input->post("dep_type"),
	                    "department"   => $this->input->post("dep_name"),
	                    "tehsil"       => $this->input->post("depart_name").",".$this->input->post("dep_type"),
	                    "patal_name"   => $this->input->post("depart_name").",".$this->input->post("dep_type"),
	                    "officer_name" => $this->input->post("officer_name"),
	                    "mobile1"      => $this->input->post("mobile"),
	                    "email1"       => $this->input->post("email"),
	                    "status"       => "Active",
	                    "add_by"       => $this->session->userdata("username"),
	                    "username"     => $username
		           ];
		}

		if($this->input->post("dep_type") == "village")
		{
			$data = [
	                    "dep_type"     => $this->input->post("dep_type"),
	                    "department"   => $this->input->post("dep_name"),
	                    "tehsil"       => $this->input->post("teh_name"),
	                    "patal_name"   => $this->input->post("depart_name").",".$this->input->post("dep_type"),
	                    "officer_name" => $this->input->post("officer_name"),
	                    "mobile1"      => $this->input->post("mobile"),
	                    "email1"       => $this->input->post("email"),
	                    "status"       => "Active",
	                    "add_by"       => $this->session->userdata("username"),
	                    "username"     => $username
		           ];
		}
		
		$this->db->where("dep_type",$data["dep_type"]);
		$this->db->where("patal_name",$data["patal_name"]);
		$res = $this->db->get("officers_list");
		if($res->num_rows()>0)
		{
			$err = "<div class='alert alert-info'>"
                   ."<strong>Info!</strong> Department Already present."
                   ."</div>";
			$this->session->set_flashdata("dep",$err);
			redirect(base_url("index.php/grievanceController/addDepartment"));
		}
		else
		{
			$shop_id = 0;
			if($data["dep_type"] == "department")
				$shop_id = 1;
			if($data["dep_type"] == "tehsil")
				$shop_id = 2;
			if($data["dep_type"] == "village")
				$shop_id = 3;
			
			$this->db->insert("officers_list",$data);
			$user = [
                       "login_type"  => "dep",
                       "username"    => $username,
                       "password"    => md5("123456"),
                       "address_1"   => "Pithoragarh",
                       "state"       => "Uttarakhand",
                       "phone_number" => "0522-5555555",
                       "mobile_number" => "9898989898",
                       "shop_name" => "Grievance Solutions, Pithoragarh",
                       "shop_id"   => $shop_id
                    ];
			$this->db->insert("general_settings",$user);
			$err = "<div class='alert alert-success'>"
                   ."<strong>Success!</strong> Department Added Successful....Department ID <b>$username</b> and Password <b>123456</b>"
                   ."</div>";
			$this->session->set_flashdata("dep",$err);
			redirect(base_url("index.php/grievanceController/addDepartment"));


		}

	}



	function editDepartment()
	{
		$data['pageTitle'] = "Work Panel";
		$data['smallTitle'] = "Knn File Management  / Work Panel";
		$data['subPage'] = "";
		$data['mainContent'] = "editDepartment";
		$data['headerCss'] = "headerCss/grievance/grievanceCss";
		$data['footerJs'] = "footerJs/grievance/editdepartmentJs";
		$this->load->view("include/template",$data);	
	}

	function deleteDepartment()
	{
		$sno = $this->input->post("sno");
		$username = $this->db->where("sno",$sno)
					         ->get("officers_list")
					         ->row()
					         ->username;
	    $this->db->where("username",$username)
	             ->delete("general_settings");
		$this->db->where("sno",$sno)
		         ->delete("officers_list");
	}

	function updateDepartment()
	{
		$data = $this->input->post();
		$this->db->where("sno",$data["sno"])
		         ->update("officers_list",[
		         	                        "patal_name"=>$data["patal_name"],
                                            "officer_name"=>$data["officer_name"],
                                            "mobile1"=>$data["mobile1"],
                                            "email1"=>$data["email1"]
		         	                        ]);
	}


	function getDepartmentForEdit()
	{
		
         $dep_type = $this->input->post("dep_type");

         if($dep_type == "department")
         {
         	$res = $this->db->where("dep_type",$dep_type)
         	                ->order_by("patal_name","asc")
                            ->get("officers_list");
         }
         else
         if($dep_type == "tehsil")	
         {
            $dep_name = $this->input->post("dep_name");

            $res = $this->db->where("dep_type",$dep_type)
                            ->where("department",$dep_name)
         	                ->order_by("patal_name","asc")
                            ->get("officers_list");
         }
         else
         if($dep_type == "village")
         {
         	$dep_name = $this->input->post("dep_name");
         	$teh_name = $this->input->post("teh_name");

            $res = $this->db->where("dep_type",$dep_type)
                            ->where("department",$dep_name)
                            ->where("tehsil",$teh_name)
         	                ->order_by("patal_name","asc")
                            ->get("officers_list");
         }

          if($res->num_rows()<1){
          	echo "Record Not Found";
          }else{
		?>
           
                      <div id="editDepartment">
					  <div class="col-lg-12 form-group">
					  <br>
								<div class="col-sm-1 "></div>
								<div class="col-sm-2 ">
									Selected Type Names  <span class="symbol required"></span>
								</div>
								<div class="col-sm-2 ">
									Officer Name  <span class="symbol required"></span>
								</div>
								<div class="col-sm-2 ">
									Mobile <span class="symbol required"></span>
								</div>
								<div class="col-sm-2 ">
									Email <span class="symbol required"></span>
								</div>
								<div class="col-sm-2 ">
									Action <span class="symbol required"></span>
								</div>
								<div class="col-sm-1 "></div>	
					  </div>

					  <?php
                               $of = $res->result();
                               foreach ($of as $row):
					  ?>

					  <div class="col-lg-12 form-group" >
					  <input type="hidden" name="sno" id="sno" value="<?php echo $row->sno; ?>">
					  <div class="col-sm-1 "></div>
									<div class="col-sm-2 ">
									<textarea class="form-control m-b-sm" id="depart" name="depart"><?php echo $row->patal_name; ?></textarea>
									
								</div>
								<div class="col-sm-2 ">
									<textarea class="form-control m-b-sm" id="officer" name="officer"><?php echo $row->officer_name; ?></textarea>
								</div>
								<div class="col-sm-2 ">
									<input class="form-control m-b-sm" type="number" id="mobile" name="mobile" value="<?php echo $row->mobile1; ?>">
								</div>
								<div class="col-sm-2 ">
									<input class="form-control m-b-sm" type="email" id="email" name="email" value="<?php echo $row->email1; ?>">
								</div>
								<div class="col-sm-2 btn-group">
								    <button type="button" id="save" class="btn btn-success save">Save</button>
								    <!--<button type="button" id="delete" class="btn btn-danger delete">Delete</button>-->
								</div>	
								<div class="col-sm-1 "></div>	
					   </div>
					  <?php endforeach; }?>
					  </div>

		<?php
	}





/* Department Section End */

	function assign()
	{
		$data = $this->input->post();
		$row = $this->db->where("sno",$data["dep"])
		                ->get("officers_list")
		                ->row();

		if($data["status"]=="Assign")
		{
			$upData = [
                          "assign_date"  => date("Y-m-d"),
                          "department"   => $row->patal_name,
                          "officer_id"   => $row->username,
                          "officer_name" => $row->officer_name,
                          "cur_status"   => "Assign",
                          "comment"      => $data["comment"]
			          ];
		}else
		{
			$upData = [
                          "solved_date"  => date("Y-m-d"),
                          "officer_id" => $this->session->userdata("username"),
                          "officer_name" => $this->session->userdata("username"),
                          "cur_status"   => "Solved",
                          "explaination" => $data["comment"]
			          ];
		}
		$this->db->where("complain_number",$data["cnumber"])
		         ->update("complain_record",$upData);
		redirect(base_url("index.php/grievanceController/pendingComplain"));
	}


	function redress()
	{
		$cnumber = $this->input->post("cnumber");
		$this->db->where("complain_number",$cnumber);
		$this->db->update("complain_record",[
                                                 
                                                 "cur_status"    => "redressed"
			                                ]);
		echo "Redressed";
	}

	function unredress()
	{
		$cnumber = $this->input->post("cnumber");
		$this->db->where("complain_number",$cnumber);
		$this->db->update("complain_record",[
                                    
                                                 "cur_status"    => "unredressed"
			                                ]);
		echo "UnRedressed";
	}












/* Pending Section Start */

	public function pending()
	{
		$data['pageTitle'] = "Work Panel";
		$data['smallTitle'] = "Knn File Management  / Work Panel";
		$data['subPage'] = "";
		$data['mainContent'] = "grievanceNew/pending"; 
		$data['headerCss'] = "headerCss/grievance/grievanceCss";
		$data['footerJs'] = "footerJs/grievance/grievanceJs";
		$this->load->view("include/template",$data);
	}

	public function pendingAction()
	{
        $data['pageTitle'] = "Work Panel";
		$data['smallTitle'] = "Knn File Management  / Work Panel";
		$data['subPage'] = "";
		$data['mainContent'] = "grievanceNew/pendingAction";
		$data['headerCss'] = "headerCss/grievance/grievanceCss";
		$data['footerJs'] = "footerJs/grievance/grievanceJs";
		$this->load->view("include/template",$data);
	}

	public function pendingInsert()
	{
		$data = $this->input->post();

		
        if( isset($data["complain"]) && isset($data["complain_type"])){
        
        $complain_number       = $data["cnumber"];
		$update["complain"]    = $data["complain"];
		$update["complain_type"] = $data["complain_type"];

		if(!empty($_FILES['cfile_name']['name']))
		{
		    $this->load->library('upload');
		    $path = pathinfo($_FILES['cfile_name']['name']);
		    $file_name = $complain_number.time().".".$path["extension"];
		    //;time().trim($_FILES['file_name']['name']);
			// Set configuration array for uploaded photo.
			$image_path = realpath(APPPATH . '../assets/complain');
			$config['upload_path'] = $image_path;
			$config['allowed_types'] = 'gif|jpg|jpeg|png|docx|doc|pdf';
			$config['max_size'] = '5000';
			$config['file_name'] = $file_name;
			// Upload first photo and create a thumbnail of it.


		    $this->upload->initialize($config);	
		    if ($this->upload->do_upload('cfile_name')) {
					// ---------------------------------- Redirect Success Page ----------------------
					$update['uploaded_file']=$file_name;
			}
			else
			{
				redirect(base_url("index.php/grievanceController/pendingAction/".$data["cnumber"]."/ImageNotUploaded_TryAgain"));
			}
		}

		$this->db->where("complain_number",$complain_number);
		$this->db->update("complain_record",$update);
       }

		if($data["status"]=="forward")
		{
			$this->db->where("complain_number",$data["cnumber"])
			         ->update("complain_record",["last_date_to_solve"=>$data["ldate"]]);

            $i=97;
            $count = count($data["dep"]);
			foreach($data["dep"] as $depsno){
				
                $insertData = $this->db->where("complain_number",$data["cnumber"])
			                       ->get("complain_record")
			                       ->row();

				$oldsno = $insertData->sno;
				unset($insertData->sno);

                $row = $this->db->where("sno",$depsno)
			                ->get("officers_list")
			                ->row();

			    $insertDataAdmin = $insertData;
			    $insertDataDep   = $insertData;

			    $cnog = $data["cnumber"].chr($i).$count;

                $insertDataAdmin->complain_number     = $cnog;
				$insertDataAdmin->forward_count       = "0";
				//$insertDataDep->assign_date           = date("Y-m-d");
		        $insertDataAdmin->solved_date         = "0000-00-00";
		        $insertDataAdmin->department          = "Admin Office";
		        $insertDataAdmin->officer_id          = "Admin";
		        $insertDataAdmin->officer_name        = "Admin";
		        $insertDataAdmin->explaination        = "";
		        $insertDataAdmin->cur_status          = "forward";
		        $insertDataAdmin->uploaded_file_bydep = "";
		        //$insertDataAdmin->comment             = $data["comment"];
		        $insertDataAdmin->forward_date        = date("Y-m-d");
		        //$insertDataAdmin->come_from           = "";
		        $this->db->insert("complain_record",$insertDataAdmin);

			    $insertDataDep->complain_number     = $cnog;
				$insertDataDep->forward_count       = "1";
		        $insertDataDep->assign_date         = date("Y-m-d");
		        $insertDataDep->solved_date         = "0000-00-00";
		        $insertDataDep->department          = $row->patal_name;
		        $insertDataDep->officer_id          = $row->username;
		        $insertDataDep->officer_name        = $row->officer_name;
		        $insertDataDep->explaination        = "";
		        $insertDataDep->cur_status          = "assign";
		        $insertDataDep->uploaded_file_bydep = "";
		        $insertDataDep->comment             = $data["comment"];
		        $insertDataDep->forward_date        = "0000-00-00";
		        $insertDataDep->come_from           = $this->session->userdata("username");
                
                $this->db->insert("complain_record",$insertDataDep);
                
                try{
					email($row->email1,["cno"=>$cnog],"forward"); 
				}catch(Exception $e){
					echo "mail Fail";
					sms(DevMobile,"Pithoragarh Grievance Mail Not Working For Grievance no : $cnog and email : {$row->email1}");
				}

		        $i++;
			}
			unset($i);
			$this->db->where("complain_number",$data["cnumber"])->delete("complain_record");



			/*$row = $this->db->where("sno",$data["dep"])
			                ->get("officers_list")
			                ->row();
			
        unset($insertData->sno);
		$insertData->forward_count       = "1";
        $insertData->assign_date         = date("Y-m-d");
        $insertData->solved_date         = "0000-00-00";
        $insertData->department          = $row->patal_name;
        $insertData->officer_id          = $row->username;
        $insertData->officer_name        = $row->officer_name;
        $insertData->explaination        = "";
        $insertData->cur_status          = "assign";
        $insertData->uploaded_file_bydep = "";
        $insertData->comment             = $data["comment"];
        $insertData->forward_date        = "0000-00-00";
        $insertData->come_from           = $this->session->userdata("username");
			      
			$this->db->insert("complain_record",$insertData);

			$this->db->where("complain_number",$data["cnumber"])
			         ->where("forward_count","0")
			         ->update("complain_record",["cur_status"=>"forward","forward_date"=>date("Y-m-d")]);
			try{
				email($row->email1,["cno"=>$data["cnumber"]],"forward"); 
			}catch(Exception $e){
				echo "mail Fail";
			}  */      
		}
		else
		{
			
           if(!empty($_FILES['file_name']['name']))
			{
			    $this->load->library('upload');
			    $path = pathinfo($_FILES['file_name']['name']);
			    $file_name = $data['cnumber'].time().random_string("alpha",4).".".$path["extension"];
				$image_path = realpath(APPPATH . '../assets/complain');
				$config['upload_path'] = $image_path;
				$config['allowed_types'] = 'gif|jpg|jpeg|png|docx|doc|pdf';
				$config['max_size'] = '2048';
				$config['file_name'] = $file_name;
				// Upload first photo and create a thumbnail of it.

			    $this->upload->initialize($config);	
			    if ($this->upload->do_upload('file_name')) {
						// ---------------------------------- Redirect Success Page ----------------------
				$updateData = [
		                      "solved_date"  => date("Y-m-d"),
		                      "officer_id"   => $this->session->userdata("username"),
		                      "officer_name" => $this->session->userdata("username"),
		                      "cur_status"   => "solved",
		                      "explaination" => $data["explaination"],
		                      "uploaded_file_bydep"=> $file_name
	                      ];
				        
				}
				else
				{
					redirect(base_url("index.php/grievanceController/pendingAction/".$data["cnumber"]."/ImageNotUploaded_TryAgain"));
				}
			}
            else
            {
            	$updateData = [
	                          "solved_date"  => date("Y-m-d"),
	                          "officer_id"   => $this->session->userdata("username"),
	                          "officer_name" => $this->session->userdata("username"),
	                          "cur_status"   => "solved",
	                          "explaination" => $data["explaination"],
	                          "uploaded_file_bydep"=> ""
			             ];
            }

			
			$this->db->where("complain_number",$data["cnumber"])
			         ->where("forward_count","0")
			         ->update("complain_record",$updateData);
		}
		
		redirect(base_url("index.php/grievanceController/pending"));
		//redirect(base_url("index.php/grievanceController2/printGrievance3/".$complain_number));
	}

/* Pending Section End */	



/* Assign Section Start */

	public function assign2()
	{
		$data['pageTitle'] = "Work Panel";
		$data['smallTitle'] = "Knn File Management  / Work Panel";
		$data['subPage'] = "";
		$data['mainContent'] = "grievanceNew/assign";
		$data['headerCss'] = "headerCss/grievance/grievanceCss";
		$data['footerJs'] = "footerJs/grievance/grievanceJs";
		$this->load->view("include/template",$data);
	}

	public function assignAction2()
	{
		$data['pageTitle'] = "Work Panel";
		$data['smallTitle'] = "Knn File Management  / Work Panel";
		$data['subPage'] = "";
		$data['mainContent'] = "grievanceNew/assignAction";
		$data['headerCss'] = "headerCss/grievance/grievanceCss";
		$data['footerJs'] = "footerJs/grievance/grievanceJs";
		$this->load->view("include/template",$data);
	}

	public function assignInsert()
	{
		$data = $this->input->post();

		if($data["status"]=="forward")
		{
			$insertData = $this->db->where("complain_number",$data["cnumber"])
			                       ->get("complain_record")
			                       ->row();
			$row = $this->db->where("sno",$data["dep"])
			                ->get("officers_list")
			                ->row();
			
        unset($insertData->sno);
        $fc = $this->session->userdata("shop_id");
		$insertData->forward_count       = $fc+1;
        $insertData->assign_date         = date("Y-m-d");
        $insertData->solved_date         = "0000-00-00";
        $insertData->department          = $row->patal_name;
        $insertData->officer_id          = $row->username;
        $insertData->officer_name        = $row->officer_name;
        $insertData->explaination        = "";
        $insertData->cur_status          = "assign";
        $insertData->uploaded_file_bydep = "";
        $insertData->comment             = $data["comment"];
        $insertData->forward_date        = "0000-00-00";
        $insertData->come_from           = $this->session->userdata("username");
			      
			$this->db->insert("complain_record",$insertData);

			$this->db->where("complain_number",$data["cnumber"])
			         ->where("forward_count",$fc)
			         ->update("complain_record",["cur_status"=>"forward","forward_date"=>date("Y-m-d")]);

			try{
				email($row->email1,["cno"=>$data["cnumber"]],"forward"); 
			}catch(Exception $e){
				echo "mail Fail";
			} 
		}
		else
		{
			
           if(!empty($_FILES['file_name']['name']))
			{
			    $this->load->library('upload');
			    $path = pathinfo($_FILES['file_name']['name']);
			    $file_name = $data['cnumber'].time().random_string("alpha",4).".".$path["extension"];
				$image_path = realpath(APPPATH . '../assets/complain');
				$config['upload_path'] = $image_path;
				$config['allowed_types'] = 'gif|jpg|jpeg|png|docx|doc|pdf';
				$config['max_size'] = '2048';
				$config['file_name'] = $file_name;
				// Upload first photo and create a thumbnail of it.

			    $this->upload->initialize($config);	
			    if ($this->upload->do_upload('file_name')) {
						// ---------------------------------- Redirect Success Page ----------------------
			    	$uid = $this->session->userdata("username");
			    	$name = $this->db->where("username",$uid)
			    	                 ->get("officers_list")
			    	                 ->row()->officer_name;
				$updateData = [
		                      "solved_date"  => date("Y-m-d"),
		                      "officer_id"   => $uid,
		                      "officer_name" => $name,
		                      "cur_status"   => "solved",
		                      "explaination" => $data["explaination"],
		                      "uploaded_file_bydep"=> $file_name
	                      ];
				        
				}
				else
				{
					$this->session->set_flashdata("msg","This File Type Not Supported.");
					redirect(base_url("index.php/grievanceController/assignAction2/".$data["cnumber"]."/ImageNotUploaded_TryAgain"));
				}
			}
            else
            {
            	$uid = $this->session->userdata("username");
			    	$name = $this->db->where("username",$uid)
			    	                 ->get("officers_list")
			    	                 ->row()->officer_name;
            	$updateData = [
	                          "solved_date"  => date("Y-m-d"),
	                          "officer_id"   => $uid,
	                          "officer_name" => $name,
	                          "cur_status"   => "solved",
	                          "explaination" => $data["explaination"],
	                          "uploaded_file_bydep"=> ""
			             ];
            }

			$fc = $this->session->userdata("shop_id");
			$this->db->where("complain_number",$data["cnumber"])
			         ->where("forward_count",$fc)
			         ->update("complain_record",$updateData);


			$fc = $this->session->userdata("shop_id");
		   if($fc>0)
			{
			    --$fc;       
			    $this->db->where("complain_number",$data["cnumber"])
			         ->where("forward_count",$fc)
			         ->update("complain_record",["cur_status"=>"review"]);
			         echo "success1";
			}
		}
		
		redirect(base_url("index.php/grievanceController/assign2"));
	}

/* Assign Section End */

/* Forward Secction Start */

   public function forwarded()
	{
		$data['pageTitle'] = "Work Panel";
		$data['smallTitle'] = "Knn File Management  / Work Panel";
		$data['subPage'] = "";
		$data['mainContent'] = "grievanceNew/forwarded";
		$data['headerCss'] = "headerCss/grievance/grievanceCss";
		$data['footerJs'] = "footerJs/grievance/grievanceJs";
		$this->load->view("include/template",$data);
	}

	public function forwardedAction()
	{
		$data['pageTitle'] = "Work Panel";
		$data['smallTitle'] = "Knn File Management  / Work Panel";
		$data['subPage'] = "";
		$data['mainContent'] = "grievanceNew/forwardedAction";
		$data['headerCss'] = "headerCss/grievance/grievanceCss";
		$data['footerJs'] = "footerJs/grievance/grievanceJs";
		$this->load->view("include/template",$data);
	}

/* Forward Secction End */



/* Review Section Start */

	public function review()
	{
		$data['pageTitle'] = "Work Panel";
		$data['smallTitle'] = "Knn File Management  / Work Panel";
		$data['subPage'] = "";
		$data['mainContent'] = "grievanceNew/review";
		$data['headerCss'] = "headerCss/grievance/grievanceCss";
		$data['footerJs'] = "footerJs/grievance/grievanceJs";
		$this->load->view("include/template",$data);
	}

	public function reviewAction()
	{
		$data['pageTitle'] = "Work Panel";
		$data['smallTitle'] = "Knn File Management  / Work Panel";
		$data['subPage'] = "";
		$data['mainContent'] = "grievanceNew/reviewAction";
		$data['headerCss'] = "headerCss/grievance/grievanceCss";
		$data['footerJs'] = "footerJs/grievance/grievanceJs";
		$this->load->view("include/template",$data);
	}

	public function reviewInsert()
	{
		$data = $this->input->post();

       if(!empty($_FILES['file_name']['name']))
		{
		    $this->load->library('upload');
		    $path = pathinfo($_FILES['file_name']['name']);
		    $file_name = $data['cnumber'].time().random_string("alpha",4).".".$path["extension"];
			$image_path = realpath(APPPATH . '../assets/complain');
			$config['upload_path'] = $image_path;
			$config['allowed_types'] = 'gif|jpg|jpeg|png|docx|doc|pdf';
			$config['max_size'] = '2048';
			$config['file_name'] = $file_name;
			// Upload first photo and create a thumbnail of it.

		    $this->upload->initialize($config);	
		    if ($this->upload->do_upload('file_name')) {
					// ---------------------------------- Redirect Success Page ----------------------
		    	$uid = $this->session->userdata("username");
		    	$name = $this->db->where("username",$uid)
		    	                 ->get("officers_list")
		    	                 ->row()->officer_name;
			$updateData = [
	                      "solved_date"  => date("Y-m-d"),
	                      "cur_status"   => "solved",
	                      "explaination" => $data["explaination"],
	                      "uploaded_file_bydep"=> $file_name
                      ];
			        
			}
			else
			{
				redirect(base_url("index.php/grievanceController/reviewAction/".$data["cnumber"]."/ImageNotUploaded_TryAgain"));
			}
		}
        else
        {
        	$uid = $this->session->userdata("username");
		    	$name = $this->db->where("username",$uid)
		    	                 ->get("officers_list")
		    	                 ->row()->officer_name;
        	$updateData = [
                          "solved_date"  => date("Y-m-d"),
                          "cur_status"   => "solved",
                          "explaination" => $data["explaination"],
                          "uploaded_file_bydep"=> ""
		             ];
        }

		$uid = $this->session->userdata("username");
		$this->db->where("complain_number",$data["cnumber"])
		         ->where("officer_id",$uid)
		         ->update("complain_record",$updateData);
		
	   $fc = $this->session->userdata("shop_id");
		if($fc>0)
		{
		     --$fc;       
		    $this->db->where("complain_number",$data["cnumber"])
		         ->where("forward_count",$fc)
		         ->update("complain_record",["cur_status"=>"review"]);
		         echo "success1";
		}
	
		redirect(base_url("index.php/grievanceController/review"));
	}

/* Review Section End */


/* Solved Section Start */ 
	public function solved()
	{
		$data['pageTitle'] = "Work Panel";
		$data['smallTitle'] = "Knn File Management  / Work Panel";
		$data['subPage'] = "";
		$data['mainContent'] = "grievanceNew/solved";
		$data['headerCss'] = "headerCss/grievance/grievanceCss";
		$data['footerJs'] = "footerJs/grievance/grievanceJs";
		$this->load->view("include/template",$data);
	}

    public function solvedAction()
	{
		$data['pageTitle'] = "Work Panel";
		$data['smallTitle'] = "Knn File Management  / Work Panel";
		$data['subPage'] = "";
		$data['mainContent'] = "grievanceNew/solvedAction";
		$data['headerCss'] = "headerCss/grievance/grievanceCss";
		$data['footerJs'] = "footerJs/grievance/grievanceJs";
		$this->load->view("include/template",$data);
	}	
/* Solved Section End */ 	


/* Redressed Section Start */

   public function redressed()
   {
   	   $data['pageTitle'] = "Work Panel";
	   $data['smallTitle'] = "Knn File Management  / Work Panel";
	   $data['subPage'] = "";
	   $data['mainContent'] = "grievanceNew/redressed";
	   $data['headerCss'] = "headerCss/grievance/grievanceCss";
	   $data['footerJs'] = "footerJs/grievance/grievanceJs";
	   $this->load->view("include/template",$data);
   }

    public function redressedAction()
   {
   	   $data['pageTitle'] = "Work Panel";
	   $data['smallTitle'] = "Knn File Management  / Work Panel";
	   $data['subPage'] = "";
	   $data['mainContent'] = "grievanceNew/redressedAction";
	   $data['headerCss'] = "headerCss/grievance/grievanceCss";
	   $data['footerJs'] = "footerJs/grievance/grievanceJs";
	   $this->load->view("include/template",$data);
   }

/* Redressed Section End */

/* Redressed Section Start */
   
   public function unredressed()
   {
   	   $data['pageTitle'] = "Work Panel";
	   $data['smallTitle'] = "Knn File Management  / Work Panel";
	   $data['subPage'] = "";
	   $data['mainContent'] = "grievanceNew/unredressed";
	   $data['headerCss'] = "headerCss/grievance/grievanceCss";
	   $data['footerJs'] = "footerJs/grievance/grievanceJs";
	   $this->load->view("include/template",$data);
   }


   public function unredressedAction()
   {
   	   $data['pageTitle'] = "Work Panel";
	   $data['smallTitle'] = "Knn File Management  / Work Panel";
	   $data['subPage'] = "";
	   $data['mainContent'] = "grievanceNew/unredressedAction";
	   $data['headerCss'] = "headerCss/grievance/grievanceCss";
	   $data['footerJs'] = "footerJs/grievance/grievanceJs";
	   $this->load->view("include/template",$data);
   }

/* Redressed Section End */

  public function searchGrievance()
  {
  	   $data['pageTitle'] = "Work Panel";
	   $data['smallTitle'] = "Knn File Management  / Work Panel";
	   $data['subPage'] = "";
	   $data['mainContent'] = "grievanceNew/searchGrievance";
	   $data['headerCss'] = "headerCss/grievance/grievanceCss";
	   $data['footerJs'] = "footerJs/grievance/grievanceJs";
	   $this->load->view("include/template",$data);
  }

  public function displayAllDetails()
  {
  	   $data['pageTitle'] = "Work Panel";
	   $data['smallTitle'] = "Knn File Management  / Work Panel";
	   $data['subPage'] = "";
	   $data['mainContent'] = "grievanceNew/displayAllDetails";
	   $data['headerCss'] = "headerCss/grievance/grievanceCss";
	   $data['footerJs'] = "footerJs/grievance/grievanceJs";
	   $this->load->view("include/template",$data);
  }


    function addComplainType()
	{
		$data['pageTitle'] = "Work Panel";
		$data['smallTitle'] = "Knn File Management  / Work Panel";
		$data['subPage'] = "";
		$data['mainContent'] = "grievanceNew/addComplainType";
		$data['headerCss'] = "headerCss/grievance/grievanceCss";
		$data['footerJs'] = "footerJs/grievance/grievanceJs";
		$this->load->view("include/template",$data);	
	}

	public function insertComplainType()
	{
		$data = $this->input->post();
		$data["dateTime"] = date("Y-m-d H:i:s");
		$this->db->insert("complain_type",$data);
		echo "Added";
	}

	public function  deleteComplainType()
	{
		$sno = $this->input->post("sno");
		$this->db->where("sno",$sno)
		         ->delete("complain_type"); 
	}

	public function updateComplainType()
	{
		$data = $this->input->post();
		$this->db->where("sno",$data["sno"])
		         ->update("complain_type",[ "complain_type"=>$data["complain_type"] , "days"=>$data["days"] ]);
		echo "Updated"; 
	}



    public function getComplainTypeForEdit()
    {
        ?>
    	<div id="displayComplainType">
								  <div class="col-lg-12 form-group">
								  <br>
								  <h2 style="text-align: center">Complain Type List</h2> 
								  <hr>    <br> 
								  <div class="col-sm-1 "></div>  
											<div class="col-sm-1 ">SNO <span class="symbol required"></div>
											<div class="col-sm-4 ">
												COMPLAIN TYPE <span class="symbol required"></span>
											</div>
											<!--<div class="col-sm-2 ">
												DAYS <span class="symbol required"></span>
											</div>-->
											<div class="col-sm-2 ">
												ACTION <span class="symbol required"></span>
											</div>
											<div class="col-sm-1 "></div>	
								  </div>

								  
                                     <?php
                                          $i = 1;
                                          $res  = $this->db->get("complain_type");
                                          foreach($res->result() as $row):
								  	?>
								  <div class="col-lg-12 form-group" >

								  <input type="hidden" name="sno" id="sno" value="<?php echo  $row->sno; ?>">
								 <div class="col-sm-1 "></div>	
								            <div class="col-sm-1 ">
												<?php echo $i++; ?>
											</div>

												<div class="col-sm-4 ">
												<input type="text" class="form-control m-b-sm" name="complain_type" id="complain_type" placeholder="Complain Type" value="<?php echo  $row->complain_type; ?>" readonly>
											</div>

											<!--<div class="col-sm-2 ">-->
												<input class="form-control m-b-sm days" type="hidden" id="days" name="days" value="<?php echo  $row->days; ?>"
												placeholder="Days" >
											<!--</div>-->
											
											
											<div class="col-sm-4 btn-group">
											    <button type="button" id="save_complain_type" class="btn btn-success save_complain_type" style="margin-right: 5%">Save</button>
											    <!--<button type="button" id="delete_complain_type" class="btn btn-danger delete_complain_type">Delete</button>-->
											</div>	
											
								   </div>
								<?php endforeach; ?>
                      </div>
         <?php
    }



    public function pendingInsertTemp()  /*Insert pending action in temporary table*/
    {
    	echo "<pre>";
    	$data = $this->input->post();
    	print_r($data);
    	print_r($_FILES);
    }


    public function assignInsertTemp()  /*Insert assign action in temporary table*/
    {
    	echo "<pre>";
    	$data = $this->input->post();
    	print_r($data);
    	print_r($_FILES);
    }

    public function reviewInsertTemp()  /*Insert review action in temporary table*/
    {
    	echo "<pre>";
    	$data = $this->input->post();
    	print_r($data);
    	print_r($_FILES);
    }


    public function getDepartmentList()
    {
    	$res = $this->db->distinct()
    	                ->select("patal_name")
    	                ->where("dep_type","department")
    	                ->order_by("patal_name","ASC")
    	                ->get("officers_list");
        echo "<option value=''>-----Select----</option>";    	                
    	foreach($res->result() as $row):
    	?>
              <option value="<?php echo $row->patal_name; ?>">
              	<?php echo $row->patal_name; ?>
              </option>
    	<?php
    	endforeach;                
    }

    public function getTehsilList()
    {
    	$dep_name  = $this->input->post("dep_name");
    	$res = $this->db->distinct()
    	                ->select("patal_name")
    	                ->where("dep_type","tehsil")
    	                ->where("department",$dep_name)
    	                ->order_by("patal_name","ASC")
    	                ->get("officers_list");
    	      echo "<option value=''>-----Select----</option>";
    	foreach($res->result() as $row):
    	?>
              <option value="<?php echo $row->patal_name; ?>">
              	<?php echo $row->patal_name; ?>
              </option>
    	<?php
    	endforeach;
    }


    public function getvillageList()
    {
    	$dep_name  = $this->input->post("dep_name");
    	$teh_name  = $this->input->post("teh_name");

    	$res = $this->db->distinct()
    	                ->select("patal_name")
    	                ->where("dep_type","village")
    	                ->where("tehshil",$teh_name)
    	                ->order_by("patal_name","ASC")
    	                ->get("officers_list");
             echo "<option value=''>-----Select----</option>";
    	foreach($res->result() as $row):
    	?>
              <option value="<?php echo $row->patal_name; ?>">
              	<?php echo $row->patal_name; ?>
              </option>
    	<?php
    	endforeach;                
    }


}