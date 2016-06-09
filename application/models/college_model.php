<?php
class College_model extends CI_Model{

    public function __construct(){
        parent::__construct();
        $this->user_type = $this->session->userdata('user_type');
        $this->division_id = $this->session->userdata('division_id');
    }
    
    public function get_college_all_list($from = NULL, $limit = NULL, $where=NULL){
        
        $this->db->select('college.id as college_id, college.name as college_name, district.name as district_name, thana.name as thana_name, user.name as mpo_name');
        $this->db->from('college');

        $this->db->limit($limit, $from);
        $this->db->order_by('college.id', 'DESC');

        if($this->user_type==5 && $where!=NULL){
            $this->db->where_in('college.thana_id', $where);
        }else if($this->user_type==5){
            $this->db->limit(0);
        }

        $this->db->join('district', 'district.id=college.district_id', 'left');
        $this->db->join('thana', 'thana.id=college.thana_id', 'left');
        $this->db->join('user', 'user.id=college.executive_id', 'left');

        return $this->db->get()->result_array();
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

    public function getTotalRow($thana_id_array=NULL){
        
        if($this->user_type==5 && $thana_id_array!=NULL){
            $this->db->where_in('thana_id', $thana_id_array);
        }

        $this->db->from('college');
        
        $result = $this->db->get()->num_rows();

        return $result;
    }
}
