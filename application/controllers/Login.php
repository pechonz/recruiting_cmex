<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class login extends CI_Controller {

	public function index()
	{
		$this->load->view('css');
		$this->load->view('header');
		$this->load->view('nav_user');
		$this->load->view('view_login');
		$this->load->view('js');
		$this->load->view('footer');
	}
}