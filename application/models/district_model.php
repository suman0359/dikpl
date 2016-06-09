<?php
class District_model extends CI_Model{

    public function __construct(){
        parent::__construct();
        $this->user_type = $this->session->userdata('user_type');
        $this->division_id = $this->session->userdata('division_id');
        $this->rezone_id = $this->session->userdata('jonal_id');
    }

  

    /**
    * Select all District information
    * Author : Tasfir Hossain Suman
    */
    public function get_all_district_info($from = NULL, $limit = NULL, $rezonal_id = NULL) {
        $user_type = $this->user_type;
        $this->db->select("di.id as district_id, di.name as district_name, jo.name as jonal_name");
        $this->db->from('district as di');

        $this->db->limit($limit, $from);
        
        $this->db->join('jonal as jo', 'jo.id = di.jonal_id','left');

        if ($user_type==4 || $user_type==5 || $user_type==6) {
           $this->db->where_in('di.jonal_id', $rezonal_id);
        }
        

        $query_result = $this->db->get();
        return $query_result->result_array();
    }

    /**
    * Only For Counting Selected Row for Pagination
    * Author : Tasfir Hossain Suman
    */
    function getTotalRow($table, $rezonal_id) {
        $user_type = $this->user_type;
        $this->db->from($table);
        
        if ($user_type==4 || $user_type==5 || $user_type==6) {
            $this->db->where_in('jonal_id', $rezonal_id);
        }

        $result = $this->db->get()->num_rows();

        return $result;
    }

}