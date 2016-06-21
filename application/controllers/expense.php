<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Expense extends MY_Controller{
    
    public function __construct() {
		parent::__construct();

		$this->user_type = $this->session->userdata('user_type');
		$this->uid = $this->session->userdata('uid');
    }
    
    public function index(){
    	$data = array();
		$this->load->model('expense_model');
		$data['user_role'] = $this->user_type;
		$data['expense_list'] = $this->expense_model->get_all_expense_list();

		// echo "<pre>";
		// print_r($data['expense_list']);
		// exit();
		
		$this->load->view('expense/expense_report', $data);
    }

    public function add_expense(){
		$this->load->library('form_validation');
		$this->load->helper('form');
// echo "<pre>";
// print_r($_POST);
// exit();

		$this->form_validation->set_rules('journey_cost', 'Journey Cost', 'required');
		$this->form_validation->set_rules('mobile_cost', 'Mobile Cost', 'required');
		$this->form_validation->set_rules('entertainment_cost', 'Entertainment Cost', 'trim|required');
		$this->form_validation->set_rules('packet_lift', 'Packet Lift', 'trim|required');
		$this->form_validation->set_rules('expense_type', 'Expense Type', 'trim|required');

		if($this->input->post('expense_type')==2){
			$this->form_validation->set_rules('start_journey_km', 'Start Journey KM', 'trim|required');			
			$this->form_validation->set_rules('end_journey_km', 'End Journey KM', 'trim|required');			
			$this->form_validation->set_rules('personal_use_km', 'Personal USE KM', 'trim|required');			
			$this->form_validation->set_rules('office_use_km', 'Office Journey KM', 'trim|required');			
			$this->form_validation->set_rules('kilomitter_rate', 'Kilomitter Rate', 'trim|required');			
		}

		if($this->input->post('expense_type')==3){

		}

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

			$data['journey_cost2'] 		= '';

			$this->load->view('expense/add_form', $data);
		} else {
			$data['journey_cost'] 		= $this->input->post('journey_cost');
			$data['mobile_cost'] 		= $this->input->post('mobile_cost');
			$data['entertainment_cost'] = $this->input->post('entertainment_cost');
			$data['packet_lift'] 		= $this->input->post('packet_lift');
			$data['others_cost'] 		= $this->input->post('others_cost');
			$data['total_cost'] 		= $this->input->post('total_cost');
			$data['expense_type'] 		= $this->input->post('expense_type');
			$data['start_journey_km'] 	= $this->input->post('start_journey_km');
			$data['end_journey_km'] 	= $this->input->post('end_journey_km');
			$data['total_journey_km'] 	= $this->input->post('total_journey_km');
			$data['personal_use_km'] 	= $this->input->post('personal_use_km');
			$data['office_use_km'] 		= $this->input->post('office_use_km');
			$data['kilomitter_rate'] 	= $this->input->post('kilomitter_rate');
			$data['journey_date'] 		= $this->input->post('journey_date');

			// $data['journey_cost'] 		= $this->input->post('journey_cost2');

			$data['date']				= date('d-m-Y');
			$data['entry_by']			= $this->uid;

			
			if($this->db->insert('tbl_expense', $data)){
				$message = "Expense Submitted Successfully";
				$this->session->set_flashdata('success', $message);	

				redirect('expense','refresh');
			}else{
				$message = "Something is Wrong. Please Try Again";
				$this->session->set_flashdata('error', $message);	

				redirect($_SERVER['HTTP_REFERER']);
			}

			
		}
    }
}
