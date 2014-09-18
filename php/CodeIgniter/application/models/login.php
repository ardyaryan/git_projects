<?php

class login extends CI_Model
{
	public function login_user ($username,$password)
	{
		$this->db->select('username,password');
		$this->db->from('mailinglist');
		$this->db->where('username',$username);
		$this->db->where('password',$password);
		$query = $this->db->get();
		
		if($query->num_rows == 1)
			{
				$_SESSION['logged']= 1;
			}
		else
			{
				$_SESSION['logged']= 0;			
			}
	}
}
?>