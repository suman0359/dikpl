<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Teachers extends CI_Controller {

    public $uid;
    public $user_type;
    public $module;

    public function __construct() {
        parent::__construct();

        $this->load->model('Commons', 'CM');
        $this->module = 'teachers';
        $this->uid = $this->session->userdata('uid');
        $this->user_type = $this->session->userdata('user_type');
        
        
    }

    public function index(){
        if (!$this->CM->checkpermissiontype($this->module, 'index', $this->user_type))
            redirect('error/accessdeny');
        $this->load->model('teacher_model');

        if($this->user_type==5) {
            $thana_id_array = $this->teacher_model->get_thana_array($this->uid);
        }else{
            $thana_id_array=NULL;
        }

        $college_id_array=$this->teacher_model->get_college_array($thana_id_array);
        

        if($this->user_type==5){
            $no_rows = $this->teacher_model->getTotalRow($college_id_array);
        }else{
            $no_rows= $this->CM->getTotalRow('teachers');
        }

        // $data['teachers_list'] = $this->CM->getTotalALL('teachers');


        $this->load->library('pagination');
        $config['base_url'] = base_url() . 'teachers/index/';

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

        $data['teachers_list']=$this->teacher_model->get_teacher_all_list_by_college($this->uri->segment(3), $config['per_page'], $college_id_array);

        $this->load->view('teachers/index', $data);
    }

    public function add() {
       if (!$this->CM->checkpermissiontype($this->module, 'add', $this->user_type))
            redirect('error/accessdeny');

       
        $data['department_list'] = $this->CM->getAll('department', 'name ASC');
        $data['college_list'] = $this->CM->getAll('college', 'name ASC');
	$data['district_list']=$this->CM->getAll('district', 'name ASC' );


        $data['name'] = "";
        $data['designation'] = "";
        $data['phone'] = "";
        $data['department_id'] = "";
        $data['college_id'] = "";
	$data['district_id'] = "";
	$data['thana_id'] = "";

        $this->load->library('form_validation');


        $this->form_validation->set_rules('name', 'required', 'address', 'college_id', 'department_id', 'district_id', 'thana_id');
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('teachers/form', $data);
        } else {

            $datas['name'] = $this->input->post('name');
            $datas['designation'] = $this->input->post('designation');
            $datas['phone'] = $this->input->post('phone');
            $datas['college_id'] = $this->input->post('college_id');
            $datas['dep_id'] = $this->input->post('department_id');
            $datas['address'] = $this->input->post('address');
	    $datas['district_id'] = $this->input->post('district_id');
	    $datas['thana_id'] = $this->input->post('thana_id');

            $datas['status'] = 1;
            //$datas['entryby']=$this->session->userdata('uid');       


            $insert = $this->CM->insert('teachers', $datas);
            if ($insert) {
                $msg = "Operation Successfull!!";
                $this->session->set_flashdata('success', $msg);
                redirect('teachers');
            } else {
                $msg = "There is an error, Please try again!!";
                $this->session->set_flashdata('error', $msg);
                $this->load->view('college/form', $data);
            }
            redirect('teachers', 'refresh');
        }
    }

    public function edit($id) {
        if (!$this->CM->checkpermissiontype($this->module, 'edit', $this->user_type))
            redirect('error/accessdeny');

        $content = $this->CM->getInfo('teachers', $id);
        $data['department_list'] = $this->CM->getAll('department', 'name', 'ASC');
        $data['college_list'] = $this->CM->getAll('college', 'name', 'ASC');
	$data['district_list']=$this->CM->getAll('district', 'name ASC');

        $data['name'] = $content->name;
        $data['designation'] = $content->designation;
        $data['phone'] = $content->phone;
        $data['address'] = $content->address;
        $data['college_id'] = $content->college_id;
        $data['department_id'] = $content->dep_id;
	$data['district_id'] = $content->district_id;
        $data['thana_id'] = $content->thana_id;
        //$data['status'] = $content->status;
        // $data['_id'] = $content->district_id;


        $this->load->library('form_validation');
        $this->form_validation->set_rules('name', 'required', 'address', 'college_id', 'department_id');
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('teachers/form', $data);
        } else {
            $datas['name'] = $this->input->post('name');
            $datas['designation'] = $this->input->post('designation');
            $datas['phone'] = $this->input->post('phone');
            $datas['college_id'] = $this->input->post('college_id');
            $datas['dep_id'] = $this->input->post('department_id');
            $datas['address'] = $this->input->post('address');
	    $datas['district_id'] = $this->input->post('district_id');
            $datas['thana_id'] = $this->input->post('thana_id');
            //$datas['status'] = $this->input->post('status');
            //$datas['entryby']=$this->session->userdata('uid');       

            if ($this->CM->update('teachers', $datas, $id)) {
                $msg = "Operation Successfull!!";
                $this->session->set_flashdata('success', $msg);
                redirect('teachers');
            }
        }
    }

    public function getteacherbycollage($collage) {
        $teachers_list = $this->CM->getAllWhere('teachers', array('college_id' => $collage));

        echo json_encode($teachers_list);
    }
    
    public function search(){
        if (!$this->CM->checkpermissiontype($this->module, 'index', $this->user_type))
            redirect('error/accessdeny');

        $search = $this->input->post('search');

        $this->load->model('teacher_model');

        if($this->user_type==5) {
            $thana_id_array = $this->teacher_model->get_thana_array($this->uid);
        }else{
            $thana_id_array=NULL;
        }

        $college_id_array=$this->teacher_model->get_college_array($thana_id_array);
            
        $data['teachers_list']=$this->teacher_model->search($college_id_array, $search);

        $data['search'] = $search;
        
        $this->load->view('teachers/search', $data);
    }

    public function delete($id) {
        if (!$this->CM->checkpermissiontype($this->module, 'delete', $this->user_type))
            redirect('error/accessdeny');
	
	if ($this->user_type==1) {
            $this->CM->delete('teachers', array('id' => $id));
	    
        }else{
            $this->CM->delete_db('teachers', $id);
        } 
	
	$msg = "Operation Successfull!!";
        $this->session->set_flashdata('success', $msg);

        redirect('teachers');
    }

}
