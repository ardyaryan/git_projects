<?php
	include ('header.php');
	include ('navigation.php');
	echo "<br/><br/>";
	$this->load->helper('form');
	echo validation_errors();
		echo "<div>";
		echo form_open('home/check_login?page=contact');
		$email = array(
						'name' 			=> 'email',
						'required'  	=> true,
						'placeholder'  => 'e-mail',
						'id' 			=> 'email'
					  );
		$message = array(
						'name' 			=> 'message',
						'required'  	=> true,
						'placeholder'  => 'Message - Comments',
						'id' 			=> 'message'
					  );
		$submit = array(
						'value' 			=> 'submit',
						'type'			=> 'submit',
						'id' 			=> 'submit'
					  );			  			  
		echo form_label('Email :','email');
		echo form_input($email);
		echo "<br/>";
		echo form_label('Message :','message');
		echo form_textarea($message);
		echo "<br/>";
		echo form_submit($submit);	
	echo form_close();
	echo "</div>";
	include ('footer.php');
?>     	

