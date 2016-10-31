<!DOCTYPE html>
<html>
<title>User Profile</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="http://www.w3schools.com/lib/w3.css">
<link rel="stylesheet" href="http://www.w3schools.com/lib/w3-theme-black.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

<link rel="stylesheet" href="login.css">
<style>
html,body,h1,h2,h3,h4,h5,h6 {font-family: "Roboto", sans-serif}
.w3-sidenav a,.w3-sidenav h4 {padding: 12px;}
.w3-navbar li a {
    padding-top: 12px;
    padding-bottom: 12px;
}

.card {
    padding-top: 20px;
    margin: 10px 0 20px 0;
    background-color: rgba(214, 224, 226, 0.2);
    border-top-width: 0;
    border-bottom-width: 2px;
    -webkit-border-radius: 3px;
    -moz-border-radius: 3px;
    border-radius: 3px;
    -webkit-box-shadow: none;
    -moz-box-shadow: none;
    box-shadow: none;
    -webkit-box-sizing: border-box;
    -moz-box-sizing: border-box;
    box-sizing: border-box;
}

.card .card-heading {
    padding: 0 20px;
    margin: 0;
}

.card .card-heading.simple {
    font-size: 20px;
    font-weight: 300;
    color: #777;
    border-bottom: 1px solid #e5e5e5;
}

.card .card-heading.image img {
    display: inline-block;
    width: 46px;
    height: 46px;
    margin-right: 15px;
    vertical-align: top;
    border: 0;
    -webkit-border-radius: 50%;
    -moz-border-radius: 50%;
    border-radius: 50%;
}

.card .card-heading.image .card-heading-header {
    display: inline-block;
    vertical-align: top;
}

.card .card-heading.image .card-heading-header h3 {
    margin: 0;
    font-size: 14px;
    line-height: 16px;
    color: #262626;
}

.card .card-heading.image .card-heading-header span {
    font-size: 12px;
    color: #999999;
}

.card .card-body {
    padding: 0 20px;
    margin-top: 20px;
}

.card .card-media {
    padding: 0 20px;
    margin: 0 -14px;
}

.card .card-media img {
    max-width: 100%;
    max-height: 100%;
}

.card .card-actions {
    min-height: 30px;
    padding: 0 20px 20px 20px;
    margin: 20px 0 0 0;
}

.card .card-comments {
    padding: 20px;
    margin: 0;
    background-color: #f8f8f8;
}

.card .card-comments .comments-collapse-toggle {
    padding: 0;
    margin: 0 20px 12px 20px;
}

.card .card-comments .comments-collapse-toggle a,
.card .card-comments .comments-collapse-toggle span {
    padding-right: 5px;
    overflow: hidden;
    font-size: 12px;
    color: #999;
    text-overflow: ellipsis;
    white-space: nowrap;
}

.card-comments .media-heading {
    font-size: 13px;
    font-weight: bold;
}

.card.people {
    position: relative;
    display: inline-block;
    width: 170px;
    height: 300px;
    padding-top: 0;
    margin-left: 20px;
    overflow: hidden;
    vertical-align: top;
}

.card.people:first-child {
    margin-left: 0;
}

.card.people .card-top {
    position: absolute;
    top: 0;
    left: 0;
    display: inline-block;
    width: 170px;
    height: 150px;
    background-color: #ffffff;
}

.card.people .card-top.green {
    background-color: #53a93f;
}

.card.people .card-top.blue {
    background-color: #427fed;
}

.card.people .card-info {
    position: absolute;
    top: 150px;
    display: inline-block;
    width: 100%;
    height: 101px;
    overflow: hidden;
    background: #ffffff;
    -webkit-box-sizing: border-box;
    -moz-box-sizing: border-box;
    box-sizing: border-box;
}

.card.people .card-info .title {
    display: block;
    margin: 8px 14px 0 14px;
    overflow: hidden;
    font-size: 16px;
    font-weight: bold;
    line-height: 18px;
    color: #404040;
}

