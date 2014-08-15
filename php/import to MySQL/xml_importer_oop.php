<?php
	if(isset($_POST['submit'])){
			require_once( "assets/database.php" );
			$filename = $_FILES["file"]["name"];
			move_uploaded_file($_FILES["file"]["tmp_name"],"databases/".$filename);
			//
			$my_conncetion = new MySQLDatabase;
			$my_conncetion->open_connection();
			$my_conncetion->import_xml('databases/people.xml');
			$my_conncetion->close_connection();
	}
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>xml to MySQL</title>
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