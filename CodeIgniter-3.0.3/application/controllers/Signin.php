<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Signin extends CI_Controller {

	function __construct()
		 {
		   parent::__construct();

		//    $this->load->model('Model_startup_edit','',TRUE);
			$this->load->helper('url');
			$this->load->helper('file');
			$this->load->library('session');
			$this->load->helper('form');
			$this->load->model('Signin_model');
		 }

	public function index()
	{
		//$this->load->view('signin_view');
	}

	public function student()
	{
		$this->load->view('signin_student_view');
	}
	public function authority()
	{
		$this->load->view('signin_authority_view');
	}

	public function S_signin()
	{
		//validate student signin details, and inser in db.

		$this->load->library('form_validation');
	
	    $this->form_validation->set_rules('name', 'Name', 'required');
	    $this->form_validation->set_rules('rollno', 'Roll Number', 'required');
        $this->form_validation->set_rules('pwd', 'password', 'required|min_length[6]|matches[repwd]');
        $this->form_validation->set_rules('repwd', 'Password Confirmation', 'required|min_length[6]');
        $this->form_validation->set_rules('email', 'Email', 'required|callback_S_email_check');

	   if ($this->form_validation->run() == FALSE)
        {
            //Field validation failed.  User redirected to login page
            $this->session->set_userdata('register_error',validation_errors());

            $msg=array(
              'status' => 'false',
              'msg' => validation_errors()
              );

            echo json_encode($msg);

        //    redirect('signup', 'refresh');

        }
        else
        {
              $this->Signin_model->student();

              $msg=array(
              'status' => 'true',
              'msg' => 'form submitted yeah!'
              );

            echo json_encode($msg);
        			

           //   redirect('signup/divert', 'refresh');

        }

	}
	public function S_email_check($email)
    {
        
    	$result = $this->db->query("SELECT * FROM student WHERE email_id='".$email."'");
    	if($result->num_rows() > 0)
    	{
    		  $this->form_validation->set_message('S_email_check', 'This email is already in use!');
          return FALSE;
    	}
      else
      {
          return TRUE;
      }
    }


    public function A_signin()
	{
		//validate student signin details, and inser in db.

		$this->load->library('form_validation');
	
	    $this->form_validation->set_rules('name', 'Name', 'required');
	    $this->form_validation->set_rules('field', 'Complaint Category', 'required');
        $this->form_validation->set_rules('pwd', 'password', 'required|min_length[6]|matches[repwd]');
        $this->form_validation->set_rules('repwd', 'Password Confirmation', 'required|min_length[6]');
        $this->form_validation->set_rules('email', 'Email', 'required|callback_A_email_check');

	   if ($this->form_validation->run() == FALSE)
        {
            //Field validation failed.  User redirected to login page
            $this->session->set_userdata('register_error',validation_errors());

            $msg=array(
              'status' => 'false',
              'msg' => validation_errors()
              );

            echo json_encode($msg);

        //    redirect('signup', 'refresh');

        }
        else
        {
              $this->Signin_model->authority();

              $msg=array(
              'status' => 'true',
              'msg' => 'form submitted yeah!'
              );

            echo json_encode($msg);
        			

           //   redirect('signup/divert', 'refresh');

        }

	}
	public function A_email_check($email)
    {
        
    	$result = $this->db->query("SELECT * FROM authority WHERE email_id='".$email."'");
    	if($result->num_rows() > 0)
    	{
    		  $this->form_validation->set_message('A_email_check', 'This email is already in use!');
          return FALSE;
    	}
      else
      {
          return TRUE;
      }
    }


	
}
