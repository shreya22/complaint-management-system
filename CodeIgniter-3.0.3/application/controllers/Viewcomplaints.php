<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Viewcomplaints extends CI_Controller {

	function __construct()
		 {
		   parent::__construct();

		//    $this->load->model('Model_startup_edit','',TRUE);
			$this->load->helper('url');
			$this->load->helper('file');
			$this->load->library('session');
			$this->load->helper('form');
			$this->load->model('Viewcomplaints_model');
		 }

	public function index()
	{
		$this->load->view('Viewcomplaints_view');

	}

	public function s_getCmp()
	{

		//return complaints posted by that respective student.

		$data= $this->Viewcomplaints_model->student();

		foreach($data as $x)
		{
			$x->field_id = $this->Viewcomplaints_model->getFieldName($x->field_id); //echo $x->field_id;

			if($x->status == 0)
			{
				$x->status= 'Unsolved';
				$x->edit = 'Mark Solved';
			}else
			{
				$x->status= 'Solved';
				$x->edit = 'yeah!';
			}

		}

		echo json_encode($data);
	}


	public function a_getCmp()
	{

		//return complaints of that respective category.

		$data= $this->Viewcomplaints_model->authority();

		foreach($data as $x)
		{
			$x->field_id = $this->Viewcomplaints_model->getFieldName($x->field_id); //echo $x->field_id;


			if($x->status == 0)
			{
				$x->status= 'Unsolved';
				$x->edit = 'Mark Solved';
			}else
			{
				$x->status= 'Solved';
				$x->edit = 'yeah!';
			}

		}

		echo json_encode($data);
	}

  
  
	
}
