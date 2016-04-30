<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Year extends MY_Controller 
{
    public $uid;
    public $module;
    public $user_type;

    public function __construct() {
    parent::__construct();

    
    $this->module='year';
    $this->uid=$this->session->userdata('uid');
    $this->user_type = $this->session->userdata('user_type');
    }

    public function index()
    {
        if (!$this->CM->checkpermissiontype($this->module, 'index', $this->user_type))
            redirect('error/accessdeny');

        $data['content_list']=$this->CM->getAll('tbl_class');
        $this->load->view('class/index', $data);
    }

    public function add()
    {
      if (!$this->CM->checkpermissiontype($this->module, 'add', $this->user_type))
            redirect('error/accessdeny');
       
        
        $data['name'] = "";
        //$data['status'] = "";
      
        $this->load->library('form_validation');

        $this->form_validation->set_rules('name', 'required');
        if ($this->form_validation->run() == FALSE)
        {
            $this->load->view('class/form', $data); 
        }
        else
        {
            
            $datas['name'] = $this->input->post('name'); 
            
            $datas['status'] = 1;
          
            

            $insert = $this->CM->insert('tbl_class',$datas) ; 
            if($insert)
            {
                $msg = "Operation Successfull!!";
                $this->session->set_flashdata('success', $msg);
                redirect('year'); 
            }
            else 
            {
                $msg = "There is an error, Please try again!!";
                $this->session->set_flashdata('error', $msg);
                $this->load->view('class/form', $data); 
            }
              redirect('year','refresh'); 
        }
        
    }


    public function edit($id)
    {
         if (!$this->CM->checkpermissiontype($this->module, 'edit', $this->user_type))
            redirect('error/accessdeny');
        
        $content = $this->CM->getInfo('tbl_class', $id) ; 
       
        
        
        $data['name'] = $content->name;
        //$data['status'] = $content->status;
        
        $this->load->library('form_validation');
        $this->form_validation->set_rules( 'name', 'required');
        if ($this->form_validation->run() == FALSE)
        {
                $this->load->view('class/form', $data); 
        }
        else
        {
            $datas['name'] = $this->input->post('name'); 
            //$datas['status'] = $this->input->post('status');
            //$datas['entryby']=$this->session->userdata('uid');       
 
                if($this->CM->update('tbl_class', $datas, $id)){
                    $msg = "Operation Successfull!!";
                    $this->session->set_flashdata('success', $msg);
                    redirect('year'); 
                }
        }
        
    }

    public function delete($id) {
        if (!$this->CM->checkpermissiontype($this->module, 'delete', $this->user_type))
            redirect('error/accessdeny');

        if ($this->CM->delete_db('tbl_class', $id)) {
            $msg = "Operation Successfull!!";
            $this->session->set_flashdata('success', $msg);
        } else {
            $msg = "There is an error, Please try again!!";
            $this->session->set_flashdata('error', $msg);
        }

        redirect('year');
    }

    public function getclassbydepartment($department_id){
        $class_list=$this->CM->getAllWhere('tbl_class', array('id' => $department_id));
        
//        echo '<pre>';
//        print_r($department_list);
//        exit();
        
        echo json_encode($class_list); 
        
    }



}