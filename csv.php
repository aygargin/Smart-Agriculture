<?php
session_start();
$user=$_SESSION['user'];
$photo=$_SESSION['photo'];
if($user==""){
header("location:signout.php");
}
else{
$name=$_SESSION['name'];

// output headers so that the file is downloaded rather than displayed
header('Content-Type: text/csv; charset=utf-8');
header('Content-Disposition: attachment; filename=soil_card1.csv');

// create a file pointer connected to the output stream
$output = fopen('php://output', 'w');

// output the column headings
fputcsv($output, array('S.No.','pH','Teamperature','Humidity','Created At'));

// fetch the data
require('connect.php');
$rows = mysql_query("SELECT aadhaar FROM farmer_db where user='$user'");
	

// loop over the rows, outputting them

$bb=mysql_fetch_array($rows);
$aa=$bb['aadhaar'];
	
	$q=mysql_query("select n_id,writekey from device where aadhaar='$aa'");
	
	$num=mysql_num_rows($q);

	if($num==0)
	echo"<br><br><h2>You have not added any tests yet.</h2>";
	
	elseif($num>0)
	{		
		$ff=mysql_fetch_array($q);
		$wk=$ff['writekey'];
		$n_id=$ff['n_id'];
		
		$qq=mysql_query("select ph,temp,hum,created_at from reading where writekey='$wk' AND n_id='$n_id' order by r_no asc");
		$i=1;
		while ($row = mysql_fetch_assoc($qq)) 
		{
		fputcsv($output, array($i, $row["ph"], $row["temp"],$row["hum"],$row["created_at"]));
		$i++;
		}
	}



}
?>