<!DOCTYPE html>
<html>
<head>
</head>
<body>
<?php
	include 'database.php';
	if(empty($_SESSION)) // if the session not yet started 
	   session_start();

	if(!isset($_SESSION['psw'])) { //if not yet logged in
	   header("Location: index.php");// send to login page
	   exit;
	}
	
	$name=$_POST['uname'];
	$email=$_POST['email'];
	$department=$_POST['dept'];
	$contact=$_POST['contact'];
	//$checkbox=$_POST['changePassword'];
	$check="select ID from pats";
	$result=$db->query($check);
	while($row=$result->fetch_assoc()){
		$count=$row['ID'];
	}
	$count++;
	echo $count." ".$department." ".$email." ".$contact." ".$name;
	$query="Insert into pats (`ID`, `name`, `email`, `contact`, `department`) VALUES(".$count.",'".$name."','".$email."','".$contact."','".$department."') ";
	$query1="Insert into login (`UOB`, `email`, `name`, `availability`, `status`) VALUES(".'123'.",'".$email."','".$name."',". 0 .",'teacher')";
	if (!$db->query($query)) {                          // Error handling
					echo "Something went wrong! :("; 
				}
	else{
		$db->query($query1);
		header("Location: editteacherdata.php");
	}
	
?>
</body>
</html>