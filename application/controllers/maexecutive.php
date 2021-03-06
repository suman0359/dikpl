<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Maexecutive extends CI_Controller 
{
         public $uid;
         public   $module;
         public $user_type;
         
         public function __construct() {
         parent::__construct();
        
            $this->load->model('Commons', 'CM') ;  
            $this->module='maexecutive';
            $this->uid=$this->session->userdata('uid');
            $this->user_type = $this->session->userdata('user_type');
    }
    
    public function index()
    {
              
	
	if (!$this->CM->checkpermissiontype($this->module, 'index', $this->user_type))
            redirect('error/accessdeny');

    	$data['user_list']=$this->CM->getTotalALL('thana');
        $this->load->model('marketing_executive_model');
	

        // $data['thana_info']= $this->join_model->get_thana_info();
        
    	   // $no_rows= count($this->CM->getAllWhere('user', array('user_type' => '5')));
         $no_rows= $this->marketing_executive_model->count_get_all_marketing_promotion_officer_info('user');
        $this->load->library('pagination');
        $config['base_url'] = base_url().'maexecutive/index/';
       
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
        
        // $data['user_info']= $this->join_model->get_mexecutive_info($this->uri->segment(3), $config['per_page']);

        $data['user_info']= $this->marketing_executive_model->get_all_marketing_promotion_officer_info($this->uri->segment(3), $config['per_page']);

        $this->load->view('maexecutive/index',$data);    
    }
    
    public function add()
    {
      if (!$this->CM->checkpermissiontype($this->module, 'add', $this->user_type))
            redirect('error/accessdeny');
      
        $data['id'] = $this->CM->getMaxID('user'); 
        $data['division_list']=$this->CM->getAll('division');
        
        $data['name'] = "";
        $data['phone'] = "";
        $data['image'] = "";
        $data['address'] = "";
        $data['email'] ="";
        $data['password'] ="";
        $data['division_id'] ="";
        $data['district_id'] ="";
        $data['jonal_id'] ="";
        
      
        $this->load->library('form_validation');

        $this->form_validation->set_rules('name','Name', 'required');
        $this->form_validation->set_rules('email','Email Address', 'required|callback_email_check');
        $this->form_validation->set_rules('password','Password', 'required');
        if ($this->form_validation->run() == FALSE)
        {
                $this->load->view('maexecutive/form', $data); 
        }
        else
        {
            
            $datas['name'] = $this->input->post('name'); 
            $datas['phone'] = $this->input->post('phone'); 
            $datas['address'] = $this->input->post('address'); 
            $datas['email'] =$this->input->post('email') ;
            $datas['password'] = md5($this->input->post('password')) ;
            $datas['user_type'] = '5' ;
            $division_id = $datas['division_id'] =$this->input->post('division_id') ;
            $zonal_id = $datas['jonal_id'] =$this->input->post('jonal_id') ;
            
            $district_id = $datas['district_id'] = $this->input->post('district_id');
            // $datas['thana_id'] = $this->input->post('thana_id');
            $datas['status'] = 1;
            $datas['entryby']=$this->session->userdata('uid');       
            

            $config['upload_path'] = './uploads/';
            $config['allowed_types'] = 'gif|jpg|png';
          

            $this->load->library('upload', $config);

            if ( ! $this->upload->do_upload('image')){
                    $error =$this->upload->display_errors();
            }else{
                $data = $this->upload->data();
                $datas['image']=$data['file_name'];
            }
            
            $insert = $this->CM->insert('user',$datas); 
            $mpo_id = $this->db->insert_id();
            $thana_list      = $this->input->post('thana_list');
           
            if (count($thana_list)>0) 
                foreach ($thana_list as $value){
                   $insert = $this->CM->insert('thana_group_for_mpo', array(
                      'mpo_id'      => $mpo_id, 
                      'division_id' => $division_id,
                      'zonal_id'    => $zonal_id,
                      'district_id' => $district_id,
                      'thana_id' => $value
                      ));
                }

            if($insert){
              $msg = "Operation Successfull!!";
          		$this->session->set_flashdata('success', $msg);
              redirect('maexecutive'); 
            }else {
              $msg = "There is an error, Please try again!!";
        		  $this->session->set_flashdata('error', $msg);
        		  $this->load->view('maexecutive/form', $data); 
            }
              redirect('maexecutive','refresh'); 
        }
        
    }
    
    
    
    public function edit($id)
    {
         if (!$this->CM->checkpermissiontype($this->module, 'edit', $this->user_type))
            redirect('error/accessdeny');
        
        $content = $this->CM->getInfo('user', $id) ; 
        $data['division_list']=$this->CM->getAll('division');
       
        
        $data['name'] = $content->name;
        $data['address'] = $content->address;
        $data['phone'] = $content->phone;
        $data['email'] = $content->email;
        $data['image'] = $content->image;
        $data['division_id'] = $content->division_id;
        $data['jonal_id'] = $content->jonal_id;
        $data['district_id'] = $content->district_id;

        $this->load->model('marketing_executive_model');

        $data['thana_info'] = $this->marketing_executive_model->get_all_thana_where_marketing_promotion_officer_info($id);
   
        $password = $content->password;
        
        
        $this->load->library('form_validation');
        $this->form_validation->set_rules( 'email', 'password','required');
        if ($this->form_validation->run() == FALSE){
                $this->load->view('maexecutive/form', $data); 
        }else{
            $datas['name'] = $this->input->post('name'); 
            $datas['phone'] = $this->input->post('phone'); 
            $datas['address'] = $this->input->post('address');
            $datas['email'] = $this->input->post('email'); 
             
           $division_id = $datas['division_id'] =$this->input->post('division_id') ;
           $district_id = $datas['district_id'] =$this->input->post('district_id') ;
            // $datas['thana_id'] =$this->input->post('thana_id') ;
          $zonal_id = $datas['jonal_id'] =$this->input->post('jonal_id') ;
            $datas['entryby']=$this->session->userdata('uid');       
            
            if($this->input->post('password') != "") {
            $datas['password'] = md5($this->input->post('password')) ;
            }
            //$datas['status'] = $this->input->post('status'); 
            
            $config['upload_path'] = './uploads/';
		        $config['allowed_types'] = 'gif|jpg|png';
	

		        $this->load->library('upload', $config);

        		if ( ! $this->upload->do_upload('image')){
        			$error =$this->upload->display_errors();
                                $imgchk=0;
        			
        		}else{
        			 $data =$this->upload->data();
               $datas['image']=$data['file_name'];
               $imgchk=1;
        		}

           if($this->CM->update('user', $datas, $id)){
               if($imgchk==1 && $content->image!==""  )
                     {
                          $path = "./uploads/".$content->image;
                           if (file_exists($path))
                           {
                           unlink($path) or die('failed deleting: ' . $path);
                           }
                            else
                           {echo "error path";}
                    }

                    $this->CM->delete('thana_group_for_mpo', array('mpo_id' => $id));

                    $thana_list      = $this->input->post('thana_list');
           
                    if (count($thana_list)>0) 
                        foreach ($thana_list as $value){
                           $insert = $this->CM->insert('thana_group_for_mpo', array(
                              'mpo_id'      => $id, 
                              'division_id' => $division_id,
                              'zonal_id'    => $zonal_id,
                              'district_id' => $district_id,
                              'thana_id'    => $value
                              ));
                        }
               
               
            $msg = "Operation Successfull!!";
        		$this->session->set_flashdata('success', $msg);
            redirect('maexecutive'); 
           }
          else
            {
             $msg = "There is an error, Please try again!!";
        		 $this->session->set_flashdata('error', $msg);
        		 $this->load->view('maexecutive/form', $data); 
            }
            
        }
        
}



    public function delete($id){
         if (!$this->CM->checkpermissiontype($this->module, 'delete', $this->user_type))
            redirect('error/accessdeny');
        
        if ($this->user_type==1) {
            $this->CM->delete('user', array('id' => $id));
        }else{
            $this->CM->delete_db('user', $id);
        }
        
        $msg = "Operation Successfull!!";
          $this->session->set_flashdata('success', $msg);
        
        redirect($_SERVER['HTTP_REFERER']);
    }
    
    
    
   
    
    public function password($id)
        {
          if(empty($this->uid))  redirect ('userauth/login');
             
             $data['user_info'] = $this->CM->getInfo('user', $id) ; 
            
            $this->load->library('form_validation');
            $this->form_validation->set_rules('password','required');

            if ($this->form_validation->run() == FALSE){
               $this->load->view('user/eform_pas', $data); 
            }else{
                if($this->input->post('password') !== "")
                {
                    $datas['password'] = md5($this->input->post('password')) ;
                }
            
               if($this->CM->update('user', $datas, $id))
                {
                    $msg = "Operation Successfull!!";
                    $this->session->set_flashdata('success', $msg);
                     $this->load->view('user/profile', $data); 
               }
              else
                {
                    $msg = "There is an error, Please try again!!";
                    $this->session->set_flashdata('error', $msg);
                     $this->load->view('user/profile', $data); 
                }
                
            }
           
         }
    
    
    
    
    
    public function profile($id)
    {
        if(empty($this->uid))  redirect ('userauth/login');
        
        $data['user_info'] = $this->CM->getInfo('user', $id) ; 
        $this->load->view('user/profile',$data);
        
        
        }
   
        public function permission($uid)
        {
             if( !$this->CM->checkpermission($this->module,'permission', $this->uid))
             redirect ('error/accessdeny');
             
              $data['plist']=$this->CM->getAll('permission_content');
              $data['uid'] = $uid ; 
              $data['status'] = 1 ; 
    
              $this->load->view('permission/index',$data);
        }
       
        public function permissionset()
        {
            
             $module = $this->input->post('module_name') ; 
             $tm = count($module) ; 
             $datas['uid'] = $this->input->post('uid') ; 
            $uid = $this->input->post('uid') ; 
             
             $this->CM->delete('user_permission',array('uid'=>$uid)) ;              
             for($i = 0; $i < $tm ; $i++)
             {
                 $mod = $module[$i] ; 
                 $mact = $this->input->post($mod."_fname") ; 

                 $act = serialize($mact) ; 
                 $datas['module'] = $mod ; 
                 $datas['m_action'] = $act ; 
                 $datas['status'] = 1 ; 
                 $datas['entryby']=$this->session->userdata('uid');       
                 $this->CM->insert("user_permission", $datas) ; 
             }
        
             redirect('user'); 
        }

    function email_check($email){
        $this->load->model('userauth_model');

        $result = $this->userauth_model->check_email($email);
        if ( ! $result)
        {
            $this->form_validation->set_message('email_check', 'Email is already used by another user. Please choose another email address.');
        }
                
        return $result;
    }
}   
