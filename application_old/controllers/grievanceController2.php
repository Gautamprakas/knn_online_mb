<?php    
class grievanceController2 extends CI_Controller{


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


	public function getTehsil(){

    	$this->db->distinct();
    	$this->db->select("tehsil");
    	$res = $this->db->get("temprary3");
    	?>
             <option value="">--Select Tehsil--</option>
    	<?php
    	foreach($res->result() as $row):
        ?>
               <option value="<?php echo $row->tehsil; ?>">
               	<?php echo $row->tehsil; ?>
               </option>
        <?php
        endforeach;
    }

    public function getBlock(){
    	
    	$post = $this->input->post();

    	$this->db->distinct();
    	$this->db->select("block");
    	$this->db->where("tehsil",$post["tehsil"]);
    	$res = $this->db->get("temprary3");
    	?>
             <option value="">--Select Block--</option>
    	<?php
    	foreach($res->result() as $row):
        ?>
               <option value="<?php echo $row->block; ?>">
               	<?php echo $row->block; ?>
               </option>
        <?php
        endforeach;

    }

    public function getGramPanchayat(){

    	$post = $this->input->post();

    	$this->db->distinct();
    	$this->db->select("gram_panchayat");
    	$this->db->where("tehsil",$post["tehsil"]);
    	$this->db->where("block",$post["block"]);
    	$res = $this->db->get("temprary3");
    	?>
             <option value="">--Select Gram Panchayat--</option>
    	<?php
    	foreach($res->result() as $row):
        ?>
               <option value="<?php echo $row->gram_panchayat; ?>">
               	<?php echo $row->gram_panchayat; ?>
               </option>
        <?php
        endforeach;

    }


    public function getVillage(){

    	$post = $this->input->post();

    	$this->db->distinct();
    	$this->db->select("village");
    	$this->db->where("tehsil",$post["tehsil"]);
    	$this->db->where("block",$post["block"]);
    	$res = $this->db->get("temprary3");
    	?>
             <option value="">--Select Village--</option>
    	<?php
    	foreach($res->result() as $row):
        ?>
               <option value="<?php echo $row->village; ?>">
               	<?php echo $row->village; ?>
               </option>
        <?php
        endforeach;
    	
    }


    public function addGrievance(){

    	$data['pageTitle']   = "Grievance Panel";
		$data['smallTitle']  = "Grievance  / Grievance Panel";
		$data['subPage']     = "Pithoragarh Grievance Panel";
		$data['mainContent'] = "addgrievance";
		$data['headerCss']   = "headerCss/grievance/grievanceCss";
		$data['footerJs']    = "footerJs/grievance/addGrievanceJs";
		$this->load->view("include/template",$data);
    }


    public function saveGrievance(){

    	$user = $this->session->userdata("username");

		$data['complainer_name']	= 	$this->input->post("complainer_name");
		$data['mobile_number']	    = 	$this->input->post("mobile");
		$data['block_name']		    = 	$this->input->post("block");
		$data['tehsil']		        = 	$this->input->post("tehsil");
		$data['village']		    = 	$this->input->post("village");
		$data['address']		    = 	$this->input->post("address");
		$data['complain_date']      =   date('Y-m-d H:i:s');
		$data['assign_date']        =   date('Y-m-d H:i:s');
		$data["cur_status"]         =   "pending";
		$this->db->select_max("complain_number","max");
		$maxObj = $this->db->get("complain_record");

		$data['complain_number']    = 	$maxObj->num_rows()>0 ? $maxObj->row()->max + 1 : 1000;
		$data["department"]         =   "Admin Office";
		$data["officer_name"]       =   "Admin";
		$data["officer_id"]         =   "Admin";
		$data["forward_count"]      =   "0";
	
		$this->db->insert("complain_record",$data);
    	redirect(base_url("grievanceController2/printGrievance2/".$data['complain_number']));
    }

    public function printGrievance2(){

    	$data["complain_number"] = $this->uri->segment(3);  
    	$data['pageTitle']   = "Grievance Panel";
		$data['smallTitle']  = "Grievance  / Grievance Panel";
		$data['subPage']     = "Pithoragarh Grievance Panel";
		$data['mainContent'] = "grievance/printComplain";
		$data['headerCss']   = "headerCss/grievance/grievanceCss";
		$data['footerJs']    = "footerJs/grievance/grievanceJs";
		$this->load->view("include/template",$data);
    }

	
	public function finalComplain2(){
		$data['complainId'] = $this->uri->segment(3);
		$this->load->view("grievance/finalComplain2",$data);
	}



	



	public function  detailsOfCnumber(){

		$data['pageTitle']   = "Grievance Panel";
		$data['smallTitle']  = "Grievance  / Grievance Panel";
		$data['subPage']     = "Pithoragarh Grievance Panel";
		$data['mainContent'] = "updateGrievance";
		$data['headerCss']   = "headerCss/grievance/grievanceCss";
		$data['footerJs']    = "footerJs/grievance/addGrievanceJs";
		$this->load->view("include/template",$data);
	}


	/*public function updateGrievance(){

		$post = $this->input->post();
		$complain_number       = $post["complain_number"];
		$update["complain"]    = $post["complain"];
		$update["complain_type"] = $post["complain_type"];


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
					$update['uploaded_file']=$file_name;
			        $this->db->where("complain_number",$complain_number);
			        $this->db->update("complain_record",$update);
					redirect(base_url("index.php/grievanceController2/printGrievance3/".$complain_number));
			}
			else
			{
				redirect(base_url("index.php/grievanceController2/detailsOfCnumberImageNotUploaded_TryAgain"));
			}
		}
		else
		{
			$this->db->where("complain_number",$complain_number);
			$this->db->update("complain_record",$update);
			redirect(base_url("index.php/grievanceController2/printGrievance3/".$complain_number));
		}
	}*/


