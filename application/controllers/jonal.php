<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Jonal extends CI_Controller 
{
	public $uid;
	public $module;
    public $user_type;
        
	public function __construct() {
	parent::__construct();

	$this->load->model('Commons', 'CM') ;  
	$this->module='jonal';
	$this->uid = $this->session->userdata('uid');
    $this->user_type = $this->session->userdata('user_type');
        
        
    }

    public function index(){
        
        if (!$this->CM->checkpermissiontype($this->module, 'index', $this->user_type))
            redirect('error/accessdeny');
        
        $this->load->model('join_model');
        $this->load->model('rezonal_model');


        $no_rows= $this->rezonal_model->getTotalRow('jonal');
        $this->load->library('pagination');
        $config['base_url'] = base_url().'jonal/index/';
       
        $config['total_rows'] = $no_rows ;
        $config['per_page'] = 15;
        $config['full_tag_open'] = '<div class=" text-center"><ul class=" list-inline list-unstyled " id="listpagiction">';
        $config['full_tag_close'] = '</ul></div>';
        $config['prev_link'] = '&lt; Prev';
        $config['prev_tag_open'] = '<li class="link_pagination">';
        $config['prev_tag_close'] = '</li>';
        $config['next_link'] = 'Next &gt;';
        $config['next_tag_open'] = '<li class="link_pagination">';
        $config['next_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li class="active_pagiction"><a href="#">';
        $config['cur_tag_close'] = '</a></li>';
        $config['num_tag_open'] = '<li class="link_pagination">';
        $config['num_tag_close'] = '</li>';
        $config['last_link'] = 'Last';
        $config['first_link'] = 'First';
        $this->pagination->initialize($config);     
        
        // $data['jonal_list']=$this->CM->getTotalALL('jonal',$this->uri->segment(3), $config['per_page']);


        $data['jonal_list']= $this->rezonal_model->get_all_jonal_info($this->uri->segment(3), $config['per_page']);

    	$this->load->view('jonal/index', $data);
    }

    public function add()
    {
      if (!$this->CM->checkpermissiontype($this->module, 'add', $this->user_type))
            redirect('error/accessdeny');

        $data['division_list']=$this->CM->getTotalALL('division');
        $data['district_list']=$this->CM->getTotalALL('district');
        $data['jonal_head_list']=$this->CM->getAllwhere('user', array('user_type' => 4)); // Here Jonal Head User Type ID is 4

        
        $data['division_id']="";

        $data['name'] = "";
      
        $this->load->library('form_validation');

        $this->form_validation->set_rules('name', 'required');
        if ($this->form_validation->run() == FALSE)
        {
            $this->load->view('jonal/form', $data); 
        }
        else
        {
           
            $datas['name'] = $this->input->post('name'); 
            $division_id=$datas['div_id'] = $this->input->post('division_id');
            $datas['jonal_head_id'] = $this->input->post('jonal_head_id');
            
            
            $datas['status'] = 1;
            
            $jonal_id = $insert = $this->CM->insert('jonal',$datas) ; 
            $district_list      = $this->input->post('district_list');
           
            if ($district_list) 
                
                foreach ($district_list as $value) {
                   $insert = $this->CM->insert('zonal_group', array('zonal_id' => $jonal_id, 'district_id' => $value, 'division_id' => $division_id));
                }
            
            if($insert)
            {
                $msg = "Operation Successfull!!";
        		$this->session->set_flashdata('success', $msg);
                redirect('jonal'); 
            }
            else 
            {
                $msg = "There is an error, Please try again!!";
        		$this->session->set_flashdata('error', $msg);
        		$this->load->view('jonal/form', $data); 
            }
              redirect('jonal','refresh'); 
        }
        
    }

    public function edit($id)
    {
         if (!$this->CM->checkpermissiontype($this->module, 'edit', $this->user_type))
            redirect('error/accessdeny');
        
        $content = $this->CM->getInfo('jonal', $id) ; 
        $jonal_id = $content->id;
        $division_id = $content->div_id;
        $this->load->model('join_model');                
        $data['district_info'] = $this->join_model->get_all_district_where_zonal_info( $jonal_id);
        
        $data['division_list']=$this->CM->getTotalALL('division');
        $data['district_list']=$this->CM->getTotalALL('district');
        $data['jonal_head_list']=$this->CM->getAllwhere('user', array('user_type' => 4)); // Here Jonal Head User Type ID is 4
        
        $data['name'] = $content->name;
        $data['division_id'] = $content->div_id;
        $data['jonal_head_id'] = $content->jonal_head_id;

        $this->load->library('form_validation');
        $this->form_validation->set_rules( 'name', 'required');
        if ($this->form_validation->run() == FALSE)
        {
                $this->load->view('jonal/form', $data); 
        }
        else
        {
            $datas['name'] = $this->input->post('name'); 
            $datas['div_id'] = $this->input->post('division_id');
            $datas['jonal_head_id'] = $this->input->post('jonal_head_id');      
 
                if($this->CM->update('jonal', $datas, $id)){

                $this->CM->delete('zonal_group', array('zonal_id' => $id));
                    $district_list= $this->input->post('district_list');
           
                    if ($district_list) 
                        
                        foreach ($district_list as $value) {
                           $insert = $this->CM->insert('zonal_group', array('zonal_id' => $jonal_id, 'district_id' => $value, 'division_id' => $division_id));
                        }

                    $msg = "Operation Successfull!!";
                    $this->session->set_flashdata('success', $msg);
                    redirect('jonal'); 
                }
        }
        
    }
    
    
    public function jonaluser($jonla_id){
        if (!$this->CM->checkpermissiontype($this->module, 'jonaluser', $this->user_type))
            redirect('error/accessdeny');
       
        
                $no_rows= count($this->CM->getAllWhere('user', array('jonal_id' => $jonla_id)));
                $this->load->library('pagination');
                $config['base_url'] = base_url().'user/index/';
               
                $config['total_rows'] = $no_rows ;
                $config['per_page'] = 15;
                $config['full_tag_open'] = '<div class=" text-center"><ul class=" list-inline list-unstyled " id="listpagiction">';
                $config['full_tag_close'] = '</ul></div>';
                $config['prev_link'] = '&lt; Prev';
                $config['prev_tag_open'] = '<li class="link_pagination">';
                $config['prev_tag_close'] = '</li>';
                $config['next_link'] = 'Next &gt;';
                $config['next_tag_open'] = '<li class="link_pagination">';
                $config['next_tag_close'] = '</li>';
                $config['cur_tag_open'] = '<li class="active_pagiction"><a href="#">';
                $config['cur_tag_close'] = '</a></li>';
                $config['num_tag_open'] = '<li class="link_pagination">';
                $config['num_tag_close'] = '</li>';
                $config['last_link'] = 'Last';
                $config['first_link'] = 'First';
                $this->pagination->initialize($config);     
        
        $data['user_list']=$this->CM->getAllWhere('user', array('jonal_id' => $jonla_id),   $this->uri->segment(3), $config['per_page']);
        $data['jonal'] = $this->CM->getInfo('jonal', $jonla_id) ; 
        $this->load->view('jonal/jonaluser',$data);  
    }

    public function search(){
        if (!$this->CM->checkpermissiontype($this->module, 'index', $this->user_type))
            redirect('error/accessdeny');
        
        // $data['jonal_list']=$this->CM->getTotalALL('jonal');
        $this->load->model('join_model');
        $search = $this->input->post('search');

        $no_rows= $this->CM->getTotalRow('jonal', $search);
 
        $this->load->library('pagination');
        $config['base_url'] = base_url().'jonal/index/';
       
        $config['total_rows'] = $no_rows ;
        $config['per_page'] = 15;
        $config['full_tag_open'] = '<div class=" text-center"><ul class=" list-inline list-unstyled " id="listpagiction">';
        $config['full_tag_close'] = '</ul></div>';
        $config['prev_link'] = '&lt; Prev';
        $config['prev_tag_open'] = '<li class="link_pagination">';
        $config['prev_tag_close'] = '</li>';
        $config['next_link'] = 'Next &gt;';
        $config['next_tag_open'] = '<li class="link_pagination">';
        $config['next_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li class="active_pagiction"><a href="#">';
        $config['cur_tag_close'] = '</a></li>';
        $config['num_tag_open'] = '<li class="link_pagination">';
        $config['num_tag_close'] = '</li>';
        $config['last_link'] = 'Last';
        $config['first_link'] = 'First';
        $this->pagination->initialize($config);     
        
        // $data['jonal_list']=$this->CM->getTotalALL('jonal',$this->uri->segment(3), $config['per_page']);

        $data['search'] = $search;
        $data['jonal_list']= $this->join_model->get_all_search_jonal_info($this->uri->segment(3), $config['per_page'], $search);
               
        // $data['jonal_list']=$this->CM->search('jonal', $search);
        

        $this->load->view('jonal/search', $data);
    }

    public function delete($id) {
        if (!$this->CM->checkpermissiontype($this->module, 'delete', $this->user_type))
            redirect('error/accessdeny');

        if ($this->CM->delete_db('jonal', $id)) {
            $msg = "Operation Successfull!!";
            $this->session->set_flashdata('success', $msg);
        } else {
            $msg = "There is an error, Please try again!!";
            $this->session->set_flashdata('error', $msg);
        }

        redirect('jonal');
    }
    
    
}