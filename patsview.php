
<!DOCTYPE html>
<html>
<?php
include 'database.php'; //connect the connection page

if(empty($_SESSION)) // if the session not yet started 
   session_start();

if(!isset($_SESSION['psw'])) { //if not yet logged in
   header("Location: index.php");// send to login page
   exit;
}   
 
?>
<title>Namal Pat System</title>
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
.scrollit {
    overflow:scroll;
    height:150px;
}
textarea {
    resize: none;
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
    background: url("2.jpg");
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

<!-- Navbar -->

<div class="w3-top" style="margin-left:250">
  <ul class="w3-navbar w3-theme w3-top w3-left-align w3-large">
    <li class="w3-opennav w3-right w3-hide-large">
      <a class="w3-hover-white w3-large w3-theme-l1" href="javascript:void(0)" onclick="w3_open()"><i class="fa fa-bars"></i></a>
    </li>
	<!--class="w3-theme-l1"-->
    <li><a href="#" class="w3-hover-black"><img src="3.png" 
																style="width:255px; height:65px"></a></li>
	<li class="w3-hide-small"><a href="#" class="w3-hover-black" style="font-size:36px; color:white;margin-top:5px">Personal Academic Tutoring System</a></li>
    
  </ul>
</div>

<!-- Sidenav top:51px width:250px-->
<nav class="w3-sidenav w3-collapse w3-theme-l5 w3-animate-left" style="z-index:3;width:283px;margin-top:-44px;" id="mySidenav">
  <a href="javascript:void(0)" onclick="w3_close()" class="w3-right w3-xlarge w3-padding-large w3-hover-black w3-hide-large" title="close menu">
    <i class="fa fa-remove"></i>
  </a>
  <h4><b>Hello,<?php echo " ". $_SESSION['username']?></b></h4>
  <a href="home.php" class="w3-hover-black">My Profile</a>
  <a href="patsview.php" class="w3-hover-black">PATs</a>
  <a href="studentstable.php" class="w3-hover-black">Students</a>
  <a href="feedback2.php" class="w3-hover-black">Feedback</a>
  <a href="logout.php" class="w3-hover-black">Logout</a>
</nav>

<!-- Overlay effect when opening sidenav on small screens -->
<div class="w3-overlay w3-hide-large" onclick="w3_close()" style="cursor:pointer" title="close side menu" id="myOverlay"></div>

<!-- Main content: shift it to the right by 250 pixels when the sidenav is visible -->

<div class="w3-main" style="margin-left:283px; margin-top:128px;" >
	
	<div class="w3-row" style="margin-left:45px;">
		<h1>Following are the list of PATS</h1>
	</div>
	<?php
		
		if($_SESSION['status']=="student"){
		
			$sql = "select name,email,department,images from pats";
			$count=0;
			$result = $db->query($sql);
			echo "<div class=\"w3-row w3-center\">
			<div class=\"w3-rest w3-container\">
			
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
									echo "<div class=\"desc\">Teacher</div>";
									echo "<div class=\"desc\" > ".$row["email"]."</div>";
									echo "<div class=\"desc\">Dept. of ".$row["department"]."</div>";
								echo "</div>";
								echo"<div class=\"bottom\">";
								echo "<button width=\"auto\" onclick=\"document.getElementById('".$count."').style.display='block'\" style=\"background-color:black\";><span class=\"glyphicon glyphicon-user\"></span>&nbsp&nbsp&nbspView Profile</button>";
				echo "</div></div></div></div>";
			
				$count++;
				if($count%3==0 ){
					echo "</div></div>";
				}
			}
			
				
			}
			echo "</div></div>";
		
		
		}
		if($_SESSION['status']=="teacher"){
		
			$sql = "select name,email,department,images from pats";
			$count=0;
			$result = $db->query($sql);
			echo "<div class=\"w3-row w3-center\">
			<div class=\"w3-rest w3-container\">
			
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
									echo "<div class=\"desc\">Teacher</div>";
									echo "<div class=\"desc\"> ".$row["email"]."</div>";
									echo "<div class=\"desc\">Dept. of ".$row["department"]."</div>";
								echo "</div>";
								echo"<div class=\"bottom\">";
								echo "<button width=\"auto\" onclick=\"document.getElementById('".$count."').style.display='block'\" style=\"background-color:black\";><span class=\"glyphicon glyphicon-user\"></span>&nbsp&nbsp&nbspView Profile</button>";
								echo "<div class=\"bottom\">
								<button width=\"auto\" onclick=\"document.getElementById('id02').style.display='block'\" style=\"background-color:black\";>
								<span class=\"glyphicon glyphicon-envelope\"></span>&nbsp&nbsp&nbspMessage</button>
								</div>";
				echo "</div></div></div></div>";
			
				$count++;
				if($count%3==0 ){
					echo "</div></div>";
				}
			}
			
				
			}
			echo "</div></div>";
		
		
		}
		if($_SESSION['status']=="registrar"){
		
		
							$sql = "select name,email,department,images from pats";
			$count=0;
			$result = $db->query($sql);
			echo "<div class=\"w3-row w3-center\">
			<div class=\"w3-rest w3-container\">
			
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
									echo "<div class=\"desc\">Teacher</div>";
									echo "<div class=\"desc\"> ".$row["email"]."</div>";
									echo "<div class=\"desc\">Dept. of ".$row["department"]."</div>";
								echo "</div>";
								echo"<div class=\"bottom\">";
								echo "<button width=\"auto\" onclick=\"document.getElementById('".$count."').style.display='block'\" style=\"background-color:black\";><span class=\"glyphicon glyphicon-user\"></span>&nbsp&nbsp&nbspView Profile</button>";
								echo "<div class=\"bottom\">
								<button width=\"auto\" onclick=\"document.getElementById('id02').style.display='block'\" style=\"background-color:black\";>
								<span class=\"glyphicon glyphicon-envelope\"></span>&nbsp&nbsp&nbspMessage</button>
								</div>";
				echo "</div></div></div></div>";
			
				$count++;
				if($count%3==0 ){
					echo "</div></div>";
				}
			}
			
				
			}
			echo "</div></div>";
		
		
		
		}
		
	?>	
			
