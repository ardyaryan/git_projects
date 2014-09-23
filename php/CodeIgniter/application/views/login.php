<?php
	include ('header.php');
	include ('navigation.php');
	echo "<br/><div class=\"home\"><br/><br/>";
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
				echo "You are now Logged in <br/><br/>"; 
				//
				echo "<div align=\"left\" style=\"padding-left:20px;\">
				User ID: ".$records[0]->userid."<br/>
				Name: ".$records[0]->name."<br/>
				Email: ".$records[0]->email."<br/>
				Username: ".$records[0]->username."</div><br/><br/>";
				//
				$logout_link = base_url(array('index.php','home', 'logout'));
				echo "<a href=\"$logout_link\">log out</a>";			
		}
	//
	echo "</div><br/><br/>";	
	include ('footer.php');	
?>