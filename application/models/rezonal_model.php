<?php
class Rezonal_model extends CI_Model{

    public function __construct(){
        parent::__construct();
        $this->user_type = $this->session->userdata('user_type');
        $this->division_id = $this->session->userdata('division_id');
    }

    public function select_all_rezonal(){ 
        $this->db->select('user.id as id, user.name as name, image, address, email, phone, user_type, user.status, tbl_user_role.name as role_name, value as user_role');

        if($this->user_type==1){
            $this->db->where('user_type >=', $this->user_type);
        }else{
            $this->db->where('user_type >', $this->user_type);
        }        

        if($this->user_type!=1){
            $this->db->where('user.status !=', 13);
            $this->db->where('user.status !=', 0);
        }
        
        $this->db->where('user_type !=', 5);

        $this->db->order_by('user_type', 'ASC');
        

        $this->db->from('jonal');
        $this->db->join('tbl_user_role', 'tbl_user_role.value = user.user_type','left');

        $query_result = $this->db->get();
        $result = $query_result->result_array();
        return $result;
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