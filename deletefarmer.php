<?php
require('connect.php');
session_start();
$id=$_SESSION['adm_name'];
if($id!="st")
header("location:signout.php");

	extract($_GET);
	$f=mysql_fetch_array(mysql_query("select photo from farmer_db where s_no='$del'"));
	$old_pic=$f['photo'];
		unlink("f_uploads/$old_pic") ;
	$q=mysql_query("delete from farmer_db where s_no='$del'");
	
	if($q)
	{
		header("location:manage_farmer.php");
	}
?>