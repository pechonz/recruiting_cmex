<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class create extends CI_Controller {

	public function index()
	{
		$this->load->view('css');
		$this->load->view('create_view');
		$this->load->view('js');
	}

	public function __construct()
	{
		parent::__construct();
		$this->load->model('recruiting_model');
	}

	public function create_recruiting()
	{
		$this->recruiting_model->create();
	}
}