<?php
# FileName="Connection_php_mysql.htm"
# Type="MYSQL"
# HTTP="true"
$hostname_CodeIgniter = "localhost";
$database_CodeIgniter = "code_igniter";
$username_CodeIgniter = "user1";
$password_CodeIgniter = "Yes";
$CodeIgniter = mysql_pconnect($hostname_CodeIgniter, $username_CodeIgniter, $password_CodeIgniter) or trigger_error(mysql_error(),E_USER_ERROR); 
?>