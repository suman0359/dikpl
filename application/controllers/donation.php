<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Donation extends MY_Controller {

    public function __construct() {
	parent::__construct();
	$this->uid = $this->session->userdata('uid');
	$this->load->model('custom_model');
	$this->load->model('join_model');
    }

    public function add() {
	
//	if (!$this->CM->checkpermissiontype($this->module, 'add', $this->user_type))
//       redirect('error/accessdeny');

	$data = array();
	$data['college_list'] = $this->CM->getAll('college');
	$data['class_list'] = $this->CM->getAll('tbl_class');

	$data['val'] = "Requisition Submit";
	$data['college_id'] = "";
	$data['teacher_id'] = "";
	$data['department_id'] = "";
	$data['class_id'] = "";
	$data['student_quantity'] = "";
	$data['possible_book'] = "";
	$data['book_id'] = "";
	$data['money_amount'] = "";
	$this->load->library('form_validation');
	$this->form_validation->set_rules('college_id', 'class_id', 'money_amount', 'required');
	if ($this->form_validation->run() == FALSE) {
	    $this->load->view('donation/donation_form', $data);
	} else {
	    $datas = array();
	    $datas['college_id'] = $this->input->post('college_id');
	    $datas['teacher_id'] = $this->input->post('teacher_id');
	    $datas['department_id'] = $this->input->post('department_id');
	    $datas['class_id'] = $this->input->post('class_id');
	    $datas['student_quantity'] = $this->input->post('student_quantity');
	    $datas['possible_book'] = $this->input->post('possible_book');
	    $datas['book_id'] = $this->input->post('book_id');
	    $datas['money_amount'] = $this->input->post('money_amount');

	    $datas['date'] = date('Y-m-d');
	    $datas['division_id'] = $this->session->userdata('division_id');
	    $datas['jonal_id'] = $this->session->userdata('jonal_id');
	    $datas['district_id'] = $this->session->userdata('district_id');
	    $datas['thana_id'] = $this->session->userdata('thana_id');
	    
	    $datas['status'] = 1;

	    $datas['requisition_status'] = 1;
	    $datas['requisition_by'] = $this->uid;
	    $this->db->insert('tbl_donation', $datas);
	    redirect('donation/index');
	}
    }

    public function index() {
//	$data = array();
//	$this->load->model('join_model');
//	$user_role = $this->session->userdata('user_type');
//	$data['user_role'] = $user_role;
//	if ($user_role == 1) {
//	    $data['donation_list'] = $this->join_model->getAllAdminList();
//	} elseif ($user_role != 1) {
//	    $data['donation_list'] = $this->join_model->getAllMpoDonationList($this->uid);
//	}
//	$this->load->view('donation/index', $data);
	
	$this->load->view('requisition/report');
    }

    public function edit($id) {


//	if (!$this->CM->checkpermissiontype($this->module, 'edit', $this->user_type))
//            redirect('error/accessdeny');
//	echo '<pre>';
//	print_r();
//	exit();

	$data = array();
	$data['college_list'] = $this->CM->getAll('college');
	$data['class_list'] = $this->CM->getAll('tbl_class');
	$donation_info = $this->custom_model->get_donation_info('tbl_donation', $id, $this->uid);

	$data['val'] = "Submit Request Donation";
	$data['college_id'] = $donation_info->college_id;
	$data['teacher_id'] = $this->CM->getInfo('teachers', $donation_info->teacher_id);

	$data['department_id'] = $this->CM->getInfo('department', $donation_info->department_id);
	$data['class_id'] = $donation_info->class_id;
	$data['student_quantity'] = $donation_info->student_quantity;
	$data['possible_book'] = $donation_info->possible_book;
	$data['book_id'] = $this->CM->getInfo('books', $donation_info->book_id);
	$data['money_amount'] = $donation_info->money_amount;
	$this->load->library('form_validation');
	$this->form_validation->set_rules('college_id', 'class_id', 'money_amount', 'required');
	if ($this->form_validation->run() == FALSE) {
	    $this->load->view('report/donation', $data);
	} else {
	    $datas = array();
	    $datas['college_id'] = $this->input->post('college_id');
	    $datas['teacher_id'] = $this->input->post('teacher_id');
	    $datas['department_id'] = $this->input->post('department_id');
	    $datas['class_id'] = $this->input->post('class_id');
	    $datas['student_quantity'] = $this->input->post('student_quantity');
	    $datas['possible_book'] = $this->input->post('possible_book');
	    $datas['book_id'] = $this->input->post('book_id');
	    $datas['money_amount'] = $this->input->post('money_amount');

	    $datas['date'] = date('Y-m-d');
	    $datas['division_id'] = $this->session->userdata('division_id');
	    $datas['jonal_id'] = $this->session->userdata('jonal_id');
	    $datas['district_id'] = $this->session->userdata('district_id');
	    $datas['thana_id'] = $this->session->userdata('thana_id');



	    $datas['requisition_by'] = $this->uid;

	    $this->CM->update('tbl_donation', $datas, $id);
	    redirect('donation/index');
//		$msg = "Operation Successfully!!";
//		$this->session->set_flashdata('success', $msg);
//		redirect('donation/index');
	}
    }

    public function delete($id) {

//	if (!$this->CM->checkpermissiontype($this->module, 'delete', $this->user_type))
//	    redirect('error/accessdeny');

	if ($this->CM->delete_db('tbl_donation', $id)) {
	    $msg = "Operation Successfull!!";
	    $this->session->set_flashdata('success', $msg);
	} else {
	    $msg = "There is an error, Please try again!!";
	    $this->session->set_flashdata('error', $msg);
	}
	redirect('donation/index');
    }

    public function search() {
//	if (!$this->CM->checkpermissiontype($this->module, 'index', $this->user_type))
//	    redirect('error/accessdeny');

	$user_role = $this->session->userdata('user_type');
	$data['user_role'] = $user_role;

	$search = $this->input->post('search');

	$data['search'] = $search;
//	print_r($this->uid);
//	exit();
	if ($user_role == 1) {
	    $data['donation_list'] = $this->join_model->get_all_search_donation_info($search);
	} elseif ($user_role != 1) {
	    $data['donation_list'] = $this->join_model->get_all_search_donation_info($search, $this->uid);
	}


	// $data['jonal_list']=$this->CM->search('jonal', $search);


	$this->load->view('donation/search', $data);
    }

    public function donation_requisiton_view($id) {
//	$data['requisition_info'] = $this->CM->getwhere('tbl_requisition', array('id' => $id));
//	// echo "<pre>";
//	// print_r($data['requisition_info']);
//	// exit();
//
//	$data['donation_list'] = $this->RM->getRequisitionDonations($id);
//
//
//	if (empty($id) || empty($data['purchase_info'])) {
//	    //  redirect('report/report_item');
//	}

	$this->load->view('donation_requisition/printpreview', $data);
    }

}

?>