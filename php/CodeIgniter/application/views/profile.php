<?php
	include ('header.php');
	include ('navigation.php');
	echo "<br/><br/>";
	if (empty($records))
	{	
		$url= base_url(array('index.php','home', 'login'));
		echo "<div class=\"home\">You are logged out<br/><br/>
				<a href=\"$url\">Log In</a></div><br/><br/>";
	}
	else
	{	
		echo "<div align=\"left\" class=\"home\">
		User ID: ".$records[0]->userid."<br/>
		Name: ".$records[0]->name."<br/>
		Email: ".$records[0]->email."<br/>
		Username: ".$records[0]->username."</div><br/><br/>";
	}
	include ('footer.php');
?>     	

