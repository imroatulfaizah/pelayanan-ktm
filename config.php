<?php

$host  ='localhost';
$User  ='root';
$Password  ='';
$Db_name ='pelayananktm';

$db =new mysqli($host,
                       $User,
                       $Password,
                       $Db_name);

if ($db->connect_errno) {
	die('koneksi error:'.$db->onnect_errno);
	
}
?>