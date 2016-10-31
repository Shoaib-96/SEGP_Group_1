<html>



<?php
			include 'database.php'; //connect the connection page

			if(empty($_SESSION)) // if the session not yet started 
			   session_start();

			if(!isset($_SESSION['psw'])) { //if not yet logged in
			   header("Location: index.php");// send to login page
			   exit;
			}   
		if($_SESSION['status']=="student"){
		
				if(true){
				//$image = $_FILES['image']['tmp_name'];
				$image=$_POST['image'];
				$img = file_get_contents($image);
			
				$image = addslashes($img); //SQL Injection defence!
				//$image_name = addslashes($_FILES['image']['name']);
				$sql = "UPDATE login set images='".$image."' where email='".$_SESSION['username']."'";
				$sql1= "UPDATE students set images='".$image."' where email='".$_SESSION['username']."'";
				if (!$db->query($sql)) {                          // Error handling
					echo "Something went wrong! :("; 
				}
				else{
					if(!$db->query($sql1)){
						echo "somethign went wrong!!";
					}
					else{
						echo "successful";
					
					}
				
					if(empty($_POST['nsw'])){
						//header("Location: home.php");
					}
				}
			}

			$query_result=$db->query("update login set UOB='".$_POST['npw']."' where email='".$_SESSION['email']."'");
			//header("Location: home.php");
		
		}
		else {
		
					if(!empty($_POST["image"])){
			$image = $_FILES['image']['tmp_name'];
			$img = file_get_contents($image);
			
			$image = addslashes(file_get_contents($_FILES['image']['tmp_name'])); //SQL Injection defence!
			//$image_name = addslashes($_FILES['image']['name']);
			$sql = "UPDATE login set images='$image' where email='".$_SESSION['username']."'";
			$sql1= "UPDATE pats set images='$image' where email='".$_SESSION['username']."'";
			if (!$db->query($sql)) {                          // Error handling
				echo "Something went wrong! :("; 
			}
			else{
				$db->query($sql1);
				if(empty($_POST['nsw'])){
					//header("Location: home.php");
				}
			}
		}

		$query_result=$db->query("update login set UOB='".$_POST['npw']."' where email='".$_SESSION['email']."'");
		//header("Location: home.php");
		
		}







?>

</html>