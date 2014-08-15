<?php
	if(isset($_POST['submit'])){
			$filename = $_FILES["file"]["name"];
			move_uploaded_file($_FILES["file"]["tmp_name"],"databases/$filename");
			$people = simplexml_load_file('databases/people.xml');
			$i=0;
			//---- STORING LOGIN INFORMATION IN A SEPARATE FILE ---------//
			require_once( "assets/session_init.php" );
			// ----------------------------------------------------------//
			$table = $_SESSION['MYSQL_TBL1'];
			$db = $_SESSION['MYSQL_DB1'];
			//
			$connect = mysql_pconnect($_SESSION['MYSQL_SERVER1'],$_SESSION['MYSQL_LOGIN1'],$_SESSION['MYSQL_PASS1'])
							   or die("Unable to connect to SQL server");
			mysql_select_db($_SESSION['MYSQL_DB1']) or die("Unable to select database");
			// ---------------- LOADING THE CSV FILE ---------------------//
			foreach ($people as $person){
				$row = array();//renew array at each row
				$first_name = $person->first_name;
				$last_name = $person->last_name;
				$email = $person->email;
				$phone = $person->phone;
				//echo $first_name.";".$last_name.";".$email.";".$phone."<br/>";
				array_push($row,$first_name);
				array_push($row,$last_name);
				array_push($row,$email);
				array_push($row,$phone);
				//echo $row[$i]."<br/><br/>";
				//print_r ($row);
				//echo "<br/><br/>";
				$query ="INSERT INTO `$db`.`$table` (`first_name`, `last_name`, `email`, `phone`) VALUES ('".$row[0]."', '".$row[1]."', '".$row[2]."', '".$row[3]."')";
				$execute = mysql_query($query, $connect );
				$i++;
			}
			mysql_close($connect);
	}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
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