	public function printGrievance3(){

    	$data["complain_number"] = $this->uri->segment(3);  
    	$data['pageTitle']   = "Grievance Panel";
		$data['smallTitle']  = "Grievance  / Grievance Panel";
		$data['subPage']     = "Pithoragarh Grievance Panel";
		$data['mainContent'] = "grievance/printComplain3";
		$data['headerCss']   = "headerCss/grievance/grievanceCss";
		$data['footerJs']    = "footerJs/grievance/grievanceJs";
		$this->load->view("include/template",$data);
    }

	
	public function finalComplain3(){
		$data['complainId'] = $this->uri->segment(3);
		$this->load->view("grievance/finalComplain3",$data);
	}



	public function complain_detail()
   	{
   	   $data['pageTitle'] = "Grievance Panel";
	   $data['smallTitle'] = "Grievance  / Grievance Panel";
	   $data['subPage'] = "Pithoragarh Grievance Panel";
	   $data['mainContent'] = "newReports/complain_detail";
	   $data['headerCss'] = "headerCss/grievance/grievanceCss";
	   $data['footerJs'] = "footerJs/grievance/grievanceJs";
	   $this->load->view("include/template",$data);
   	}


 	public function disposed()
   	{
   	   $data['pageTitle'] = "Grievance Panel";
	   $data['smallTitle'] = "Grievance  / Grievance Panel";
	   $data['subPage'] = "Pithoragarh Grievance Panel";
	   $data['mainContent'] = "newReports/disposed";
	   $data['headerCss'] = "headerCss/grievance/grievanceCss";
	   $data['footerJs'] = "footerJs/grievance/grievanceJs";
	   $this->load->view("include/template",$data);
   	}

   	public function pending_beyond_disposal_time()
   	{
   	   $data['pageTitle'] = "Grievance Panel";
	   $data['smallTitle'] = "Grievance  / Grievance Panel";
	   $data['subPage'] = "Pithoragarh Grievance Panel";
	   $data['mainContent'] = "newReports/pending_beyond_disposal_time";
	   $data['headerCss'] = "headerCss/grievance/grievanceCss";
	   $data['footerJs'] = "footerJs/grievance/grievanceJs";
	   $this->load->view("include/template",$data);
   	}

   	public function pending_under_process()
   	{
   	   $data['pageTitle'] = "Grievance Panel";
	   $data['smallTitle'] = "Grievance  / Grievance Panel";
	   $data['subPage'] = "Pithoragarh Grievance Panel";
	   $data['mainContent'] = "newReports/pending_under_process";
	   $data['headerCss'] = "headerCss/grievance/grievanceCss";
	   $data['footerJs'] = "footerJs/grievance/grievanceJs";
	   $this->load->view("include/template",$data);
   	}

   	public function officers_list()
   	{
   	   $data['pageTitle'] = "Grievance Panel";
	   $data['smallTitle'] = "Grievance  / Grievance Panel";
	   $data['subPage'] = "Pithoragarh Grievance Panel";
	   $data['mainContent'] = "newReports/officers_list";
	   $data['headerCss'] = "headerCss/grievance/grievanceCss";
	   $data['footerJs'] = "footerJs/grievance/grievanceJs";
	   $this->load->view("include/template",$data);
   	}

   	public function under_process()
   	{
   	   $data['pageTitle'] = "Grievance Panel";
	   $data['smallTitle'] = "Grievance  / Grievance Panel";
	   $data['subPage'] = "Pithoragarh Grievance Panel";
	   $data['mainContent'] = "newReports/under_process";
	   $data['headerCss'] = "headerCss/grievance/grievanceCss";
	   $data['footerJs'] = "footerJs/grievance/grievanceJs";
	   $this->load->view("include/template",$data);
   	}




   	public function underProcess()
	{
		$data['pageTitle'] = "Grievance Panel";
		$data['smallTitle'] = "Grievance  / Grievance Panel";
		$data['subPage'] = "Pithoragarh Grievance Panel";
		$data['mainContent'] = "grievanceNew/underProcess";
		$data['headerCss'] = "headerCss/grievance/grievanceCss";
		$data['footerJs'] = "footerJs/grievance/grievanceJs";
		$this->load->view("include/template",$data);
	}

	public function beyondTimeLimit()
	{
		$data['pageTitle'] = "Grievance Panel";
		$data['smallTitle'] = "Grievance  / Grievance Panel";
		$data['subPage'] = "Pithoragarh Grievance Panel";
		$data['mainContent'] = "grievanceNew/beyondTimeLimit";
		$data['headerCss'] = "headerCss/grievance/grievanceCss";
		$data['footerJs'] = "footerJs/grievance/grievanceJs";
		$this->load->view("include/template",$data);
	}


	public function getDetails()
	{
		$data['pageTitle'] = "Grievance Panel";
		$data['smallTitle'] = "Grievance  / Grievance Panel";
		$data['subPage'] = "Pithoragarh Grievance Panel";
		$data['mainContent'] = "newReports/getDetails";
		$data['headerCss'] = "headerCss/grievance/grievanceCss";
		$data['footerJs'] = "footerJs/grievance/grievanceJs";
		$this->load->view("include/template",$data);
	}
    


    public function totalcomplaintdepwise(){


		$data['pageTitle'] = "Grievance Panel";
		$data['smallTitle'] = "Grievance  / Grievance Panel";
		$data['subPage'] = "Pithoragarh Grievance Panel";
		$data['mainContent'] = "newReports/totalcomplaintdepwise";
		$data['headerCss'] = "headerCss/grievance/grievanceCss";
		$data['footerJs'] = "footerJs/grievance/grievanceJs";
		$this->load->view("include/template",$data);
    }
   	



}