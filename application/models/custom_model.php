<?php
class Custom_model extends CI_Model{
    
    //For College Controller 
    public function selectAllCollege($table_name, $where_division_id, $where_jonal_id, $per_page, $offset){
        $this->db->select('*');
        if($where_division_id!=NULL){
            $this->db->where('division_id', $where_division_id);
        }

        if($where_jonal_id!=NULL){
            $this->db->where('jonal_id', $where_jonal_id);
        }

        $this->db->from($table_name);

        $query_result = $this->db->get('', $per_page, $offset);
        // $query_result = $this->db->get();
        $result = $query_result->result_array();
        return $result;

    }

    public function getTotalRow($table_name, $where_division_id, $where_jonal_id){
        return $this->db
        ->where('division_id', $where_division_id)
        ->where('jonal_id', $where_jonal_id)
        ->where('status', 1)
        ->count_all_results($table_name);
    }
    
        
}
