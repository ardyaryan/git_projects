<?php
require_once ('config.php');
	
	class MySQLConnection {
			public $connection;
			//------- open connection ---------//			
			public function open_connection(){
				$this->connection = mysql_connect(SERVER,USER,PASSWORD);
				if(!$this->connection){
					die("Unable to connect to server").mysql_error();}
				}
			//------- close connection ---------//	
			public function close_connection(){
				if(isset($this->connection)){
					mysql_close($this->connection);
					}
			}
			//--------run query----------------//
			public function run_query($query){
				$results = mysql_query($query, $this->connection);
				if(!$results){
					echo "Unable to run query: ".mysql_error();
					}
				return $results;	
			}
			
	}
	
	
/* 	class General extends  MySQLConnection{
		private $a=" I am private";
		
		public function Setter($a){
				$this->a = $a;
				echo " Now a : ".$this->a;
			}
		public function Getter(){
				echo "Initially a : ".$this->a."<br/>";
			}
		
	}
	class Email {
		static $subject = " Hello from my PHP Script";

		static function email_to($receiver,$message){
			mail($receiver,self::$subject,$message);
		}
			
	}
	
	class person {
		public $SSN;
		function __construct() {
			 $this->SSN=0;
		}	
	}
 */

?>