</div>
	
  <footer id="myFooter" >
    <div class="w3-container w3-black w3-padding-32">
	  <div class="w3-row">
		<div class="w3-third w3-container w3-padding-24">
			<img src="3.png" style="width:280px; height:75px"><br>
			
		</div>
		<div class="w3-third w3-container w3-padding-24">
			<p>Follow us</p>
			<div class="social">
			  <a class="fa fa-twitter" title="" target="_blank" href="https://twitter.com/namaledu"></a>
			  <a class="fa fa-facebook" title="" target="_blank" href="https://www.facebook.com/NamalCollege"></a>
			  <a class="fa fa-instagram" title="" target="_blank" href="https://www.instagram.com/namalknowledgecity"></a>
			  <a class="fa fa-vimeo" title="" target="_blank" href="https://vimeo.com/namalcollege1"></a>
			  <a class="fa fa-linkedin" title="" target="_blank" href="https://pk.linkedin.com/in/namal-college-mianwali-530a40119"></a>
			</div>
		</div>
		<div class="w3-third w3-container w3-padding-2">
			<p><span class="glyphicon glyphicon-home"></span>&nbsp&nbsp&nbspNamal College, Mianwali</p>
			<p><span class="glyphicon glyphicon-map-marker"></span>&nbsp&nbsp&nbsp30 Km Talagang Road, Mianwali, 42250, Pakistan.</p>
			<p><span class="glyphicon glyphicon-phone-alt"></span>&nbsp&nbsp&nbsp+92(0)45-9236995</p>
			<p><span class="glyphicon glyphicon-user"></span>&nbsp&nbsp&nbspinfo@namal.edu.pk</p>
		</div>
	  </div>
    </div>
  </footer>
  
  
  <?php	
		$count2=0;
		$sql3 = "select name,email,department,images from pats";
		$result2 = $db->query($sql3);
		
		while($row1=$result2->fetch_assoc()){
			if($row1["name"]!=$_SESSION['username']){
				echo "<div id=\"".$count2."\" class=\"modal\">";
			echo "<form class=\"modal-content animate\" action=\"sendRequest.php\" style=\"width:500px\" method=\"post\">
			<div class=\"imgcontainer\"> 
			<span onclick=\"document.getElementById('".$count2."').style.display='none'\" class=\"close\" title=\"Close Modal\">&times;</span>";
		  
				echo "<div class=\"avatar\">";
				echo '<img src="data:image;base64,'.base64_encode($row1['images']).'"style="width:128px;height:128px">';
				echo "</div>
			</div>";

			echo "<div class=\"container\" style=\"width:100%;\">
			<div class=\"w3-row w3-container\" style=\"align:center\">
				<center><h2>".$row1['name']."</h2></center>";
			echo "<h4 style=\"margin-left:15%;\"><span class=\"glyphicon glyphicon-briefcase\"></span>&nbsp&nbspDept. of".$row1['department']."</h4>";
			echo "<h4 style=\"margin-left:15%;\"><span class=\"glyphicon glyphicon-envelope\"></span>&nbsp&nbsp".$row1['email']."</h4>
			</div>";
			//here comes the table
			$result3=$db->query("select name,email,year,UOB from students where pat_name='".$row1['name']."'");
			echo "<div class=\"w3-row\">
			 <div id=\"tbody\" class=\"scrollit\">";
					echo "<table class=\"w3-table-all\">
						<thead>
							<tr class=\"w3-light-green\" style=\"font-weight: bold;\">";
								echo "<td id=\"head1\">UOB</td>
								<td id=\"head2\">Name</td>
								<td id=\"head3\">Email</td>
								<td id=\"head3\">Year</td>";
							echo "</tr>
						</thead>";
						echo "<tbody>";	
						while($row2=$result3->fetch_assoc()){
												
						echo "<tr>";
							echo "<td id=\"td1\">".$row2['UOB']. "</td><td id=\"td2\">".$row2['name']."</td><td id=\"td3\">".$row2['email']."</td><td id=\"td4\">".$row2['year']."</td>";
					       echo "</tr>";
							
						}
					  echo "</tbody>";
					  
					echo "</table>
				  </div>";
				  //here it ends
			 echo "</div>
			</div>";
					//<!--condition if student then show-->
		
				if($_SESSION['status']=="student"){
				
					echo "<div class=\"container\" style=\"background-color:#f1f1f1; width:100%;\">";
				echo "<a href=\"#\" onclick=\"alert()\" id=\"request\"><span id=\"gicon\" class=\"glyphicon glyphicon-plus\"></span>&nbsp&nbspSend Join Group Request</a>";
				echo "<div class = \"joinReason\" id=\"reasontTA\">
				<textarea id=\"req\" rows=\"5\" style=\"width:467px;margin-bottom:10px;\" placeholder=\"Why you want to join this group?\" name=\"detail\" ></textarea>
				<br>";
				echo "<input type=\"hidden\" name=\"id\" value=\"".$row1['name']."\"/>";
				echo "<label id=\"errormsg\" style=\"color:red\"></label>
				<br>";
				echo "<button class=\"sendReq\" onclick=\"sendRequest()\">Send Request</button>";
					echo "</div>
					</div>";
				}
				
					echo "</form>
					</div>";
			++$count2;
			
			}
		}
	?>
	
	<div id="id02" class="modal">
  
	  <form class="modal-content animate" action="action_page.php" style="width:400px">
		<div class="imgcontainer">
		  <span onclick="document.getElementById('id02').style.display='none'" class="close" title="Close Modal">&times;</span>
		  <img src="1.png" alt="Avatar" class="avatar">
		</div>

		<div class="container" style="width:100%;">
			<div class="w3-row w3-container" style="align:center">
				<center><h2>Message</h2></center>
			</div>
			<div class="w3-row">
				<textarea id="status" rows="5" style="width:367px;margin-bottom:10px;"></textarea>
			</div>
		</div>
		<div class="container" style="background-color:#f1f1f1; width:100%;">
			<button>Send</button>
		</div>
	  </form>
	</div>
  
<!-- END MAIN -->
<!--</div>-->
</div>
<script>
// Get the Sidenav
var mySidenav = document.getElementById("mySidenav");

// Get the DIV with overlay effect
var overlayBg = document.getElementById("myOverlay");

// Toggle between showing and hiding the sidenav, and add overlay effect
function w3_open() {
    if (mySidenav.style.display === 'block') {
        mySidenav.style.display = 'none';
        overlayBg.style.display = "none";
    } else {
        mySidenav.style.display = 'block';
        overlayBg.style.display = "block";
    }
}

// Close the sidenav with the close button
function w3_close() {
    mySidenav.style.display = "none";
    overlayBg.style.display = "none";
}
function alert(){
	var a = document.getElementById("request");
	var b = document.getElementById("gicon");
	//a.innerHTML = "Request Sent!"
}
function sendRequest(){
	var c = document.getElementById("reasontTA");
	var d = document.getElementById("req");
	if(d.innerHTML == "Why you want to join this group"){
		var e = document.getElementById("errormsg");
		e.innerHTML = "Give at least one reason to send request!"
	}
	else{
		c.style.display="none";
		
	}
</script>

</body>
</html>