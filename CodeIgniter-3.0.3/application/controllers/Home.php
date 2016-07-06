<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	function __construct()
		 {
		   parent::__construct();

		//    $this->load->model('Model_startup_edit','',TRUE);
			$this->load->helper('url');
			$this->load->helper('file');
			$this->load->library('session');
			$this->load->helper('form');
			$this->load->model('Home_model');
			 }

	public function index()
	{


		$this->load->view('home_view');
	}

	public function FiveCmp()
	{
		$data= $this->Home_model->GetCmpData();

		foreach($data as $x)
		{
			$x->field_id = $this->Home_model->getFieldName($x->field_id); //echo $x->field_id;

			if($x->status == 0)
			{
				$x->status= 'Unsolved';
			}else
			{
				$x->status= 'Solved';
			}

		}

		echo json_encode($data);

	}

}
