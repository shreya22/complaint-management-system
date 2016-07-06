<?php

	Class Home_model extends CI_Model{

		public function GetCmpData()
		{
			//get data of first 5 complaints to be displayed in home page.

			$this->db->select('*')
							->from('complaint')
							->limit(5)
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

	}
?>
