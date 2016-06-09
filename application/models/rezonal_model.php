<?php
class Rezonal_model extends CI_Model{

    public function __construct(){
        parent::__construct();
        $this->user_type = $this->session->userdata('user_type');
        $this->division_id = $this->session->userdata('division_id');
    }


    /**
    * Select all Rezonal information
    * Author : Tasfir Hossain Suman
    */
    public function get_all_jonal_info($from = NULL, $limit = NULL) {
        $user_type = $this->user_type;
        $sql = "SELECT jo.id as jonal_id, jo.name as jonal_name, di.id as division_id, di.name as division_name, us.id as user_id, us.name as jonal_head_name FROM jonal as jo left join division as di on jo.div_id=di.id left join user as us on jo.jonal_head_id=us.id";

       if ($user_type==4 || $user_type==5 || $user_type==6) {
           $sql .= " where jo.div_id=$this->division_id";
       }
       

        if (empty($from)) {
            $sql .= " LIMIT 0, 15 ";
        } else {
            $sql .= " LIMIT $from,$limit ";
        }

        $result = $this->db->query($sql);
        return $result->result_array();
    }

    /**
    * Only For Counting Selected Row for Pagination
    * Author : Tasfir Hossain Suman
    */
    function getTotalRow() {
        $user_type = $this->user_type;
        if ($user_type==4 || $user_type==5 || $user_type==6) {
            $this->db->where('div_id', $this->division_id);
        }

        $this->db->from('jonal');
        
        $result = $this->db->get()->num_rows();

        return $result;
    }

}