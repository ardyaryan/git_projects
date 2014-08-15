<?php
require_once("assets/database.php");
if(isset($_POST['submit'])){
		require_once("assets/config.php");
		$filename = $_FILES['file']['name'];
		move_uploaded_file($_FILES['file']['tmp_name'],'databases/'.$filename);
		// connect to database
		$my_connection = new MySQLDatabase;
		$my_connection->open_connection();
		//csv handling
		$csv_file = "databases/people.csv";
		$my_connection->import_csv($csv_file);	
		$my_connection->close_connection();		
}
?>
<html>
<head>
<title>import CSV OOP</title>
</head>

<body>
<br/><br/><br/>
<div align="center" >
<form action="" method="post" enctype="multipart/form-data">
<input name="file" type="file" /><br/>
<input name="submit" type="submit" value="Upload" />
</form>
</div>
</body>
</html>