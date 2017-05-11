<?php
require('connect.php');

session_start();
$adm_name=$_SESSION['adm_name'];
if($adm_name=="")
header("location:signout.php");

	$q=mysql_query("select * from farmer_db order by s_no asc");
	$num=mysql_num_rows($q);
	if($num>0)
	{
?>
     
     
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport"    content="width=device-width, initial-scale=1.0">
	<meta name="description" content="">
	
	
	<title>Farmers Table - ZHCET.AMU(Soil Portal)</title>

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
                    			<li><a href="assign_nodes.php">Assign Device</a></li> 
					<li class="active"><a href="manage_farmer.php">Manage Farmers</a></li>
   
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
			<li class="active">Manage Farmers</li>
		</ol>

		<div class="row">

			<!-- Article main content -->
			<article class="col-md maincontent">
				<header class="page-header">
					<h1 class="page-title">Farmers Table</h1>
				</header>
			</article>
			<!-- /Article -->
      	   
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
<link rel="stylesheet" href="http://cdn.datatables.net/1.10.2/css/jquery.dataTables.min.css"></style>
<script type="text/javascript" src="http://cdn.datatables.net/1.10.2/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>


<table id="myTable" class="table table-striped" >  
        <thead>  
          <tr>  
           <th>S.No.</th>
                   <th>Name</th>
                    <th>Aadhaar</th>
                     <th>Address</th>
                     <th>Email</th>
                     <th>Contact</th>
					  <th>Edit</th>
                       <th>Delete</th>
          </tr>  
        </thead>  
        <tbody>  
          <?php 
		$i=1;
		while($f=mysql_fetch_array($q))
		{
		?><tr>
    <td><?php echo $i;?></td>
    <td><?php echo $f['name']; ?></td>
    <td><?php echo $f['aadhaar']; ?></td>
    <td><?php echo $f['address']; ?></td>
    <td><?php echo $f['user']; ?></td>
    <td><?php echo $f['phone']; ?></td>
    <td><p data-placement="top" data-toggle="tooltip" title="Edit">
    <a href="admin_edit_profile.php?edit=<?php echo $f['s_no'];?>"><button class="btn btn-primary btn-xs" data-title="Edit"><span class="fa fa-pencil"></span></button></a></p></td>
    <td><p data-placement="top" data-toggle="tooltip" title="Delete">
    <a href="deletefarmer.php?del=<?php echo $f['s_no']; ?>"  onClick="return confirm('Delete This account?')" ><button class="btn btn-danger btn-xs" data-title="Delete" >
    <span class="fa fa-trash-o"></span></button></a></p></td>
    </tr>
    <?php
		$i++;
	 	} 
		?>
        </tbody>  
      </table>  
 
<script>
$(document).ready(function(){
    $('#myTable').dataTable();
});
</script>
    
            
        </div>
	</div>
</div>
            </div>            
        </div>
	</div>
</div>

    <!-- /.modal-content --> 
  </div>
      <!-- /.modal-dialog --> 
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
	
	<script src="http://netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
	<script src="assets/js/headroom.min.js"></script>
	<script src="assets/js/jQuery.headroom.min.js"></script>
	<script src="assets/js/template.js"></script>
</body>
</html>

<?php 
	}?>