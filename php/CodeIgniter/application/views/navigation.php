<?php
	$this->load->helper('url');
	$url1= base_url(array('index.php','home', 'index'));
	$url2= base_url(array('index.php','home', 'register'));
	$url3= base_url(array('index.php','home', 'login'));
	$url4= base_url(array('index.php','home', 'profile'));
	$url5= base_url(array('index.php','home', 'contact'));

?>	
	
<table width="700" border="0" cellspacing="10" cellpadding="10">
  <tr>
    <td><?php 	echo "<a href=\"$url1\">Home</a>"; ?></td>
    <td><?php 	echo "<a href=\"$url2\">Register</a>"; ?></td>
    <td><?php 	echo "<a href=\"$url3\">login</a>"; ?></td>
    <td><?php 	echo "<a href=\"$url4\">Profile</a>"; ?></td>
    <td><?php 	echo "<a href=\"$url5\">Contact Us</a>"; ?></td>
  </tr>
</table>
