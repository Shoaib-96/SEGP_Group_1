<!DOCTYPE html>
<html>
<head>
    <title>Insert Image</title>
</head>
<body>
<?php
$msg = '';
include 'database.php'; //connect the connection page

if(empty($_SESSION)) // if the session not yet started 
   session_start();

if(!isset($_SESSION['psw'])) { //if not yet logged in
   header("Location: index.php");// send to login page
   exit;
}   
if($_SERVER['REQUEST_METHOD']=='POST'){
    $image = $_FILES['image']['tmp_name'];
    $img = file_get_contents($image);
    
	$image = addslashes(file_get_contents($_FILES['image']['tmp_name'])); //SQL Injection defence!
	//$image_name = addslashes($_FILES['image']['name']);
	$sql = "UPDATE login set images='$image'";
	$sql1= "UPDATE pats set images='$image'";
	if (!$db->query($sql)) {                          // Error handling
		echo "Something went wrong! :("; 
	}
	else{
		$db->query($sql1);
		echo "done saving";
	}
	if(($res = $db->query("select * FROM students WHERE UOB='14031213'"))==True){
		echo " main aa gaya";
		$rows=$res->fetch_assoc();
		$i=$rows['images'];
	//echo '<img src="'.base64_encode($rows['image']).'" alt="HTML5 Icon" style="width:128px;height:128px">';
	//echo '';
	$image='<img src="data:image;base64,'.base64_encode($i).'"style="width:128px;height:128px">';
	echo $image;
	}
	else{
		echo "Not Working! I guess :\ ";
	}
}
?>
<form action="blob.php" method="post" enctype="multipart/form-data">
    <input type="file" name="image" />
    <button>Upload</button>
</form>
<?php
    echo $msg;
?>
</body>
</html>