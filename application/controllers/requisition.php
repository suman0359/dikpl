<?php
class Requisition extends MY_Controller{
     
    public $_uid ; 
    public function __construct() {
        parent::__construct();
          $this->checklogin() ;
        $this->load->model('Purchase_model', 'PM');
        
        $this->_uid = $this->session->userdata('uid');
    }
    public function index()
    {
      
        
        
//        $this->load->view('purchase/index');
        $this->load->view('requisition/report');
        
    }
    public function add(){
              
       $data['pro_list']=$this->CM->getAll('books');

       
       $data['dep_list']=$this->CM->getAll('department');
       $data['class_list']=$this->CM->getAll('tbl_class');

        
        $data['id']           = "";
        $data['book_name']    = "";
        $data['department_id']= "";
        $data['group_id']     = "";
        $data['amount']       = "";
        $data['quantity']     = "";
      
      
       $user_id = $this->session->userdata('uid');

          
        $this->load->library('form_validation');

        // $this->form_validation->set_rules('book_name', 'Book Name', '|required|min_length[1]|max_length[12]');
        $this->form_validation->set_rules('book_name', 'department_id', 'group_id',  'required');
        if ($this->form_validation->run() == FALSE)
        {
            $this->load->view('requisition/form', $data); 
        }
        else
        {
          
           //purchase table operation
            $this->db->trans_start();

            // This is for check and merge book id and book quantity
            /* ************************************* */
            $book_id        = $this->input->post('book_name');
            $book_quantity  = $this->input->post('book_quantity');
            $department_id  = $this->input->post('department_id');
            $class_id       = $this->input->post('class_id');
            $type           = $this->input->post('book_type');

            for ($i=0; $i < count($book_id); $i++) {
              $book_info = $this->CM->getInfo('books', $book_id[$i]);
              $book_sell_price = $book_info->sell_price;
              $regular_price = $book_info->regular_price;

              $book[] = array(
                'book_id' => $book_id[$i], 
                'book_quantity' => $book_quantity[$i]
                );

              $requisition_details[] = array(
                'book_id'       => $book_id[$i], 
                'qutantity'     => $book_quantity[$i], 
                'price'         => $regular_price, 
                'sell_price'    => $book_sell_price, 
                'department_id' => $department_id
                );
            }
            /* ************************************* */
            

            // This option for get total book sell_price 
            
            $total_amount = 0;
            
            foreach ($book as $key => $value) {
              
              $book_info = $this->CM->getInfo('books', $value['book_id']);
              $book_sell_price = $book_info->sell_price;
              
              $total_amount +=$book_sell_price*$value['book_quantity'];
            }
           
            /* ************************************************** */

            // This option for get total order of book quantity 
            // $book_quantity = $this->input->post('book_quantity');
            $total_book_quantity = array_sum($book_quantity);

            
            
            /* ************************************************** */
                   
            $requisition['comment']             =  $this->input->post('comment');
            
            
            $requisition['status']              = 1;
            
            $requisition['requisition_status']  = 1;
            $requisition['requisition_by']      = $this->_uid;   
            $requisition['total_amount']        = $total_amount;
            $requisition['total_quantity']      = $total_book_quantity;
            $requisition['date']                = date("Y-m-d");
            
            $requisition_id = $this->CM->insert('tbl_requisition', $requisition);

            
            $invoice = date('Y')."-".date("m")."-".sprintf('%03d', $requisition_id);
            $this->CM->update('tbl_requisition', array('invoice_no' => $invoice), $requisition_id);
            /* ************************************************************* */        
            for ($i=0; $i < count($book_id); $i++) {
              $book_info = $this->CM->getInfo('books', $book_id[$i]);
              $book_sell_price = $book_info->sell_price;
              $regular_price  = $book_info->sell_price;

              if($regular_price ==NULL){ $regular_price = 0;}
              if($book_sell_price ==NULL){ $book_sell_price = 0;}
                            
              $book_requisition_details[] = array(
                'requisition_id'  => $requisition_id, 
                'book_id'         => $book_id[$i], 
                'quantity'        => $book_quantity[$i], 
                'price'           => $regular_price, 
                'sell_price'      => $book_sell_price, 
                'department_id'   => $department_id[$i],
                'class_id'        => $class_id[$i],
                'book_type'       => $type
                );
              
            }

           
            foreach ($book_requisition_details as $key => $value) {
              $this->CM->insert('tbl_requisition_details', $value);
            }
            
            /* *************************************************************** */
            $this->db->trans_complete();
            

            $msg = "Operation Successfull!!";
            $this->session->set_flashdata('success', $msg); 
            redirect('report/requisition/');
                
                       
            }        
          
        }
     
     

   
        public function suggation()
        {
            $term = $this->input->get('term') ; 
            
           $data =  $this->PM->product_suggation($term) ; 
           foreach($data as $d)
           {
               $ds[] = array('label' => $d['book_name'], 'value' => $d['id']) ; 
               
           }
           echo json_encode($ds) ; 
        }
        
        
        
    
        
        public function getproduct($id)
        {
           
            $product=$this->CM->getwhere('books',array('id'=>$id));
            echo json_encode($product);
        }
        
        public function printpreview($id)
        {
           
            
           if( !$this->CM->checkpermission($this->module,'printpreview',$this->uid))                 
           redirect ('error/accessdeny');
           
           
           
              $data['purchase_info']=$this->CM->getwhere('purchase',array('id'=>$id));
              
            if(empty ($id) || empty ($data['purchase_info']))
            {
                redirect('report/report_item');
            }
              $data['company_info']=$this->CM->getwhere('company_information',array('id'=>1));
              $this->load->view('purchase/printpreview',$data);    
        }
       
        
        public function view($id){
              $data['requisition_info']=$this->CM->getwhere('tbl_requisition',array('id'=>$id));
              $data['book_list']=$this->RM->getRequisitionBooks($id); 
             
              
            if(empty ($id) || empty ($data['purchase_info'])){
              //  redirect('report/report_item');
            }
           
              $this->load->view('requisition/printpreview',$data);    
        }
       
}

?>
