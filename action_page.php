<!DOCTYPE html>
<html>
<body>

<?php
		
			include 'database.php'; //connect the connection page
		if(empty($_SESSION)) // if the session not yet started 
		   session_start();
		if(!isset($_POST['submit'])) { // if the form not yet submitted
		   header("Location: index.php");
		   exit; 
		}
		//check if the username entered is in the database.
		$test_query = "SELECT * FROM login WHERE email = '".$_POST['uname']."'";
		$test_username="Select name from login where email='".$_POST['uname']."'";
		$query_result= $db->query($test_query);
		$query_result1=	$db->query($test_username);
		$query_result2= $db->query("select Department from students where email='".$_POST['uname']."' ");
		$query_result3= $db->query("select department from pats where email='".$_POST['uname']."' ");
		//conditions
		
		if($query_result->num_rows==0) { 
		//if username entered not yet exists
			$_SESSION['error']= "The username you entered is invalid!";
			header ("Location: index2.php");
		}else {
		//if exists, then extract the password.
				$_SESSION['email']=$_POST['uname'];
				while($row = $query_result1->fetch_assoc()){
					
					$_SESSION['username']=$row['name'];
					
					
				
				}
			while($row = $query_result->fetch_assoc()) {
				$_SESSION['status']=$row['status'];
				if($_SESSION['status']=="student"){
					while($row1 = $query_result2->fetch_assoc()){
						$_SESSION['department']=$row1['Department'];
					}
				}
				else{
					while($row1 = $query_result3->fetch_assoc()){
						$_SESSION['department']=$row1['department'];
					}
				
				}
				// check if password are equal
				if($row['UOB']==$_POST['psw']){
					$_SESSION['psw'] = $_POST['psw'];
					$db->query("update Login set available='1' where email='".$_SESSION['username']."'");
					if($_SESSION['status']=="sso")
						header("Location: admin.php");
					else header ("Location: home.php");
					exit; 
				} else{ // if not
					$_SESSION['error']= "Invalid Password!!"; 
					header ("Location: index2.php");
				}
			}
		}
		
	
	
	
	
	/* session_start(); // needs to be before anything else on page to use $_SESSION
    $textarea1 = "";
    if(isset($_POST['textarea1'])){
        $_SESSION['textarea1'] = $_POST['textarea1'];
    }

	$db=new mysqli("localhost","root","","namal_pat");
	if($db->connect_error){
		die("Connection Unsuccessfull");
	}
	else{
		$uname=$_POST['uname'];
		$pass=$_POST['psw'];
		if ($_SERVER["REQUEST_METHOD"] == "POST"){                     //you can also use isset overhere as well
		if($result= $db->query("select * from Login where username='$uname'")){
			if($result->num_rows){
				$rows=$result->fetch_assoc();
				if($pass==$rows['UOB']){
					$db->query("update Login set available='1' where username='$uname'");
					include ("studentprofile.html");
				}
				else {
					include("index.html");
				}
			}
			else
			include("index.html");

	}
	}
	} */
?>

</body>
</html>