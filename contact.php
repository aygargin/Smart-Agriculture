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
	
	
	<title>Contact Us - ZHCET.AMU(Soil Portal)</title>

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
    
    <script>
	function sendMail()
	{
		//alert('Its wokr');
         jQuery.ajax({
            url: "sendmail.php",
            data:'name='+$("#form_name").val()+'&email='+
            $("#form_email").val()+'&subject='+
            $("#form_subject").val()+'&message='+
            $("#form_message").val(),
            type: "POST",
            success:function(data){
               alert('Mail sent!');
            },
            error:function (){}
        });
    
}
</script>
    
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
					<li class="active"><a href="contact.php">Contact</a></li>
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
			<li class="active">Contact</li>
		</ol>

		<div class="row">
			
			<!-- Article main content -->
			<article class="col-sm-9 maincontent">
				<header class="page-header">
					<h1 class="page-title">Contact us</h1>
				</header>
				
				<p>
					We’d love to hear from you. Interested in working together? Fill out the form below with some info about your project and I will get back to you as soon as I can. Please allow a couple days for me to respond.
				</p>
				<br>
					<form name="form" method="post" enctype="multipart/form-data">
						<div class="row">
							<div class="col-sm-4">
								<input class="form-control" id="form_name" type="text" name="name" placeholder="Name">
							</div>
							<div class="col-sm-4">
								<input class="form-control" id="form_email" type="text" name="email" placeholder="Email">
							</div>
							<div class="col-sm-4">
								<input class="form-control" id="form_subject" type="text" name="subject" placeholder="Subject">
							</div>
						</div>
						<br>
						<div class="row">
							<div class="col-sm-12">
								<textarea placeholder="Type your message here..." class="form-control" id="form_message" name="message" rows="9"></textarea>
							</div>
						</div>
						<br>
						<div class="row">
							<div class="col-sm-12 text-right">
								<input class="btn btn-action" type="submit" onClick="sendMail();" value="Send message">
							</div>
						</div>
					</form>

			</article>
			<!-- /Article -->
			
			<!-- Sidebar -->
			<aside class="col-sm-3 sidebar sidebar-right">

				<div class="widget">
					<h4>Address</h4>
					<address>
						Electronics Engineering Department, AMU Campus, Aligarh, UP (202001)
					</address>
					<h4>Phone:</h4>
					<address>
						+91-571-2700920 Ext- 3128,+91-571-2721148 (O)
					</address>
				</div>

			</aside>
			<!-- /Sidebar -->

		</div>
	</div>	<!-- /container -->
	
	<section class="container-full top-space">
		<div id="map"></div>
	</section>

	<footer id="footer">

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
	
	<!-- Google Maps -->
	<script src="https://maps.googleapis.com/maps/api/js?key=&amp;sensor=false&amp;extension=.js"></script> 
	<script src="assets/js/google-map.js"></script>
	

</body>
</html>

<?php }?>