.card.people .card-info .desc {
    display: block;
    margin: 8px 14px 0 14px;
    overflow: hidden;
    font-size: 12px;
    line-height: 16px;
    color: #737373;
    text-overflow: ellipsis;
}

.card.people .card-bottom {
    position: absolute;
    bottom: 0;
    left: 0;
    display: inline-block;
    width: 100%;
    padding: 10px 20px;
    line-height: 29px;
    text-align: center;
    -webkit-box-sizing: border-box;
    -moz-box-sizing: border-box;
    box-sizing: border-box;
}

.card.hovercard {
    position: relative;
    padding-top: 0;
    overflow: hidden;
    text-align: center;
    background-color: rgba(214, 224, 226, 0.2);
}

.card.hovercard .cardheader {
    background-image: url("2.jpg");
    background-size: cover;
    height: 135px;
}

.card.hovercard .avatar {
    position: relative;
    top: -50px;
    margin-bottom: -50px;
}

.card.hovercard .avatar img {
    width: 100px;
    height: 100px;
    max-width: 100px;
    max-height: 100px;
    -webkit-border-radius: 50%;
    -moz-border-radius: 50%;
    border-radius: 50%;
    border: 5px solid rgba(255,255,255,0.5);
}

.card.hovercard .info {
    padding: 4px 8px 10px;
}

.card.hovercard .info .title {
    margin-bottom: 4px;
    font-size: 24px;
    line-height: 1;
    color: #262626;
    vertical-align: middle;
}

.card.hovercard .info .desc {
    overflow: hidden;
    font-size: 12px;
    line-height: 20px;
    color: #737373;
    text-overflow: ellipsis;
}

.card.hovercard .bottom {
    padding: 0 20px;
    margin-bottom: 17px;
}

.btn{ border-radius: 50%; width:32px; height:32px; line-height:18px;  }



.social [class*="fa fa-"] {
    background-color: #333;
    border-radius: 30px;
    color: #fff;
    display: inline-block;
    height: 30px;
    line-height: 30px;
    margin: auto 3px;
    width: 30px;
    font-size: 15px;
    text-align: center;
}
.fa-twitter:hover { 
    background-color: #46c0fb; 
}
.fa-facebook:hover { 
    background-color: #3b5998; 
}
.fa-instagram:hover { 
    background-color: #8a3ab9; 
}
.fa-linkedin:hover { 
    background-color: #007bb5; 
}
.fa-vimeo:hover { 
    background-color: #aad450; 
}
</style>


<body>
<?php
include 'database.php'; //connect the connection page
//include 'images.php';

if(empty($_SESSION)) // if the session not yet started 
   session_start();

if(!isset($_SESSION['psw'])) { //if not yet logged in
   header("Location: index.php");// send to login page
   exit; 
}   
 
?>

