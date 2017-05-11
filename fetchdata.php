<?php
require('connect.php');   
           
   if(isset($_GET['get_option']))
   {
     $n_id = $_GET['get_option'];
	 
     $row=mysql_fetch_array(mysql_query("select * from reading where n_id='$n_id' order by r_no desc"));
	 
	 echo json_encode($row);

	 exit();
   }

?>