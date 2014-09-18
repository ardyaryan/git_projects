<?php 
session_start();
$_SESSION['logged']= false;
$_SESSION['username']= '';
$this->load->helper('url');
redirect('home/login');//, 'refresh');

?>