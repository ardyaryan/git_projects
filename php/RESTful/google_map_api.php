<?php
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
	
	function json_parser($url){
		$json_raw = file_get_contents($url);
		$json = json_decode($json_raw);
 		foreach($json as $k1 => $v1){
			if($k1 == 'results'){
				foreach($v1 as $k2 => $v2){
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
							echo "Geometry:<hr/></div>";
							foreach($v3 as $k4 => $v4){
								if($k4 == 'bouns'){
								print_r($k4);
								echo "<br/>";
								print_r($v4);
								echo "<br/>";
								}
								if($k4 == 'location'){
									$location = get_object_vars($v4);
									echo "<div style=\"font-family:verdana;font-size:12px;\"><br/>Location:<br/>";
									echo "<b>Lat: </b>".$location['lat']."<br/><b>Long: </b>".$location['lng']."<br/>";
									echo "</div>";
								}
								if($k4 == 'location_type'){
									echo "<div style=\"font-family:verdana;font-size:12px;\"><br/>Location Type:<br/>";
									echo $v4;
									echo "</div>";
								}
								if($k4 == 'viewport'){
									$view_port = get_object_vars($v4);
									$n_e = get_object_vars($view_port['northeast']);
									$s_w = get_object_vars($view_port['southwest']);							
									echo "<div style=\"font-family:verdana;font-size:12px;\"><br/>Viewport -> North-East: <br/>";
									echo "<b>Lat: </b>".$n_e['lat']."<br/><b>Long: </b>".$n_e['lng']."<br/><br/>Viewport -> South-West: <br/>";
									echo "<b>Lat: </b>".$s_w['lat']."<br/><b>Long: </b>".$s_w['lng']."<br/>";
									echo "</div><br/>";
								}
							}
						}
						if($k3=='types'){
							echo "<div style=\"font-family:verdana;font-size:12px;\">Types:<hr/>";
							echo $v3[0]." , ".$v3[1];;
							echo "</div><br/>";
						}	
					}
				}
			}//end of if results
			if($k1 == 'status'){
				echo "<div style=\"font-family:verdana;font-size:12px;\"><br/>Status: <hr/>";
				echo $v1;
				echo "</div><br/>";
			}
		}			
	}
	function xmlParser($url){
		$xml = get_object_vars(simplexml_load_file($url));
		foreach($xml as $k1 => $v1){
			if($k1 == 'status'){
				echo "<b>Status:</b><br/> ".$v1."<br/><hr/>";
			}
			if($k1 == 'result'){
				$v1 = get_object_vars($v1);
					foreach($v1 as $k2 => $v2){
						if($k2 == 'type'){
							echo "<b>Type:</b> <br/>".$v2[0]." , ".$v2[1]."<br/><hr/>";
						}
						if($k2 == 'formatted_address'){
							echo "<b>Formatted Address:</b> <br/>".$v2."<br/><hr/>";
						}
						if($k2 == 'address_component'){
							foreach($v2 as $k3 => $v3){
								$v3 = get_object_vars($v3);
								echo "<b>Long Name: </b>".$v3['long_name']."<br/><b>Short Name:</b> ".$v3['short_name']."<br/><b>Type:</b> ".$v3['type'][0]." , ".$v3['type'][1]."<br/><br/>";
								}
						echo "<br/><hr/>"; 		
						}
						if($k2 == 'geometry'){
							echo "<b>Geometry:</b><br/><br/><hr/>";
							foreach($v2 as $k3 => $v3){															
								$v3 = get_object_vars($v3);
								if($k3 == 'location'){echo "<b>Location:</b><br/>Lat. :".$v3['lat']."<br/>Long. :".$v3['lng']."<br/><br/>";}
								//if($k3 == 'location_type'){echo "<b>Location Type:</b><br/>".$v3."<br/><br/>";}
								if($k3 == 'viewport'){
									echo "<b>Viewport:</b><br/><br/>";
									$v3_s = get_object_vars($v3['southwest']);
									$v3_n = get_object_vars($v3['northeast']);
									echo "<b>South West: </b><br/>Lat. :".$v3_s['lat']."<br/>Long. :".$v3_s['lng']."<br/><br/>";
									echo "<b>North East: </b><br/>Lat. :".$v3_n['lat']."<br/>Long. :".$v3_n['lng']."<br/><br/>";
								}
								if($k3 == 'bounds'){
									echo "<b>Bounds:</b><br/><br/>";
									$v3_s = get_object_vars($v3['southwest']);
									$v3_n = get_object_vars($v3['northeast']);
									echo "<b>South West: </b><br/>Lat. :".$v3_s['lat']."<br/>Long. :".$v3_s['lng']."<br/><br/>";
									echo "<b>North East: </b><br/>Lat. :".$v3_n['lat']."<br/>Long. :".$v3_n['lng']."<br/><br/>";
								}
							}
						}
					}											
			}
		}
	
	}
 	
?>
<html>
<head>
</head>
<body>
<div style="font-family:verdana;font-size:12px; margin-left:20px; margin-top:20px; width:1000px;">
<form method="get">
<label>City: </label><input type="text" size="20" name="city" >
<label for="select">Select Data Type:</label>
<select name="type" id="select">
<option value="json">JSON</option>
<option value="xml">XML</option>
</select>
<br/>
<input type="submit" >
</form>
<?php
// this page will take the Google map api's URL and will parce it out from JSON to HTML

if(isset($HTTP_GET_VARS['city'])){
	$city = str_replace(" ","",$HTTP_GET_VARS['city']);
	$type = $HTTP_GET_VARS['type'];
	$url = "http://maps.google.com/maps/api/geocode/".$type."?address=".$city."&sensor=false";
	echo "<b>The Constructed link will be : </b>".$url."<br/><br/>";
	if($type=="json"){
		$result = define_type($url);
		$json = json_parser($url);
	}
	if($type=="xml"){
		xmlParser($url);
	}
	
}
?>
</div>
</body>
</html>














