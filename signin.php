<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport"    content="width=device-width, initial-scale=1.0">
	<meta name="description" content="">
	
	
	<title>Sign in - ZHCET.AMU(Soil Portal)</title>

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
				<a class="navbar-brand" href="index.html"><img src="assets/images/st_logo.png" alt="Progressus HTML5 template"></a>
			</div>
			<div class="navbar-collapse collapse">
				<ul class="nav navbar-nav pull-right">
					<li><a href="index.html">Home</a></li>
					<li><a href="about.html">About</a></li>
                    <li><a href="signin.php">View Test Result</a></li>
                    <li><a href="signin.php">View as Chart</a></li>
                    <li><a href="signin.php">Edit Profile</a></li>
                    
                    
					<li class="dropdown">
                    	
                        <a href="signin.php" class="dropdown-toggle" data-toggle="dropdown">Downloads <b class="caret"></b></a>
						<ul class="dropdown-menu">
							<li ><a href="signin.php">csv file</a></li>
							<li ><a href="signin.php">pdf file</a></li>
						</ul>
                    
						
					</li>
					<li><a href="contact.html">Contact</a></li>
					<li class="active"><a class="btn" href="signin.php">SIGN IN / SIGN UP</a></li>
				</ul>
			</div><!--/.nav-collapse -->
		</div>
	</div> 
	<!-- /.navbar -->

	<header id="head" class="secondary"></header>

	<!-- container -->
	<div class="container">

		<ol class="breadcrumb">
			<li><a href="index.html">Home</a></li>
			<li class="active">User access</li>
		</ol>

		<div class="row">
			
			<!-- Article main content -->
			<article class="col-xs-12 maincontent">
				<header class="page-header">
					<h1 class="page-title">Sign in</h1>
				</header>
				
				<div class="col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
					<div class="panel panel-default">
						<div class="panel-body">
							<h3 class="thin text-center">Sign in to your account</h3>
							<p class="text-center text-muted">New User?, <a href="signup.php">Register Now !</a><br> To view your test results, click here to register first. </p>
							<hr>
							
							<form method="POST" enctype="multipart/form-data" onSubmit="return(validate());" id="login">
								<div class="top-margin">
									<label>Username/Email <span class="text-danger">*</span></label>
									<input type="text" class="form-control" name="user" placeholder="username" required>
								</div>
								<div class="top-margin">
									<label>Password <span class="text-danger">*</span></label>
									<input type="password" class="form-control" name="pass" placeholder="password" required>
								</div>

								<hr>

								<div class="row">
									<div class="col-lg-8">
										<b><a href="#forget" onclick="forgetpassword();" id="forget">Forgot password?</a></b>
									</div>
									<div class="col-lg-4 text-right">
										<button class="btn btn-action" type="submit" name="signin">Sign in</button>
									</div>
								</div>
                                
                                <script type="text/javascript">
								
								function forgetpassword() {
								  $("#login").hide();
								  $("#passwd").show();
								}
								
								</script>
                                
                                <?php
								//include('assets/way2sms/way2sms-api.php');
								
								  if (isset($_POST['signin']))
								  {
									  extract($_POST);
									  require('connect.php');
									  $a=MD5($pass);
									  
									  $p=mysql_query("select * from farmer_db where user='$user' AND password='$a'");
									  $q=mysql_num_rows($p);
									  
									  $r=mysql_query("select * from adminlogin where adm_name='$user' AND adm_pass='$a'");
									  $s=mysql_num_rows($r);
									  																		
									  if($q>0)
									  {
										  $f=mysql_fetch_array($p);
										  session_start();
										  $_SESSION['user']=$f['user'];
										  $_SESSION['name']=$f['name'];
										  $_SESSION['password']=$f['password'];
										  $_SESSION['photo']=$f['photo'];
										  header("location:f_profile.php");
									  }
										
									  else if($s>0)
									  {
										  $ff=mysql_fetch_array($r);
										  session_start();
										  $_SESSION['adm_name']=$ff['adm_name'];
										  
										  header("location:admin_profile.php");
									  }
								  
								  	  else
								  	  {
									  	$message="Invalid username or password.";
									  }
								  }
								  
									elseif(isset($_POST['reset']))
									{
										extract($_POST);
									  	require('connect.php');
										
										if (!filter_var($email, FILTER_VALIDATE_EMAIL)) // Validate email address
										{
											$message =  "Invalid email address please type a valid email!!";
										}
										
										else
										{
											$result = mysql_query("select s_no, user from farmer_db where user='$email'");
											$Results = mysql_fetch_array($result);
											$num3=mysql_num_rows($result);
											
											if($num3==1)
											{
												$ps =  md5(microtime($Results['s_no']));
												$rest = substr($ps, -12, -5); 

												$message = "Your password reset link send to your e-mail address.";
												$to=$email;
												$subject="Forget Password";
												$from = 'ayush.123.007@gmail.com';
												$body='Hi, <br/> <br/>Your Membership ID is '.$Results['user'].' <br><br>This is your new password = '.$rest.'<br/> <br/>Click here to sign in again http://soilhealthcard.pe.hu/onl9_soil_portal/signin.php<br><br>st.com<br>Life Augmented';
												$headers = "From: " . strip_tags($from) . "\r\n";
												$headers .= "Reply-To: ". strip_tags($from) . "\r\n";
												$headers .= "MIME-Version: 1.0\r\n";
												$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
												
												mail($to,$subject,$body,$headers);
												
												//sendWay2SMS('aygarg.in@gmail.com', 'intelcorei3', $Results['phone'], $ps);
												
												$s_no=$Results['s_no'];
												$encrypt=md5($rest);
												$query = mysql_query("update farmer_db set password='$encrypt' where s_no='$s_no'"); 
												
												  
											}
											
											else
											{
												$message = "Account not found please signup now!!";
											}
										}				
									}
						
									?>
                                      <label>
                                      <?php
									  echo $message; 	  
								  ?></label>
							</form>
                            
                            <form method="POST" enctype="multipart/form-data" id="passwd" style="display:none;">
                                <div class="top-margin">
									<label>Username/Email <span class="text-danger">*</span></label>
									<input type="text" class="form-control" name="email" placeholder="username" required>
								</div>
                                <hr>
                                <div class="row">
									<div class="col-lg-4 text-right">
										<button class="btn btn-action" type="submit" name="reset">Reset Password</button>
									</div>
								</div>
                                
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
								<a href="index.html">Home</a> | 
								<a href="about.html">About</a> |
								<a href="signin.php">View Test Result</a> |
                                <a href="signin.php">View as Chart</a> |
                                <a href="signin.php">Edit Profile</a> |
                                <a href="signin.php">Downloads</a> |                                
								<a href="contact.html">Contact</a> |
								<b><a href="signup.php">Sign up</a></b>
							</p>
						</div>
					</div>

					<div class="col-md-6 widget">
						<div class="widget-body">
							<p class="text-right">
								Copyright &copy; 2016, Designed by - Ayush Garg , &nbsp;<a href="http://amu.ac.in/deansoffaculty.jsp?did=8004&lid=00" rel="designer">ZHCET.AMU</a> 
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



