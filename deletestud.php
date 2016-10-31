<html>

<?php
			include 'database.php';
			if(empty($_SESSION)) // if the session not yet started 
			   session_start();

			if(!isset($_SESSION['psw'])) { //if not yet logged in
			   header("Location: index.php");// send to login page
			   exit;
			}
			echo $_POST['UOB']." ".$_POST['email'];
			$query="DELETE from students where UOB='".$_POST['UOB']."'";
			$query1="DELETE from login where username='".$_POST['email']."'";
			$db->query($query);
			$db->query($query1);
			header("Location: editstudentdata.php");


?>

</html>