<?php
	if(isset($_POST['submit'])){
		require_once( "assets/database.php" );
		$filename = $_FILES["file"]["name"];
		move_uploaded_file($_FILES["file"]["tmp_name"],"databases/".$filename);
		// OPEN CONNECTION...
		$my_connection = new MySQLDatabase;
		$my_connection->open_connection();
		$my_connection->import_sql('databases/people.sql');
		$my_connection->close_connection();
	}
?>
<html >
<head>
<title>Import SQL OOP</title>
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