<?php

class Report_model extends CI_Model {

    public function requisitionReport($sdate, $edate, $jid = NULL) {

	@$sql = "
          SELECT 
          r.id as tid, r.requisition_time , r.requisition_date ,   r.college_id , r.requisition_by , r.comments, 
          c.name cname , c.id, u.name as empname, u.id , 
          (SELECT SUM(quantity) FROM requisition_books WHERE requisition_id = r.id ) as bookqty
          FROM user u, college c, requisition r 
          WHERE 
          r.requisition_date <=  '{$edate}' AND   r.requisition_date >= '{$sdate}'        ";
	if ($jid != NULL) {
	    $sql .= " AND  r.jonal_id = '{$jid}'  ";
	}
	$sql .= " AND r.college_id  = c.id AND  r.requisition_by  = u.id
            GROUP BY tid  
            ";
	;
	// echo $sql ; 

	$result = $this->db->query($sql);
	return $result->result_array();
    }

    /**
    * Show Requisitin Book from Requisition Table
    */
    public function getRequisitionBooks($rid) {
		$sql = "SELECT 
            trd.requisition_id, trd.book_id , trd.quantity, trd.price, trd.id, b.id as bookid, b.book_name
            FROM 
            tbl_requisition_details as trd, books as b
            WHERE 
            trd.requisition_id = {$rid} 
            AND trd.book_id =  b.id  
            ORDER BY trd.id ASC
            ";
		$result = $this->db->query($sql);
		
		return $result->result_array();
    }

    public function transferReport($sdate, $edate, $did = NULL) {

	@$sql = "
          SELECT 
          t.id as tid, t.transfer_time , t.challan_date , t.memo_no , t.transfer_to , t.entryby , t.comments, 
          c.name cname , c.id, u.name as empname, u.id , t.teacher_id, 
          (SELECT name dep_id FROM teachers WHERE id = t.teacher_id) as teacher_name,
          (SELECT dep_id FROM teachers WHERE id = t.teacher_id) as department_id,
          (SELECT name FROM department WHERE id = department_id) as department_name,
          (SELECT SUM(quantity) FROM transfer_item WHERE transfer_id = t.id ) as bookqty
          FROM user u, college c, transfer t 
          WHERE 
          t.challan_date <=  '{$edate}' AND   t.challan_date >= '{$sdate}'        ";
	if ($did != NULL) {
	    $sql .= " AND  t.transfer_to = '{$did}'  ";
	}
	$sql .= " AND t.transfer_to  = c.id AND  t.entryby  = u.id ";
	;


	$result = $this->db->query($sql);
	return $result->result_array();
    }

    public function getTrabsferBooks($tid) {
	$sql = "SELECT 
                    tb.transfer_id, tb.book_id , tb.quantity, tb.price, tb.line_no  , 
                    b.id as bookid, b.book_code, b.book_name
                    FROM 
                    transfer_item as tb, books as b
                    WHERE 
                    tb.transfer_id = {$tid} 
                    AND tb.book_id =  b.id  
                    ORDER BY tb.line_no ASC
                    ";
	$result = $this->db->query($sql);
	return $result->result_array();
    }

    public function getDistributeBooks($did) {
	$sql = "SELECT 
                    db.distribute_id, db.book_id , db.quantity, db.price, db.line_no  , 
                    b.id as bookid, b.book_code, b.book_name
                    FROM 
                    distribute_books as db, books as b
                    WHERE 
                    db.distribute_id = {$did} 
                    AND db.book_id =  b.id  
                    ORDER BY db.line_no ASC
                    ";
	$result = $this->db->query($sql);
	return $result->result_array();
    }

