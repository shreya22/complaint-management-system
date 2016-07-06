<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Logout extends CI_Controller {

	function __construct()
		 {
		   parent::__construct();

		//    $this->load->model('Model_startup_edit','',TRUE);
			$this->load->helper('url');
			$this->load->helper('file');
			$this->load->library('session');
			$this->load->helper('form');
		//	$this->load->model('Logout_model');
		 }

	public function index()
	{
		//$this->load->view('login_view');
    //$this->session->sess_destroy();

	}

  public function student()
  {
    //logout student
    $this->session->unset_userdata('studentloggedin');
    $this->load->view('home_view');
  }

  public function authority()
  {
    //logout student
    $this->session->unset_userdata('authloggedin');
    $this->load->view('home_view');
  }

  
	
}
