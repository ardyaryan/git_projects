<?php
	include ('header.php');
	include ('navigation.php');
	if (empty($records))
	{	
		echo "<div align=\"left\" class=\"home\"><br/>You are logged out<br/><br/></div><br/><br/>";
	}
	else
	{	
		echo "<div align=\"left\" class=\"home\">
		User ID: ".$records[0]->userid."<br/>
		Name: ".$records[0]->name."<br/>
		Email: ".$records[0]->email."<br/>
		Username: ".$records[0]->username."</div><br/>";
		echo "<br><br> this is from inside profile<br/><br/>";
	}
	include ('footer.php');
?>     	

