<html>

<?php
	echo $_POST['full']." ".$_POST['half']." ".$_POST['id']." ".$_POST['year'].$_POST['email'];
	
	
	include 'database.php'; //connect the connection page

	if(empty($_SESSION)) // if the session not yet started 
	   session_start();

	if(!isset($_SESSION['psw'])) { //if not yet logged in
	   header("Location: index.php");// send to login page
	   exit;
	}
	
	$name=$_POST['name'];
	$UOB=$_POST['uob'];
	$year=$_POST['year'];
	$email=$_POST['email'];
	$department=$_POST['id'];
	$contact=$_POST['contact'];
	if($_POST['full']=="null"){
			$query="Insert into students VALUES('".$UOB."','".$name."','".$email."',".$year.",'".$contact."','".$_POST['half']."','".$department."')";
			$query1="Insert into login VALUES('".$UOB."','".$email."','".$name."',". 0 .",'student')";
			$db->query($query);
			$db->query($query1);
			header("Location: admin.php");
	}			
	else{
				$query="Insert into students VALUES('".$UOB."','".$name."','".$email."',".$year.",'".$contact."','".$_POST['full']."','".$department."')";
				$query1="Insert into login VALUES('".$UOB."','".$email."','".$name."',". 0 .",'student')";
				$db->query($query);
				$db->query($query1);
				header("Location: admin.php");
		
		
		}
 ?>








</html>