<?php
require('connect.php');

session_start();
$adm_name=$_SESSION['adm_name'];
if($adm_name=="")
header("location:signout.php");


?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport"    content="width=device-width, initial-scale=1.0">
	<meta name="description" content="">
	
	
	<title>Assign Device - ZHCET.AMU(Soil Portal)</title>

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
				<a class="navbar-brand" href="admin_profile.php"><img src="assets/images/st_logo.png" alt="Progressus HTML5 template"></a>
			</div>
			<div class="navbar-collapse collapse">
				<ul class="nav navbar-nav pull-right">
					<li><a href="admin_profile.php">Home</a></li>
                    <li class="active"><a href="assign_nodes.php">Assign Device</a></li> 
					<li><a href="manage_farmer.php">Manage Farmers</a></li>
					<li><a href="admin_contact.php">Contact</a></li>
					<li><a class="btn" href="signout.php"> SIGN OUT</a></li>
				</ul>
			</div><!--/.nav-collapse -->
		</div>
	</div> 
	<!-- /.navbar -->

	<header id="head" class="secondary"></header>

	<!-- container -->
	<div class="container">

		<ol class="breadcrumb">
			<li><a href="admin_profile.php">Home</a></li>
			<li class="active">Assign Device</li>
		</ol>

		<div class="row">
			
			<!-- Article main content -->
			<article class="col-xs-12 maincontent">
				<header class="page-header">
					<h1 class="page-title">Assign Device</h1>
				</header>
				
				<div class="col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
					<div class="panel panel-default">
						<div class="panel-body">
							<h3 class="thin text-center">Assign Device to Farmer </h3>
							<p class="text-center text-muted">New Farmer ? Add Aadhaar number. </p>
							<hr>
							
							<form name="form" method="post" enctype="multipart/form-data" onSubmit="return(validate());">
								<div class="top-margin">
									<label>Aadhaar Number <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control text" name="aadhaar" maxlength="14" placeholder="1234 1234 1234" required></div>    
                                    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
                                    
									<script>
									$('.text').on('keyup', function() {
									  var foo = $(this).val().split(" ").join(""); 
									  if (foo.length > 0) {
										foo = foo.match(new RegExp('.{1,4}', 'g')).join(" ");
									  }
									  $(this).val(foo);
									});
									</script> 
									
								<div class="top-margin">
									<label>Node No. <span class="text-danger">*</span></label>
									<input type="text" class="form-control" name="nod_no" placeholder="Node No." required>
								</div>
                                
								<div class="top-margin">
									<label>Device ID <span class="text-danger">*</span></label>
									<input type="text" class="form-control" name="div_id" placeholder="Device ID" required>
								</div>

								<hr>

								<div class="row">
									
									<div class="col-lg-8 text-right">
										<button class="btn btn-action" type="submit" name="assign">Assign</button>
									</div>
								</div>
                                
								
                                 
                                <?php
								extract($_POST); 
							
								 if(isset($_POST['assign']))
								 {
										$qry=mysql_query("select n_id from device where aadhaar='$aadhaar' AND writekey='$div_id' ");
										$num=mysql_num_rows($qry);
											
										if($num==0)
										{ 
											$q=mysql_query("insert into device (aadhaar , n_id , writekey) values('$aadhaar','$nod_no' ,'$div_id' )");														
										}
										
								 }?>
                                 
                                 <script>
                                 function validate()
                                 {
                                     var a=document.form.assign.value;                             

                                      if(a!=""||a!=null)
                                     {
                                         alert("Successfully Registered.");
                                         return true;
                                     }                                     
                                     return true;
                                 }
                                 </script>
							</form>
						</div>
					</div>

				</div>
				
			</article>
			<!-- /Article -->

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
								<a href="admin_profile.php">Home</a> |
                                <a href="assign_nodes.php">Assign Device</a> |  								
								<a href="manage_farmer.php">Manage Farmers</a> |
                                                          
								<a href="admin_contact.php">Contact</a> |
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



