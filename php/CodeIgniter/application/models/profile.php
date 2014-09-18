<?php 

class Profile extends CI_Model
{
	
	public function getData($username)
	{
		// gets everything => ifno : https://ellislab.com/codeigniter/user-guide/database/active_record.html
		$query = $this->db->get_where('mailinglist', array('username' => $username));//, $limit, $offset);
		return $query->result();
	}	
}


?>