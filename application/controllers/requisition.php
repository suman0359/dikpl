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
      
        
        $data ; 
        $this->load->view('purchase/index',$data);
        
    }
    public function add(){

        
       $data['pro_list']=$this->CM->getAll('books');
       $data['dep_list']=$this->CM->getAll('department');
       $data['group_list']=$this->CM->getAll('group');
  
        $data['id']="";
        $data['book_name']="";
        $data['department_id']="";
        $data['group_id']="";
        $data['amount']="";
        $data['quantity']="";
      
      
       $user_id = $this->session->userdata('uid');

          
        $this->load->library('form_validation');

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
            $book_id = $this->input->post('book_name');
            $book_quantity = $this->input->post('book_quantity');

            for ($i=0; $i < count($book_id); $i++) {
              $book_info = $this->CM->getInfo('books', $book_id[$i]);
              $book_rate = $book_info->rate;

              $book[] = array('book_id' => $book_id[$i], 'book_quantity' => $book_quantity[$i]);
              $requisition_details[] = array('book_id' => $book_id[$i], 'qutantity' => $book_quantity[$i], 'price' => $book_rate);
            }
            /* ************************************* */
            
            // This option for get total book rate 
            
            $total_amount = 0;
            
            foreach ($book as $key => $value) {
              
              $book_info = $this->CM->getInfo('books', $value['book_id']);
              $book_rate = $book_info->rate;
              
              $total_amount +=$book_rate*$value['book_quantity'];
            }
            /* ************************************************** */

            // This option for get total order of book quantity 
            // $book_quantity = $this->input->post('book_quantity');
            $total_book_quantity = array_sum($book_quantity);

            
            
            /* ************************************************** */
                   
            $requisition['comment']             =  $this->input->post('comment');
            $requisition['status']              = 1;
            $requisition['type']                = 1;
            $requisition['requisition_status']  = 1;
            $requisition['requisition_by']      = $this->_uid;   
            $requisition['total_amount']        = $total_amount;
            $requisition['total_quantity']      = $total_book_quantity;

            $requisition_id = $this->CM->insert('tbl_requisition', $requisition);

            
            $invoice = date('Y')."-".date("m")."-".sprintf('%03d', $requisition_id);
            $this->CM->update('tbl_requisition', array('invoice_no' => $invoice), $requisition_id);
            /* ************************************************************* */        
            for ($i=0; $i < count($book_id); $i++) {
              $book_info = $this->CM->getInfo('books', $book_id[$i]);
              $book_rate = $book_info->rate;

              $book_requisition_details[] = array('requisition_id' => $requisition_id, 'book_id' => $book_id[$i], 'qutantity' => $book_quantity[$i], 'price' => $book_rate);
              
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
       
        
        public function view($id)
        {
              $data['requisition_info']=$this->CM->getwhere('requisition',array('id'=>$id));
              $data['book_list']=$this->RM->getRequisitionBooks($id); 
              
              
            if(empty ($id) || empty ($data['purchase_info']))
            {
              //  redirect('report/report_item');
            }
           
              $this->load->view('requisition/printpreview',$data);    
        }
       
}

?>
