<?php 

class MyEmail extends CI_Model
{
	public function send_email($data)
	{
		$this->load->library('email');
		//
		$email = $data['email'];
		$message = $data['message'];
		$this->email->from($email, 'New Contact');
		$this->email->to('ardy.aryan@gmail.com'); 
		$this->email->subject('Email Test');
		$this->email->message($message);	
		
		$this->email->send();
	}
}

?>