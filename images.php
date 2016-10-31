<html>
<?php
		include 'database.php';
		if(empty($_SESSION)) // if the session not yet started 
		   session_start();
		if(!isset($_POST['submit'])) { // if the form not yet submitted
		   header("Location: index.php");
		   exit; 
		}
					$res = $db->query("select images FROM login WHERE email='".$_SESSION['username']."'");
					$rows=$res->fetch_assoc();
					$i=$rows['images'];
					$image='<img src="data:image;base64,'.base64_encode($i).'"style="width:128px;height:128px">';

?>
</html>