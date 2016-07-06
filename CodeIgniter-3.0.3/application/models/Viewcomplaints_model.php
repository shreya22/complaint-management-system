<?php
	
	Class Viewcomplaints_model extends CI_Model{

		public function student()
		{

			//return all complaints posted by that respective student

			$this->db->select('*')
							->from('complaint')
							->where('student_id', $this->session->userdata('studentloggedin')['student_id'])
							->order_by('date');
			$query= $this->db->get();
			$result= $query->result();

			return $result;
		}

		public function getFieldName($id)
		{
			$this->db->select('*')
					->from('field')
					->where('field_id', $id)
					->limit(1);
			$query= $this->db->get();

			foreach($query->result() as $x)
			{
				return $x->subject;
			}
		}


		public function authority()
		{
			//return all complaints posted under that respective category

			$sess= $this->session->userdata('authloggedin');

			$this->db->select('*')
							->from('complaint')
							->where('field_id', $sess['field_id'])
							->order_by('date');
			$query= $this->db->get();
			$result= $query->result();

			return $result;
		}

	}

?>