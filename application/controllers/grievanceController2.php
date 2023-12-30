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
    	$this->db->order_by('tehsil');
    	$res = $this->db->get("temprary3");
    	?>
             <option value="">--Select Zone--</option>
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
    	$this->db->select("block,gram_panchayat");
    	$this->db->where("tehsil",$post["tehsil"]);
    	$res = $this->db->get("temprary3");
    	?>
             <option value="">--Select Ward--</option>
    	<?php
    	foreach($res->result() as $row):
        ?>
               <option value="<?php echo $row->block; ?>">
               	<?php echo "(".$row->block.")"; ?> <?php echo $row->gram_panchayat; ?>
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
             <option value="">--Select Chk--</option>
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
             <!-- <option value="">--Select Chk--</option> -->
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

    	$data['pageTitle']   = "Work Panel";
		$data['smallTitle']  = "KNN PROJECT MANAGEMENT  / Work Panel";
		$data['subPage']     = "Work Panel";
		$data['mainContent'] = "addgrievance";
		$data['headerCss']   = "headerCss/grievance/grievanceCss";
		$data['footerJs']    = "footerJs/grievance/addGrievanceJs";
		$this->load->view("include/template",$data);
    }
    public function addItem(){
    	$data['pageTitle']   = "Work Panel";
		$data['smallTitle']  = "KNN PROJECT MANAGEMENT  / Work Panel";
		$data['subPage']     = "Work Panel";
		$data['mainContent'] = "itemDetails/addItem";
		$data['headerCss']   = "headerCss/grievance/grievanceCss";
		$data['footerJs']    = "footerJs/grievance/addGrievanceJs";
		$this->load->view("include/template",$data);

    }
    public function saveItem(){
    	$user=$this->session->userdata("username");
    	$data['item']=$this->input->post("itemName");
    	$data['Nos']=$this->input->post("Nos");
    	$data['length']=$this->input->post("length");
    	$data['breadth']=$this->input->post("breadth");
    	$data['height']=$this->input->post("height");
    	$data['unit']=$this->input->post("unit");
    	$data['rate']=$this->input->post("rate");
    	$data['sor/non_sor']=$this->input->post("sor");
    	$data['sor/non_sor_value']=$this->input->post("sor_value");
    	$data['area_manual']=$this->input->post("area_manual");
    	$nos=intval($this->input->post("Nos"));
    	$l=floatval($this->input->post("length"));
    	$b=floatval($this->input->post("breadth"));
    	$h=floatval($this->input->post("height"));
    	$area=$l;
    	if($l!=0 && $b!=0 && $h!=0){
    	$area=$l*$b*$h*$nos;
    	}elseif ($h==0 && $l!=0 && $b!=0) {
    		$area=$l*$b*$nos;
    	}
    	$data['area']=$area;
    	$this->db->insert('item_details', $data);

		if ($this->db->affected_rows() > 0) {
		    $message = "Data inserted successfully.";
		    $this->session->set_flashdata('success_message', $message);
		} else {
		    $message = $this->db->error();
		    $this->session->set_flashdata('error_message', $message);
		}

		redirect(base_url("grievanceController2/addItem/"));


    }
    public function work_wise_report(){
    	$this->db->select("father_name, patrawali_date, financial_year, related_department, tehsil, block_name, village, address, subject, complainer_name, pincode, mobile_number, gender, nagar_ayukat_approval_date,complain_number");
		$this->db->from("complain_record");
		$query = $this->db->get();
		if($query->num_rows()>0){
			$result=$query->result_array();
			$data['result']=$result;
		}else{
			$data['result']='';
		}
		$data['pageTitle'] = "Work Wise Report";
		$data['smallTitle'] = "KNN PROJECT MANAGEMENT  / Work Panel";
		$data['subPage'] = "";
		$data['mainContent'] = "newReports/work_wise_report";
		$data['headerCss'] = "headerCss/grievance/grievanceCss";
		$data['footerJs'] = "footerJs/grievance/grievanceJs";
		$this->load->view("include/template",$data);
	}

	 public function estimate_wise_report(){
    	$this->db->select("*");
		$this->db->from("estimate_details");
		$query = $this->db->get();
		if($query->num_rows()>0){
			$result=$query->result_array();
			$data['result']=$result;
		}else{
			$data['result']='';
		}
		$data['pageTitle'] = "Estimate Wise Report";
		$data['smallTitle'] = "KNN PROJECT MANAGEMENT  / Work Panel";
		$data['subPage'] = "";
		$data['mainContent'] = "newReports/estimate_wise_report";
		$data['headerCss'] = "headerCss/grievance/grievanceCss";
		$data['footerJs'] = "footerJs/grievance/grievanceJs";
		$this->load->view("include/template",$data);
	}

	public function estimateItem(){
		$data["complain_number"] = $this->uri->segment(3);
		$data['pageTitle']   = "Work Panel";
		$data['smallTitle']  = "KNN PROJECT MANAGEMENT  / Work Panel";
		$data['subPage']     = "Work Panel";
		$data['mainContent'] = "itemDetails/estimateItem";
		$data['headerCss']   = "headerCss/grievance/grievanceCss";
		$data['footerJs']    = "footerJs/grievance/addGrievanceJs";
		$this->load->view("include/template",$data);
	}

	public function abstractReport(){
		$complain_number = $this->uri->segment(3);
    	$this->db->select("subject");
		$this->db->from("complain_record");
		$this->db->where("complain_number",$complain_number);
		$query = $this->db->get();
		if($query->num_rows()>0){
			$result=$query->result_array();
			$data['subject']=$result;
		}else{
			$data['subject']='';
		}
		$this->db->select("*");
		$this->db->from("estimate_details");
		$this->db->where("work_id",$complain_number);
		$query = $this->db->get();
		if($query->num_rows()>0){
			$result=$query->result_array();
			$data['result']=$result;
		}else{
			$data['result']='';
		}
		$data['pageTitle'] = "Work Panel";
		$data['smallTitle'] = "KNN PROJECT MANAGEMENT  / Work Panel";
		$data['subPage'] = "";
		$data['mainContent'] = "newReports/estimate_wise_report";
		$data['headerCss'] = "headerCss/grievance/grievanceCss";
		$data['footerJs'] = "footerJs/grievance/grievanceJs";
		$this->load->view("include/template",$data);
		// print_r($data);
	}

	public function saveEstimate(){
		$data['item']=$this->input->post("item");
		$data['quantity_req']=$this->input->post("quantity");
		$data['total_amt']=$this->input->post("total_amt");
		$data['unit']=$this->input->post("unit");
		$data['work_id']=$this->input->post("work_id");
		$data['rate']=$this->input->post("rate");
		$data['sor_non_sor']=$this->input->post("sor_non_sor");
		$data['amount_with_gst']=$this->input->post("amount_with_gst");
		$data['gst']=$this->input->post("gst");
		$this->db->insert('estimate_details',$data);
		if ($this->db->affected_rows() > 0) {
		    $message = "Data inserted successfully.";
		    echo $message;
		} else {
		    $message = $this->db->error();
		    echo $message;
		}
		// redirect(base_url("grievanceController2/estimateItem/"));
		
	}

	public function itemRequired(){

		$data["complain_number"] = $this->uri->segment(3);
		$data['pageTitle']   = "Work Panel";
		$data['smallTitle']  = "KNN PROJECT MANAGEMENT  / Work Panel";
		$data['subPage']     = "Work Panel";
		$data['mainContent'] = "itemDetails/itemRequired";
		$data['headerCss']   = "headerCss/grievance/grievanceCss";
		$data['footerJs']    = "footerJs/grievance/addGrievanceJs";
		$this->load->view("include/template",$data);

	}
	public function saveItemRequired(){

		$data['item_id']=$this->input->post("item_id");
		$data['work_id']=$this->input->post("work_id");
		$data['item_desc']=$this->input->post("item_desc");
		$data['sor_non_sor']=$this->input->post("sor_non_sor");
		$data['unit']=$this->input->post("unit");
		$data['nos1']=$this->input->post("nos1");
		$data['nos2']=$this->input->post("nos2");
		$data['length']=$this->input->post("length");
		$data['breadth']=$this->input->post("breadth");
		$data['height']=$this->input->post("height");
		$data['area']=$this->input->post("area");
		$data['taking']=$this->input->post("taking");
		$data['quantity']=$this->input->post("quantity");
		$data['total_amount']=$this->input->post("total_amt");
		$data['rate']=$this->input->post("rate");
		$this->db->insert('quantity_required',$data);
		if ($this->db->affected_rows() > 0) {
		    $message = "Data inserted successfully.";
		    echo $message;
		} else {
		    $message = $this->db->error();
		    echo $message;
		}

	}

	public function workDays(){

		$data["complain_number"] = $this->uri->segment(3);
		$data['pageTitle']   = "Work Panel";
		$data['smallTitle']  = "KNN PROJECT MANAGEMENT  / Work Panel";
		$data['subPage']     = "Work Panel";
		$data['mainContent'] = "itemDetails/work_days";
		$data['headerCss']   = "headerCss/grievance/grievanceCss";
		$data['footerJs']    = "footerJs/grievance/addGrievanceJs";
		$this->load->view("include/template",$data);

	}

	public function save_work_days(){
		$work_id=$this->input->post("work_id");
		$data['work_days']=$this->input->post("days");
		$data['project_start']=$this->input->post("startDate");
		$this->db->where("complain_number",$work_id);
		$this->db->update("complain_record",$data);
		if($this->db->affected_rows()>0){
			$message="Data inserted successfully";
			echo $message;
		}else{
			$message=$this->db->error();
			echo $message;
		}
	}
	public function trackWork(){
		$work_id=$this->uri->segment(3);
		$data['complain_number']=$work_id;
		$this->db->select("item_desc");
		$this->db->from("quantity_required");
		$this->db->group_by("item_id");
		$this->db->where("work_id",$work_id);
		
		
		$query=$this->db->get();
		$this->db->select("tag,value");
		$this->db->from("track_work");
		$this->db->where("work_id",$work_id);
		$query2=$this->db->get();
		$data['tags_data']=$query2->result_array();
		$data['items']=$query->result_array();
		// $data['work_id']=$work_id;
		$data['pageTitle']   = "Work Panel";
		$data['smallTitle']  = "KNN PROJECT MANAGEMENT  / Work Panel";
		$data['subPage']     = "Work Panel";
		$data['mainContent'] = "itemDetails/trackWork";
		$data['headerCss']   = "headerCss/grievance/grievanceCss";
		$data['footerJs']    = "footerJs/grievance/addGrievanceJs";
		$this->load->view("include/template",$data);
		// print_r($data['tags_data']);

	}

	public function saveTrackWork(){

		$work_id=$this->input->post("work_id");
		$arr=$this->input->post("arr");
		$current_date=date("Y-m-d");
		if($arr){
		foreach ($arr as $row) {
			
			$data['item_desc']=$row['item_desc'];
			$data['date']=$row['date'];
			$data['value']=$row['value'];
			$data['record_date']=$current_date;
			$data['work_id']=$work_id;
			$data['tag']=$row['tag'];
			$this->db->insert("track_work",$data);
			// print_r($data);
			
		}
		}
		if($this->db->affected_rows()>0){
			$message="Data inserted successfully";
			echo $message;
			}else{
				// $message=$this->db->error();
				echo "Some error occured";
		}
	}
	public function trackWorkReport(){

		$work_id=$this->uri->segment(3);
		$data['complain_number']=$work_id;
		$this->db->select("*");
		$this->db->from("track_work");
		// $this->db->group_by("item_id");
		$this->db->where("work_id",$work_id);
		
		
		$query=$this->db->get();
		$data['result']=$query->result_array();
		$this->db->select("subject");
		$this->db->from("complain_record");
		$this->db->where("complain_number",$work_id);
		$query2=$this->db->get();
		$data['subject']=$query2->result_array();

		$data['pageTitle']   = "Work Panel";
		$data['smallTitle']  = "KNN PROJECT MANAGEMENT  / Work Panel";
		$data['subPage']     = "Work Panel";
		$data['mainContent'] = "itemDetails/trackWorkReport";
		$data['headerCss']   = "headerCss/grievance/grievanceCss";
		$data['footerJs']    = "footerJs/grievance/addGrievanceJs";
		// print_r($data['items']);
		$this->load->view("include/template",$data);


	}


    public function addTender(){

    	$data['pageTitle']   = "Work Panel";
		$data['smallTitle']  = "KNN FILE MANAGEMENT  / Work Panel";
		$data['subPage']     = "Tender Panel";
		$data['mainContent'] = "addTender";
		$data['headerCss']   = "headerCss/grievance/grievanceCss";
		$data['footerJs']    = "footerJs/grievance/addGrievanceJs";
		$this->load->view("include/template",$data);
    }


     public function addPayment(){

    	$data['pageTitle']   = "Work Panel";
		$data['smallTitle']  = "KNN FILE MANAGEMENT  / Work Panel";
		$data['subPage']     = "Payment Panel";
		$data['mainContent'] = "addPayment";
		$data['headerCss']   = "headerCss/grievance/grievanceCss";
		$data['footerJs']    = "footerJs/grievance/addGrievanceJs";
		$this->load->view("include/template",$data);
    }


    public function saveGrievance(){

    	$user = $this->session->userdata("username");
    	$mayor_approval_cost = 1000000;

		//$data['age']	= 	$this->input->post("age");
		$data['father_name']	= 	$this->input->post("father_name");
		$data['complain']	= 	$this->input->post("complain");
		$data['pincode']	= 	$this->input->post("pincode");
		$data['gender']	= 	$this->input->post("gender");

		$data['file_type']	= 	$this->input->post("file_type");
		$data['complainer_name']	= 	$this->input->post("complainer_name");
		$data['mobile_number']	    = 	$this->input->post("mobile_number");
		$data['subject']	        = 	$this->input->post("subject");
		$data['block_name']		    = 	$this->input->post("block");
		$data['tehsil']		        = 	$this->input->post("tehsil");
		$data['village']		    = 	$this->input->post("village");
		$data['address']		    = 	$this->input->post("address");

		$data['related_department']		    = 	$this->input->post("related_department");

		$data['patrawali_date']	    = 	$this->input->post("patrawali_date");
		$data['financial_year']	    = 	$this->input->post("financial_year");
		
		if( $data['pincode'] > $mayor_approval_cost ){
			$data['mahapaura_approval_date'] =	$this->input->post("mahapaura_approval_date");
		}
		
		$data['nagar_ayukat_approval_date'] = $this->input->post("nagar_ayukat_approval_date");

		$data['complain_date']      =   date('Y-m-d H:i:s');
		$data['assign_date']        =   date('Y-m-d H:i:s');
		if( $data['file_type'] == "Others" ){
			$data["cur_status"]	= "unredressed";
		}else{
			$data["cur_status"]	= "pending";
		}
		
		$this->db->select_max("cnum","max");
		$maxObj = $this->db->get("complain_record");

		$data['complain_number']    = 	$maxObj->num_rows()>0 ? $maxObj->row()->max + 1 : 1000;
		$data["department"]         =   "Admin Office";
		$data["officer_name"]       =   "Admin";
		$data["officer_id"]         =   "Admin";
		$data["forward_count"]      =   "0";
		$data["cnum"]               =   $data['complain_number'];

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
    					redirect(base_url("grievanceController2/printGrievance2/".$data['complain_number']));

			}
			else
			{
				$this->session->set_flashdata('dep','<div class="alert alert-danger">Attached file not allowed. Try again</div>');
				redirect(base_url("grievanceController2/addGrievance/ImageNotUploaded_TryAgain"));
			}
		}
		else
		{
			$this->db->insert("complain_record",$data);
    			redirect(base_url("grievanceController2/printGrievance2/".$data['complain_number']));
		}
	
		
    }


       public function saveTender(){

    		$user = $this->session->userdata("username");

		$data['complain_number']	= 	$this->input->post("work_number");
		//$data['dhanank_amt']	= 	$this->input->post("dhanank_amt");
		$data['nivida_amt']	= 	$this->input->post("nivida_amt");
		$data['nivida_dar']	= 	$this->input->post("nivida_dar");
		$data['tender_date']	= 	$this->input->post("tender_date");
		$data['tender_approval_date']	= 	$this->input->post("tender_approval_date");
		$data['tender_opening_date']	= 	$this->input->post("tender_opening_date");
		$data['tender_closing_date']	= 	$this->input->post("tender_closing_date");
		$data['firm_name']	= 	$this->input->post("firm_name");
		$data['firm_registration_category'] = $this->input->post("firm_registration_category");
		$data['firm_registration_validity'] = $this->input->post("firm_registration_validity");

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
					$data['nivida_file']=$file_name;

					$this->db->where("complain_number",$data['complain_number']);
					$this->db->update("complain_record",$data);
					
					$this->session->set_flashdata('dep','<div class="alert alert-success">Tender Info Added Successfully.</div>');
					redirect(base_url("grievanceController2/addTender"));

			}
			else
			{
				$this->session->set_flashdata('dep','<div class="alert alert-danger">Attached file not allowed. Try again</div>');
				redirect(base_url("grievanceController2/addTender"));
			}
		}
		else
		{
			$this->db->where("complain_number",$data['complain_number']);
			$this->db->update("complain_record",$data);

			$this->session->set_flashdata('dep','<div class="alert alert-success">Tender Info Added Successfully.</div>');
			redirect(base_url("grievanceController2/addTender"));
		}

		
    }



      public function savePayment(){

    		$user = $this->session->userdata("username");

		$data['complain_number']	= 	$this->input->post("work_number");
		$data["age"] = $this->input->post("sno");
		$data["tehsil"] = $this->input->post("zone");
		$data["block_name"] = $this->input->post("ward");
		$data["father_name"] = $this->input->post("patrawali_sankhya");
		$data["financial_year"] = $this->input->post("financial_year");
		$data["subject"] = $this->input->post("work_name");
		$data["date_of_dispatch_for_payment"] = $this->input->post("date_of_dispatch_for_payment");
		$data["total_work_done"] = $this->input->post("total_work_done");
		$data["security_deposit"] = $this->input->post("security_deposit");
		$data["contract_late_fee"] = $this->input->post("contract_late_fee");
		$data["work_late_fee"] = $this->input->post("work_late_fee");
		$data["prepayment_amount"] = $this->input->post("prepayment_amount");
		$data["jt"] = $this->input->post("jt");
		$data["st"] = $this->input->post("st");
		$data["gst"] = $this->input->post("gst");
		$data["saas_forgone_cost"] = $this->input->post("saas_forgone_cost");
		$data["other"] = $this->input->post("other");
		$data["total_deduction"] = $this->input->post("total_deduction");
		$data["total_payable"] = $this->input->post("total_payable");
		$data["date_of_payment"] = $this->input->post("date_of_payment");
		$data["date_of_sending_letter_from_unicipal_commissioner_office"] = $this->input->post("date_of_sending_letter_from_unicipal_commissioner_office");
		$data["user"] = $user;
		$data["datetime"] = date("Y-m-d H:i:s");

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
					$data['file_name']=$file_name;

					$this->db->insert("payment",$data);
					
					$this->session->set_flashdata('dep','<div class="alert alert-success">Payment Added Successfully.</div>');
					redirect(base_url("grievanceController2/addPayment"));

			}
			else
			{
				$this->session->set_flashdata('dep','<div class="alert alert-danger">Attached file not allowed. Try again</div>');
				redirect(base_url("grievanceController2/addPayment"));
			}
		}
		else
		{
			$this->db->insert("payment",$data);

			$this->session->set_flashdata('dep','<div class="alert alert-success">Payment Added Successfully.</div>');
			redirect(base_url("grievanceController2/addPayment"));
		}

		
    }


    public function printGrievance2(){

    	$data["complain_number"] = $this->uri->segment(3);

    	$data['pageTitle']   = "Work Panel";
		$data['smallTitle']  = "KNN FILE MANAGEMENT  / Work Panel";
		$data['subPage']     = "Work Panel";
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

		$data['pageTitle']   = "Work Panel";
		$data['smallTitle']  = "KNN FILE MANAGEMENT  / Work Panel";
		$data['subPage']     = "Work Panel";
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
    	$data['pageTitle']   = "Work Panel";
		$data['smallTitle']  = "KNN FILE MANAGEMENT  / Work Panel";
		$data['subPage']     = "Work Panel";
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
   	   $data['pageTitle'] = "Work Panel";
	   $data['smallTitle'] = "KNN FILE MANAGEMENT  / Work Panel";
	   $data['subPage'] = "";
	   $data['mainContent'] = "newReports/complain_detail";
	   $data['headerCss'] = "headerCss/grievance/grievanceCss";
	   $data['footerJs'] = "footerJs/grievance/grievanceJs";
	   $this->load->view("include/template",$data);
   	}


 	public function disposed()
   	{
   	   $data['pageTitle'] = "Work Panel";
	   $data['smallTitle'] = "KNN FILE MANAGEMENT  / Work Panel";
	   $data['subPage'] = "";
	   $data['mainContent'] = "newReports/disposed";
	   $data['headerCss'] = "headerCss/grievance/grievanceCss";
	   $data['footerJs'] = "footerJs/grievance/grievanceJs";
	   $this->load->view("include/template",$data);
   	}

   	public function pending_beyond_disposal_time()
   	{
   	   $data['pageTitle'] = "Work Panel";
	   $data['smallTitle'] = "KNN FILE MANAGEMENT  / Work Panel";
	   $data['subPage'] = "";
	   $data['mainContent'] = "newReports/pending_beyond_disposal_time";
	   $data['headerCss'] = "headerCss/grievance/grievanceCss";
	   $data['footerJs'] = "footerJs/grievance/grievanceJs";
	   $this->load->view("include/template",$data);
   	}

   	public function pending_under_process()
   	{
   	   $data['pageTitle'] = "Work Panel";
	   $data['smallTitle'] = "KNN FILE MANAGEMENT  / Work Panel";
	   $data['subPage'] = "";
	   $data['mainContent'] = "newReports/pending_under_process";
	   $data['headerCss'] = "headerCss/grievance/grievanceCss";
	   $data['footerJs'] = "footerJs/grievance/grievanceJs";
	   $this->load->view("include/template",$data);
   	}

   	public function officers_list()
   	{
   	   $data['pageTitle'] = "Work Panel";
	   $data['smallTitle'] = "KNN FILE MANAGEMENT  / Work Panel";
	   $data['subPage'] = "";
	   $data['mainContent'] = "newReports/officers_list";
	   $data['headerCss'] = "headerCss/grievance/grievanceCss";
	   $data['footerJs'] = "footerJs/grievance/grievanceJs";
	   $this->load->view("include/template",$data);
   	}

   	public function under_process()
   	{
   	   $data['pageTitle'] = "Work Panel";
	   $data['smallTitle'] = "KNN FILE MANAGEMENT  / Work Panel";
	   $data['subPage'] = "";
	   $data['mainContent'] = "newReports/under_process";
	   $data['headerCss'] = "headerCss/grievance/grievanceCss";
	   $data['footerJs'] = "footerJs/grievance/grievanceJs";
	   $this->load->view("include/template",$data);
   	}




   	public function underProcess()
	{
		$data['pageTitle'] = "Work Panel";
		$data['smallTitle'] = "KNN FILE MANAGEMENT  / Work Panel";
		$data['subPage'] = "";
		$data['mainContent'] = "grievanceNew/underProcess";
		$data['headerCss'] = "headerCss/grievance/grievanceCss";
		$data['footerJs'] = "footerJs/grievance/grievanceJs";
		$this->load->view("include/template",$data);
	}

	public function beyondTimeLimit()
	{
		$data['pageTitle'] = "Work Panel";
		$data['smallTitle'] = "KNN FILE MANAGEMENT  / Work Panel";
		$data['subPage'] = "";
		$data['mainContent'] = "grievanceNew/beyondTimeLimit";
		$data['headerCss'] = "headerCss/grievance/grievanceCss";
		$data['footerJs'] = "footerJs/grievance/grievanceJs";
		$this->load->view("include/template",$data);
	}


	public function getDetails()
	{
		$data['pageTitle'] = "Work Panel";
		$data['smallTitle'] = "KNN FILE MANAGEMENT  / Work Panel";
		$data['subPage'] = "";
		$data['mainContent'] = "newReports/getDetails";
		$data['headerCss'] = "headerCss/grievance/grievanceCss";
		$data['footerJs'] = "footerJs/grievance/grievanceJs";
		$this->load->view("include/template",$data);
	}
    


    public function totalcomplaintdepwise(){


		$data['pageTitle'] = "Work Panel";
		$data['smallTitle'] = "KNN FILE MANAGEMENT  / Work Panel";
		$data['subPage'] = "";
		$data['mainContent'] = "newReports/totalcomplaintdepwise";
		$data['headerCss'] = "headerCss/grievance/grievanceCss";
		$data['footerJs'] = "footerJs/grievance/grievanceJs";
		$this->load->view("include/template",$data);
    }



	public function ward_wise_report(){

		$data['pageTitle'] = "Ward Wise Report";
		$data['smallTitle'] = "KNN FILE MANAGEMENT  / Work Panel";
		$data['subPage'] = "";
		$data['mainContent'] = "newReports/ward_wise_report";
		$data['headerCss'] = "headerCss/grievance/grievanceCss";
		$data['footerJs'] = "footerJs/grievance/grievanceJs";
		$this->load->view("include/template",$data);
	}
   	



}