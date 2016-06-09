<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Home extends MY_Controller {

    public function __construct() {
        parent::__construct();
        $this->checklogin();
    }

    public function index() {

        $datav = "";
        // $this->load->view('home/index', $datav);
        $this->load->view('welcome_page_administration');
    }

    public function dashboard(){
        $datav = "";
        $this->load->view('home/index', $datav);
    }

    public function getthana($did) {
        $did = trim($did);
        $thanalist = $this->CM->getAllWhere('thana', array('district_id' => $did));
        // echo json_encode($thanalist) ; 
        
        $html = "<option value=''>Select a thana</option>";
        foreach ($thanalist as $key => $value) {
            $html.="<option value='{$value['id']}'>{$value['name']}</option>";
        }


        echo $html;
    }

    public function getjonal($did) {
        $did = trim($did);
        $jonallist = $this->CM->getAllWhere('jonal', array('div_id' => $did));
        echo json_encode($jonallist);
    }

    public function getdistrict($jonal_id) {
        $jonal_id = trim($jonal_id);
        $districtlist = $this->CM->getAllWhere('district', array('jonal_id' => $jonal_id));
        echo json_encode($districtlist);
    }

    public function getcollege($jid) {
        $jid = trim($jid);
        $collegelist = $this->CM->getAllWhere('college', array('jonal_id' => $jid));
        echo json_encode($collegelist);
    }

    public function getexecutive($jid) {
        $jid = trim($jid);
        $collegelist = $this->CM->getAllWhere('user', array('jonal_id' => $jid));
        echo json_encode($collegelist);
    }
    
    public function getmpo($thana_id) {
        // mpo_list = marketing promotion officer / marketing executive
        $thana_id = trim($thana_id);
        $mpo_list = $this->CM->getAllWhere('user', array('thana_id' => $thana_id));
        echo json_encode($mpo_list);
    }

    public function getteacher($jid) {
        $jid = trim($jid);
        $teacherlist = $this->CM->getAllWhere('teachers', array('college_id' => $jid));
        echo json_encode($teacherlist);
    }

    // Select A Teachers From Teachers Table by dep_id(Department ID)
    public function getteacherbycollegeanddepartment($college_id, $department_id, $table_name) {
        $department_id = trim($department_id);
        $college_id = trim($college_id);
        $teacherlist = $this->CM->getAllAndWhere(array('college_id' => $college_id), array('dep_id' => $department_id), 'teachers');

        echo json_encode($teacherlist);
    }
    public function get_book_id_by_department($department_id) {
        $department_id = trim($department_id);
        $book_list = $this->CM->getAllWhere('books', array('department_id' => $department_id));
      
	echo json_encode($book_list);
    }

    public function getdepartmentidbyid($teacher_id) {
        $teacher_id = trim($teacher_id);
        $department_id = $this->CM->getIdWhere('dep_id', 'id', $teacher_id, 'teachers');
        $teacherlist = $this->CM->getAllWhere('department', array('id' => $department_id->dep_id));

        echo json_encode($teacherlist);
    }

    public function getclass($department_id) {
        $department_id = trim($department_id);
        $this->load->model('join_model');
        $class_list = $this->join_model->get_all_class_where_department_info($department_id);

        echo json_encode($class_list);

    }


}
