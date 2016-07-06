<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Postcomplaint extends CI_Controller {

	function __construct()
		 {
		   parent::__construct();

		//    $this->load->model('Model_startup_edit','',TRUE);
			$this->load->helper('url');
			$this->load->helper('file');
			$this->load->library('session');
			$this->load->helper('form');
			$this->load->model('Postcomplaint_model');
		 }

	public function index()
	{
		$this->load->view('postcomplaint_view');


	}

	public function postCmp()
	{
	//	header('Content-Type: application/json');
		$this->load->library('form_validation');

		$this->form_validation->set_rules('field', 'Complaint Category', 'required');
        $this->form_validation->set_rules('complaint', 'Complaint Text', 'required');
        

        if ($this->form_validation->run() == FALSE)
        {
            //Field validation failed.  User redirected to login page
            $this->session->set_userdata('register_error',validation_errors());

            $msg=array(
              'status' => 'false',
              'msg' => validation_errors()
              );

            echo json_encode($msg);
        }
        else
        {
        	//update table with the new complaint.
              $this->Postcomplaint_model->AddComplaint();

              $msg=array(
              'status' => 'true',
              'msg' => 'form submitted yeah!'
              );

              echo json_encode($msg);

        			
        }

	}


}
