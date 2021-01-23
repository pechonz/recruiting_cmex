<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class home extends CI_Controller {

	public function index()
	{
		$this->load->view('css');
		$this->load->view('home_view');
		$this->load->view('js');
	}
}