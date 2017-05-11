<?php
require('connect.php');
session_start();
extract($_REQUEST);
$user=$_SESSION['user'];
$photo=$_SESSION['photo'];

if($user=="")
header("location:signout.php");

$f=mysql_fetch_array(mysql_query("select * from farmer_db where user='$user'"));

?>
     
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport"    content="width=device-width, initial-scale=1.0">
	<meta name="description" content="">
	
	
	<title>Edit Profile - ZHCET.AMU(Soil Portal)</title>

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
                    <li><a href="testresult.php">View Test Result</a></li>
                    <li><a href="humidity_chart.php">View as Chart</a></li>
                    <li class="active"><a href="edit_profile.php">Edit Profile</a></li>
                    
                    
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
			<li class="active">Edit Profile</li>
		</ol>

		<div class="row">
			
			<!-- Article main content -->
			<article class="col-xs-12 maincontent">
				<header class="page-header">
					<h1 class="page-title">Edit Profile</h1>
				</header>
				
                <script>
				  var loadFile=function(event)
				  {
					  var preview=document.getElementById('preview');
					  preview.src=URL.createObjectURL(event.target.files[0]);
				  };
				</script>

                <script>
				  function checkPass()
				  {
					  //Store the password field objects into variables ...
					  var pass1 = document.getElementById('pass');
					  var pass2 = document.getElementById('pass1');
				  
					  //Store the Confimation Message Object ...
					  var message = document.getElementById('confirmMessage');
					  //Set the colors we will be using ...
					  var goodColor = "#66cc66";
					  var badColor = "#ff6666";
					  //Compare the values in the password field 
					  //and the confirmation field
					  if(pass1.value == pass2.value){
						  //The passwords match. 
						  //Set the color to the good color and inform
						  //the user that they have entered the correct password 
						  pass2.style.backgroundColor = goodColor;
						  message.style.color = goodColor;
						  message.innerHTML = "Passwords Match!"
					  }else{
						  //The passwords do not match.
						  //Set the color to the bad color and
						  //notify the user.
						  pass2.style.backgroundColor = badColor;
						  message.style.color = badColor;
						  message.innerHTML = "Passwords Do Not Match!"
					  }
				  }
				  </script>
                
				                
                    
				<div class="col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
					<div class="panel panel-default">
						<div class="panel-body">
							<h3 class="thin text-center">Update your account</h3>
							<p class="text-center text-muted">Edit your profile information here.</p>
							<hr>

							<form name="form" method="post" enctype="multipart/form-data" onSubmit="return(validate());">
								<div class="row top-margin">
                                <div class="col-sm-6">
									<label>Full Name <span class="text-danger">*</span></label>
									<input type="text" class="form-control" name="name" maxlength="30" value="<?php echo $f['name']?>" required>                         
                                    <div class="top-margin">
                                    <label>Address <span class="text-danger">*</span></label>
									<input type="text" class="form-control" name="address" maxlength="50" value="<?php echo $f['address']?>" required></div>
                                    <div class="top-margin">
                                    <label>Phone Number <span class="text-danger">*</span></label>                                  
									<input type="text" pattern="\d*" class="form-control text" name="phone" maxlength="10" value="<?php echo $f['phone']?>" required ></div>               
                                    <div class="top-margin">
                                    <label>Upload Photo - (<2MB) <span class="text-danger">*</span></label>
                                    <input type="file" class="form-control" script="image" name="img" onChange="loadFile(event)" required>
								</div>
                                    </div>
                                    
                                <div class="col-sm-6">
									<label>Photo Preview </label>
                                    <label><?php echo "<img src='f_uploads/$photo' id='preview' width='240px' height='270px'>";?>
                                    </label>
                                    </div>
								</div>                        
								
                                                            
                                <div class="row top-margin">
									<div class="col-sm-6">
										<label>Village </label>
										<input type="text" class="form-control" name="village" maxlength="20" value="<?php echo $f['village']?>" >
									</div>
									<div class="col-sm-6">
										<label>District <span class="text-danger">*</span></label>
										<input type="text" class="form-control" name="district"  maxlength="20" value="<?php echo $f['district']?>"  required>
									</div>
								</div>
                                
                                <div class="row top-margin">
									<div class="col-sm-6">
										<label>State <span class="text-danger">*</span></label>
										<input type="text" class="form-control" name="state" maxlength="20" value="<?php echo $f['state']?>"  required>
									</div>
									<div class="col-sm-6">
										<label>Pin <span class="text-danger">*</span></label>
										<input type="text" pattern="\d*" class="form-control" name="pin"  maxlength="6" value="<?php echo $f['pin']?>"  required>
									</div>
								</div>
                                
								<div class="row top-margin">
									<div class="col-sm-6">
										<label>Password <span class="text-danger">*</span></label>
										<input type="password" class="form-control" name="pass" maxlength="20" required id="pass" placeholder="min 8 characters" required>
									</div>
									<div class="col-sm-6">
										<label>Confirm Password <span class="text-danger">*</span></label>
										<input type="password" class="form-control" name="pass1" maxlength="20" required id="pass1" placeholder="min 8 characters" onKeyUp="checkPass(); return false;" required>
                                        <span id="confirmMessage" class="confirmMessage"></span> 
									</div>
								</div>
                                
								<script>
                                 function validate()
                                 {
                                     var ppass=/^[0-9 a-z A-Z]{8,20}/;
                                     var b=document.form.pass.value;
                                     
                                     var a=document.form.go.value;                             
                                     
                                     if(!ppass.test(b))
                                     {
                                         alert("Invlaid Password: Please enter the correct password.");
                                         document.form.pass.focus();
                                         return false;
                                     }
                                      if(a!=""||a!=null)
                                     {
                                         alert("Successfully Updated.");
                                         return true;
                                     }                                     
                                     return true;
                                 }
                                 </script>

								<hr>

								<div class="row">
									<div class="col-lg-8">
										<label class="checkbox">
											<input type="checkbox" required> 
											I've read the <a href="page_terms.html">Terms and Conditions</a>
										</label>                        
									</div>
                                   
                                    <div class="col-lg-6 text-right">
										<button class="btn btn-action" type="reset">Reset</button>
									</div>
                                    
                                    
									<div class="col-lg-4 text-right">
										<button class="btn btn-action" type="submit" name="go">Update</button>
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
								<a href="f_profile.php">Home</a> | 
								<a href="about.php">About</a> |
								<a href="sidebar-right.html">View Test Result</a> |
                                <a href="testresult.php">View as Chart</a> |
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
extract($_POST);
{
$user=$_SESSION['user'];
$photo=$_SESSION['photo'];
$f=mysql_fetch_array(mysql_query("select * from farmer_db where user='$user'"));
$z=MD5($pass);

 if(isset($_POST['go']))
 {	 
	if($pass==$pass1)
	{
		$old_pic=$f['photo'];
		extract($_POST);
		unlink("f_uploads/$old_pic") ;
		
		$p=$_FILES['img']['name'];
		$tempname=time().$p;
		$source=$_FILES['img']['tmp_name'];
		$destination="f_uploads/";
		$target=$destination.$tempname;
		move_uploaded_file($source,$target);
		$aadhaar=$f['aadhaar'];
		$qry=mysql_query("update farmer_db set name='$name', aadhaar='$aadhaar' ,password='$z' ,photo='$tempname' , address='$address',village='$village' ,district ='$district',state = '$state' ,pin='$pin',phone='$phone' where user='$user'");
		
	 if($qry)
	 {
		 header("location:signout.php");
	 }
 	}	
 }
}
?>
 