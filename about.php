<?php
session_start();
$user=$_SESSION['user'];
$photo=$_SESSION['photo'];
if($user==""){
header("location:signout.php");
}
else{
$name=$_SESSION['name'];?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport"    content="width=device-width, initial-scale=1.0">
	<meta name="description" content="">
	
	
	<title>About Us - ZHCET.AMU(Soil Portal)</title>

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
					<li class="active"><a href="about.php">About</a></li>
                    <li><a href="testresult.php">View Test Result</a></li>
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
					<li><a class="btn" href="signout.php"><img src="f_uploads/<?php echo $photo?>"width="30px" height="30px" style="border:solid" > SIGN OUT</a></li>
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
			<li class="active">About</li>
		</ol>

		<div class="row">
			
			<!-- Article main content -->
			<article class="col-sm-8 maincontent">
				<header class="page-header">
					<h1 class="page-title">About us</h1>
				</header>
				<h3>Specifications</h3>
				<p> The system consists of Sensor Node, Agri-Hub (Internet Gateway), Android application and Server Application.</p>
				<h3>Sensor Nodes</h3>
				<p> <b>a.</b> Power Source : Li-Ion battery + Solar Panel<br>
                    <b>b.</b> Communication : 6LoWPAN on 868/915 MHz using SPIRIT1<br>
                    <b>c.</b> Networking: Mesh network with Internet Gateway as root node.<br>
                    <b>d.</b> Mounting: Outdoor location, elevated mounting on stick. At least 1m height from ground, 1.5m is recommended for optimal RF performance.<br>
                    <b>e.</b> Sensors: pH, Moisture, Temperature, Conductivity.<br>
                    
                    <br>Some nodes may just act as repeater nodes and may not have any sensors some nodes may additionally have movement / PIR sensors to detect presence of humans or animals in field. These are armed during night time.</p>
                    
				<h3>Agri-Hub (Internet Gateway)</h3>
				<p>Gathers data from Sensor nodes and uploads to server application. Single gateway can be shared by Sensor nodes owned by multiple neighbors reducing initial and It can also be owned and operated by local agency / government and mounted on an electricity
pole or any other publicly owned location.<br>
                
                <br><b>a.</b> Power Source : Wall socket / 12V Lead acid battery (no charging support).<br>
                <b>b.</b> Communication : 6LoWPAN on 868 MHz using SPIRIT1, Wi-Fi. <br>
                <b>c.</b> Networking: Acts as 6LoWPAN Mesh network root node.Should ideally be installed in central location. <br>
                <b>d.</b> Mounting: Indoor location (home or shed).<br>
                <b>e.</b> Button to put in configuration mode: In this mode Wi-Fi module goes into station mode,                
                Android app can now be used to connect to the Gateway and perform the initial configuration like Wi-Fi SSID, password, f/w upgrade etc.</p>
                
				
			</article>
			<!-- /Article -->
			
			<!-- Sidebar -->
			<aside class="col-sm-4 sidebar sidebar-right">

				<div class="widget">
					<h4>Test Sample</h4><br>
                    <img src="assets/images/crop.jpg" alt="Test Project" width="325">
					<h6><em>image: Testing in ZHCET</em></h6>
				</div>

			</aside>
			<!-- /Sidebar -->

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

<?php }?>