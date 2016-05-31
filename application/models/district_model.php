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
    public function get_all_district_info($from = NULL, $limit = NULL) {
        $user_type = $this->user_type;
        $this->db->select("di.id as district_id, di.name as district_name, jo.name as jonal_name");
        $this->db->from('district as di');

        $this->db->limit($limit, $from);
        
        $this->db->join('jonal as jo', 'jo.id = di.jonal_id','left');

        $query_result = $this->db->get();
        return $query_result->result_array();
    }

    /**
    * Only For Counting Selected Row for Pagination
    * Author : Tasfir Hossain Suman
    */
    function getTotalRow($table) {
        $user_type = $this->user_type;
        $sql = "SELECT * FROM $table WHERE status  = 1 ";

        if ($user_type==4 || $user_type==5 || $user_type==6) {
            $sql .= " and div_id=$this->division_id";
        }

        $query = $this->db->query($sql);
        return $query->num_rows();
    }

}