    public function jonaltransferReport($sdate, $edate, $jid = NULL) {

	@$sql = "
          SELECT 
          t.id as tid, t.transfer_time , t.to_jonal,  t.challan_date , t.memo_no ,  t.entryby , t.comments, 
          j.name jname , j.id, u.name as empname, u.id , 
          (SELECT SUM(quantity) FROM transfer_item WHERE transfer_id = t.id ) as bookqty
          FROM user u, jonal j, transfer t 
          WHERE 
          t.challan_date <=  '{$edate}' AND   t.challan_date >= '{$sdate}'        ";
	if ($jid != NULL) {
	    $sql .= " AND  t.to_jonal = '{$jid}'  ";
	}
	$sql .= " AND t.to_jonal  = j.id AND  t.entryby  = u.id ";
	;
	$result = $this->db->query($sql);
	return $result->result_array();
    }

    public function distributeReport($sdate, $edate, $cid = NULL) {

	@$sql = "
          SELECT 
          d.id as did, d.distribute_time , d.distribute_date ,  d.entryby , d.comments, d.college_id, d.teacher_id, 
          c.id, c.name as cname, c.address as caddress, t.name as tname, t.id , 
          u.name as empname, u.id , dep.name as depname, d.department_id, 
          (SELECT SUM(quantity) FROM distribute_books WHERE distribute_id = d.id ) as bookqty
          FROM user as u, jonal as  j,  teachers as t , distribute as d, department as dep, college as c
          WHERE 
          d.distribute_date <=  '{$edate}' AND   d.distribute_date >= '{$sdate}'   AND dep.id = d.department_id     ";
	if ($cid != NULL) {
	    $sql .= " AND  d.college_id = '{$cid}'  ";
	}
	$sql .= " AND d.college_id  = c.id AND  d.entryby  = u.id
                    AND d.college_id = c.id AND d.teacher_id = t.id 
                    GROUP BY d.id
                ";

	// SELECT department.name, distribute.department_id FROM department, distribute WHERE department.id = distribute.department_id
	//echo $sql ;  
	$result = $this->db->query($sql);
	return $result->result_array();
    }

    public function donation_requisition($start_date=NULL, $end_date=NULL, $division_id=NULL, $jonal_id=NULL, $district_id=NULL, $thana_id=NULL, $college_id=NULL) {

	$sql = "SELECT do.id, do.requisition_status, do.date,u.name as user_name,c.name as college_name, te.name as teacher_name, d.name as department_name,cl.name as class_name,do.student_quantity,do.possible_book,bo.book_name as book_name,do.money_amount "
		. "FROM "
		. "tbl_donation as do INNER JOIN department as d ON do.department_id=d.id "
		. "INNER JOIN user as u ON do.requisition_by = u.id "
		. "INNER JOIN college as c ON do.college_id = c.id "
		. "INNER JOIN teachers as te ON do.teacher_id = te.id "
		. "INNER JOIN tbl_class as cl ON do.class_id = cl.id "
		. "INNER JOIN books as bo ON do.book_id = bo.id "
		. "WHERE ";
	
		if ($start_date!=NULL AND $end_date!=NULL) {
		    $sql .="do.date >= '$start_date' and do.date  <= '$end_date'";
		}
		
		 if ($division_id!=NULL) {
		    $sql .="AND do.division_id = '{$division_id}'";
		}
		

		
		if ($jonal_id!=NULL) {
		    $sql .="AND do.jonal_id = '{$jonal_id}'";
		}
		
		if ($district_id!=NULL) {
		    $sql .="AND do.district_id= '{$district_id}'";
		}
		
		 if ($thana_id!=NULL) {
		    $sql .="AND do.thana_id = '{$thana_id}'";
		}
		
		 if ($college_id!=NULL) {
		    $sql .="AND do.college_id = '{$college_id}'";
		}
		
		
	$result_query = $this->db->query($sql);
	return $result_query->result_array();
    }

    public function getRequisitionReportForMPO($start_date, $end_date, $user_id = NULL) {
	$this->db->select("*");
	$this->db->from('tbl_requisition');
	if ($user_id != NULL) {
	    $this->db->where('requisition_by', $user_id);
	}
	$this->db->where('date >=', $start_date);
	$this->db->where('date <=', $end_date);

	$query_result = $this->db->get();
	$result = $query_result->result();
	return $result;
    }

}
