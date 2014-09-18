<?php
	include ('header.php');
	include ('navigation.php');
	$this->load->helper('form');
	echo validation_errors();
	echo form_open('home/check_login?page=register');
	

		$name = array(
						'name' 			=> 'name',
						'required'  	=> true,
						'placeholder'  => 'Full Name',
						'id' 			=> 'name'
					  );
		$email = array(
						'name' 			=> 'email',
						'required'  	=> true,
						'placeholder'  => 'e-mail',
						'id' 			=> 'email'
					  );
		$username = array(
						'name' 			=> 'username',
						'required'  	=> true,
						'placeholder'  => 'user-name',
						'id' 			=> 'user'
					  );
		$password = array(
						'name' 			=> 'password',
						'type'			=> 'password',
						'required'  	=> true,
						'placeholder'  => 'password',
						'id' 			=> 'pass'
					  );
		$submit = array(
						'value' 			=> 'submit',
						'type'			=> 'submit',
						'id' 			=> 'submit'
					  );			  			  
		echo form_label('Name :','name');
		echo form_input($name);
		echo "<br/>";
		echo form_label('Email :','email');
		echo form_input($email);
		echo "<br/>";
		echo form_label('Username :','username');
		echo form_input($username);
		echo "<br/>";
		echo form_label('Password :','password');
		echo form_input($password);
		echo "<br/>";
		echo form_submit($submit);	
	echo form_close();
	echo "<br/><br/>this is from inside register<br/><br/>";
	include ('footer.php');	
?> 

