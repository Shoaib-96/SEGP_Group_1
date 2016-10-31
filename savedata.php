<!DOCTYPE html>
<html>

<?php
	
			include 'database.php';
			if(empty($_SESSION)) // if the session not yet started 
			   session_start();

			if(!isset($_SESSION['psw'])) { //if not yet logged in
			   header("Location: index.php");// send to login page
			   exit;
			}
	function xyz($image,$db,$username){
			
			$img=addslashes(file_get_contents($image));
			$quer="update students set images='$img' where email='$username'";
			$quer1="update students set images='$img' where email='$username'";
			if($db->query($quer)==true){
				if($db->query($quer1)==true){
				
				echo "Successful";
			}
					echo "unsuccessful";
			}
			else{
				echo "Unsuccess";
			}
	
	}
	
	// Create connection
	$name=$_POST['uname'];
	$username=$_POST['uemail'];
	$email=$_POST['uemail'];
	$image=$_POST['image'];
	xyz($image,$db,$_POST['mail']);
	$UOB=$_POST['uuob'];
	$year=$_POST['uyear'];
	$contact=$_POST['ucontact'];
	$department=$_POST['udept'];
	$newpassword=$_POST['new'];
	$newpasswordagain=$_POST['renew'];
	$Query="Update students set pat_name='".$_POST['pat']."',name='".$name."', email='".$email."', year='".$year."', contact='".$contact."', Department='".$department."' where UOB='".$UOB."'";
	$db->query("update Login set email='".$username."' where email='".$_POST['email']."'");
	if($db->query($Query)==True){
	if(!empty($_POST["checkingbox"])){
		if(($newpassword==$newpasswordagain)){
			$Query2="update Login set Password='".$newpassword."' where username='".$username."'";
			$db->query($Query2);
		}
		header("Location:editstudentdata.php");
	}
	header("Location:editstudentdata.php");
	}
	else{
		echo "Unsuccessful";
	}
?>

</html>