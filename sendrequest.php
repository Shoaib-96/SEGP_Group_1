<html>
<?php
 include 'database.php'; //connect the connection page
		if(empty($_SESSION)) // if the session not yet started 
		   session_start();
		if(!isset($_SESSION['psw'])) { // if the form not yet submitted
		   header("Location: index.php");
		   exit; 
		}
		$count=0;
		$result=$db->query("select ID from requests");
		while($row=$result->fetch_assoc()){
			$count=$row['ID'];
		}
		$count++;
		$result1=$db->query("INSERT INTO requests VALUES (".$count.",'".$_SESSION['username']."','".$_SESSION['email']."','".$_POST['id']."','".$_POST['detail']."')");
		header("Location: patsview.php");


?>







</html>