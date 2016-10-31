<html>


<?php
	
	
	
	
	include 'database.php'; //connect the connection page
		if(empty($_SESSION)) // if the session not yet started 
		   session_start();
		if(!isset($_SESSION['psw'])) { // if the form not yet submitted
		   header("Location: index.php");
		   exit; 
		}
		
	$db->query("DELETE from requests WHERE ID=".$_POST['reject']);
	header("Location: home.php");




?>








</html>