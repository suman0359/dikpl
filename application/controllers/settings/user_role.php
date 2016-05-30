<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of user_role
 *
 * @author tasfir
 */
class User_role extends MY_Controller{
    
    public function __construct() {
        parent::__construct();
        
        $this->module = 'user_role';
        $this->uid = $this->session->userdata('uid');
        $this->user_type = $this->session->userdata('user_type');

        if($this->user_type!=1){
            $msg = "Sorry You don't have permission to access this module";
            $this->session->set_flashdata('error', $msg);
            redirect('home/dashboard');
        }
    }
    
    public function index(){
        $data['user_role_list'] = $this->db->get('tbl_user_role')->result();
        $this->load->view('settings/user_role/index', $data);
    }
    
    public function add(){
        $data['role_name'] = "";
        $data['name'] = "";
        $data['value'] = "";
        $data['submit'] = "Save Role";
        
        $this->load->library('form_validation');
        
        $this->form_validation->set_rules('role_name', 'Role Name', 'required');
        $this->form_validation->set_rules('name', 'Name', 'required');
        
        if ($this->form_validation->run()==FALSE){
            $this->load->view('settings/user_role/add_form', $data);
        }else{
            $datas['role_name'] = $this->input->post('role_name');
            $datas['name'] = $this->input->post('name');
            $datas['value'] = $this->input->post('value');
            
            $this->db->insert('tbl_user_role', $datas);
            
            $msg = "Successfully Create New User Role";
            $this->session->set_flashdata('success', $msg);
            redirect('settings/user_role/index');
        }
    }
    
    public function edit($id){
        $role_info= $this->CM->getInfo('tbl_user_role', $id);
        
        $data['role_name'] = $role_info->role_name;
        $data['name'] = $role_info->name;
        $data['value'] = $role_info->value;
        $data['submit'] = "Update Role";
        
        $this->load->library('form_validation');
        
        $this->form_validation->set_rules('role_name', 'Role Name', 'required');
        $this->form_validation->set_rules('name', 'Name', 'required');
        $this->form_validation->set_rules('value', 'Role Value', 'required');
        
        if ($this->form_validation->run()==FALSE){
            $this->load->view('settings/user_role/add_form', $data);
        }else{
            $datas['role_name'] = $this->input->post('role_name');
            $datas['name'] = $this->input->post('name');
            $datas['value'] = $this->input->post('value');
            
            $this->CM->update('tbl_user_role', $datas, $id);
            
            $msg = "Successfully Updated Selected User Role";
            $this->session->set_flashdata('success', $msg);
            redirect('settings/user_role/index');
        }
    }
    
    public function delete($id) {
        $this->CM->delete('tbl_user_role', array('id' => $id));
            
        $msg = "Successfully Delete Selected User Role";
        $this->session->set_flashdata('success', $msg);
        redirect('settings/user_role/index');
    }
}
