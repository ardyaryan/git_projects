<?php
	// this page will take the Google map api's URL and will parce it out from JSON to HTML
	echo "example:<br/>http://maps.google.com/maps/api/geocode/json?address=New%20York&sensor=false<br/>";
	//
	function define_type($url){
		$content = get_headers($url, 1);
		if (strpos($content['Content-Type'],'json'))
			{
				$type = "json";
			}
		if (strpos($content['Content-Type'],'xml'))
			{
				$type = "xml";
			}
	return $type;	
	}
	
	function json_parser($url_content){
		$json_raw = file_get_contents($url_content);
		$json = json_decode($json_raw);
 		foreach($json as $k1 => $v1){
			foreach($v1 as $k2 => $v2){
				//print_r($v2);
				foreach($v2 as $k3 => $v3){
					if($k3=='address_components'){
						echo "<div style=\"font-family:verdana;font-size:12px;\"><br/>";
						echo "Address Components:<hr/>";
						for($i=0;$i<4;$i++){
							$v3_1[$i] = get_object_vars($v3[$i]);
							$v3_2 = $v3_1[$i];
							echo "<b>Long Name: </b>".$v3_2['long_name']."<br/>";
							echo "<b>Short Name: </b>".$v3_2['short_name']."<br/>";
							echo "<b>Types: </b>".$v3_2['types'][0]." , ".$v3_2['types'][1]."<br/><br/>";
							}
						echo "<br/></div>";	
						}
					if($k3=='formatted_address'){
						echo "<div style=\"font-family:verdana;font-size:12px;\"><br/>";
						echo "Formatted Address:<hr/>";
						echo $v3."<br/>";
						echo "<br/></div>";	
					}
					if($k3=='geometry'){
						echo "<div style=\"font-family:verdana;font-size:12px;\"><br/>";
						echo "Geometry:<hr/>";
						echo $v3."<br/>";
						echo "<hr/></div>";	
					}
				}
			}
		}			
	//print_r($json);
	//return $json;
	}
	
?>
<html>
<head>
</head>
<body>
 <form method="get">
<input type="text" size="150" name="url"><br/>
<input type="submit">
</form>
<?php
$url_content = $_GET['url'];
if(isset($url)){
	$url = $HTTP_GET_VARS['url'];
	$result = define_type($url);
	$json = json_parser($url_content);
	
	
}

?>
</body>
</html>














