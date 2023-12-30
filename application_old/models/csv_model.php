<?php
class csv_model extends CI_Model {

	function __construct() {
		parent::__construct();

	}

	function get_smsReport($dosms) {
				$this->db->where("date_of_sms",$dosms);
		$query = $this->db->get('sms_report');
		if ($query->num_rows() > 0) {
			return $query->result_array();
		} else {
			return FALSE;
		}
	}

	function insert_csv($data) {
		$this->db->insert('sms_report', $data);
	}
	function insert_wrong_sms($data) {
		$this->db->insert('wromg_sms', $data);
	}
}