<?php 
//+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++//
//            this script get the lengh of a square 			 //
//          generates an array of cordinates of an spiral        //
//+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++//

// extracting cordinates from generated arrays and displaying them
function print_array($array){
		foreach($array as $key => $value){
			if(is_array($value)){
				foreach($value as $key => $value){
					if(is_array($value)){
						foreach($value as $key => $value){
							echo "(".$key." , ".$value.")<br/>";	
						}
					}
					else{echo "(".$key." , ".$value.")<br/>";}	
				}
			}
			else{echo "(".$key." , ".$value.")<br/>";}
		} 	 	
}
// getting the last cordinates for offset to be added to them
function get_cordinates($array){
	if(is_array($array)){
		foreach($array as $key => $value){
			if(!(is_array($value))){
				$x = $key;
				$y= $value;
			}
			if((is_array($value))){
				foreach($value as $key => $value){
					if((!is_array($value))){
						$x = $key;
						$y= $value;
					}
					if((is_array($value))){
						foreach($value as $key => $value){
							$x = $key;
							$y= $value;
						}
					}
				}
			}
		}
	}
	return array('x'=>$x, 'y'=>$y);
}	
// increase X on x-axis
function inc_x($x,$y,$l){
	for ($i=$x;$i<=$x+$l;$i++){
		$xy = array($i=>$y);
		$res[$i] = array($i=>$xy[$i]);
	}
	array_shift($res);
	return $res;	
}
// increase Y on y-axis
function inc_y($x,$y,$l){
	 for ($i=$y;$i<=$y+$l;$i++){
		$xy = array($x=>$i);
		$res[$i] = array($i=>$xy); 
	}
	array_shift($res);
	return $res;	
}
// deccrease X on x-axis
function dec_x($x,$y,$l){
	for ($i=$x;$i>=$x-$l;$i--){
		$xy = array($i=>$y);
		$res[$i] = array($i=>$xy[$i]);
	}
	array_shift($res);
	return $res;	
}
// deccrease Y on y-axis
function dec_y($x,$y,$l){
	for ($i=$y;$i>=$y-$l;$i--){
		$xy = array($x=>$i);
		$res[$i] = array($i=>$xy);
	}
	array_shift($res);
	return $res;	
}
// main function , the first (0,0) is gerenerated separately 
function spiral($l){
	$f= 2*$l-1; // for n as lengh of the square,f is the frequency of the spiral rotation F= 2n-1
	$x = $y = 0; // first cordinates 
	$result[0][0] = array('0'=>'0'); //generating array of 1st cordinates
	print_array($result); // display
	$flag = 'red'; // every spiral has 3 rotations to left and then only 2, this flag bypasses the change of length of shifting $l in the first 3 rotations
	$l--;$f--; // since cordinates start from 0-3 , f and l are initialized one unit down
	for($j=$l;$j>0;$j--){		
		$result[0][$j] = inc_x($x,$y,$l); // shift right :: offset $l
		print_array($result[0][$j]); //display results
		$f==0 ? exit() : $f--; // check if rotation has ended
		$xy = get_cordinates($result[0][$j]); // getting last cordinates
		$x = $xy['x']; // assining new x & y
		$y = $xy['y'];// assining new x & y
		if($flag == 'green'){$l--;}	 // don't change $l if its the first loop
		//
		$result[1][$j] = inc_y($x,$y,$l); // shift up :: offset $l
		print_array($result[1][$j]); 
		$f==0 ? exit() : $f--;
		$xy = get_cordinates($result[1][$j]);
		$x = $xy['x'];
		$y = $xy['y'];	
		//
		$result[2][$j] = dec_x($x,$y,$l); // shift left :: offset $l
		print_array($result[2][$j]);
		$f==0 ? exit() : $f--;
		$xy = get_cordinates($result[2][$j]);
		$x = $xy['x'];
		$y = $xy['y'];
		$l--;$flag='green'; // after 3rd rotation $l can now decrease every 2 rotations
		//
		$result[3][$j] = dec_y($x,$y,$l);
		print_array($result[3][$j]);
		$f==0 ? exit() : $f--;
		$xy = get_cordinates($result[3][$j]);
		$x = $xy['x'];
		$y = $xy['y'];
	}
	return $result;
}

//+++++++++++++++++++++++++++++++++++++++++//
//  main function spiral is called here    //
//+++++++++++++++++++++++++++++++++++++++++//

spiral(5);

?>