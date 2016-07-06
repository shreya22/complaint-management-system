<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	function __construct()
		 {
		   parent::__construct();

		//    $this->load->model('Model_startup_edit','',TRUE);
			$this->load->helper('url');
			$this->load->helper('file');
			$this->load->library('session');
			$this->load->helper('form');
			$this->load->model('Login_model');
		 }

	public function index()
	{
		$this->load->view('login_view');
	}

  public function Student()
  {
    $check= $this->Login_model->student();
  //  print_r($check);

    //echo $check.status;

    if($check['status'] == "yes")
    {
      $data= array(
        'status' => 'true',
        'msg' => 'Logged In Successfully!'
      );
    }else
    {
      $data= array(
        'status' => 'false',
        'msg' => 'Error Logging in!'
      );
    }

    echo json_encode($data);

  }

  public function Authority()
  {
      $check= $this->Login_model->authority();
    //  print_r($check);

      //echo $check.status;

      if($check['status'] == "yes")
      {
        $data= array(
          'status' => 'true',
          'msg' => 'Logged In Successfully!'
        );
      }else
      {
        $data= array(
          'status' => 'false',
          'msg' => 'Error Logging in!'
        );
      }

      echo json_encode($data);
    }
  	
}
