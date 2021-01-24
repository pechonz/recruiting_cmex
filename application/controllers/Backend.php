<?php

session_start(); //we need to start session in order to access it through CI

Class Backend extends CI_Controller {

    public function __construct() {
        parent::__construct();

// Load form helper library
        $this->load->helper('form','html');

// Load form validation library
        $this->load->library('form_validation');

// Load session library
        $this->load->library('session');

// Load database
        $this->load->model('database');
    }




// Check for user login process
    public function index() {

        $this->form_validation->set_rules('username', 'Username', 'trim|required|xss_clean');
        $this->form_validation->set_rules('password', 'Password', 'trim|required|xss_clean');

        if ($this->form_validation->run() == FALSE) {
            if(isset($this->session->userdata['logged_in'])){
                $data['readshow'] = $this->database->readshow();
                $this->load->view('user/user_main', $data);
            }else{
                $this->load->view('user/user_login');
            }
        } else {
            $data = array(
                'username' => $this->input->post('username'),
                'password' => $this->input->post('password')
            );
            $result = $this->database->login($data);
            if ($result == TRUE) {

                $username = $this->input->post('username');
                $result = $this->database->read_user_information($username);
                if ($result != false) {
                    $session_data = array(
                        'username' => $result[0]->NUM_OT
                    );
    // Add user data in session
                    $this->session->set_userdata('logged_in', $session_data);
                    $data['readshow'] = $this->database->readshow();
                    $this->load->view('user/user_main', $data);
                }
            } else {
                $data = array(
                    'error_message' => 'Invalid Username or Password'
                );
                $this->load->view('user/user_login', $data);
            }
        }


    }

// Logout from admin page
    public function logout() {

// Removing session data
        $sess_array = array(
            'username' => ''
        );
        $this->session->unset_userdata('logged_in', $sess_array);
        $this->load->view('user/user_login');
    }
}

?>