<?php		
			if($_SESSION['status']=="teacher"){
			
			echo "<div class=\"w3-row w3-padding-128\">
						<div class=\"w3-rest w3-container\">
							<div class=\"w3-half w3-container\">
								<div class=\"col-lg-12 col-sm-8\">

									<div class=\"card hovercard\">
										<div class=\"cardheader\">
										
										</div>";
							$sql1 = "select Department,images from pats where email='".$_SESSION['email']."'";
							$result1 = $db->query($sql1);	
							$rows1=$result1->fetch_assoc();
							echo "<div class=\"avatar\">";
							echo '<img src="data:image;base64,'.base64_encode($rows1['images']).'"style="width:128px;height:128px">';
							echo "</div>";
										echo "<div class=\"info\">";
										
										echo "<div class=\"title\">";
											
												echo "<a target=\"_blank\" href=\"http://scripteden.com/\">".$_SESSION['username']."</a>";
											echo"</div>";
											echo "<div class=\"desc\">Teacher</div>";
											echo "<div class=\"desc\">Dept. Of ".$rows1['Department']."</div>";
										echo "</div>";
										echo "<div class=\"bottom\">
											<button width=\"auto\" onclick=\"document.getElementById('id03').style.display='block'\" style=\"background-color:black\";><span class=\"glyphicon glyphicon-wrench\"></span>&nbsp&nbsp&nbspEdit Profile</button>
										</div>
									</div>
								</div>
							</div>";
							echo "<div class=\"w3-half w3-container\">
								<div class=\"col-lg-12 col-sm-8\">
									<div class=\"w3-row w3-container\">
										<div class=\"w3-half w3-container\">
											<h3><span id=\"btnAddd\" class=\"glyphicon glyphicon-plus\" style=\"padding-right\">&nbsp&nbsp&nbsp&nbspReminders</h3>
										</div>
										<div class=\"w3-half w3-container\">
										</div>
									</div>";
									echo "<div class=\"w3-row w3-container \" style=\"margin-left:15px; background-color:#EBEDEF\">
										
										
										
										
										
										<!--Reminders-->
										
										
										
									</div>
								</div>
							</div>
						</div>
					</div> ";
				$sql = "select name,year,Department,images from students where pat_name='".$_SESSION['username']."'";
				$count=0;
				$result = $db->query($sql);
				echo "<div class=\"w3-row w3-center\">
				<div class=\"w3-rest w3-container\">
				<h1>Following are your students
				</div></div>";
					echo "<div class=\"w3-row w3 w3-padding-16\">";
					echo "<div class=\"w3-rest w3-container\">";
				while($row = $result->fetch_assoc()) {
				if($count%3==0){
					echo "<div class=\"w3-row w3 w3-padding-16\">";
					echo "<div class=\"w3-rest w3-container\">";
				}
				echo "<div class=\"w3-third w3-container\">";
							echo"<div class=\"col-lg-12 col-sm-8\">";

								echo "<div class=\"card hovercard\">";
									echo "<div class=\"cardheader\">";
										
									echo "</div>";
							
							echo "<div class=\"avatar\">";
							echo '<img src="data:image;base64,'.base64_encode($row['images']).'"style="width:128px;height:128px">';
							echo "</div>";
									echo "<div class=\"info\">";
										echo "<div class=\"title\">";
										echo "<div style=\"color:darkblue\" class=\"desc\"><h3>".$row["name"]."</h3></div>";
										echo "</div>";
										echo "<div class=\"desc\">Student</div>";
										echo "<div class=\"desc\"> Year ".$row["year"]."</div>";
										echo "<div class=\"desc\">Dept. of ".$row["Department"]."</div>";
									echo "</div>";
									echo"<div class=\"bottom\">";
									echo "<button width=\"auto\" style=\"background-color:black\";><span class=\"glyphicon glyphicon-envelope\"></span>&nbsp&nbsp&nbspMessage</button>";
				echo "</div></div></div></div>";
				$count++;
				if($count%3==0 ){
					echo "</div></div>";
				}
					
				}
				echo "</div></div>";
			
			
			
			}
			//echo "HEllo World!".$_SESSION['status'];
			if($_SESSION['status']=="student"){


								
			//echo "Connected successfully";
			
				echo "<div class=\"w3-row w3-padding-128\">";
					echo "<div class=\"w3-rest w3-container\">";
						echo "<div class=\"w3-half w3-container\">";
							echo "<div class=\"col-lg-10 col-sm-8\">";

								echo "<div class=\"card hovercard\">";
									echo "<div class=\"cardheader\">";
										
						echo "</div>";
							$sql1 = "select year,Department,images from students where email='".$_SESSION['email']."'";
							$result1 = $db->query($sql1);	
							$rows1=$result1->fetch_assoc();
						echo "<div class=\"avatar\">";
							echo '<img src="data:image;base64,'.base64_encode($rows1['images']).'"style="width:128px;height:128px">';
						echo "</div>";
						echo "<div class=\"info\">";
							echo "<div class=\"title\">";
								echo "<a target=\"_blank\" href=\"http://scripteden.com/\">".$_SESSION['username']."</a>";
							echo "</div>";
							
							
							echo "<div class=\"desc\">Student</div>";
							echo "<div class=\"desc\">Year ".$rows1["year"]."</div>";
							echo "<div class=\"desc\">Dept. Of ".$rows1["Department"]."</div>";
						echo "</div>";
						
						echo "<div class=\"bottom\">
							<button width=\"auto\" onclick=\"document.getElementById('id03').style.display='block'\" style=\"background-color:black\";><span class=\"glyphicon glyphicon-wrench\"></span>&nbsp&nbsp&nbspEdit Profile</button>";
						echo "</div>
					</div>
				</div>
			</div>
			<div class=\"w3-half w3-container\">
				<div class=\"col-lg-10 col-sm-8\">

					<div class=\"card hovercard\">
						<div class=\"cardheader\">
							
						</div>";
						$sql2 = "select * from pats where name=(select pat_name from students where email = '".$_SESSION['email']."')";
							$result2 = $db->query($sql2);	
							$rows2=$result2->fetch_assoc();
						echo "<div class=\"avatar\">";
							echo '<img src="data:image;base64,'.base64_encode($rows2['images']).'"style="width:128px;height:128px">';
						echo "</div>
						   <div class=\"info\">
							<div class=\"title\">";
						
						
							
							echo "<a target=\"_blank\" href=\"http://scripteden.com/\">".$rows2["name"]."</a>";
							echo "</div>";

						
							echo "<div class=\"desc\">PAT</div>";
							echo "<div class=\"desc\">".$rows2["email"]."</div>";
							echo "<div class=\"desc\">Dept. Of ".$rows2["department"]."</div>";
						echo "</div>";
						
						echo "<div class=\"bottom\">";
							echo "<button width=\"auto\" style=\"background-color:black\";><span class=\"glyphicon glyphicon-envelope\"></span>&nbsp&nbsp&nbspMessage</button>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>";	
	
			$sql = "select name,year,Department,images from students where pat_name=(select pat_name from students where email ='".$_SESSION['email']."')";
			$count=0;
			$result = $db->query($sql);
			echo "<div class=\"w3-row w3-center\">
			<div class=\"w3-rest w3-container\">
			<h1>Following are your group memebers
			</div></div>";
				echo "<div class=\"w3-row w3 w3-padding-16\">";
				echo "<div class=\"w3-rest w3-container\">";
			while($row = $result->fetch_assoc()) {
			if($count%3==0){
				echo "<div class=\"w3-row w3 w3-padding-16\">";
				echo "<div class=\"w3-rest w3-container\">";
			}
			if($row["name"]!=$_SESSION['username']){
			
				echo "<div class=\"w3-third w3-container\">";
						echo"<div class=\"col-lg-12 col-sm-8\">";

							echo "<div class=\"card hovercard\">";
								echo "<div class=\"cardheader\">";
									
								echo "</div>";
								echo "<div class=\"avatar\">";
								echo '<img src="data:image;base64,'.base64_encode($row['images']).'"style="width:128px;height:128px">';
								echo "</div>";
								echo "<div class=\"info\">";
									echo "<div class=\"title\">";
									echo "<div style=\"color:darkblue\" class=\"desc\"><h3>".$row["name"]."</h3></div>";
									echo "</div>";
									echo "<div class=\"desc\">Student</div>";
									echo "<div class=\"desc\"> Year ".$row["year"]."</div>";
									echo "<div class=\"desc\">Dept. of ".$row["Department"]."</div>";
								echo "</div>";
								echo"<div class=\"bottom\">";
								echo "<button width=\"auto\" style=\"background-color:black\";><span class=\"glyphicon glyphicon-envelope\"></span>&nbsp&nbsp&nbspMessage</button>";
				echo "</div></div></div></div>";
			
				$count++;
				if($count%3==0 ){
					echo "</div></div>";
				}
			}
			
				
			}
			echo "</div></div>";
	


			}		
			if($_SESSION['status']=="registrar")
			{	
				echo "<div class=\"w3-row w3-padding-128\">
						<div class=\"w3-rest w3-container\">
							<div class=\"w3-half w3-container\">
								<div class=\"col-lg-12 col-sm-8\">

									<div class=\"card hovercard\">
										<div class=\"cardheader\">
										
										</div>";
											$sql1 = "select images from pats where email='".$_SESSION['email']."'";
											$result1 = $db->query($sql1);	
											$rows1=$result1->fetch_assoc();
											echo "<div class=\"avatar\">";
											echo '<img src="data:image;base64,'.base64_encode($rows1['images']).'"style="width:128px;height:128px">';
											echo "</div>";
										echo "<div class=\"info\">";
										
										echo "<div class=\"title\">";
											$sql1 = "select department from pats where email='".$_SESSION['email']."'";
											$result1 = $db->query($sql1);	
											$rows1=$result1->fetch_assoc();
												echo "<a target=\"_blank\" href=\"http://scripteden.com/\">".$_SESSION['username']."</a>";
											echo"</div>";
											echo "<div class=\"desc\">registrar@namal.edu.pk</div>";
											echo "<div class=\"desc\">Namal College, Mianwali</div>";
										echo "</div>";
										echo "<div class=\"bottom\">
											<button width=\"auto\" onclick=\"document.getElementById('id03').style.display='block'\" style=\"background-color:black\";><span class=\"glyphicon glyphicon-wrench\"></span>&nbsp&nbsp&nbspEdit Profile</button>
										</div>
									</div>
								</div>
							</div>";
							echo "<div class=\"w3-half w3-container\">
								<div class=\"col-lg-12 col-sm-8\">
									<div class=\"w3-row w3-container\">
										<div class=\"w3-half w3-container\">
											<h3><span id=\"btnAddd\" class=\"glyphicon glyphicon-plus\" style=\"padding-right\">&nbsp&nbsp&nbsp&nbspReminders</h3>
										</div>
										<div class=\"w3-half w3-container\">
										</div>
									</div>";
									echo "<div class=\"w3-row w3-container \" style=\"margin-left:15px; background-color:#EBEDEF\">
										
										
										
										
										
										<!--Reminders-->
										
										
										
									</div>
								</div>
							</div>
						</div>
					</div> ";

				$sql = "select * from requests";
				$count=0;
				$result = $db->query($sql);
				echo "<div class=\"w3-row w3 w3-padding-16\">";
				echo "<div class=\"w3-rest w3-container\">";
				while($row = $result->fetch_assoc()){
				if($count%3==0){
				echo "<div class=\"w3-row w3 w3-padding-16\">";
				echo "<div class=\"w3-rest w3-container\">";
				}
				echo"<div class=\"w3-third w3-container\">
				<div class=\"col-lg-12 col-sm-8\">
					<div class=\"w3-card-8 w3-dark-grey\" style=\"width:100%\">

						<div class=\"w3-container w3-center\">";
						 	$sql1 = "select images from students where email='".$row['Email']."'";
							$result1 = $db->query($sql1);	
							$rows1=$result1->fetch_assoc();
							echo "<div class=\"avatar\">";
							echo '<img src="data:image;base64,'.base64_encode($rows1['images']).'" class="img-circle" style="width:128px;height:128px;margin-top:10px">';
							echo "</div>";
						  echo"<h5>".$row['Name']."</h5>";
						  echo"<h7>".$row['Email']."</h7>";
						  echo"<h5>Request for ".$row['Pat Name']."</h5>";
						  echo"<p>".$row['Description']."</p>";
						  echo"<div class=\"w3-section\">
						  <form method=\"post\" action=\"acceptreq.php\">
							<button class=\"w3-btn w3-green\" type=\"submit\" name=\"accept\" id=\"".$count."\" value=\"".$row['ID']."\">Accept</button>
							</form>
							<form method=\"post\" action=\"deletereq.php\">
							<button class=\"w3-btn w3-red\" type=\"submit\" name=\"reject\" id=\"".$count."\" value=\"".$row['ID']."\">Decline</button>
							</form>
						  </div>
						</div>

					  </div>
					</div>
				</div>";
				$count++;
				if($count%3==0 ){
					echo "</div></div>";
				}
				
				}
				echo "</div></div>";
				
			}
			
			
			
			
?>

</body>

</html>