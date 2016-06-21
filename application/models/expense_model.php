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

	public function daily_expense_report($start_date, $end_date, $division_id, $jonal_id, $district_id, $thana_id, $college_id){

		$this->db->select('*');
		$this->db->where('date >=', $start_date);
		$this->db->where('date <=', $end_date);

		$this->db->from('tbl_expense');

		$this->db->join('user', 'user.id = tbl_expense.entry_by', 'left');

		return $result = $this->db->get()->result_array(); 
	}

}

/* End of file expense_model.php */
/* Location: ./application/models/expense_model.php */