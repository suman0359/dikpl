<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/**
 * Author: Tasfir Hossain Suman
 * This Controller made for Settings Module, 
 * Here are controll and setup allmost all module 
 */
class Home extends MY_Controller {

    public $uid;
    public $module;
    public $user_type;

    public function __construct() {
        parent::__construct();

        $this->load->model('Settings_model', 'SM');
        $this->module = 'settings';
        $this->uid = $this->session->userdata('uid');
        $this->user_type = $this->session->userdata('user_type');

        if($this->user_type!=1){
            $msg = "Sorry You don't have permission to access this module";
            $this->session->set_flashdata('error', $msg);
            redirect('home/dashboard');
        }
    }

    public function index() {
        $this->load->view('settings/index');
    }

}
