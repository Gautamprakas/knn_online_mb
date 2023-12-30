<?php
class Apanel extends CI_Controller{
	function __construct()
	{
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
	
	
	
	function index(){

		$this->load->model("loginmodel");
		$data['subPage'] = 'होम';
		$data['smallTitle'] = 'डैशबोर्ड';
		$data['pageTitle'] = 'सभी खंडो का अवलोकन';
		$data['title'] = 'Digital Cable | Dashboard';
		$data['headerCss'] = 'headerCss/dashboardCss';
		$data['footerJs'] = 'footerJs/dashboardJs';
		$data['mainContent'] = 'dashboard';
		$this->load->view("include/template", $data);
	
	}
	
	function datatable(){
		$this->load->view("datatable");
	}
	
	function grievance(){
		$data['subPage'] = '';
		$data['smallTitle'] = 'MAINTAINCE AND ASSURED RECORD GOVERNANCE';
		$data['pageTitle'] = 'Grievance';
		$data['title'] = 'Grievance | Display';
		$data['headerCss'] = 'headerCss/listCss';
		$data['footerJs'] = 'footerJs/reportJs';
		$data['mainContent'] = 'grievance';
		$this->load->view("include/template", $data);
	}
	function asigneProblem(){
		$data['complain_Number'] = $this->uri->segment(3);
		$data['subPage'] = '';
		$data['smallTitle'] = 'MAINTAINCE AND ASSURED RECORD GOVERNANCE';
		$data['pageTitle'] = 'Grievance';
		$data['title'] = 'Grievance | Display';
		$data['headerCss'] = 'headerCss/listCss';
		$data['footerJs'] = 'footerJs/reportJs';
		$data['mainContent'] = 'asigne';
		$this->load->view("include/template", $data);
	}
	function saveTransferCom(){
		$cn =$this->input->post("complainer_name");
		$complain_Number =$this->input->post("complain_Number");
		$officer_name = $this->input->post("officer_name");
		$mobile1 =$this->input->post("mobile1");
		$mobile2 =$this->input->post("mobile2");
	
		$data = array(
				'complain_number'	=>$complain_Number,
				'officer_name'		=>$officer_name,
				'status'			=>"Pending",
				'date'				=>date('Y-m-d')
	
		);
	
		$v= $this->db->insert("hand_off_prob",$data);
		if($v){
			$data1=array(
					'cur_status' => "Handover to Officer"
			);
			$this->db->where("complain_number",$complain_Number);
			$t = $this->db->update("complain_record",$data1);
			$smstext = "There is New Complain For you.Complainer Name ".$cn." and Complain Number".$complain_Number.". Please Insure it and Resolved with in 24 hours. BSA Kanpur dehat";
				
			sms($mobile1,$smstext);
			if(strlen($mobile2)>0){
				sms($mobile2,$smstext);
			}
			redirect(base_url()."index.php/apanel/asigneProblem/$complain_Number");
				
		}
	}
	
	function officer_list(){
		$data['subPage'] = '';
		$data['smallTitle'] = 'MAINTAINCE AND ASSURED RECORD GOVERNANCE';
		$data['pageTitle'] = 'Grievance';
		$data['title'] = 'Grievance | Officer List';
		$data['headerCss'] = 'headerCss/listCss';
		$data['footerJs'] = 'footerJs/reportJs';
		$data['mainContent'] = 'officer_list';
		$this->load->view("include/template", $data);
	}
	
	function officerAns(){
		if($this->input->post("complain_Number")){
			$cn = $this->input->post("complain_Number");
			$this->db->where("complain_number",$cn);
			$gt = $this->db->get("complain_record");
			$data['gt']=$gt;
			$data['subPage'] = '';
			$data['smallTitle'] = 'MAINTAINCE AND ASSURED RECORD GOVERNANCE';
			$data['pageTitle'] = 'Grievance';
			$data['title'] = 'Grievance | Officer Answer';
			$data['headerCss'] = 'headerCss/listCss';
			$data['footerJs'] = 'footerJs/reportJs';
			$data['mainContent'] = 'officerAns';
			$this->load->view("include/template", $data);
		}
		else{
			$data['subPage'] = '';
			$data['smallTitle'] = 'MAINTAINCE AND ASSURED RECORD GOVERNANCE';
			$data['pageTitle'] = 'Grievance';
			$data['title'] = 'Grievance | Officer Answer';
			$data['headerCss'] = 'headerCss/listCss';
			$data['footerJs'] = 'footerJs/reportJs';
			$data['mainContent'] = 'officerAns';
			$this->load->view("include/template", $data);
		}
	}
	function getfilelist(){
		$teacher_code = $this->input->post("teacher_code");
			
		?><div>
					<table class="table table-striped table-bordered table-hover" id="sample_1">
						<thead>
							<tr style="background-color:#673918"> 
							<th><font color="#fefcfa">Sno</font></th>
							<th><font color="#fefcfa">File</font></th>
							</tr>
						</thead>
						
					<tbody>
					<?php
					$i = 1;
					$this->db->where("teacher_code",$teacher_code);
					$oall=   $this->db->get("service_book_data");
					foreach($oall->result() as $r):
					?>
						 	                                            <tr style="background-color:#ffae60" >
						 	                                                <td><?php echo $i;?></td>
						 	                                                <td ><a href="<?php echo base_url();?>assets/apd/<?php echo $r->teacher_code;?>/<?php echo $r->filename;?>" target="_blank"><img src="<?php echo base_url();?>assets/apd/<?php echo $r->teacher_code;?>/<?php echo $r->filename;?>" alt="" height="55" width="55"><?php echo $r->filename;?></a>
						 	                                               
						 	                                            </tr>
						 	                                            
						 	                                    <?php 
						 	                                       $i++; endforeach;
						 	                                       ?>
						 								
						 								</tbody>
						 					</table>	</div>
			<?php 	}	
			
			function updatedStatus(){
				$photo_name = time().trim($_FILES['ansfile']['name']);
				
				$this->load->library('upload');
				$image_path = realpath(APPPATH . '../assets/efile');
				$config['upload_path'] = $image_path;
				$config['allowed_types'] = 'gif|jpg|jpeg|png|pdf';
				$config['max_size'] = '2024';
				$config['file_name'] = $photo_name;
				$complain_Number =$this->input->post("complain_Number");
				$officer_name = $this->input->post("officer_name");
				$mobile1 =$this->input->post("mobile1");
				$mobile2 =$this->input->post("mobile2");
				$status = $this->input->post("status");
				$expain = $this->input->post("y_explain");
				$data1=array(
						'cur_status' => $status
				);
				$this->db->where("complain_number",$complain_Number);
				$t = $this->db->update("complain_record",$data1);
				
				$data = array(
						'complain_number'	=>$complain_Number,
						'officer_name'		=>$officer_name,
						'status'			=>$status,
						'date'				=>date('Y-m-d'),
						'expain'			=>$expain,
						'file_name'			=>$photo_name
				);
				$this->db->where("complain_number",$complain_Number);
				 $this->db->update("hand_off_prob",$data);
				
				if (!empty($_FILES['ansfile']['name'])) {
					$this->upload->initialize($config);
					$this->upload->do_upload('ansfile');
					redirect(base_url()."apanel/asigneProblem/$complain_Number/success");
				}
				
				echo "Something went wrong!!!!!!!!!!!!!";
			}
			
			function cws(){
				$data['subPage'] = '';
				$data['smallTitle'] = 'MAINTAINCE AND ASSURED RECORD GOVERNANCE';
				$data['pageTitle'] = 'Grievance';
				$data['title'] = 'Grievance | Complain with Status';
				$data['headerCss'] = 'headerCss/listCss';
				$data['footerJs'] = 'footerJs/reportJs';
				$data['mainContent'] = 'cwslist';
				$this->load->view("include/template", $data);
				
				
			}
			
			function llform(){
				$data['subPage'] = '';
				$data['smallTitle'] = 'MAINTAINCE AND ASSURED RECORD GOVERNANCE';
				$data['pageTitle'] = 'Grievance';
				$data['title'] = 'Grievance | Complain with Status';
				$data['headerCss'] = 'headerCss/listCss';
				$data['footerJs'] = 'footerJs/reportJs';
				$data['mainContent'] = 'llform';
				$this->load->view("include/template", $data);
			}
			
			function saveLearning(){
				$data['udios'] =$this->input->post("udios");
				$data['class'] = $this->input->post("class");
				$data['subject'] = $this->input->post("subject");
				$data['level'] = $this->input->post("level");
				$data['sub_level'] = $this->input->post("sub_level");
				$data['nostud'] = $this->input->post("nostud");
				$data['dateTime'] = date('Y-m-d H:i:s');
				
				$data['filled_by'] = "Admin";
				$this->db->insert("learn_level",$data);
				redirect(base_url()."apanel/llform/success");
			}
			function llreport(){
				$data['subPage'] = '';
				$data['smallTitle'] = 'MAINTAINCE AND ASSURED RECORD GOVERNANCE';
				$data['pageTitle'] = 'Grievance';
				$data['title'] = 'Grievance | Complain with Status';
				$data['headerCss'] = 'headerCss/listCss';
				$data['footerJs'] = 'footerJs/reportJs';
				$data['mainContent'] = 'llreport';
				$this->load->view("include/template", $data);
			}
			function checkudios(){
				$ud = $this->input->post("udios");
				$this->db->where("udios",$ud);
				$rt = $this->db->get("school_teachers");
				if($rt->num_rows()>0){
					$r = $rt->row();
					echo $r->school_name.", ".$r->block;?>
					<script>
					 $("#sv").show();
					</script>
				<?php }
				else{
					echo '<div class="note-success">Please Enter a Valid Udios Code</div>';
				}
			}

	function changePassword()
	{
		$data['pageTitle'] = "Grievance Panel";
		$data['smallTitle'] = "Grievance  / Grievance Panel";
		$data['subPage'] = "Pithoragarh Grievance Panel";
		$data['mainContent'] = "changePassword";
		$data['headerCss'] = "headerCss/grievance/grievanceCss";
		$data['footerJs'] = "footerJs/grievance/grievanceJs";
		$this->load->view("include/template",$data);
	}

	function updatePassword()
	{
		$data = $this->input->post();
		$username = $this->session->userdata("username");
		$this->db->where("username",$username);
		$this->db->where("password",md5($data["opass"]));
		$res  = $this->db->get("general_settings");
		if($res->num_rows()>0)
		{
			$err = "<div class='alert alert-success'>"
                   ."<strong>Password Changed!</strong> Successfully...."
                   ."</div>";
			$this->db->where("username",$username);
			$this->db->update("general_settings",["password"=>md5($data["npass"])]);
			$this->session->set_flashdata("cp",$err);
			redirect(base_url("index.php/apanel/changePassword"));
		}
		else
		{
			$err = "<div class='alert alert-danger'>"
                   ."<strong>Old Password Incorrect</strong> ..Plz Try Again."
                   ."</div>";
			$this->session->set_flashdata("cp",$err);
			redirect(base_url("index.php/apanel/changePassword"));
		}

	}

	function resetPassword()
	{
		$data['pageTitle'] = "Grievance Panel";
		$data['smallTitle'] = "Grievance  / Grievance Panel";
		$data['subPage'] = "Pithoragarh Grievance Panel";
		$data['mainContent'] = "resetPassword";
		$data['headerCss'] = "headerCss/grievance/grievanceCss";
		$data['footerJs'] = "footerJs/grievance/grievanceJs";
		$this->load->view("include/template",$data);
	}


	function resetAction()
	{
		$data = $this->input->post();

		$this->db->where("login_type !=","admin");
		$this->db->where("username",$data["emp_id"]);
		$res  = $this->db->get("general_settings");
		if($res->num_rows()>0)
		{
			$err = "<div class='alert alert-success'>"
                   ."<strong>Password Reset!</strong> Successfully...."
                   ."</div>";
			$this->db->where("username",$data["emp_id"]);
			$this->db->update("general_settings",["password"=>md5($data["reset"])]);
			$this->session->set_flashdata("cp",$err);
			redirect(base_url("index.php/apanel/resetPassword"));
		}
		else
		{
			$err = "<div class='alert alert-danger'>"
                   ."<strong>Employee Id Is Incorrect</strong> ..Plz Try Again."
                   ."</div>";
			$this->session->set_flashdata("cp",$err);
			redirect(base_url("index.php/apanel/resetPassword"));
		}

	}


	/*public function email(){
		$toMail = "edmpithoragarh@gmail.com";
		$cno    = "Test Number";
		$type   = "reminder";
		echo email($toMail,["cno"=>"Test Number","due_date"=>"Test Date"],$type);
	}*/


	
	
}