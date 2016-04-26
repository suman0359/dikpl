<?php

class Join_model extends CI_Model {

    public function get_division_list() {
        $sql = "SELECT di.id, di.name as division_name, us.name as user_name FROM division as di left join user as us on di.division_head=us.id";

        $result = $this->db->query($sql);
        return $result->result_array();
    }

    public function get_thana_info($from = NULL, $limit = NULL){
    	$sql="SELECT th.id, th.name as thana_name, dis.name as district_name, di.name as division_name, us.name as executive_name FROM thana as th left join district as dis on th.district_id=dis.id left join division as di on th.division_id=di.id left join user as us on th.executive_id=us.id";

    	if (empty($from)) {
            $sql .= " LIMIT 0, 15 ";
        } else {
            $sql .= " LIMIT $from,$limit ";
        }

    	$result = $this->db->query($sql);
        return $result->result_array();
    }

    public function get_all_jonal_info($from = NULL, $limit = NULL){
        $sql="SELECT jo.id as jonal_id, jo.name as jonal_name, di.id as division_id, di.name as division_name, us.id as user_id, us.name as jonal_head_name FROM jonal as jo left join division as di on jo.div_id=di.id left join user as us on jo.jonal_head_id=us.id";

        if (empty($from)) {
            $sql .= " LIMIT 0, 15 ";
        } else {
            $sql .= " LIMIT $from,$limit ";
        }

        $result = $this->db->query($sql);
        return $result->result_array();
    }

    public function get_all_search_jonal_info($from = NULL, $limit = NULL, $search){
        $sql="SELECT jo.id as jonal_id, jo.name as jonal_name, di.id as division_id, di.name as division_name, us.id as user_id, us.name as jonal_head_name FROM jonal as jo left join division as di on jo.div_id=di.id left join user as us on jo.jonal_head_id=us.id WHERE jo.name like '%$search%'";

        if (empty($from)) {
            $sql .= " LIMIT 0, 15 ";
        } else {
            $sql .= " LIMIT $from,$limit ";
        }

        $result = $this->db->query($sql);
        return $result->result_array();
    }

    public function get_all_district_where_zonal_info($jonal_id){
        $sql="SELECT dis.id as district_id, dis.name as district_name FROM zonal_group as zo inner join district as dis on zo.district_id=dis.id where zo.zonal_id=$jonal_id";

        $result = $this->db->query($sql);
        return $result->result();
    }

    public function get_all_department_where_subject_info($subject_id){
        $sql="SELECT dep.id as department_id, dep.name as department_name FROM tbl_subject_group as tsg inner join department as dep on tsg.department_id=dep.id where tsg.subject_id=$subject_id";

        $result = $this->db->query($sql);
        return $result->result();
    }

    public function get_all_department_where_subject_group_info($subject_id){
        
        $sql="SELECT dep.id as department_id, dep.name as department_name FROM tbl_subject_group as tsg inner join department as dep on tsg.department_id=dep.id where tsg.subject_id=$subject_id";

        $result = $this->db->query($sql);
        return $result->result();
    }

   
}
