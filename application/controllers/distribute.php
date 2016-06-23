<?php

class Distribute extends MY_Controller {

    public $_uid;

    public function __construct() {
        parent::__construct();
        $this->checklogin();
        $this->load->Model('Transfer_model', 'TM');
        $this->_uid = $this->session->userdata('uid');
        $this->user_type = $this->session->userdata('user_type');
    }

    public function index() {
        $data['transfer_list'] = $this->CM->getAll('transfer', 'id DESC');
        $data['division_list'] = $this->CM->getAll('division', 'name ASC');
        $this->load->view('distribute/index', $data);
    }

    public function add($cid = NULL) {

        $jid = $this->session->userdata('jonal_id');
        $data['colage_list'] = $this->CM->getAllWhere('college', array('jonal_id' => $jid), 'name ASC');

        if ($jid == 0) {
            redirect('error/accessdeny');
        }

        $data['cid'] = $cid;

        $data['id'] = "";
        $data['entry_by'] = "";
        $data['distribute_date'] = "";
        $data['distribute_from'] = "";
        $data['collage_id'] = "";
        $data['teacher_id'] = "";
        $data['department_id'] = "";
        $data['qty'] = "";
        $data['comments'] = "";

        $data['date'] = date('d-m-Y');

        //$data['teache_list'] = $this->CM->getAllWhere('teachers', array('college_id'=>$cid), 'name ASC') ; 
        $data['department_list'] = $this->CM->getAll('department', 'name ASC');
        if ($cid != NULL) {
            $data['college'] = $this->CM->getinfo('college', $cid);
            $data['allbooks'] = $this->CM->getcollegebooks($cid);
        }

        $this->load->library('form_validation');

        $this->form_validation->set_rules('pid', 'product', 'required');
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('distribute/form', $data);
        } else {
            // transfer  table start 

            $this->db->trans_start();

            if ($this->input->post('college_id') != '') {
                $pur_info['college_id'] = $this->input->post('college_id');
            }


            if ($this->input->post('teacher_id') != '') {
                $pur_info['teacher_id'] = $this->input->post('teacher_id');
            }

            if ($this->input->post('comments') != '') {
                $pur_info['comments'] = $this->input->post('comments');
            }

            // if ($this->input->post('department_id')!='') {
            //   $pur_info['department_id']=  $this->input->post('department_id');
            // }


            $pur_info['status'] = 1;
            $pur_info['entryby'] = $this->_uid;

            $purchase_date = strtotime($this->input->post('date'));
            $pur_info['distribute_date'] = date('Y-m-d', $purchase_date);



            $pid = $this->input->post('pid');
            $cost = $this->input->post('price');
            $quantity = $this->input->post('qty');



            $d_id = $this->CM->insert('distribute', $pur_info);

            $order = count($pid);
            if (!empty($d_id)) {
                for ($i = 0; $i < $order; $i++) {
                    $product_id = $pid[$i];
                    $book_info = $this->CM->getwhere('books', array('id' => $product_id));
                    $datas['distribute_id'] = $d_id; //purchase item table start
                    $datas['book_id'] = $pid[$i];


                    $datas['price'] = $cost[$i];
                    $datas['quantity'] = $quantity[$i];

                    $datas['line_no'] = $i;
                    $datas['status'] = 1;
                    $this->CM->insert('distribute_books', $datas);

                    // Update College  inventory 
                    // get College current book info
                    $current_c_b = $this->CM->getwhere('inventory_college', array('college_id' => $cid, 'book_id' => $product_id));
                    //var_dump($current_c_b) ;
                    $dataud['quantity'] = $current_c_b->quantity - $quantity[$i];
                    $this->CM->update('inventory_college', $dataud, $current_c_b->id);
                }
            }

            $this->db->trans_complete();




            if ($this->db->trans_status() === TRUE) {
                $msg = "Operation Successfull!!";
                $this->session->set_flashdata('success', $msg);
                redirect('report/distribute');
            } else {
                echo $msg = "There is an error, Please try again!!";
                $this->session->set_flashdata('error', $msg);
            }


            redirect('distribute');
        }
    }

    public function suggation() {
        $term = $this->input->get('term');
        $jid = $this->session->userdata('jonal_id');
        $data = $this->TM->jonal_book_suggation($term, $jid);
        $ds = array();
        foreach ($data as $d) {
            $ds[] = array('label' => $d['book_name'], 'value' => $d['book_id']);
        }
        echo json_encode($ds);
    }

    public function getproduct($cid, $bookid) {

        $product = $this->TM->getCollegeBook($cid, $bookid);
        echo json_encode($product);
    }

    public function printpreview($id) {


        $data['distribute_info'] = $this->CM->getwhere('distribute', array('id' => $id));
        $data['book_list'] = $this->RM->getDistributeBooks($id);


        if (empty($id) || empty($data['purchase_info'])) {
            //  redirect('report/report_item');
        }

        $this->load->view('distribute/printpreview', $data);
    }

    /**
     * Distribut book 
     * Author : Tasfir Hossain Suman
     */
    public function distribute_book($college_id = NULL) {
        /**
         * Colege Name Modal 
         * Author By : Tasfir Hossain Suman
         */
        // if($college_id==NULL || $college_id==0 || $college_id ==''){
        //   $this->load->view('View File', $data, FALSE);
        // }



        /* -------------------------------------------------------- */
        $this->load->library('form_validation');

        $this->form_validation->set_rules('pid', 'Book', 'required');
        $this->form_validation->set_rules('college_id', 'College Name', 'required');
        if ($this->form_validation->run() == FALSE) {
            $this->load->model('college_model');
            if ($this->user_type == 5) {
                $thana_id_array = $this->college_model->get_thana_array($this->_uid);
            } else {
                $thana_id_array = NULL;
            }

            $data['college_list'] = $this->college_model->get_college_all_list('', '', $thana_id_array);

            $data['teacher_list'] = $this->CM->getAllWhere('teachers', array('college_id' => $college_id));

            $data['department_list'] = $this->CM->getAll('department', 'name ASC');

            $data['book_list'] = $this->RM->book_stock_list_of_mpo($this->_uid);

            $data['college_id'] = $college_id;

            if ($college_id != NULL) {
                $data['college'] = $this->CM->getinfo('college', $college_id);
                // $data['allbooks'] = $this->CM->getcollegebooks($college_id) ;
            }

            $this->load->view('distribute/distribute_book_form', $data);
        } else {
            // transfer  table start 
            $this->db->trans_start();

            if ($this->input->post('college_id') != '') {
                $pur_info['college_id'] = $this->input->post('college_id');
            }

            if ($this->input->post('teacher_id') != '') {
                $pur_info['teacher_id'] = $this->input->post('teacher_id');
            }

            if ($this->input->post('comments') != '') {
                $pur_info['comments'] = $this->input->post('comments');
            }

            $pur_info['status'] = 1;
            $pur_info['entryby'] = $this->_uid;

            $purchase_date = strtotime($this->input->post('date'));
            $pur_info['distribute_date'] = date('d-m-Y');

            $pid = $this->input->post('pid');
            $cost = $this->input->post('price');
            $quantity = $this->input->post('qty');

            $d_id = $this->CM->insert('tbl_distribute', $pur_info);

            $order = count($pid);
            if (!empty($d_id)) {
                for ($i = 0; $i < $order; $i++) {
                    $product_id = $pid[$i];
                    $book_info = $this->CM->getwhere('books', array('id' => $product_id));
                    $datas['distribute_id'] = $d_id; //purchase item table start
                    $datas['book_id'] = $pid[$i];


                    // $datas['price']=$cost[$i];
                    $datas['quantity'] = $quantity[$i];

                    $datas['line_no'] = $i;
                    $datas['status'] = 1;
                    $this->CM->insert('tbl_distribute_books', $datas);

                    // Update College  inventory 
                    // get College current book info
                    $current_c_b = $this->CM->getwhere('tbl_book_stock_for_distribute', array('mpo_id' => $this->_uid, 'book_id' => $product_id));
                    //var_dump($current_c_b) ;
                    $dataud['quantity'] = $current_c_b->quantity - $quantity[$i];
                    $this->CM->update('tbl_book_stock_for_distribute', $dataud, $current_c_b->id);
                }
            }

            $this->db->trans_complete();

            if ($this->db->trans_status() === TRUE) {
                $msg = "Operation Successfull!!";
                $this->session->set_flashdata('success', $msg);
                redirect('report/distribute');
            } else {
                echo $msg = "There is an error, Please try again!!";
                $this->session->set_flashdata('error', $msg);
            }
        }

        /* -------------------------------------------------------- */
    }

    public function view($id) {

        $data['distribution_info'] = $this->CM->getwhere('tbl_distribute', array('id' => $id));

        $data['book_list'] = $this->RM->distribute_books_report($id);

        $this->load->view('distribute/view', $data);
    }

}

?>
