<?php 

    if (!defined('BASEPATH'))
    exit('No direct script access allowed');
    
    class Donation extends MY_Controller{
	
	public function __construct() {
	    parent::__construct();
	}
	
	public function add(){
	    $data = array();
	    $data['college_list'] = $this->CM->getAll('college');
//	    $data['teacher_list'] = $this->CM->getAll('teachers');
	    $data['book_list'] = $this->CM->getAll('books');
	    $this->load->view('report/donation', $data);
	}
    }

?>