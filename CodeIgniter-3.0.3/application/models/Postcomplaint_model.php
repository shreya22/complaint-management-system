<?php

Class Postcomplaint_model extends CI_Model
{

	public function AddComplaint()
	{
		$sess= $this->session->userdata('studentloggedin');

		$data=array(
		    'text'=>$this->input->post('complaint'),	
		    'field_id' => $this->input->post('field'),
		    'student_id' => $sess['student_id'],
		    'date' => 'NOW()'
		  );
		  $this->db->insert('complaint',$data);
			
		  //process for generating unique user id.
		  $id= $this->db->insert_id();
		  $x= strlen($id);
		  $len= 7-$x;

		  $cmpid= '';
		  for($i=0; $i<$len; ++$i)
		  {
		    $cmpid= $cmpid.'0';
		  }
		  $cmpid= 'CM_'.$cmpid.$id;

		  $query = $this->db->query("update complaint set complaint_id= '$cmpid' where id= '$id'");
		  //user_id updated in table.

	}

}