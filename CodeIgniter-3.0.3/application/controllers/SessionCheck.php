<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class SessionCheck extends CI_Controller {

	function __construct()
		 {
		   parent::__construct();

			$this->load->helper('url');
			$this->load->helper('file');
			$this->load->library('session');
			$this->load->helper('form');
		//	$this->load->model('Logout_model');
		 }

	public function index()
	{
		

	}

  public function checkSession()
  {
    if($this->session->has_userdata('studentloggedin'))
    {
    	echo 'student';
    }else
    {
    	echo "authority";
    }
  }

  
	
}
