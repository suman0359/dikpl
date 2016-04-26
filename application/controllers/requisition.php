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

      // echo "<pre>";
      // print_r($_POST);
      // print_r($this->input->post('book_name'));
      // echo "<br>";
      // print_r($this->input->post('department_id'));
      // echo "<br>";
      // print_r($this->input->post('group_id'));
      // exit();
      
         
        
       $data['pro_list']=$this->CM->getAll('books');
       $data['dep_list']=$this->CM->getAll('department');
       $data['group_list']=$this->CM->getAll('group');
  
        $data['id']="";
        $data['book_name']="";
        $data['department_id']="";
        $data['group_id']="";
        $data['amount']="";
        $data['quantity']="";
      
       $jid = $this->session->userdata('jonal_id');
       $user_id = $this->session->userdata('uid');

        // $data['college_list'] = $this->CM->getAllWhere('college', array('jonal_id'=>$jid), 'name ASC') ; 
        // $data['department_list'] = $this->CM->getAll('department', 'name ASC') ;
        
          
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

            $invoice = date('Y')."-".date("m")."-".sprintf('%03d', $ord_id);
                   
            $requisition['comments']=  $this->input->post('comments');
            $requisition['status']= 1;

            $requisition['requisition_by']=$this->_uid;   

            $requisition['book_name']="";
            $requisition['department_id']="";
            $requisition['group_id']="";
            $requisition['amount']="";
            $requisition['quantity']="";
            
            $purchase_date= strtotime( $this->input->post('date'));  

            $this->db->insert('tbl_requisition', $requisition);
            $requisition_id = $this->db->insert_id();
            
            $this->CM->generate_invocie_no('tbl_requisition', $invoice, $requisition_id);
                            
            $requisition_id=$this->CM->insert('requisition',$pur_info);
             
             $order=count($pid);
                if(!empty($requisition_id))
                    {
                        for($i=0;$i<$order;$i++)
                        {
                            $product_id=$pid[$i];
                            $book_info=$this->CM->getwhere('books',array('id'=>$product_id));
                            $datas['requisition_id']=$requisition_id; //purchase item table start
                            $datas['book_id']=$pid[$i];
                            
                            
                            $datas['price']=$cost[$i];
                            $datas['quantity']=$quantity[$i];
                            
                            $datas['line_no']=$i;
                            $datas['status']=1;
                            $this->CM->insert('requisition_books',$datas);
                                
                            }
                            
                        }
                   
                        
                    $this->db->trans_complete();
                     
                    if($this->db->trans_status() === TRUE)
                       {
                           $msg = "Operation Successfull!!";
                           $this->session->set_flashdata('success', $msg); 
                           redirect('report/requisition/');
                           
                       }
                       else 
                       {
                           $msg = "There is an error, Please try again!!";
                           $this->session->set_flashdata('error', $msg); 
                            redirect('requisition/add');
                       }
                       
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
