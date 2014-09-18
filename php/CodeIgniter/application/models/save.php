<?php

class save extends CI_Model
{

	public function form_insert($data)
	{
		$this->db->insert('mailinglist', $data);
	}
}
?>