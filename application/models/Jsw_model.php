<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Jsw_model extends CI_Model {

    function __construct() {
        parent::__construct();
		$this->load->database();
		$this->load->library('email');
		$this->load->helper('file');
    }

    function clear_cache() {
        $this->output->set_header('Cache-Control: no-store, no-cache, must-revalidate, post-check=0, pre-check=0');
        $this->output->set_header('Pragma: no-cache');
    }
	
	
    public function select_data_info($table)
    {       
        return $this->db->get_where($table)->result_array();
    }

    public function save_data_info($tbl_name,$data_array)
	{
		$insert_id=$this->db->insert($tbl_name,$data_array);
		//echo $insert_id;die;
		if($insert_id)
		{
			return $insert_id;
		}
		return false;
	}
        
        public function update_data_info($tbl_name,$data,$where)
	{
		$this->db->where($where);
		$details=$this->db->update($tbl_name,$data);
		if($details)
		{
			return $details;
		} 
		return false;			
	}
        
        public function check_data_info($table,$where){
            $this->db->where($where);
            return $this->db->get_where($table)->result_array();
        }
        
        public function check_Search_data_info($table,$where1,$where2){
            $this->db->where('date <= ',$where1);
            $this->db->where('date >= ',$where2);
            return $this->db->get($table)->result_array();
        }
        
         public function select_data_where_info($table){
                
                //$this->db->select('*');
                //$this->db->group_by("Equipment");
//$this->db->distinct("Equipment");
            return $this->db->get($table);
        }
                
    function delete_data_info($tbl_name,$where)
    {
        $this->db->where($where);
        $details = $this->db->delete($tbl_name);
        if($details)
		{
			return $details;
		} 
		return false;
    }
	
    public function call_stored_procedure(){
        
        $data = $this->db->query("EXEC SP_ECVesselperformance '2018-05-01 7:00:00','2018-06-25 09:06'")->result_array();
        return $data;
        
    }

     function is_logged_in()
            {
                 if ($this->session->userdata('admin_login') == 1 || $this->session->userdata('user_login') == 1 ) {                
                  echo 1;// $this->session->set_userdata('last_page', current_url());  		
                }
                else{                 
                    echo 0;//redirect(base_url().'Login');                     
                }
            }
            
              function is_admin_logged_in()
            {
                 if ($this->session->userdata('admin_login') == 1 && $this->session->userdata('userType') == 1 ) {                
                   $this->session->set_userdata('last_page', current_url());  		
                }
                else{                 
                    redirect(base_url().'Home');                     
                }
            }
     /*****login funtionality start********/
    
	function validate_login_info($email,$password){
		
		$password = strrev(sha1(md5($password)));
                
                $users = $this->db->get_where('tblusers', array('email' => $email,'password' => $password));	
		if($users->num_rows() > 0) {
                        $row = $users->row();
                        if($row->userType==1){
                        $this->session->set_userdata('admin_login', '1');
                        $this->session->set_userdata('log_id', $row->user_id);
                        $this->session->set_userdata('AD_User_id', $row->AD_user_id);
                        $this->session->set_userdata('log_email', $row->email);
                        $this->session->set_userdata('log_name', $row->emp_name);
                        $this->session->set_userdata('userType', $row->userType);
                        $this->session->set_userdata('log_type', 'admin');
                        echo '1';
                    }                      
                     else{
                        $this->session->set_userdata('user_login', '1');
                        $this->session->set_userdata('log_id', $row->user_id);
                        $this->session->set_userdata('AD_User_id', $row->AD_user_id);
                        $this->session->set_userdata('log_email', $row->email);
                        $this->session->set_userdata('log_name', $row->emp_name);
                        $this->session->set_userdata('userType', $row->userType);
                        $this->session->set_userdata('log_type', $row->Dept);
                        echo '1';
                    }                   
                }
                else{
			echo 'Invalid Login Details.';
		}
		
		
	}
        
        function validate_code_info($emp_code){
            $users = $this->db->get_where('tblusers', array('AD_user_id' => $emp_code));	
		if($users->num_rows() > 0) {
                        $row = $users->row();
                        $this->session->set_userdata('forgot_pass', '1');
                        $this->session->set_userdata('forgot_pass_log_id', $row->user_id);
                        echo '1';
                        }else{
                             echo 'Invalid Employee Code';
                        }
        }
        
      function is_access_in($value){
        $cond = array('userType' => $this->session->userdata('userType'));
        $dept_info= $this->check_data_info('dbo.UserTypes',$cond);    
        foreach($dept_info as $dpt){
            $array =  explode(',', $dpt['Access_pages']);        
                foreach ($array as $item) {
                 if($item==$value){
                     return 1;
                       }else{
                    
                 }
               }
           }
      }
	
	
	
}