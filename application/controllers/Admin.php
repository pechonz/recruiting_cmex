<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class admin extends CI_Controller {

	public function __construct()
	{
		parent::__construct();

		$sess_id = $this->session->userdata('username');

	   if(!empty($sess_id))
	   {
	        $this->load->model('recruiting_model');
	   }
	   else
	   {
	        $this->session->set_userdata(array('msg'=>'')); 
	        //load the login page
	        redirect(base_url() . 'login');        
	   }    
	}

	public function index()
	{
		$dataRecruiting['query']=$this->recruiting_model->showdata();
		$dataPosition['query']=$this->recruiting_model->getPosition();
		$dataLocation['query2']=$this->recruiting_model->getLocation();

		// echo '<pre>';
		// print_r($dataLocation);
		// echo '</pre>';
		// exit;
		$this->load->view('css');

		$this->load->view('header');
		$data = '<p class="navbar-text">'.$this->session->userdata('username').'</p>';
		$this->load->view('nav_admin',$data);
		$this->load->view('view_admin',$dataPosition+$dataLocation);
		$this->load->view('table_admin',$dataRecruiting);
		$this->load->view('modal_create',$dataPosition+$dataLocation);
		$this->load->view('js');

		$this->load->view('footer');
	}

	public function create()
	{
		$this->recruiting_model->create();
		redirect('admin');
	}

	public function updateData()
	{
		$this->recruiting_model->update();
		redirect('admin'); 
	}

	public function update($recruiting_id)
	{
		$this->load->view('css');

		$this->load->view('header');
		$data = '<p class="navbar-text">'.$this->session->userdata('username').'</p>';
		$this->load->view('nav_admin',$data);

		$dataUpdate['query3']=$this->recruiting_model->read($recruiting_id);
		// echo '<pre>';
		// print_r($dataUpdate);
		// echo '</pre>';
		// exit;
		$dataPosition['query']=$this->recruiting_model->getPosition();
		$dataLocation['query2']=$this->recruiting_model->getLocation();
		$this->load->view('css');

		$this->load->view('update_view',$dataUpdate+$dataPosition+$dataLocation);
		$this->load->view('js');
	}
}