<?php
class User_model extends CI_Model{

    public function __construct(){
        parent::__construct();
        $this->user_type = $this->session->userdata('user_type');
    }

    public function select_all_user(){ 
        $this->db->select('user.id as id, user.name as name, image, address, email, phone, user_type, user.status, tbl_user_role.name as role_name, value as user_role');

        if($this->user_type==1){
            $this->db->where('user_type >=', $this->user_type);
        }else{
            $this->db->where('user_type >', $this->user_type);
        }        

        if($this->user_type!=1){
            $this->db->where('user.status !=', 13);
            $this->db->where('user.status !=', 0);
        }
        
        $this->db->where('user_type !=', 5);

        $this->db->order_by('user_type', 'ASC');
        

        $this->db->from('user');
        $this->db->join('tbl_user_role', 'tbl_user_role.value = user.user_type','left');

        $query_result = $this->db->get();
        $result = $query_result->result_array();
        return $result;
    }

}