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

    /* *********** Subject Section ********************* */
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

    /* ********** Department Section **************** */
    public function get_all_class_where_department_info($department_id){
        $sql="SELECT cls.id as class_id, cls.name as class_name FROM tbl_department_class_group as dcg inner join tbl_class as cls on dcg.class_id=cls.id where dcg.department_id=$department_id";

        $result = $this->db->query($sql);
        return $result->result();
    }

    public function get_all_department_where_class_group_info($department_id){
        $sql="SELECT cls.id as class_id, cls.name as class_name FROM tbl_department_class_group as dcg inner join tbl_class as cls on dcg.class_id=cls.id where dcg.department_id=$department_id";

        $result = $this->db->query($sql);
        return $result->result();
    }

    public function select_all_books($from = NULL, $limit = NULL){
        // $sql = "SELECT bo.id as book_id, bo.name as book_name, if(bo.company_id=1, 'Text Book', 'Other Books') as company_name, if(bo.company_id=2, 'Guide Book', 'Other Books') as company_name, bo.rate as book_rate, cls.name as class_name, dep.name as department_name, sub.name as subject_name FROM books as bo left join tbl_class as cls on bo.class_id=cls.id left join tbl_subject as sub on bo.subject_id=sub.id left join department as dep on bo.department_id=dep.id order by bo.id DESC"; 

        $sql = "
        SELECT 
        bo.id as book_id, 
        bo.book_name as book_name, 
        bo.writter_name as writter_name, 
        bo.company_id as company_name, 
        bo.regular_price as regular_price, 
        bo.sell_price as sell_price, 
        bo.percent as percent,
        cls.name as class_name, 
        dep.name as department_name
        

        FROM 
            books as bo left join tbl_class as cls on bo.class_id=cls.id 
                
                left join department as dep on bo.department_id=dep.id 

                order by bo.id DESC"; 

        if (empty($from)) {
            $sql .= " LIMIT 0, 15 ";
        } else {
            $sql .= " LIMIT $from,$limit ";
        }

        // echo "<pre>";
        // print_r($sql);
        // exit();
        

        $result = $this->db->query($sql);
        return $result->result();
    }
    
    public function getAllMpoDonationList($mpo_id){
	$sql = "SELECT do.id,co.name as college_name,t.name as teacher_name,de.name as department_name,cl.name as class_name,do.student_quantity,do.possible_book,b.book_name,do.money_amount FROM tbl_donation as do  LEFT JOIN college as co ON do.college_id = co.id  LEFT JOIN teachers as t ON do.teacher_id = t.id  LEFT JOIN department as de ON do.department_id = de.id  LEFT JOIN tbl_class as cl ON do.class_id = cl.id  LEFT JOIN books as b ON do.book_id = b.id WHERE do.requisition_by = $mpo_id";
	$result_query = $this->db->query($sql);
	return $result_query->result_array();
	
    }

   
}
