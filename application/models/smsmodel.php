<?php
class smsmodel extends CI_Model{
	public function getWrongSmsDetails(){
		$result = $this->db->query("SELECT DISTINCT date_of_sms FROM wromg_sms");
		return $result;
	}
	
	
	
}