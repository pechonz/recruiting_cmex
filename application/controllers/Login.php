<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class login extends CI_Controller {

	public function index()
	{
		$this->load->view('css');
		$this->load->view('login_view');
		$this->load->view('js');
	}
}