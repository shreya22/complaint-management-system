<?php

	Class Login_model extends CI_Model
	{
		public function student()
		{
			$this->db->select('*')
					->from('student')
					->where('email_id', $this->input->post('email'))
					->limit(1);
			$query= $this->db->get();

			if($query->num_rows() > 0)
			{
				foreach ($query->result() as $x) {
					if($x->password == $this->input->post('pwd'))
					{
						
						//set user session.

						$loggedin= array(
							'student_id' => $x->student_id,
							'name' => $x->name,
							'email_id' => $x->email_id,
							'roll_no' => $x->roll_no
						);
						$this->session->set_userdata('studentloggedin', $loggedin);

						$data= array(
							'status' => 'yes',
							'msg' => 'credentials matched!'
							);


					}else
					{
						$data= array(
							'status' => 'false',
							'msg' => 'invalid email or password'
							);
					}
				}
			}
			else
			{
				$data= array(
						'status' => 'false',
						'msg' => 'No such email id exists!'
						);
			}

			
			return $data;
		}


		public function authority()
		{
			$this->db->select('*')
					->from('authority')
					->where('email_id', $this->input->post('email'))
					->limit(1);
			$query= $this->db->get();

			if($query->num_rows() > 0)
			{
				foreach ($query->result() as $x) {
					if($x->password == $this->input->post('pwd'))
					{
						
						//set user session.

						$loggedin= array(
							'authority_id' => $x->student_id,
							'name' => $x->name,
							'email_id' => $x->email_id,
							'field_id' => $x->field_id
						);
						$this->session->set_userdata('authloggedin', $loggedin);

						$data= array(
							'status' => 'yes',
							'msg' => 'credentials matched!'
							);


					}else
					{
						$data= array(
							'status' => 'false',
							'msg' => 'invalid email or password'
							);
					}
				}
			}
			else
			{
				$data= array(
						'status' => 'false',
						'msg' => 'No such email id exists!'
						);
			}

			
			return $data;
		}


	}

?>