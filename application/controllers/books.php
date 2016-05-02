<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Books extends CI_Controller {

    public $uid;
    public $module;
    public $user_type;

    public function __construct() {
        parent::__construct();

        $this->load->model('Commons', 'CM');
        $this->module = 'books';
        $this->uid = $this->session->userdata('uid');
        $this->user_type = $this->session->userdata('user_type');
    }

    public function index() {
        if (!$this->CM->checkpermissiontype($this->module, 'index', $this->user_type))
            redirect('error/accessdeny');
        $this->load->model('join_model');
        $data['books_list'] = $this->join_model->select_all_books($from = NULL, $limit = NULL);


        $no_rows = $this->CM->getTotalRow('books');
        $this->load->library('pagination');
        $config['base_url'] = base_url() . 'books/index/';

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

        $data['books_list'] = $this->join_model->select_all_books($this->uri->segment(3), $config['per_page']);
        // $data['books_list'] = $this->CM->getTotalALL('books', $this->uri->segment(3), $config['per_page']);
        $this->load->view('books/index', $data);
    }

    public function add() {
        if (!$this->CM->checkpermissiontype($this->module, 'add', $this->user_type))
            redirect('error/accessdeny');

        $data['class_list'] = $this->CM->getAll('tbl_class', 'name ASC');
        $data['subject_list'] = $this->CM->getAll('tbl_subject', 'name ASC');
        $data['department_list'] = $this->CM->getAll('department', 'name ASC');

        $data['book_name'] = "";
        $data['writter_name'] = "";
        $data['subject_id'] = "";
        $data['class_id'] = "";
        $data['department_id'] = "";
        $data['company_id'] = "";
        $data['regular_price'] = "";
        $data['sell_price'] = "";


        $this->load->library('form_validation');


        $this->form_validation->set_rules('name', 'required', 'address');
        $this->form_validation->set_rules('subject_name', 'required', 'address');
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('books/form', $data);
        } else {

            $datas['book_name']             = $this->input->post('book_name');
            $datas['writter_name']          = $this->input->post('writter_name');
            $datas['subject_id']            = $this->input->post('subject_id');
            $datas['class_id']              = $this->input->post('class_id');
            $datas['department_id']         = $this->input->post('department_id');
            $datas['company_id']            = $this->input->post('company_id');
            $datas['regular_price']         = $this->input->post('regular_price');
            $datas['sell_price']            = $this->input->post('sell_price');

            $datas['status'] = 1;

            $insert = $this->CM->insert('books', $datas);
            if ($insert) {
                $msg = "Operation Successfull!!";
                $this->session->set_flashdata('success', $msg);
                redirect('books');
            } else {
                $msg = "There is an error, Please try again!!";
                $this->session->set_flashdata('error', $msg);
                $this->load->view('college/form', $data);
            }
            redirect('books', 'refresh');
        }
    }

    public function edit($id) {
        if (!$this->CM->checkpermissiontype($this->module, 'edit', $this->user_type))
            redirect('error/accessdeny');

        $content = $this->CM->getInfo('books', $id);
        $data['class_list'] = $this->CM->getAll('tbl_class', 'name ASC');
        $data['subject_list'] = $this->CM->getAll('tbl_subject', 'name ASC');
        $data['department_list'] = $this->CM->getAll('department', 'name ASC');

        $data['book_name'] = $content->book_name;
        $data['writter_name'] = $content->writter_name;
        $data['class_id'] = $content->class_id;
        $data['department_id'] = $content->department_id;
        $data['company_id'] = $content->company_id;
        $data['subject_id'] = $content->subject_id;
        $data['regular_price'] = $content->regular_price;
        $data['sell_price'] = $content->sell_price;
        //$data['status'] = $content->status;

        $this->load->library('form_validation');
        $this->form_validation->set_rules('name', 'required', 'address');
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('books/form', $data);
        } else {
            $datas['book_name']         = $this->input->post('book_name');
            $datas['writter_name']      = $this->input->post('writter_name');
            $datas['subject_id']        = $this->input->post('subject_id');
            $datas['class_id']          = $this->input->post('class_id');
            $datas['department_id']     = $this->input->post('department_id');
            $datas['company_id']        = $this->input->post('company_id');
            $datas['regular_price']     = $this->input->post('regular_price');    
            $datas['sell_price']        = $this->input->post('sell_price');    

            if ($this->CM->update('books', $datas, $id)) {
                $msg = "Operation Successfull!!";
                $this->session->set_flashdata('success', $msg);
                redirect('books');
            }
        }
    }

    public function delete($id) {
        if (!$this->CM->checkpermissiontype($this->module, 'delete', $this->user_type))
            redirect('error/accessdeny');

        if ($this->CM->delete_db('books', $id)) {
            $msg = "Operation Successfull!!";
            $this->session->set_flashdata('success', $msg);
        } else {
            $msg = "There is an error, Please try again!!";
            $this->session->set_flashdata('error', $msg);
        }

        redirect('books');
    }

}
