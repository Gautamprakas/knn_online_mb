<?php
class Login extends CI_Controller{
	function index(){
		if($this->session->userdata("is_login") == true){
			$this->logout();
		}
		$this->load->view("login");
	}
	
	function auth(){
		$data = $this->loginmodel->validate();
		if($data['is_login'] == 'true')
		{
			$this->session->set_userdata($data);
			if($this->session->userdata("login_type")=="admin")
			{
			      redirect(base_url()."apanel");
			}
			else
			{
				if($this->session->userdata("login_type")=="dep")
				{
					redirect(base_url()."apanel");
				}
				else if($this->session->userdata("login_type")=="op"){
                     redirect(base_url()."index.php/grievanceController2/addGrievance");
				}
				else
				{
					redirect(base_url()."login/index/authFals");
				}
			}
		}else
		{
			redirect(base_url()."login/index/authFals");
		}
	}
	
	function unlock(){
		$query = $this->loginmodel->validateLock();
		if($query){  //if user Lock validation return true after validation
			$this->session->set_userdata('is_lock',true);
			redirect(base_url()."apanel");
		}
		else{ // if user not validate the credential ....
			redirect("index.php/homeController/lockPage/false");
		}
	}
	
	function logout()
	{
		
		
		$this->session->unset_userdata();
		$this->session->sess_destroy();
		redirect(base_url().'login/index');
	}
	
	function lockPage(){
		if($this->session->userdata("is_login") == false){
			redirect(base_url().'login/index');
		}
		$data['title'] = $this->session->userdata("name");
		$this->session->set_userdata('is_lock', false);
		$this->load->view("lockPage", $data);
	}
	
	function forgot(){
		$this->load->view("forgot");
	}
	
}