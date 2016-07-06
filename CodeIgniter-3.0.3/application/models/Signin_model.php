<?php
	
	Class Signin_model extends CI_Model{

		public function student()
		{
			$data=array(
		    'name'=>$this->input->post('name'),
		    'password'=>$this->input->post('pwd'),
		    'email_id'=>$this->input->post('email'),
		    'roll_no'=>$this->input->post('rollno')
		  );
		  $this->db->insert('student',$data);
			
		  //process for generating unique user id.
		  $id= $this->db->insert_id();
		  $x= strlen($id);
		  $len= 7-$x;

		  $studentid= '';
		  for($i=0; $i<$len; ++$i)
		  {
		    $studentid= $studentid.'0';
		  }
		  $studentid= 'ST_'.$studentid.$id;

		  $query = $this->db->query("update student set student_id= '$studentid' where id= '$id'");
		  //user_id updated in table.
		}


		public function authority()
		{
			$data=array(
		    'name'=>$this->input->post('name'),
		    'password'=>$this->input->post('pwd'),
		    'email_id'=>$this->input->post('email'),
		    'field_id'=>$this->input->post('field')
		  );
		  $this->db->insert('authority',$data);
			
		  //process for generating unique user id.
		  $id= $this->db->insert_id();
		  $x= strlen($id);
		  $len= 7-$x;

		  $authid= '';
		  for($i=0; $i<$len; ++$i)
		  {
		    $authid= $authid.'0';
		  }
		  $authid= 'ST_'.$authid.$id;

		  $query = $this->db->query("update authority set authority_id= '$authid' where id= '$id'");
		  //user_id updated in table.
		}

	}

?>