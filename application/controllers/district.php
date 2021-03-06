<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class District extends CI_Controller {

    public $uid;
    public $module;
    public $user_type;

    public function __construct() {
        parent::__construct();

        $this->load->model('Commons', 'CM');
        $this->module = 'district';
        $this->uid = $this->session->userdata('uid');
        $this->user_type = $this->session->userdata('user_type');
    }

    public function index() {
        if (!$this->CM->checkpermissiontype($this->module, 'index', $this->user_type))
            redirect('error/accessdeny');

        $this->load->model('district_model');
        $this->load->model('custom_model');

        $select_rezonal_id = $this->custom_model->get_rezonal_id_for_district();
        
        $rezonal_id = [];
            foreach ($select_rezonal_id as $value) {    
                array_push($rezonal_id, $value['id']);               
            }

        // $rezonal_id = rtrim(implode(',', $rezonal_id), ',');
                
       
        $no_rows = $this->district_model->getTotalRow('district', $rezonal_id);
        $this->load->library('pagination');
        $config['base_url'] = base_url() . 'district/index/';

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

        $data['district_list'] = $this->district_model->get_all_district_info($this->uri->segment(3), $config['per_page'], $rezonal_id);
        $this->load->view('district/index', $data);
    }

    public function add() {
        if (!$this->CM->checkpermissiontype($this->module, 'add', $this->user_type))
            redirect('error/accessdeny');

        $data['subject_user'] = $this->CM->getAllWhere('user', array('user_type' => '3'));
        $data['jonal_list'] = $this->CM->getALL('jonal');


        $data['name'] = "";
        $data['jonal_id']= "";

        //$data['status'] = "";

        $this->load->library('form_validation');

        $this->form_validation->set_rules('name', 'required');
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('district/form', $data);
        } else {

            $datas['name'] = $this->input->post('name');
            $datas['jonal_id'] = $this->input->post('jonal_id');

            $datas['status'] = 1;
            //$datas['entryby']=$this->session->userdata('uid');       


            $insert = $this->CM->insert('district', $datas);
            if ($insert) {
                $msg = "Operation Successfull!!";
                $this->session->set_flashdata('success', $msg);
                redirect('district');
            } else {
                $msg = "There is an error, Please try again!!";
                $this->session->set_flashdata('error', $msg);
                $this->load->view('district/form', $data);
            }
            redirect('district', 'refresh');
        }
    }

    // Edit Subject 
    public function edit($id) {
        if (!$this->CM->checkpermissiontype($this->module, 'edit', $this->user_type))
            redirect('error/accessdeny');

        $content = $this->CM->getInfo('district', $id);
        
        $data['jonal_list'] = $this->CM->getALL('jonal');

        $data['name'] = $content->name;
        $data['jonal_id']= $content->jonal_id;

        $this->load->library('form_validation');
        $this->form_validation->set_rules('name', 'required');
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('district/form', $data);
        } else {
            $datas['name'] = $this->input->post('name');
            $datas['jonal_id'] = $this->input->post('jonal_id');
    
            if ($this->CM->update('district', $datas, $id)) {
                $msg = "Operation Successfull!!";
                $this->session->set_flashdata('success', $msg);
                redirect('district');
            }
        }
    }

    public function delete($id) {
        if (!$this->CM->checkpermissiontype($this->module, 'delete', $this->user_type))
            redirect('error/accessdeny');

        if ($this->CM->delete_db('district', $id)) {
            $msg = "Operation Successfull!!";
            $this->session->set_flashdata('success', $msg);
        } else {
            $msg = "There is an error, Please try again!!";
            $this->session->set_flashdata('error', $msg);
        }

        redirect('district');
    }

}
