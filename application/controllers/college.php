<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class College extends CI_Controller {

    public $uid;
    public $module;
    public $user_type;
    public $division_id;
    public $jonal_id;

    public function __construct() {
	parent::__construct();

	$this->load->model('Commons', 'CM');
	$this->module = 'college';
	$this->uid = $this->session->userdata('uid');
	$this->user_type = $this->session->userdata('user_type');
	$this->division_id = $this->session->userdata('division_id');
	$this->jonal_id = $this->session->userdata('jonal_id');

	/*
	 * Super Admin           == 1
	 * Admin                 == 2
	 * Division User         == 3
	 * Jonal Head            == 4
	 * Marketing Executive   == 5
	 */
    }

    public function index() {
	$this->load->model('college_model');

	if (!$this->CM->checkpermissiontype($this->module, 'index', $this->user_type))
	    redirect('error/accessdeny');


	if ($this->user_type == 5) {
	    $thana_id_array = $this->college_model->get_thana_array($this->uid);
	} else {
	    $thana_id_array = NULL;
	}


	if ($this->user_type == 5) {
	    $no_rows = $this->college_model->getTotalRow($thana_id_array);
	} else {
	    $no_rows = $this->CM->getTotalRow('college');
	}


	$this->load->library('pagination');
	$config['base_url'] = base_url() . 'college/index/';

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

	$data['college_list'] = $this->college_model->get_college_all_list($this->uri->segment(3), $config['per_page'], $thana_id_array);


	$this->load->view('college/index', $data);
    }

    public function add() {

	if (!$this->CM->checkpermissiontype($this->module, 'add', $this->user_type))
	    redirect('error/accessdeny');

	$data['district_list'] = $this->CM->getAll('district', 'name ASC');
	$data['division_list'] = $this->CM->getAll('division', 'name ASC');


	$data['college_category_list'] = array(
	    array('category_name' => ""),
	    array('category_name' => ""),
	    array('category_name' => ""),
	    array('category_name' => ""),
	    array('category_name' => ""),
	    array('category_name' => "")
	);

	$data['name'] = '';
	$data['district_id'] = '';
	$data['thana_id'] = '';
	$data['district_id'] = '';
	$data['division_id'] = '';
	$data['jonal_id'] = '';
	$data['executive_id'] = '';

	$this->load->library('form_validation');


	$this->form_validation->set_rules('name', 'required', 'address');
	if ($this->form_validation->run() == FALSE) {
	    $this->load->view('college/form', $data);
	} else {

		if($this->input->post('name')!='')
	    	$datas['name'] = $this->input->post('name');
	    if($this->input->post('district_id')!='')
	    	$datas['district_id'] = $this->input->post('district_id');
	    if($this->input->post('thana_id')!='')
	    	$datas['thana_id'] = $this->input->post('thana_id');
	    if($this->input->post('division_id')!='')
	    	$datas['division_id'] = $this->input->post('division_id');
	    if($this->input->post('jonal_id')!='')
	    	$datas['jonal_id'] = $this->input->post('jonal_id');
	    if($this->input->post('executive_id')!='')
	    	$datas['executive_id'] = $this->input->post('executive_id');

	    $datas['status'] = 1;

	    $insert = $this->CM->insert('college', $datas);

	    if ($college_id = $this->db->insert_id()) {
		$college_category = $this->input->post('college_category');

		if (count($college_category) > 0) {

		    foreach ($college_category as $key => $value) {
			$category_name = $value;
			$this->CM->insert('tbl_college_category', array('college_id' => $college_id, 'category_name' => $category_name));
		    }
		}
		$msg = "Operation Successfull!!";
		$this->session->set_flashdata('success', $msg);
		redirect('college');
	    } else {
		$msg = "There is an error, Please try again!!";
		$this->session->set_flashdata('error', $msg);
		$this->load->view('college/form', $data);
	    }
	    redirect('college', 'refresh');
	}
    }

    public function edit($id) {
	if (!$this->CM->checkpermissiontype($this->module, 'edit', $this->user_type))
	    redirect('error/accessdeny');

	$content = $this->CM->getInfo('college', $id);
	$data['district_list'] = $this->CM->getAll('district', 'name ASC');
	$data['division_list'] = $this->CM->getAll('division', 'name ASC');
	$data['college_category_list'] = $this->CM->getAllWhere('tbl_college_category', array('college_id' => $id));

	$data['name'] = $content->name;
	$data['district_id'] = $content->district_id;
	$data['thana_id'] = $content->thana_id;
	$data['division_id'] = $content->division_id;
	$data['jonal_id'] = $content->jonal_id;
	$data['executive_id'] = $content->executive_id;



	$this->load->library('form_validation');
	$this->form_validation->set_rules('name', 'required', 'address');
	if ($this->form_validation->run() == FALSE) {
	    $this->load->view('college/form', $data);
	} else {

		if($this->input->post('name')!='')
	    	$datas['name'] = $this->input->post('name');
		

	    if($this->input->post('district_id')!='')
	    	$datas['district_id'] = $this->input->post('district_id');

	    if($this->input->post('thana_id')!='')
	    	$datas['thana_id'] = $this->input->post('thana_id');

	    if($this->input->post('division_id')!='')
	    	$datas['division_id'] = $this->input->post('division_id');
	    
	    if($this->input->post('jonal_id')!='')
	    	$datas['jonal_id'] = $this->input->post('jonal_id');

	    if($this->input->post('executive_id')!='')
	    	$datas['executive_id'] = $this->input->post('executive_id');
	    //$datas['entryby']=$this->session->userdata('uid');      

	    $college_category = $this->input->post('college_category');

	    $this->CM->update('college', $datas, $id);

	    $this->CM->delete("tbl_college_category", array('college_id' => $id));

	    if (count($college_category) > 0) {

		foreach ($college_category as $key => $value) {
		    $category_name = $value;
		    $this->CM->insert('tbl_college_category', array('college_id' => $id, 'category_name' => $category_name));
		}
	    }

	    $msg = "Operation Successfull!!";
	    $this->session->set_flashdata('success', $msg);
	    redirect('college');
	}
    }

    public function delete($id) {
	if (!$this->CM->checkpermissiontype($this->module, 'delete', $this->user_type))
	    redirect('error/accessdeny');

	if ($this->user_type == 1) {
	    $this->CM->delete('college', array('id' => $id));
	} else {
	    $this->CM->delete_db('college', $id);
	}

	$msg = "Operation Successfull!!";
	$this->session->set_flashdata('success', $msg);

	redirect('college');
    }

    public function search() {
	if (!$this->CM->checkpermissiontype($this->module, 'index', $this->user_type))
	    redirect('error/accessdeny');
	$this->load->model('college_model');
	$this->load->helper('text');

	$search = $this->input->post('search');

	if ($this->user_type == 5) {
	    $thana_id_array = $this->college_model->get_thana_array($this->uid);
	} else {
	    $thana_id_array = NULL;
	}

	// echo "<pre>";
	// print_r($thana_id_array);
	// exit();


	$data['college_list'] = $this->college_model->search($thana_id_array, $search);
	$data['search'] = $search;
	// echo "<pre>";
	// print_r($data['college_list']);
	// exit();
	// echo "<pre>";
	// print_r($this->db->last_query());
	// exit();

	$this->load->view('college/search', $data);
    }

}
