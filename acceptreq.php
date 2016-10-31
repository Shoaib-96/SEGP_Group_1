<html>

<?php
include 'database.php'; //connect the connection page
		if(empty($_SESSION)) // if the session not yet started 
		   session_start();
		if(!isset($_SESSION['psw'])) { // if the form not yet submitted
		   header("Location: index.php");
		   exit; 
		}
	$result=$db->query("select Email,`Pat Name` from requests where ID=".$_POST['accept']);	
	while($data=$result->fetch_assoc()){
	$email=$data['Email'];
	$pat=$data['Pat Name'];
	}
	$db->query("update students set pat_name='".$pat."' where email='".$email."'");
	$db->query("DELETE from requests WHERE ID=".$_POST['accept']);
	header("Location: home.php");
		
?>



</html>