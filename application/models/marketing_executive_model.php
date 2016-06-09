<?php
class Marketing_executive_model extends CI_Model{

    public function __construct(){
        parent::__construct();
        $this->user_type = $this->session->userdata('user_type');
    }

    public function get_all_thana_where_marketing_promotion_officer_info($mpo_id) {
        // Thana Group MPO (Table)  = tgm
        // Thana (Table)         = tha
        $sql = "SELECT tha.id as thana_id, tha.name as thana_name FROM thana_group_for_mpo as tgm left join thana as tha on tgm.thana_id=tha.id where tgm.mpo_id=$mpo_id";

        $result = $this->db->query($sql);
        return $result->result();
    }

    /**
    * Count All Row of Marketing Promotion Officer for Pagination
    */
    public function count_get_all_marketing_promotion_officer_info(){
        $user_type = $this->user_type;

        $sql = "SELECT * FROM user WHERE status  = 1 AND user_type =5";

        if ($user_type==4 || $user_type==5 || $user_type==6) {
            $sql .= " and div_id=$this->division_id";
        }

        $query = $this->db->query($sql);
        return $query->num_rows();
    
    }

    /**
    * Select All Row of Marketing Promotion Officer for Pagination in Index Page
    * User      = u (Table) 
    * Division  = di (Table)
    * District  = dis (Table)
    */
    public function get_all_marketing_promotion_officer_info($from = NULL, $limit = NULL) {
        $user_type = $this->user_type;

        $sql = "SELECT u.id as user_id, u.name as mpo_name, u.address, u.phone, u.email, di.name as division_name, jo.name as rezonal_name, dis.name as district_name

        FROM 
        user as u 
        left join division as di on u.division_id=di.id 
        left join jonal as jo on u.jonal_id=jo.id 
        left join district as dis on u.district_id=dis.id ";

        $sql .= "WHERE user_type=5 ";
       if ($user_type==4 || $user_type==5 || $user_type==6) {
           $sql .= " AND jo.div_id=$this->division_id";
       }
       

        if (empty($from)) {
            $sql .= " LIMIT 0, 15 ";
        } else {
            $sql .= " LIMIT $from,$limit ";
        }

        $result = $this->db->query($sql);
        return $result->result_array();
    }

    public function get_all_thana_where_mpo_info($mpo_id) {
        $sql = "SELECT t.name as thana_name FROM thana_group_for_mpo as tgm inner join thana as t on tgm.thana_id=t.id where tgm.mpo_id=$mpo_id";

        $result = $this->db->query($sql);
        return $result->result();
    }

}