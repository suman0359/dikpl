<?php
class Custom_model extends CI_Model{

    public function __construct(){
        parent::__construct();
        $this->user_type = $this->session->userdata('user_type');
        $this->division_id = $this->session->userdata('division_id');
    }
    
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
    
    public function get_donation_info($tbl_name, $id, $uid){
	$this->db->select('*');
	$this->db->where('id', $id);
	$this->db->where('requisition_by', $uid);
	$this->db->from($tbl_name);
	
	$query_result = $this->db->get();
	$result = $query_result->row();
	return $result;
    }
    public function get_details_info($id){

	$sql = "SELECT do.requisition_by,co.name as college_name, te.name as teacher_name, de.name as department_name, cl.name as class_name, do.student_quantity, do.possible_book, bo.book_name as book_name, do.money_amount FROM tbl_donation as do INNER JOIN college as co ON do.college_id=co.id INNER JOIN teachers as te ON do.teacher_id=te.id INNER JOIN department as de ON do.department_id=de.id INNER JOIN tbl_class as cl ON do.class_id=cl.id INNER JOIN books as bo ON do.book_id=bo.id WHERE do.id= $id";
	$result = $this->db->query($sql);
	return $result->row();
    }

    /**
    * Get Rezonal Id for District Selection 
    */
    public function get_rezonal_id_for_district(){
        $user_type = $this->user_type;
        $sql = "SELECT jo.id  FROM jonal as jo left join division as di on jo.div_id=di.id left join user as us on jo.jonal_head_id=us.id";

       if ($user_type==4 || $user_type==5 || $user_type==6) {
           $sql .= " where jo.div_id=$this->division_id";
       }
    
        $result = $this->db->query($sql);
        return $result->result_array();
    }
    
        
}
