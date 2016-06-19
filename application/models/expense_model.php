<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Expense_model extends CI_Model {
	public function __construct(){
        parent::__construct();
        $this->user_type = $this->session->userdata('user_type');
        $this->uid = $this->session->userdata('uid');
    }
	
	public function get_all_expense_list(){
		$this->db->select('*');
		$this->db->from('tbl_expense');
		$this->db->where('entry_by', $this->uid);

		return $result = $this->db->get()->result_array();
		
	}

}

/* End of file expense_model.php */
/* Location: ./application/models/expense_model.php */