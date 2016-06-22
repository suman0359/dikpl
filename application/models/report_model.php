<?php

class Report_model extends CI_Model {

    public function __construct() {
	parent::__construct();
	$this->user_type = $this->session->userdata('user_type');
    }

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
            trd.id as trd_id, trd.requisition_id, trd.book_id as book_id, trd.quantity, trd.transfer_quantity, trd.price,  b.id as bookid, b.book_name
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

    public function getRequisitionDonations($did) {
	$this->db->select('do.id as donation_id, do.date as donation_date, do.requisition_status, do.student_quantity, do.possible_book, do.money_amount, u.name as mpo_name, co.name as college_name, jo.name as jonal_name, te.name as teacher_name, di.name as division_name, dis.name as district_name, t.name as thana_name, de.name as department_name, cl.name as class_name, bo.book_name');
	$this->db->where('do.id', $did);
	$this->db->where('do.status', 1);
	$this->db->from('tbl_donation as do');
	
	$this->db->join('division as di', 'di.id=do.division_id', 'left');
	$this->db->join('jonal as jo', 'jo.id=do.jonal_id', 'left');
	$this->db->join('district as dis', 'dis.id=do.district_id', 'left');
	$this->db->join('thana as t', 't.id=do.thana_id', 'left');
	$this->db->join('college as co', 'co.id=do.college_id', 'left');
	$this->db->join('department as de', 'de.id=do.department_id', 'left');
	$this->db->join('teachers as te', 'te.id=do.teacher_id', 'left');
	$this->db->join('tbl_class as cl', 'cl.id=do.class_id', 'left');
	$this->db->join('books as bo', 'bo.id=do.book_id', 'left');
	$this->db->join('user as u', 'u.id=do.requisition_by', 'left');
	
	$result = $this->db->get()->row_array();
	
	return $result;
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

    /*
     * This Method is for Distribution Report 
     * Author : Faruk & Tasfir
     */

    public function distributeReport($sdate, $edate, $division_id = NULL, $jonal_id = NULL, $college_id = NULL) {

	$sql = "SELECT  di.id, u.name as user_name, di.distribute_date, c.name as college_name, t.name as teacher_name, di.comments "
		. "FROM "
		. "tbl_distribute as di INNER JOIN college as c ON di.college_id = c.id "
		. "INNER JOIN user as u ON u.id=di.entryby "
		. "LEFT JOIN teachers as t ON  t.id=di.teacher_id  "
		. "WHERE ";

	if ($sdate != NULL AND $edate != NULL) {
	    $sql .="di.distribute_date >= '$sdate' and di.distribute_date  <= '$edate'";
	}

	if ($sdate != NULL AND $edate == NULL) {
	    $date = date("d-m-Y");
	    $sql .="di.distribute_date >= '$sdate' and di.distribute_date  <= '$date'";
	}

	if ($sdate == NULL) {
	    $date = date("d-m-Y");
	    $sql .="di.distribute_date >= '$date' and di.distribute_date  <= '$date'";
	}

	if ($division_id != NULL) {
	    $sql .="AND di.division_id = '{$division_id}'";
	}


	if ($jonal_id != NULL) {
	    $sql .="AND di.jonal_id = '{$jonal_id}'";
	}

	if ($college_id != NULL) {
	    $sql .="AND di.college_id = '{$college_id}'";
	}

	// User wise Data Show
	if ($this->user_type == 5) {
	    $sql .=" AND di.entryby='{$this->uid}'";
	}

	$result_query = $this->db->query($sql);
	$result = $result_query->result_array();

	return $result;
    }

    public function donation_requisition($start_date = NULL, $end_date = NULL, $division_id = NULL, $jonal_id = NULL, $district_id = NULL, $thana_id = NULL, $college_id = NULL) {

	$sql = "SELECT do.id, do.requisition_status, do.date,u.name as user_name,c.name as college_name, te.name as teacher_name, d.name as department_name,cl.name as class_name,do.student_quantity,do.possible_book,bo.book_name as book_name,do.money_amount "
		. "FROM "
		. "tbl_donation as do INNER JOIN department as d ON do.department_id=d.id "
		. "INNER JOIN user as u ON do.requisition_by = u.id "
		. "INNER JOIN college as c ON do.college_id = c.id "
		. "INNER JOIN teachers as te ON do.teacher_id = te.id "
		. "INNER JOIN tbl_class as cl ON do.class_id = cl.id "
		. "INNER JOIN books as bo ON do.book_id = bo.id "
		. "WHERE ";

	if ($start_date != NULL AND $end_date != NULL) {
	    $sql .="do.date >= '$start_date' and do.date  <= '$end_date'";
	}

	if ($division_id != NULL) {
	    $sql .="AND do.division_id = '{$division_id}'";
	}



	if ($jonal_id != NULL) {
	    $sql .="AND do.jonal_id = '{$jonal_id}'";
	}

	if ($district_id != NULL) {
	    $sql .="AND do.district_id= '{$district_id}'";
	}

	if ($thana_id != NULL) {
	    $sql .="AND do.thana_id = '{$thana_id}'";
	}

	if ($college_id != NULL) {
	    $sql .="AND do.college_id = '{$college_id}'";
	}


	$result_query = $this->db->query($sql);
	return $result_query->result_array();
    }

    public function getRequisitionReportForMPO($start_date, $end_date, $user_id = NULL) {
	$this->db->select("tbl_requisition.id, tbl_requisition.invoice_no, tbl_requisition.date, tbl_requisition.total_amount, tbl_requisition.total_quantity, tbl_requisition.comment, tbl_requisition.requisition_status, user.name as mpo_name");
	$this->db->from('tbl_requisition');
	if ($user_id != NULL) {
	    $this->db->where('requisition_by', $user_id);
	}
	$this->db->where('date >=', $start_date);
	$this->db->where('date <=', $end_date);

	$this->db->join('user', 'user.id=tbl_requisition.requisition_by', 'inner');

	$query_result = $this->db->get();
	$result = $query_result->result();
	return $result;
    }

    public function book_stock_list_of_mpo($mpo_id) {
	$this->db->select("books.id as book_id, books.book_name, tbl_book_stock_for_distribute.quantity");
	$this->db->from('tbl_book_stock_for_distribute');
	$this->db->where('mpo_id', $mpo_id);
	$this->db->where('quantity !=', 0);

	$this->db->join('books', 'books.id=tbl_book_stock_for_distribute.book_id', 'inner');
	$this->db->join('user', 'user.id=tbl_book_stock_for_distribute.mpo_id', 'inner');

	$query_result = $this->db->get();
	$result = $query_result->result_array();
	return $result;
    }

}
