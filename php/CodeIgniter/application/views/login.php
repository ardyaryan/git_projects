<?php
	include ('header.php');
	include ('navigation.php');
	$post = $_POST;
	if($_SESSION['logged'] != 1 )
		{
			if(isset($post['username']) ){ echo "Username or Password did not exist! <br/>";}
			$this->load->helper('form');
			echo form_open('home/login');
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
		
		
				echo form_label('Username :','username');
				echo form_input($username);
				echo "<br/>";
				echo form_label('Password :','password');
				echo form_input($password);
				echo "<br/>";
				echo form_submit($submit);	
			echo form_close();
	}
	if($_SESSION['logged'] == 1 )
		{
				echo "You are now Logged in <br/>"; 
				$logout_link = base_url(array('index.php','home', 'logout'));
				echo "<a href=\"$logout_link\">log out</a>";			
		}
	//	
	echo "<br/><br/>this is from inside login<br/><br/>";
	include ('footer.php');	
?>