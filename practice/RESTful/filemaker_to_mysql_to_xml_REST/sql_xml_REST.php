<?php
require_once('assets/database.php');
//getting info from the database
$new_connection = new MySQLConnection();
$new_connection->open_connection();
$query = 'SELECT * FROM `test`.`people`';
$results = $new_connection->run_query($query);
//$row_num = mysql_num_rows($results);
$contact_list = new SimpleXMLElement("<contacts></contacts>");
$i=0;
while($person = mysql_fetch_array($results)){ 
	$fName = $person['first_name'];
	$lName = $person['last_name'];
	$email = $person['email'];
	$phone = $person['phone'];
	$id = $person['id'];
	$address = $person['address'];
	$city = $person['city'];
	$province = $person['province'];
	$postalCode = $person['postal_code'];
	//
	$contact = $contact_list->addchild('contact');
	$contact->addchild('firstName', $fName);
	$contact->addchild('lastName', $lName);
	$contact->addchild('email', $email);
	$contact->addchild('phone', $phone);
	$contact->addchild('id', $id);
	$contact->addchild('address', $address);
	$contact->addchild('city', $city);
	$contact->addchild('province', $province);
	$contact->addchild('postalCode', $postalCode);
	$i++;
}
mysql_free_result($results);
$dom = new DOMDocument('1.0','UTF-8');
$dom->preserveWhiteSpace = false;
$dom->formatOutput = true;
$dom->loadXML($contact_list->asXML());
//send to browser
header('Content-type: text/xml');
echo $dom->saveXML();



?>