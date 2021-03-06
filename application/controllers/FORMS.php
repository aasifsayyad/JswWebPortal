<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class FORMS extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->database();        	
        $this->load->library('session');
	$this->load->library('form_validation');
        $this->load->model('jsw_model');
       // $this->jsw_model->is_logged_in();
        $this->load->helper('file');
        $this->load->helper(array('form', 'url'));
         /* cache control */
        $this->output->set_header('Cache-Control: no-store, no-cache, must-revalidate, post-check=0, pre-check=0');
        $this->output->set_header('Pragma: no-cache');
    }
        
       public function index()
	{
                if ($this->session->userdata('admin_login') == 1 || $this->session->userdata('user_login') == 1 ){ 
            $data['mydiv'] = "Forms";
            $data['mydiv2'] = "Jetty";
            $data['mydiv3'] = "";
            $data['title'] = "Jetty";
            $data['linkUrl'] = "";
            $data['month_info'] = $this->jsw_model->select_data_info('dbo.TblMonth'); 
            $this->load->view('jsw/Jettyforms',$data);  
            }else{
                       redirect(base_url().'Login');        
               }
	} 
        
        public function Jetty()
	{
                 if ($this->session->userdata('admin_login') == 1 || $this->session->userdata('user_login') == 1 ){ 
            $data['mydiv'] = "Forms";
            $data['mydiv2'] = "Jetty";
            $data['mydiv3'] = "";
            $data['title'] = "Jetty";
            $data['linkUrl'] = "";
            $data['month_info'] = $this->jsw_model->select_data_info('dbo.TblMonth'); 
            $this->load->view('jsw/Jettyforms',$data);  
            }else{
                       redirect(base_url().'Login');        
               }
	} 
        
        public function MBC()
	{
                 if ($this->session->userdata('admin_login') == 1 || $this->session->userdata('user_login') == 1 ){ 
            $data['mydiv'] = "Forms";
            $data['mydiv2'] = "MBC";
            $data['mydiv3'] = "";
            $data['title'] = "MBC";
            $data['linkUrl'] = "";
            $this->load->view('jsw/MBCform',$data);  
            }else{
                       redirect(base_url().'Login');        
               }
	}   
         public function CargoDespatch()
	{
                  if ($this->session->userdata('admin_login') == 1 || $this->session->userdata('user_login') == 1 ){ 
            $data['mydiv'] = "Forms";
            $data['mydiv2'] = "Cargo Despatch";
            $data['mydiv3'] = "";
            $data['title'] = "Cargo Despatch";
            $data['linkUrl'] = "";
            $this->load->view('jsw/CargoDespatchform',$data);   
            }else{
                       redirect(base_url().'Login');        
               }
	}  
         public function RateForm()
	{
                  if ($this->session->userdata('admin_login') == 1 || $this->session->userdata('user_login') == 1 ){ 
            $data['mydiv'] = "Forms";
            $data['mydiv2'] = "Rate Form";
            $data['mydiv3'] = "";
            $data['title'] = "Rate Form";
            $data['linkUrl'] = "";
            $this->load->view('jsw/RateForm',$data);            
            }else{
                       redirect(base_url().'Login');        
               }
	}  
         public function EquipmentDelay()
	{
                  if ($this->session->userdata('admin_login') == 1 || $this->session->userdata('user_login') == 1 ){ 
            $data['mydiv'] = "Forms";
            $data['mydiv2'] = "Equipment Delay";
            $data['mydiv3'] = "";
            $data['title'] = "Equipment Delay";
            $data['linkUrl'] = "";
            $this->load->view('jsw/EquipmentDelayform',$data);     
            }else{
                       redirect(base_url().'Login');        
               }
	}  
        
}
