<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Expense extends MY_Controller{
    
    public function __construct() {
		parent::__construct();
    }
    
    public function index(){
    	# code...
    }

    public function add_expense(){
		$this->load->library('form_validation');
		$this->load->helper('form');

		if ($this->form_validation->run() == FALSE) {
			$data['journey_cost'] 		= '';
			$data['mobile_cost'] 		= '';
			$data['entertainment_cost'] = '';
			$data['packet_lift'] 		= '';
			$data['others_cost'] 		= '';
			$data['total_cost'] 		= '';
			$data['expense_type'] 		= '';
			$data['start_journey_km'] 	= '';
			$data['end_journey_km'] 	= '';
			$data['total_journey_km'] 	= '';
			$data['personal_use_km'] 	= '';
			$data['office_use_km'] 		= '';
			$data['kilomitter_rate'] 	= '';
			$data['journey_date'] 		= '';

			$this->load->view('expense/add_form', $data);
		} else {
			# code...
		}
    }
}
