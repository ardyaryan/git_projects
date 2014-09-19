<html>
<head>
<title><?php echo $_ci_view; ?></title>
<link type="text/css" href="../../styles/style.css" rel="stylesheet">
<?php echo $map['js'];?>
</head>
<body>
<div class="container">
    <div class="header" align="center">
   	<img src="../../images/codeigniter.png" width="150" class="logo"  alt=""/></div>
        <div class="content" align="center">
<?php
	include ('navigation.php');
	echo "<br/><br/>";
	$post = $_POST;
	$this->load->helper('form');
	echo form_open('home/google_maps');
		$position = array(
						'name' 			=> 'position',
						'placeholder'  => 'City, Address, Postal Code',
					  );
		$submit = array(
						'value' 			=> 'submit',
						'type'			=> 'submit',
					  );			  			  
		echo form_input($position);
		echo form_submit($submit);	
	echo form_close();
	//
	echo "<div class=\"map\">";
	echo $map['html'];
	echo "</div><br/><br/>";
	include ('footer.php');	
?>