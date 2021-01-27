<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class user extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('recruiting_model');
	}

	public function index()
	{
		$dataRecruiting['query']=$this->recruiting_model->showdataModel();
		// echo '<pre>';
		// print_r($dataLocation);
		// echo '</pre>';
		// exit;
		$this->load->view('css');
		$this->load->view('header');
		$this->load->view('nav_user');
		$this->load->view('view_user');
		$this->load->view('table_user',$dataRecruiting);
		$this->load->view('js');
		$this->load->view('footer');
	}

	public function details($recruiting_id)
	{
		$this->load->view('css');

		$this->load->view('header');
		$this->load->view('nav_user');

		$dataUpdate['query3']=$this->recruiting_model->readModel($recruiting_id);
		// echo '<pre>';
		// print_r($dataUpdate);
		// echo '</pre>';
		// exit;
		$dataPosition['query']=$this->recruiting_model->getPositionModel();
		$dataLocation['query2']=$this->recruiting_model->getLocationModel();
		$this->load->view('css');

		$this->load->view('view_details',$dataUpdate+$dataPosition+$dataLocation);
		$this->load->view('js');
	}

}