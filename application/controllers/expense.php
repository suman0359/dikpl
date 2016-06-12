<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Expense extends MY_Controller{
    
    public function __construct() {
	parent::__construct();
    }
    
    public function add_expense(){
	$this->load->view('expense/add_form');
    }
}
