<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of permission
 *
 * @author tasfir
 */
class Permission extends MY_Controller{
    
    public $uid;
    public $module;
    public $user_type;

    public function __construct() {
        parent::__construct();
        $this->checklogin();

        $this->load->model('Commons', 'CM');
        $this->module = 'user';
        $this->uid = $this->session->userdata('uid');
        $this->user_type = $this->session->userdata('user_type');

        if($this->user_type!=1){
            $msg = "Sorry You don't have permission to access this module";
            $this->session->set_flashdata('error', $msg);
            redirect('home/dashboard');
        }
        
    }
    
    //put your code here
    public function index(){
        
    }
    
    public function permission_edit($user_type) {
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
}
