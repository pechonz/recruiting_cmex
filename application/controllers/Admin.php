<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class admin extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('recruiting_model');
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

		$this->load->view('nav_admin');
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