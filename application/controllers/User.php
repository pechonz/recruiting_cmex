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

		$dataUpdate['query3']=$this->recruiting_model->detailsModel($recruiting_id);
		$dataDocument['query4']=$this->recruiting_model->documentModel($recruiting_id);
		$dataPosition['query']=$this->recruiting_model->getPositionModel();
		$dataLocation['query2']=$this->recruiting_model->getLocationModel();
		$this->load->view('css');

		$this->load->view('view_details',$dataUpdate+$dataPosition+$dataLocation+$dataDocument);
		$this->load->view('js');
	}

	public function download(){
	    $id_file = $this->uri->segment(3);    

	    $this->load->database();
	    $show = "select * from tb_document a where a.recruiting_id = 'S4153989'";
	    $row = $this->db->query($show)->row();

		$image = $row->document;
	    $name = $row->document_name;
	    $type = '.pdf';

	    header('Content-type: ' . $type);
	    header('Content-Disposition: attachment; filename=' . $name);
	    ob_clean();
	    flush();
	    echo base64($image); // or base64 decode 
	    exit;
	}

}