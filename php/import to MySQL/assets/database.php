<?php 
require_once("config.php");
class MySQLDatabase{
	public $connection;
	//
	public function open_connection(){
		$this->connection = mysql_connect(SERVER,USER,PASS);
			if(!$this->connection){
		 			die("Unable to login to server").mysql_error();
			}
			else{
				$db_select = mysql_select_db(DATABASE);
				if(!$db_select){
				die("Unable to select database");
				}
			}	
	}
	//
	public function close_connection(){
		if(isset($this->connection)){
			mysql_close($this->connection);
		}
	}
	//
	public function run_query($sql){
			$results = mysql_query($sql, $this->connection);
				if(!$results){
					die("Unable to run query").mysql_error();
				}
			return $results;		
	}
	//
	public function import_csv($csv){		
			if(!file_exists($csv)) {
				die("File not found. Make sure you specified the correct path.");
			}
			// ------------- IMPORT --------------------------------------//
			$csv_file = fopen($csv, 'r');
			$i = 0;
			while (!feof($csv_file))
				{
				   $csv_data[$i] = fgets($csv_file, 1024);// all the row into one array slot
				   $csv_array = str_replace ('"','',explode(";", $csv_data[$i])); // separate columns into new array slots 
				   // ------------- DEFINING QUERY----------------------------//
				   $query ="INSERT INTO `".DATABASE."`.`".TABLE."` (`first_name`, `last_name`, `email`, `phone`) VALUES ('".$csv_array[0]."', '".$csv_array[1]."', '".$csv_array[2]."', '".$csv_array[3]."')";
				   $this->run_query($query);
				   $i++;
				}
	}
	//
	public function import_sql($sql_file){
		$sql_contents = file_get_contents($sql_file);
		$sql_contents = explode(";", $sql_contents);			
		foreach($sql_contents as $query){
			   $result = $this->run_query($query);
			   if (!$result){
					echo "Error on import of ".$query;
			   }
		}
	}
	// 
	public function import_xml($xml){
		$people = simplexml_load_file($xml);
		$i=0;
		foreach ($people as $person){
			$row = array();//renew array at each row
			$first_name = $person->first_name;
			$last_name = $person->last_name;
			$email = $person->email;
			$phone = $person->phone;
			array_push($row,$first_name);
			array_push($row,$last_name);
			array_push($row,$email);
			array_push($row,$phone);
			$query ="INSERT INTO `".DATABASE."`.`".TABLE."` (`first_name`, `last_name`, `email`, `phone`) VALUES ('".$row[0]."', '".$row[1]."', '".$row[2]."', '".$row[3]."')";
			$this->run_query($query);
			$i++;
		}	
	}
}

?>