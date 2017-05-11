<?php
require('connect.php');
session_start();
extract($_REQUEST);
$user='ram@gmail.com';

if($user=="")
header("location:signout.php");

 	$f=mysql_fetch_array(mysql_query("select * from farmer_db where user='$user'"));
	$aa=$f['aadhaar'];		
	
	$q=mysql_query("select n_id from device where aadhaar='$aa' order by n_id desc");
	$num=mysql_num_rows($q);

	if($num==0)
	echo"<br><br><h2>You have not added any tests yet.</h2>";

	elseif($num>0)
	{
	?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport"    content="width=device-width, initial-scale=1.0">
	<meta name="description" content="">
	
	
	<title>Test Result - ZHCET.AMU(Soil Portal)</title>

	<link rel="shortcut icon" href="assets/images/st_favicon.png">
	
	<link rel="stylesheet" media="screen" href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,700">
	<link rel="stylesheet" href="assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="assets/css/font-awesome.min.css">

	<!-- Custom styles for our template -->
	<link rel="stylesheet" href="assets/css/bootstrap-theme.css" media="screen" >
	<link rel="stylesheet" href="assets/css/main.css">
    

	<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!--[if lt IE 9]>
	<script src="assets/js/html5shiv.js"></script>
	<script src="assets/js/respond.min.js"></script>
	<![endif]-->
</head>

<body>
	<!-- Fixed navbar -->
	<div class="navbar navbar-inverse navbar-fixed-top headroom" style="position:absolute">
		<div id="google_translate_element" style="position:absolute;top:0;right:0;"></div><script type="text/javascript">
function googleTranslateElementInit() {
  new google.translate.TranslateElement({pageLanguage: 'en', includedLanguages: 'en,hi', layout: google.translate.TranslateElement.InlineLayout.SIMPLE}, 'google_translate_element');
}
</script><script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
		<div class="container">
			<div class="navbar-header">
				<!-- Button for smallest screens -->
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse"><span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
				<a class="navbar-brand" href="f_profile.php"><img src="assets/images/st_logo.png" alt="Progressus HTML5 template"></a>
			</div>
			<div class="navbar-collapse collapse">
				<ul class="nav navbar-nav pull-right">
					<li><a href="f_profile.php">Home</a></li>
					<li><a href="about.php">About</a></li>
                    <li class="active"><a href="testresult.php">View Test Result</a></li>
                    <li><a href="humidity_chart.php">View as Chart</a></li>
                    <li><a href="edit_profile.php">Edit Profile</a></li>
                    
                    
					<li class="dropdown">
                    	
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Downloads <b class="caret"></b></a>
						<ul class="dropdown-menu">
							<li class="active"><a href="csv.php">csv file</a></li>
							<li class="active"><a href="pdf.php">pdf file</a></li>
						</ul>
                    
						
					</li>
					<li><a href="contact.php">Contact</a></li>
					<li><a class="btn" href="signout.php"><img src="f_uploads/<?php echo $photo?>"width="30px" height="30px" style="border:solid"> SIGN OUT</a></li>
				</ul>
			</div><!--/.nav-collapse -->
		</div>
	</div> 
	<!-- /.navbar -->

	<header id="head" class="secondary"></header>

	<!-- container -->
	<div class="container">
		
		<ol class="breadcrumb">
			<li><a href="f_profile.php">Home</a></li>
			<li class="active">Test Result</li>
		</ol>

		<div class="row">
			
			<!-- Sidebar -->
			<aside class="col-md-4 sidebar sidebar-left">

				<div class="row widget">
					<div class="col-xs-12">
						<h4>Test Results</h4>
                        <br><br>
						<p><img src="assets/images/testresult.png" alt=""> <h6><em>source: Internet</em></h6></p>
                        
					</div>
				</div>
			</aside>
			<!-- /Sidebar -->

			<!-- Article main content -->
			<article class="col-md-8 maincontent">
				<header class="page-header">
					<h1 class="page-title">How to read your Soil Test?</h1>
				</header>
				<p>Taking it from the top, the first line below "Parameter" is  pH. It is a measure of the acidity or alkalinity of your soil. Next line down is Soil temperature. It is simply the measurement of the warmth in the soil. The third item is the percentage of Soil moisture content tells you how much water is in the soil - representing what percentage of total 'volume' of soil is moisture. The fourth one is the percentage of organic carbon in your soil.</p>
				
			  <p><b>Anions: </b>
              Next we come to a couple of Anions, Nitogen, Sulfur and Phosphorus.  Anions are negatively charged atoms. Nitrogen is so vital because it is a major component of chlorophyll, the compound used in photosynthesis.  Sulfur is important for many life processes including formation of protein. Plants use Phosphorus to make sugars.</p>
                
				<p><b>Cations: </b>
                Cations are positively charged atoms, and the Exchange Capacity of your soil is a measure of the amount of cation elements it can hold. Potassium is a powerful growth stimulant for plants.</p>
                
              <p><b>The Minor elements: </b>
                These are only "minor" in the amounts required compared to other minerals.
                Boron is needed in tiny amounts in order for plants and animals to properly utilize Calcium. Iron is needed by plants and animals. Manganese is needed for a plant to set fertile seeds. Copper and Zinc work together and need to be in a balance of about 1 part Copper to 2 parts Zinc.
              </p>


			</article>
			<!-- /Article -->			

<script type="text/javascript" src="http://code.jquery.com/jquery.min.js"></script>

<script type="text/javascript">

$('#c_select').change(function(){
    $.ajax({
        type:'post',
        url:'get_course_info_db.php',
        data: 'c_id='+ $(this).val(),
        dataType: 'json', // jQuery will expect JSON and decode it for you
        success: function(reply_data){
            $('#course_name').val(reply_data['c_name']);
            $('#course_credit').val(reply_data['c_credit']);
        }
    }); 
})


function fetch_select(val)
{
   $.ajax({
     type: 'get',
     url: 'fetchdata.php',
     data: {
       get_option:val
     },
	 dataType: 'json', // jQuery will expect JSON and decode it for you
        success: function(reply_data){
            $('#writekey').val(reply_data['writekey']);
            
        },
        error: function() {
          alert('Error occurs!');
       }
   });
}

</script>

<aside class="col-md sidebar sidebar-right" style="float:right">
	<div class="row widget">
		<div class="col-xs-12">
					
			<div id="select_box">
			
				 <select onchange="fetch_select(this.value);">
				   <option>Select Device</option>
				   <?php           
					 while($row=mysql_fetch_array($q))
					 {
					  echo "<option>".$row['n_id']."</option>";
					 }
				   ?>
				 </select>
		 
             </div>           
        </div>
    </div>
</aside>
	
       
<table style="border-collapse:collapse" width="100%" border="2" cellpadding="6">
  <tr>
    <th bgcolor="#00AF50" height="24" colspan="5" scope="col">SOIL HEALTH CARD</th>
    <th bgcolor="#92D051" width="75" scope="col"><div align="center">
      <p>Node no.</p>
    </div></th>
    <th bgcolor="#c2d69b" colspan="4" scope="col"></th>
  </tr>
  <tr>
    <th bgcolor="#FFC000" height="26" colspan="5" scope="col">Farmer's Details</th>
    <th bgcolor="#92D051" width="75" scope="col">Node id</th>
    <th bgcolor="#c2d69b" colspan="4" scope="col" id="writekey"></th>
  </tr>
  <tr>
    <th width="140" scope="row"><div align="left">Name </div></th>
    <td colspan="4" scope="row"><?php echo $f['name']?></td>
    <th bgcolor="#76923d" colspan="5" rowspan="2"><div align="center">SOIL TEST RESULTS</strong></div></th>
  </tr>
  <tr>
    <th scope="row"><div align="left">Address</div></th>
    <td colspan="4" scope="row"><?php echo $f['address']?></td>
  </tr>
  <tr>
    <th scope="row"><div align="left">Village</div></th>
    <td colspan="4" scope="row"><?php echo $f['village']?></td>
    <th bgcolor="#9bbb58" rowspan="2">S.No.</th>
    <th bgcolor="#9bbb58" width="148" rowspan="2">Parameter</th>
    <th bgcolor="#9bbb58"  width="160" rowspan="2">Test Value</th>
    <th bgcolor="#9bbb58" width="79" rowspan="2">Unit</th>
    <th bgcolor="#9bbb58" width="79" rowspan="2">Rating</th>
  </tr>
  <tr>
    <th scope="row"><div align="left">District</div></th>
    <td colspan="4" scope="row"><?php echo $f['district']?></td>
  </tr>
  <tr>
    <th scope="row"><div align="left">State</div></th>
    <td colspan="4" scope="row"><?php echo $f['state']?></td>
    <th>1.</th>
    <td><strong>pH</strong></td>
    <td><div align="center">
	<div class="red box"><?php echo $ph_values[0];?></div>
    <div class="blue box"><?php echo $ph_values[1];?></div>
    </div></td>
    <td><div align="center">-</div></td>
    <td><div align="center"></div></td>
  </tr>
  <tr>
    <th scope="row"><div align="left">Pin</div></th>
    <td colspan="4" scope="row"><?php echo $f['pin']?></td>
    <th>2.</th>
    <td><strong>Temperature</strong></td>
    <td><div align="center">
    <div class="red box"><?php echo $temp_values[0];?></div>
    <div class="blue box"><?php echo $temp_values[1];?></div>
    </div></td>
    <td><div align="center">°C</div></td>
    <td><div align="center"></div></td>
  </tr>
  <tr>
    <th scope="row"><div align="left">Aadhaar No.</div></th>
    <td colspan="4" scope="row"><?php echo $f['aadhaar']?></td>
    <th>3.</th>
    <td><strong>Humidity</strong></td>
    <td><div align="center">
	<div class="red box"><?php echo $hum_values[0];?></div>
    <div class="blue box"><?php echo $hum_values[1];?></div>
    </div></td>
    <td><div align="center">kg/kg</div></td>
    <td><div align="center"></div></td>
  </tr>
  <tr>
    <th scope="row"><div align="left">Mobile No.</div></th>
    <td colspan="4" scope="row"><?php echo $f['phone']?></td>
    <th>4.</th>
    <td><strong>Organic Carbon (OC)</strong></td>
    <td><div align="center"></div></td>
    <td><div align="center">ppm</div></td>
    <td><div align="center"></div></td>
  </tr>
  <tr>
    <th bgcolor="#FFC000" colspan="5" rowspan="2" scope="row">Soil Sample Details</th>
    <th>5.</th>
    <td><strong>Nitrogen (N)</strong></td>
    <td><div align="center"></div></td>
    <td><div align="center">ppm</div></td>
    <td><div align="center"></div></td>
  </tr>
  <tr>
    <th>6.</th>
    <td><strong>Phosphorus (P)</strong></td>
    <td><div align="center"></div></td>
    <td><div align="center">ppm</div></td>
    <td><div align="center"></div></td>
  </tr>
  <tr>
    <th scope="row"><div align="left">Soil Sample No.</div></th>
    <th colspan="4" scope="row">&nbsp;</th>
    <th>7.</th>
    <td><strong>Potassium (K)</strong></td>
    <td><div align="center"></div></td>
    <td><div align="center">ppm</div></td>
    <td><div align="center"></div></td>
  </tr>
  <tr>
    <th scope="row"><div align="left">Sample collected on</div></th>
    <th colspan="4" scope="row">&nbsp;</th>
    <th>8.</th>
    <td><strong>Sulphur (S)</strong></td>
    <td><div align="center"></div></td>
    <td><div align="center">ppm</div></td>
    <td><div align="center"></div></td>
  </tr>
  <tr>
    <th scope="row"><div align="left">Survey No.</div></th>
    <th colspan="4" scope="row">&nbsp;</th>
    <th>9.</th>
    <td><strong>Zinc (Zn)</strong></td>
    <td><div align="center"></div></td>
    <td><div align="center">ppm</div></td>
    <td><div align="center"></div></td>
  </tr>
  <tr>
    <th scope="row"><div align="left">Khasra No./Dag No.</div></th>
    <th colspan="4" scope="row">&nbsp;</th>
    <th>10.</th>
    <td><strong>Boron (B)</strong></td>
    <td><div align="center"></div></td>
    <td><div align="center">ppm</div></td>
    <td><div align="center"></div></td>
  </tr>
  <tr>
    <th scope="row"><div align="left">Farm Size</div></th>
    <th colspan="4" scope="row">&nbsp;</th>
    <th>11.</th>
    <td><strong>Iron (Fe)</strong></td>
    <td><div align="center"></div></td>
    <td><div align="center">ppm</div></td>
    <td><div align="center"></div></td>
  </tr>
  <tr>
    <th scope="row"><div align="left">Geo Position</div></th>
    <th width="56" scope="row"><div align="left">Latitude</div></th>
    <th width="62" scope="row">&nbsp;</th>
    <th width="67" scope="row"><div align="left">Longitude</div></th>
    <th width="62" scope="row">&nbsp;</th>
    <th>12.</th>
    <td><strong>Manganese (Mn)</strong></td>
    <td><div align="center"></div></td>
    <td><div align="center">ppm</div></td>
    <td><div align="center"></div></td>
  </tr>
  <tr>
    <th scope="row"><div align="left">Irrigated/ Rainfed</div></th>
    <th colspan="4" scope="row">&nbsp;</th>
    <th>13.</th>
    <td><strong>Copper (Cu)</strong></td>
    <td><div align="center"></div></td>
    <td><div align="center">ppm</div></td>
    <td><div align="center"></div></td>
  </tr>
  <tr>
    <th bgcolor="#00AF50" colspan="5" scope="row">&nbsp;</th>
    <td bgcolor="#92D051" colspan="5">&nbsp;</td>
  </tr>
</table>

<br><br>


	  </div>
	</div>	<!-- /container -->
	

	<footer id="footer" class="top-space">

		<div class="footer1">
			<div class="container">
				<div class="row">
					
					<div class="col-md-3 widget">
						<h3 class="widget-title">Contact</h3>
						<div class="widget-body">
							<p>+91-571-2700920 Ext- 3128,+91-571-2721148 (O)<br>
								<a href="mailto:#">support@soilhealthcard.pe.hu</a><br>
								<br>
								Electronics Engineering Department, AMU Campus, Aligarh, UP (202001)
							</p>	
						</div>
					</div>

					<div class="col-md-3 widget">
						<h3 class="widget-title">Powered by</h3>
						<div class="widget-body">
							<p class="follow-me-icons">
								<img src="assets/images/nucleoboard.png">
							</p>	
						</div>
					</div>
                    <div class="col-md-6 widget">
						<h3 class="widget-title">About</h3>
						<div class="widget-body">
							<p>Smart Agriculture is an initiative of students of Zakir Husain College Of Engineering and Technology, A.M.U. which serves the purpose of "a full fledged IoT based agriculture monitoring", as one thinks of.</p>
                            <p>Smart Agriculture is one of the proposal which can help farmer to boost
production in less cost by-
<ul style="list-style-type:disc">
  <li>Enabling Precision Agriculture.</li>
  <li>Remotely collect data from sensors and send them to Cloud without involvement of any Labs.</li>
  <li>Enabling farmers to get the report on daily or weekly basis and take action accordingly.</li>
  <li>Improving productivity and reducing the total cost.</li>
</ul>
                            </p>
					</div>

				</div> <!-- /row of widgets -->
			</div>
		</div>

		<div class="footer2">
			<div class="container">
				<div class="row">
					
					<div class="col-md-6 widget">
						<div class="widget-body">
							<p class="simplenav">
								<a href="f_profile.php">Home</a> | 
								<a href="about.php">About</a> |
								<a href="testresult.php">View Test Result</a> |
                                <a href="">View as Chart</a> |
                                <a href="edit_profile.php">Edit Profile</a> |
                                <a href="">Downloads</a> |                                
								<a href="contact.php">Contact</a> |
								<b><a href="signout.php">Sign out</a></b>
							</p>
						</div>
					</div>

					<div class="col-md-6 widget">
						<div class="widget-body">
							<p class="text-right">
								Copyright &copy; 2016, Designed by - Ayush Garg , &nbsp;<a href="http://www.amu.ac.in" rel="designer">ZHCET.AMU</a> 
							</p>
						</div>
					</div>

				</div> <!-- /row of widgets -->
			</div>
		</div>
	</footer>	
		




	<!-- JavaScript libs are placed at the end of the document so the pages load faster -->
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
	<script src="http://netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
	<script src="assets/js/headroom.min.js"></script>
	<script src="assets/js/jQuery.headroom.min.js"></script>
	<script src="assets/js/template.js"></script>
</body>
</html>
<?php
}
?>