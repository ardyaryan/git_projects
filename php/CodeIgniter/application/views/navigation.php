<?php
	$this->load->helper('url');
	$url1= base_url(array('index.php','home', 'index'));
	$url2= base_url(array('index.php','home', 'register'));
	$url3= base_url(array('index.php','home', 'login'));
	$url4= base_url(array('index.php','home', 'profile'));
	$url5= base_url(array('index.php','home', 'contact'));
	$url6= base_url(array('index.php','home', 'google_maps'));

?>	
<div class="navigation">	
<table width="700" >
  <tr align="center">
    <td><?php 	echo "<a href=\"$url1\">Home</a>"; ?></td>
    <td><?php 	echo "<a href=\"$url2\">Register</a>"; ?></td>
    <td><?php 	echo "<a href=\"$url3\">Login</a>"; ?></td>
    <td><?php 	echo "<a href=\"$url4\">Profile</a>"; ?></td>
    <td><?php 	echo "<a href=\"$url5\">Contact Us</a>"; ?></td>
    <td><?php 	echo "<a href=\"$url6\">Google Maps</a>"; ?></td>
  </tr>
</table>
</div>