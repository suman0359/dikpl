<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of module
 *
 * @author tasfir
 */
class Permission_content extends MY_Controller{
    //put your code here
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
        $data['permission_content_list'] = $this->db->get('permission_content')->result();
        $this->load->view('settings/permission_content/index', $data);
    }
    
    public function add(){
        $data['module_title'] = "";
        $data['module'] = "";
        $data['m_action'] = "";
        $data['submit'] = "Save Module Content";
        
        $this->load->library('form_validation');
        
        $this->form_validation->set_rules('module_title', 'Module Title', 'required');
        $this->form_validation->set_rules('module', 'Module Name', 'required');
        $this->form_validation->set_rules('m_action', 'Module Action', 'required');
        
        if ($this->form_validation->run()==FALSE){
            $this->load->view('settings/permission_content/add_form', $data);
        }else{
            $datas['module_title'] = $this->input->post('module_title');
            $datas['module'] = $this->input->post('module');
            $datas['m_action'] = $this->input->post('m_action');
            
            $this->db->insert('permission_content', $datas);
            
            $msg = "Successfully Create New Permissino Module";
            $this->session->set_flashdata('success', $msg);
            redirect('settings/permission_content/index');
        }
    }
    
    public function edit($id){
        $role_info= $this->CM->getInfo('permission_content', $id);
        
        $data['module_title'] = $role_info->module_title;
        $data['module'] = $role_info->module;
        $data['m_action'] = $role_info->m_action;
        $data['submit'] = "Update Module Content";
        
        $this->load->library('form_validation');
        
        $this->form_validation->set_rules('module_title', 'Module Title', 'required');
        $this->form_validation->set_rules('module', 'Module Name', 'required');
        $this->form_validation->set_rules('m_action', 'Module Action', 'required');
        
        if ($this->form_validation->run()==FALSE){
            $this->load->view('settings/permission_content/add_form', $data);
        }else{
            $datas['module_title'] = $this->input->post('module_title');
            $datas['module'] = $this->input->post('module');
            $datas['m_action'] = $this->input->post('m_action');
            
            $this->CM->update('permission_content', $datas, $id);
            
            $msg = "Successfully Updated Selected Permission Module";
            $this->session->set_flashdata('success', $msg);
            redirect('settings/permission_content/index');
        }
    }
    
    public function delete($id) {
        $this->CM->delete('permission_content', array('id' => $id));
            
        $msg = "Successfully Delete Selected Permission Module";
        $this->session->set_flashdata('success', $msg);
        redirect('settings/permission_content/index');
    }
}
