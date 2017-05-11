<?php
require('connect.php');

session_start();
$user=$_SESSION['user'];
$photo=$_SESSION['photo'];

if($user=="")
header("location:signout.php");  

 	$f=mysql_fetch_array(mysql_query("select * from farmer_db where user='$user'"));
	$aa=$f['aadhaar'];
	$q=mysql_query("select n_id,writekey from device where aadhaar='$aa'");
	
	$num=mysql_num_rows($q);
	?>
	
     
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport"    content="width=device-width, initial-scale=1.0">
	<meta name="description" content="">
	
	
	<title>Chart - ZHCET.AMU(Soil Portal)</title>

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
                    <li class="active"><a href="humidity_chart.php">View as Chart</a></li>
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
			<li class="active">pH Chart</li>
		</ol>

		<div class="row" align="justify">
			
			<!-- Sidebar -->
			
			<!-- /Sidebar -->

			<!-- Article main content -->
			<article class="col-md maincontent">
				<header class="page-header">
					<h1 class="page-title" align="center">pH Chart</h1>
				</header>
				<p>The soil pH is a measure of the acidity or alkalinity in soils. pH is defined as the negative logarithm (base 10) of the activity of hydronium ions (H+ or, more precisely, H<sub>3</sub>O+ aq) in a solution. In water, it normally ranges from -1 to 14, with 7 being neutral. A pH below 7 is acidic and above 7 is alkaline. Soil pH is considered a master variable in soils as it controls many chemical processes that take place. It specifically affects plant nutrient availability by controlling the chemical forms of the nutrient. The optimum pH range for most plants is between 5.5 and 7.0, however many plants have adapted to thrive at pH values outside this range.</p>
				
                <p>For this part of the project, we procured a generic 3-in-1 soil pH, moisture and sunlight meter. It is a purely analog device and does not require any external power source. It has two electrodes which are used for soil pH and moisture detection. A photocell in the device is used for sunlight detection.</p>
				
                <p>The plot for the whole month for pH is given as:</p>
	
	<?php 
	if($num==0)
	echo"<br><br><h2>You have not added any tests yet.</h2>";
	
	elseif($num>0)
	{		
		$ff=mysql_fetch_array($q);
		$wk=$ff['writekey'];
		$n_id=$ff['n_id'];
		$qq=mysql_query("select * from reading where writekey='$wk' AND n_id='$n_id' order by created_at asc");
		
			$i=1;
			$result_array = Array();
			$result_array1 = Array();
			while($fff=mysql_fetch_array($qq))
			{
				$result_array[] = $fff['ph'];
				$result_array1[] = $fff['created_at']; 
				$i++;
	 		}
			
			$json_array = json_encode($result_array);
			$json_array1 = json_encode($result_array1);
	}
?>
     

			</article>
			<!-- /Article -->
    
	<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.1.3/Chart.bundle.js"></script>
    <script src="http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    
	<style>
    canvas{
        -moz-user-select: none;
        -webkit-user-select: none;
        -ms-user-select: none;
    }
    
    </style>

    <div style="width:100%;">
        <canvas id="canvas"></canvas>
    </div>
    <br>
    <br>
    
    <form>
    <div class="top-margin">
        <label>Click the button to display the Graph.</label>
    </div>

    <hr>


    <div class="row">
        <div class="col-lg-1 text-right">
           <a href="humidity_chart.php">
           <button class="btn btn-action btn1" type="button" >Humidity</button></a>
        </div>
        <div class="col-lg-2 text-right">
           <a href="ph_chart.php">
           <button class="btn btn-action btn2" type="button" >pH</button></a>
        </div>
        <div class="col-lg-1 text-right">
           <a href="temp_chart.php">
           <button class="btn btn-action btn3" type="button" >Temp</button></a>
        </div>
        <div class="col-lg text-right">
           <a href="combined_chart.php">
           <button class="btn btn-action btn4" type="button" >All</button></a>
        </div>
    </div>
    
    
    <script>
      
        var randomColorFactor = function() {
            return Math.round(Math.random() * 255);
        };
        var randomColor = function(opacity) {
            return 'rgba(' + randomColorFactor() + ',' + randomColorFactor() + ',' + randomColorFactor() + ',' + (opacity || '.3') + ')';
        };

        var config = {
            type: 'line',
            data: {
				
                labels: <?php echo $json_array1; ?>,
                
				datasets: [{
                    label: "pH",
             		data: <?php echo $json_array; ?>,
                }]
            },
			
            options: {
                responsive: true,
                title:{
                    display:true,
                    text:'pH Chart'
                },
                tooltips: {
                    mode: 'label',
                    callbacks: {

                    }
                },
                hover: {
                    mode: 'dataset'
                },
                scales: {
                    xAxes: [{
                        display: true,
                        scaleLabel: {
                            display: true,
                            labelString: 'Month'
                        }
                    }],
                    yAxes: [{
                        display: true,
                        scaleLabel: {
                            display: true,
                            labelString: 'pH'
                        },
                        ticks: {
                            suggestedMin: 0,
                            suggestedMax: 14,
                        }
                    }]
                }
            }
        };

        $.each(config.data.datasets, function(i, dataset) {
            dataset.borderColor = randomColor(0.4);
            dataset.backgroundColor = randomColor(0.5);
            dataset.pointBorderColor = randomColor(0.7);
            dataset.pointBackgroundColor = randomColor(0.5);
            dataset.pointBorderWidth = 1;
        });

        window.onload = function() {
            var ctx = document.getElementById("canvas").getContext("2d");
            window.myLine = new Chart(ctx, config);
        };

      
    </script> 
</div>
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
					</div><div class="col-md-6 widget">
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
                                <a href="humidity_chart.php">View as Chart</a> |
                                <a href="edit_profile.php">Edit Profile</a> |
                                                             
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