<?php
class Teacher_model extends CI_Model{

    public function __construct(){
        parent::__construct();
        $this->user_type = $this->session->userdata('user_type');
        $this->division_id = $this->session->userdata('division_id');
    }

    public function get_teacher_all_list_by_college($from = NULL, $limit = NULL, $where=NULL){
        
        // $this->db->select('teachers.id as teacher_id, teachers.name as teachers_name, district.name as district_name, thana.name as thana_name, user.name as mpo_name');
        $this->db->select('teachers.id as teacher_id, teachers.name as teacher_name, teachers.designation, teachers.phone, department.name as department_name, college.name as college_name');
        $this->db->from('teachers');

        if($limit!=NULL){
            $this->db->limit($limit, $from);
        }
        
        $this->db->order_by('teachers.id', 'DESC');

        if($this->user_type==5 && $where!=NULL){
            $this->db->where_in('teachers.college_id', $where);
        }else if($this->user_type==5){
            $this->db->limit(0);
        }

        $this->db->join('department', 'department.id=teachers.dep_id', 'left');
        $this->db->join('college', 'college.id=teachers.college_id', 'left');
        // $this->db->join('user', 'user.id=teachers.executive_id', 'left');

        return $this->db->get()->result_array();
    } 
    
    /**
    * Make a college array for selecting teachers list where college_id = in array
    */
    public function get_college_array($where=NULL){
        
        $this->db->select('college.id as college_id');
        $this->db->from('college');

        
        $this->db->order_by('college.id', 'DESC');

        if($this->user_type==5 && $where!=NULL){
            $this->db->where_in('college.thana_id', $where);
        }

        $college_array_id = $this->db->get()->result_array();

        $college_id_array = [];
            foreach ($college_array_id as $value) {    
                array_push($college_id_array, $value['college_id']);               
            }

        return $college_id_array;
    }    


    public function get_thana_array($mpo_id){
        $this->db->select('thana_id');
        $this->db->where('mpo_id', $mpo_id);
        $this->db->from('thana_group_for_mpo');
        $thana_array_id = $this->db->get()->result_array();

        $thana_id_array = [];
            foreach ($thana_array_id as $value) {    
                array_push($thana_id_array, $value['thana_id']);               
            }

        return $thana_id_array; //= rtrim(implode(',', $thana_id_array), ',');
    } 

    public function getTotalRow($college_id_array=NULL){
        
        if($this->user_type==5 && $college_id_array!=NULL){
            $this->db->where_in('college_id', $college_id_array);
        }

        $this->db->from('teachers');
        
        $result = $this->db->get()->num_rows();

        return $result;
    }

    public function search($college_id_array, $search){
        $this->db->select('teachers.id as teacher_id, teachers.name as teacher_name, teachers.designation, teachers.phone, department.name as department_name, college.name as college_name');
        $this->db->from('teachers');

        $this->db->like('teachers.name', trim($search));
        $this->db->order_by('teachers.id', 'DESC');

        if($this->user_type==5 && $college_id_array!=NULL){
            $this->db->where_in('teachers.college_id', $college_id_array);
        }

        $this->db->join('department', 'department.id=teachers.dep_id', 'left');
        $this->db->join('college', 'college.id=teachers.college_id', 'left');
        // $this->db->join('user', 'user.id=teachers.executive_id', 'left');

        return $this->db->get()->result_array();
    }
}
