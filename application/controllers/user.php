<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class User extends MY_Controller {

    public $uid;
    public $module;
    

    public function __construct() {
        parent::__construct();
        $this->checklogin();

        $this->load->model('user_model');
        $this->module = 'user';
        $this->uid = $this->session->userdata('uid');
        $this->user_type = $this->session->userdata('user_type');
    }

    public function index() {
        $this->user_model->select_all_user();
        if (!$this->CM->checkpermissiontype($this->module, 'index', $this->user_type))
            redirect('error/accessdeny');

        $no_rows = count($this->CM->getAllWhere('user', array('user_type !=' => '5')));
        $this->load->library('pagination');
        $config['base_url'] = base_url() . 'user/index/';

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

        // $data['user_list'] = $this->CM->getAllWhere('user', array('user_type !=' => '5'), $this->uri->segment(3), $config['per_page']);

        $data['user_list'] = $this->user_model->select_all_user();

        $this->load->view('user/index', $data);
    }

    public function add() {
        if (!$this->CM->checkpermissiontype($this->module, 'add', $this->user_type))
            redirect('error/accessdeny');

        $data['id'] = $this->CM->getMaxID('user');
        $data['department_list'] = $this->CM->getAll('division');
        $data['user_type']="";
        $data['user_role_list'] = $this->CM->getAll('tbl_user_role');

        $data['name'] = "";
        $data['phone'] = "";
        $data['image'] = "";
        $data['address'] = "";
        $data['email'] = "";
        $data['password'] = "";
        $data['pdepartment'] = "";
        $data['division_id'] = "";


        $this->load->library('form_validation');
        $this->load->helper('security');
        // $this->form_validation->set_rules('phone', 'name', 'email', 'required');
        $this->form_validation->set_rules('email', 'Email', 'trim|required|xss_clean|valid_email|callback_email_check');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('user/form', $data);
        } else {

            $datas['name'] = $this->input->post('name');
            $datas['phone'] = $this->input->post('phone');
            $datas['address'] = $this->input->post('address');
            $datas['email'] = $this->input->post('email');
            $datas['password'] = md5($this->input->post('password'));
            $datas['user_type'] = $this->input->post('user_type');
            $datas['pdepartment'] = $this->input->post('pdepartment');
            $datas['division_id'] = $this->input->post('division_id');
            $datas['status'] = 1;
            $datas['entryby'] = $this->session->userdata('uid');


            $config['upload_path'] = './uploads/';
            $config['allowed_types'] = 'gif|jpg|png';


            $this->load->library('upload', $config);

            if (!$this->upload->do_upload('image')) {
                $error = $this->upload->display_errors();
            } else {
                $data = $this->upload->data();
                $datas['image'] = $data['file_name'];
            }

//            echo '<pre>';
//            print_r($datas);
//            exit();

            $insert = $this->CM->insert('user', $datas);
            if ($insert) {
                $msg = "Operation Successfull!!";
                $this->session->set_flashdata('success', $msg);
                redirect('user');
            } else {
                $msg = "There is an error, Please try again!!";
                $this->session->set_flashdata('error', $msg);
                $this->load->view('user/form', $data);
            }
            redirect('user', 'refresh');
        }
    }

    public function edit($id) {
        if (!$this->CM->checkpermissiontype($this->module, 'edit', $this->user_type))
            redirect('error/accessdeny');

        $content = $this->CM->getInfo('user', $id);
        $data['division_list'] = $this->CM->getAll('division');
        $data['user_role_list'] = $this->CM->getAll('tbl_user_role');

        $data['name'] = $content->name;
        $data['address'] = $content->address;
        $data['phone'] = $content->phone;
        $data['email'] = $content->email;
        $data['image'] = $content->image;
        $data['user_type'] = $content->user_type;
        $data['pdepartment'] = $content->pdepartment;
        $data['division_id'] = $content->pdepartment;
        $data['jonal_id'] = $content->jonal_id;

        $password = $content->password;
        $data['user_type'] = $content->user_type;


        $this->load->library('form_validation');
        // $this->form_validation->set_rules('email', 'password', 'required');
         $this->form_validation->set_rules('email', 'Email', 'trim|required|xss_clean|valid_email|callback_email_check');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('user/eform', $data);
        } else {
            $datas['name'] = $this->input->post('name');
            $datas['phone'] = $this->input->post('phone');
            $datas['address'] = $this->input->post('address');
            $datas['email'] = $this->input->post('email');
            $datas['user_type'] = $this->input->post('user_type');
            $datas['pdepartment'] = $this->input->post('pdepartment');
            $datas['division_id'] = $this->input->post('pdepartment');
            $datas['jonal_id'] = $this->input->post('jonal_id');
            $datas['entryby'] = $this->session->userdata('uid');

            if ($this->input->post('password') != "") {
                $datas['password'] = md5($this->input->post('password'));
            }
            //$datas['status'] = $this->input->post('status'); 

            $config['upload_path'] = './uploads/';
            $config['allowed_types'] = 'gif|jpg|png';


            $this->load->library('upload', $config);

            if (!$this->upload->do_upload('image')) {
                $error = $this->upload->display_errors();
                $imgchk = 0;
            } else {
                $data = $this->upload->data();
                $datas['image'] = $data['file_name'];
                $imgchk = 1;
            }
            if ($this->CM->update('user', $datas, $id)) {
                if ($imgchk == 1 && $content->image !== "") {
                    $path = "./uploads/" . $content->image;
                    if (file_exists($path)) {
                        unlink($path) or die('failed deleting: ' . $path);
                    } else {
                        echo "error path";
                    }
                }


                $msg = "Operation Successfull!!";
                $this->session->set_flashdata('success', $msg);
                redirect('user');
            } else {
                $msg = "There is an error, Please try again!!";
                $this->session->set_flashdata('error', $msg);
                $this->load->view('user/eform', $data);
            }
        }
    }

    public function delete($id) {
        
        if (!$this->CM->checkpermissiontype($this->module, 'delete', $this->user_type))
            redirect('error/accessdeny');
        
        if ($this->user_type==1) {
            $this->CM->delete('user', array('id' => $id));
        }else{
            $this->CM->delete_db('user', $id);
        }

        $msg = "Operation Successfull!!";
        $this->session->set_flashdata('success', $msg);

        redirect('user');
    }

    public function password($id) {
        if (empty($this->uid))
            redirect('userauth/login');

        $data['user_info'] = $this->CM->getInfo('user', $id);

        $this->load->library('form_validation');
        $this->form_validation->set_rules('password', 'required');
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('user/eform_pas', $data);
        } else {
            if ($this->input->post('password') !== "") {
                $datas['password'] = md5($this->input->post('password'));
            }

            if ($this->CM->update('user', $datas, $id)) {
                $msg = "Operation Successfull!!";
                $this->session->set_flashdata('success', $msg);
                $this->load->view('user/profile', $data);
            } else {
                $msg = "There is an error, Please try again!!";
                $this->session->set_flashdata('error', $msg);
                $this->load->view('user/profile', $data);
            }
        }
    }

    public function profile($id) {
        if (empty($this->uid))
            redirect('userauth/login');

        $data['user_info'] = $this->CM->getInfo('user', $id);
        $this->load->view('user/profile', $data);
    }

    public function update($id) {
        if (empty($this->uid))
            redirect('userauth/login');

        $user_info = $data['user_info'] = $this->CM->getInfo('user', $id);
        $this->load->view('user/update', $data);
    }

    public function permission($user_type) {
        if (!$this->CM->checkpermissiontype($this->module, 'permission', $this->user_type))
            redirect('error/accessdeny');

        $data['plist'] = $this->CM->getAll('permission_content');
        $data['user_type'] = $user_type;
        $data['status'] = 1;

        $this->load->view('permission/index', $data);
    }

    public function permissionset() {

        $module = $this->input->post('module_name');

        $tm = count($module);
        $datas['uid'] = $this->input->post('uid');
        $uid = $this->input->post('uid');
        $datas['user_type'] = $this->input->post('user_type');
        $user_type = $this->input->post('user_type');


        $this->CM->delete('user_permission', array('user_type' => $user_type));
        //$this->CM->delete('user_permission', array('uid' => $uid));
        for ($i = 0; $i < $tm; $i++) {
            $mod = $module[$i];
            $mact = $this->input->post($mod . "_fname");

            $act = serialize($mact);
            $datas['module'] = $mod;
            $datas['m_action'] = $act;
            $datas['status'] = 1;
            $datas['entryby'] = $this->session->userdata('uid');
            $datas['user_type']=$user_type;
            $this->CM->insert("user_permission", $datas);
        }

        redirect('settings/user_role/index');
    }

    /* Callback function */
    
   

    function email_check($email){
        $this->load->model('userauth_model');

        $result = $this->userauth_model->check_email($email);
        if ( ! $result)
        {
            $this->form_validation->set_message('email_check', 'Email is already used by another user. Please choose another email address.');
        }
                
        return $result;
    }

}
