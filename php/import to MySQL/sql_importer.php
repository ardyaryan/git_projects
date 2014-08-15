<?php
	if(isset($_POST['submit'])){
		$filename = $_FILES["file"]["name"];
		move_uploaded_file($_FILES["file"]["tmp_name"],"databases/$filename");
		// OPEN CONNECTION...
		require_once( "assets/session_init.php" );
		$path = $_SESSION['MYSQL_SERVER1'];
		$sql_filename = 'databases/people.sql';
		$sql_contents = file_get_contents($sql_filename);
		$sql_contents = explode(";", $sql_contents);
			
		$table = $_SESSION['MYSQL_TBL1'];
		$db = $_SESSION['MYSQL_DB1'];
			
		$connect = mysql_pconnect($_SESSION['MYSQL_SERVER1'],$_SESSION['MYSQL_LOGIN1'],$_SESSION['MYSQL_PASS1'])
							   or die("Unable to connect to SQL server");
		mysql_select_db($_SESSION['MYSQL_DB1']) or die("Unable to select database");
		//--------------------------------------//
		foreach($sql_contents as $query){
			   $result = mysql_query($query);
			   if (!$result)
					echo "Error on import of ".$query;
		}
	}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<div align="center" style="position:relative; top:50px;">
<table>
    <tr>
        <td>
            <form action="" method="post"
            enctype="multipart/form-data">
            <label for="file">Database:</label>
            <input type="file" name="file" id="file"><br>
            <input type="submit" name="submit" value="Upload">
            </form>
        </td>
    </tr>
</table>
</div>
</body>
</html>