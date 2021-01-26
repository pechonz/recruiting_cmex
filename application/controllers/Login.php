<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class login extends CI_Controller {

	public function index()
	{
		$data['title'] = 'Codeigniter login with session';
		$this->load->view('css');
		$this->load->view('header');
		$this->load->view('nav_user');
		$this->load->view('view_login',$data);
		$this->load->view('js');
		$this->load->view('footer');
	}

	public function login_validation()
	{
		$this->load->library('form_validation');  
           $this->form_validation->set_rules('username', 'Username', 'required');  
           $this->form_validation->set_rules('password', 'Password', 'required');  
           if($this->form_validation->run())  
           {  
                //true  
                $username = $this->input->post('username');  
                $password = $this->input->post('password');  
                //model function  
                $this->load->model('userverify_model');  
                if($this->userverify_model->can_login($username, $password))  
                {  
                     $session_data = array(  
                          'username'     =>     $username  
                     );  
                     $this->session->set_userdata($session_data);
                       
                     redirect(base_url() . 'admin');  
                }  
                else  
                {  
                     $this->session->set_flashdata('error', 'Invalid Username or Password');  
                     redirect(base_url() . 'login');  
                }  
           }  
           else  
           {  
                //false  
                $this->index();  
           }  
	}

	function enter(){  
           if($this->session->userdata('username') != '')  
           {  
                echo '<h2>Welcome - '.$this->session->userdata('username').'</h2>';  
                echo '<label><a href="'.base_url().'logout">Logout</a></label>';  
           }  
           else  
           {  
                redirect(base_url() . 'login');  
           }  
      }  

      function logout()  
      {  
           $this->session->sess_destroy();
           redirect(base_url() . 'login');  
      }  
}