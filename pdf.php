<?php
require('fpdf/fpdf.php');
require('connect.php');
 
session_start();
extract($_REQUEST);
$user=$_SESSION['user'];
$photo=$_SESSION['photo'];

if($user=="")
header("location:signout.php");    

$f=mysql_fetch_array(mysql_query("select * from farmer_db where user='$user'"));

$name=$f['name'];
$address=$f['address'];
$village=$f['village'];
$district=$f['district'];
$state=$f['state'];
$pin=$f['pin'];
$phone=$f['phone'];
$aadhaar=$f['aadhaar'];

$q=mysql_query("select n_id,writekey from device where aadhaar='$aadhaar'");
	
	$num=mysql_num_rows($q);

	if($num==0)
	echo"<br><br><h2>You have not added any tests yet.</h2>";
	
	elseif($num>0)
	{		
		$ff=mysql_fetch_array($q);
		$wk=$ff['writekey'];
		$n_id=$ff['n_id'];
		$qq=mysql_fetch_array(mysql_query("select * from reading where writekey='$wk' AND n_id='$n_id' order by r_no desc"));
		$ph=$qq['ph'];
		$temp=$qq['temp'];
		$hum=$qq['hum'];


//Create a new PDF file
$pdf=new FPDF();
$pdf->AddPage();


//Bold Font for Field Name
$pdf->SetFont('Arial','B',12);

$pdf->SetY(20);
$pdf->SetX(5);
$pdf->SetFillColor(0,175,80);
$pdf->Cell(100,6,'SOIL HEALTH CARD.',1,0,'C',1);

$pdf->SetX(105);
$pdf->SetFillColor(146,208,81);
$pdf->Cell(35,6,'Node No.',1,0,'C',1);
$pdf->SetY(26);
$pdf->SetX(105);
$pdf->Cell(35,6,'Node id',1,0,'C',1);

$pdf->SetX(5);
$pdf->SetFillColor(255,192,0);
$pdf->Cell(100,6,'Farmer Details',1,0,'C',1);

$pdf->SetY(32);
$pdf->SetX(105);
$pdf->SetFillColor(118,146,61);
$pdf->Cell(100,12,'SOIL TEST RESULTS',1,0,'C',1);

$pdf->SetY(44);
$pdf->SetX(105);
$pdf->SetFillColor(155,187,88);
$pdf->Cell(10,12,'S.No.',1,0,'C',1);
$pdf->SetX(115);
$pdf->Cell(35,12,'Parameters',1,0,'C',1);
$pdf->SetX(150);
$pdf->Cell(25,12,'Test Value',1,0,'C',1);
$pdf->SetX(175);
$pdf->Cell(10,12,'Unit',1,0,'C',1);
$pdf->SetX(185);
$pdf->Cell(20,12,'Ratings',1,0,'C',1);


$pdf->SetFillColor(255,255,255);
$a = array("Name","Address","Village","District","State","Pin","Aadhaar No.","Mobile No.");
$arrlength4 = count($a);
$b = array(32,38,44,50,56,62,68,74);
$arrlength5 = count($b);
$c = array($name, $address, $village, $district, $state, $pin, $aadhaar,$phone);


	for($i=0,$j=0;$i<$arrlength4,$j<$arrlength5;$i++,$j++)
	{
	  $pdf->SetFont('Arial','B',12);
	  $pdf->SetY($b[$j]);
	  $pdf->SetX(5);
	  $pdf->Cell(30,6,$a[$i],1,0,'L',1);
	  $pdf->SetFont('Arial','',12);
	  $pdf->SetX(35);
	  $pdf->Cell(70,6,$c[$i],1,0,'L',1);
	}
	

$pdf->SetY(80);
$pdf->SetX(5);
$pdf->SetFillColor(255,192,0);
$pdf->Cell(100,6,'Soil Sample Details',1,0,'C',1);
$pdf->SetFillColor(255,255,255);

$y = array("Soil Sample No.","Sample Collected on","Survey No.","Khasra No./ Dag No.","Farm size","Geo position(GPS)","Irrigated/ Rainfed");
$arrlength2 = count($y);
$z = array(86,92,98,104,110,116,122);
$arrlength3 = count($z);
    
	for($i=0,$j=0;$i<$arrlength2,$j<$arrlength3;$i++,$j++)
	{
	  $pdf->SetFont('Arial','B',12);
	  $pdf->SetY($z[$j]);
	  $pdf->SetX(5);
	  $pdf->Cell(45,6,$y[$i],1,0,'L',1);
	  $pdf->SetFont('Arial','',12);
	  $pdf->SetX(50);
	  $pdf->Cell(55,6,'',1,0,'L',1);
	}

$pdf->SetFillColor(0,175,80);
$pdf->SetY(128);
$pdf->SetX(5);
$pdf->Cell(100,6,'',1,0,'L',1);


$pdf->SetFont('Arial','',10);
$pdf->SetFillColor(255,255,255);

$w = array("pH","Temperature","Humidity","Oragnic Carbon(OC)","Nitrogen","Phosphorus","Potassium","Zinc","Boron","Iron","Managanese",
"Copper");
$arrlength = count($w);
$x = array(56,62,68,74,80,86,92,98,104,110,116,122);
$arrlength1 = count($x);
$d = array($ph, $temp, $hum,"NULL","NULL","NULL","NULL","NULL","NULL","NULL","NULL","NULL");
$celsius = utf8_decode("°C") ;
$e = array("-",$celsius,"kg/kg","ppm","ppm","ppm","ppm","ppm","ppm","ppm","ppm","ppm");
    
	for($i=0,$j=0;$i<$arrlength,$j<$arrlength1;$i++,$j++)
	{
	  $pdf->SetY($x[$j]);
	  $pdf->SetX(105);
	  $pdf->Cell(10,6,$i+1,1,0,'L',1);
	  $pdf->SetX(115);
	  $pdf->Cell(35,6,$w[$i],1,0,'L',1);
	  $pdf->SetX(150);
	  $pdf->Cell(25,6,$d[$i],1,0,'C',1);
	  $pdf->SetX(175);
	  $pdf->Cell(10,6,$e[$i],1,0,'C',1);
	  $pdf->SetX(185);
	  $pdf->Cell(20,6,'',1,0,'C',1);
	}
	
$pdf->SetFillColor(146,208,81);
$pdf->SetY(128);
$pdf->SetX(105);
$pdf->Cell(100,6,'',1,0,'L',1);


$pdf->SetFont('Arial','',12);
$pdf->SetFillColor(194,214,155);
$pdf->SetY(20);
$pdf->SetX(135);
$pdf->Cell(70,6,$n_id,1,0,'C',1);
$pdf->SetY(26);
$pdf->SetX(135);
$pdf->Cell(70,6,$wk,1,0,'C',1);


$pdf->SetY(116);
$pdf->SetX(50);
$pdf->Cell(17,6,'Latitude',1);
$pdf->SetX(67);
$pdf->Cell(8,6,'',1);
$pdf->SetX(75);
$pdf->Cell(20,6,'Longitude',1);
$pdf->SetX(95);
$pdf->Cell(10,6,'',1);


$pdf->Output();
	}
?>
