<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Report extends MY_Controller {

    public $uid;
    public $module;
    public $user_type;

    public function __construct() {
	parent::__construct();
	$this->checklogin();
	$this->module = 'report';
	$this->uid = $this->session->userdata('uid');
	$this->user_type = $this->session->userdata('user_type');
	$this->load->Model('Report_model', 'RM');
    }

    public function index() {
	$this->load->view('report/index');
    }

    public function divisioninventory($div_id = 1) {

	if (!$this->CM->checkpermissiontype($this->module, 'divisioninventory', $this->user_type))
	    redirect('error/accessdeny');

	if ($this->session->userdata('user_type') == '3') {
	    $div_id = $this->session->userdata('division_id');
	    $data['div_list'] = array();
	} else {
	    $data['div_list'] = $this->CM->getAll('division');
	}

	$data['division_info'] = $this->CM->getInfo('division', $div_id);

	$no_rows = count($this->CM->getAllWhere('inventory_division', array('division_id' => $div_id)));
	$this->load->library('pagination');
	$config['base_url'] = base_url() . 'divisioninventory/index/' . $div_id . "/";

	$config['total_rows'] = $no_rows;
	$config['per_page'] = 15;
	$config['full_tag_open'] = '<div class=" text-center"><ul class=" list-inline list-unstyled " id="listpagiction">';
	$config['full_tag_close'] = '</ul></div>';
	$config['prev_link'] = '&lt; Prev';
	$config['prev_tag_open'] = '<li class="link_pagination">';
	$config['prev_tag_close'] = '</li>';
	$config['next_link'] = 'Next &gt;';
	$config['next_tag_open'] = '<li class="link_pagination">';
	$config['next_tag_close'] = '</li>';
	$config['cur_tag_open'] = '<li class="active_pagiction"><a href="#">';
	$config['cur_tag_close'] = '</a></li>';
	$config['num_tag_open'] = '<li class="link_pagination">';
	$config['num_tag_close'] = '</li>';
	$config['last_link'] = 'Last';
	$config['first_link'] = 'First';
	$this->pagination->initialize($config);

	$data['content_list'] = $this->CM->getAllWhere('inventory_division', array('division_id' => $div_id), $this->uri->segment(4), $config['per_page']);

	$this->load->view('report/divisioninventory', $data);
    }

    public function jonalinventory($jid = 1) {

	if (!$this->CM->checkpermission($this->module, 'jonalinventory', $this->uid))
	    redirect('error/accessdeny');


	if ($this->session->userdata('user_type') == '5') {
	    $jid = $this->session->userdata('jonal_id');
	    $data['jone_list'] = array();
	    $data['div_list'] = array();
	} else if ($this->session->userdata('user_type') == '1' OR $this->session->userdata('user_type') == '2') {
	    $data['div_list'] = $this->CM->getAll('division');
	    $data['jone_list'] = 'select ';
	} else if ($this->session->userdata('user_type') == '3') {
	    $did = $this->session->userdata('division_id');
	    $data['jone_list'] = $this->CM->getAllWhere('jonal', array('div_id' => $did));
	}


	$data['jonal_info'] = $this->CM->getInfo('jonal', $jid);

	$no_rows = count($this->CM->getAllWhere('inventory_jonal', array('jonal_id' => $jid)));
	$this->load->library('pagination');
	$config['base_url'] = base_url() . 'report/jonalinventory/index/' . $jid . "/";

	$config['total_rows'] = $no_rows;
	$config['per_page'] = 50;
	$config['full_tag_open'] = '<div class=" text-center"><ul class=" list-inline list-unstyled " id="listpagiction">';
	$config['full_tag_close'] = '</ul></div>';
	$config['prev_link'] = '&lt; Prev';
	$config['prev_tag_open'] = '<li class="link_pagination">';
	$config['prev_tag_close'] = '</li>';
	$config['next_link'] = 'Next &gt;';
	$config['next_tag_open'] = '<li class="link_pagination">';
	$config['next_tag_close'] = '</li>';
	$config['cur_tag_open'] = '<li class="active_pagiction"><a href="#">';
	$config['cur_tag_close'] = '</a></li>';
	$config['num_tag_open'] = '<li class="link_pagination">';
	$config['num_tag_close'] = '</li>';
	$config['last_link'] = 'Last';
	$config['first_link'] = 'First';
	$this->pagination->initialize($config);

	$data['content_list'] = $this->CM->getAllWhere('inventory_jonal', array('jonal_id' => $jid), $this->uri->segment(4), $config['per_page']);

	$this->load->view('report/jonalinventory', $data);
    }

    public function collegeinventory($cid = 1) {

	if (!$this->CM->checkpermissiontype($this->module, 'collegeinventory', $this->user_type))
	    redirect('error/accessdeny');


	if ($this->session->userdata('user_type') == '5') {
	    $jid = $this->session->userdata('jonal_id');
	    $data['jone_list'] = array();
	    $data['div_list'] = array();
	} else if ($this->session->userdata('user_type') == '1' OR $this->session->userdata('user_type') == '2') {
	    $data['div_list'] = $this->CM->getAll('division');
	    $data['jone_list'] = 'select ';
	} else if ($this->session->userdata('user_type') == '3') {
	    $did = $this->session->userdata('division_id');
	    $data['jone_list'] = $this->CM->getAllWhere('jonal', array('div_id' => $did));
	}


	$data['college_info'] = $this->CM->getInfo('college', $cid);

	$no_rows = count($this->CM->getAllWhere('inventory_college', array('college_id' => $cid)));
	$this->load->library('pagination');
	$config['base_url'] = base_url() . 'report/collegeinventory/index/' . $cid . "/";

	$config['total_rows'] = $no_rows;
	$config['per_page'] = 50;
	$config['full_tag_open'] = '<div class=" text-center"><ul class=" list-inline list-unstyled " id="listpagiction">';
	$config['full_tag_close'] = '</ul></div>';
	$config['prev_link'] = '&lt; Prev';
	$config['prev_tag_open'] = '<li class="link_pagination">';
	$config['prev_tag_close'] = '</li>';
	$config['next_link'] = 'Next &gt;';
	$config['next_tag_open'] = '<li class="link_pagination">';
	$config['next_tag_close'] = '</li>';
	$config['cur_tag_open'] = '<li class="active_pagiction"><a href="#">';
	$config['cur_tag_close'] = '</a></li>';
	$config['num_tag_open'] = '<li class="link_pagination">';
	$config['num_tag_close'] = '</li>';
	$config['last_link'] = 'Last';
	$config['first_link'] = 'First';
	$this->pagination->initialize($config);

	$data['content_list'] = $this->CM->getAllWhere('inventory_college', array('college_id' => $cid), $this->uri->segment(4), $config['per_page']);

	$this->load->view('report/collegeinventory', $data);
    }

    public function requisition() {
	if (!$this->CM->checkpermissiontype($this->module, 'requisition', $this->user_type))
	    redirect('error/accessdeny');
	$data['division_list'] = $this->CM->getAllWhere('division', array('status' => '1'));
//        $data['mpo_list'] = $this->CM->getAllWhere('user', array('user_type' => '5'));
	$start_date = $this->input->post('start_date');
	$end_date = $this->input->post('end_date');
	$data['sdate'] = date("Y-m-d");
	$data['edate'] = date("Y-m-d");

	$data['content_list'] = array();
	$data['division_info'] = array();

	if ($this->input->post()) {
	    $data['start_date'] = $this->input->post('start_date');
	    $data['end_date'] = $this->input->post('end_date');
	}

	$query_data = array();
	$admin = NULL;
	$divisionHead = NULL;
	$jonalHead = NULL;
	$marketingExecutive = NULL;
	$startDate = NULL;
	$endDate = NULL;

	if ($this->input->post('admin') != '') {
	    $admin = $query_data['admin'] = $this->input->post('admin');
	}
	if ($this->input->post('divisionHead') != '') {
	    $divisionHead = $query_data['divisionHead'] = $this->input->post('divisionHead');
	}
	if ($this->input->post('jonalHead') != '') {
	    $jonalHead = $query_data['jonalHead'] = $this->input->post('jonalHead');
	}
	if ($this->input->post('marketingExecutive') != '') {
	    $marketingExecutive = $query_data['marketingExecutive'] = $this->input->post('marketingExecutive');
	}
	if ($this->input->post('startDate') != '') {
	    $startDate = $query_data['startDate'] = $this->input->post('startDate');
	}
	if ($this->input->post('endDate') != '') {
	    $endDate = $query_data['endDate'] = $this->input->post('endDate');
	}
//        $sub_data['requisition'] = $this->RM->getRequisitionReportForMPO($admin, $divisionHead, $jonalHead, $marketingExecutive, $startDate, $endDate);

	if ($start_date == '') {
	    $start_date = date("Y-m-d");
	}
	if ($end_date == '') {
	    $end_date = date("Y-m-d");
	}
	$requisition_by = $this->uid;
	if ($this->uid == 1) {
	    $requisition_by = NULL;
	}
	$data['report_details'] = $this->RM->getRequisitionReportForMPO($start_date, $end_date, $requisition_by);


	$this->load->view('report/requisition', $data);
    }

    public function donation() {
	$data = array();
	$this->load->model('join_model');
	$user_role = $this->session->userdata('user_type');
	$data['user_role'] = $user_role;
	if($user_role==1){
	    $data['donation_list'] = $this->join_model->getAllAdminList();
	}elseif ($user_role!=1) {
	    $data['donation_list'] = $this->join_model->getAllMpoDonationList($this->uid);
	}
	    
	$this->load->view('donation/index', $data);
    }

    public function jonaltransfer() {

	if (!$this->CM->checkpermissiontype($this->module, 'jonaltransfer', $this->user_type))
	    redirect('error/accessdeny');

	$data['sdate'] = date("Y-m-d");
	$data['edate'] = date("Y-m-d");
	$data['did'] = 'all';
	$data['jid'] = 'all';
	$data['content_list'] = array();
	$data['division_info'] = array();
	$data['div_list'] = $this->CM->getAll('division');

	if ($this->input->post()) {
	    $data['sdate'] = $this->input->post('sdate');
	    $data['edate'] = $this->input->post('edate');
	    $data['did'] = $this->input->post('did');
	    $data['jid'] = $this->input->post('jid');
	}
	if ($data['did'] == 'all') {
	    $did = NULL;
	} else {
	    $did = $data['did'];
	    $data['division_info'] = $this->CM->getInfo('division', $did);
	};


	if ($data['jid'] == 'all') {
	    $jid = NULL;
	} else {
	    $jid = $data['jid'];
	    $data['jonal_info'] = $this->CM->getInfo('jonal', $jid);
	};


	$data['content_list'] = $this->RM->jonaltransferReport($data['sdate'], $data['edate'], $jid);


	$this->load->view('report/jonaltransfer', $data);
    }

    public function distribute() {
	if (!$this->CM->checkpermissiontype($this->module, 'distribute', $this->user_type))
	    redirect('error/accessdeny');

	$data['sdate'] = date("Y-m-d");
	$data['edate'] = date("Y-m-d");
	$data['did'] = 'all';
	$data['jid'] = 'all';
	$data['cid'] = 'all';
	$data['content_list'] = array();
	$data['division_info'] = array();
	$data['div_list'] = $this->CM->getAll('division');

	if ($this->input->post()) {
	    $data['sdate'] = $this->input->post('sdate');
	    $data['edate'] = $this->input->post('edate');
	    $data['did'] = $this->input->post('did');
	    $data['jid'] = $this->input->post('jid');
	    $data['cid'] = $this->input->post('cid');
	}

	if ($data['did'] == 'all') {
	    $did = NULL;
	} else {
	    $did = $data['did'];
	    $data['division_info'] = $this->CM->getInfo('division', $did);
	};


	if ($data['jid'] == 'all') {
	    $jid = NULL;
	} else {
	    $jid = $data['jid'];
	    $data['jonal_info'] = $this->CM->getInfo('jonal', $jid);
	};

	if ($data['cid'] == 'all') {
	    $cid = NULL;
	} else {
	    $cid = $data['cid'];
	    $data['college_info'] = $this->CM->getInfo('college', $cid);
	};


	$data['content_list'] = $this->RM->distributeReport($data['sdate'], $data['edate'], $cid);

//        echo '<pre>';
//        print_r($data);
//        exit();

	$this->load->view('report/distribute', $data);
    }

}
