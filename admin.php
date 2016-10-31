
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
<title>Admin Profile</title>
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

textarea {
    resize: none;
}


.boxShow{
	display:none;
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
<nav class="w3-sidenav w3-collapse w3-theme-l5 w3-animate-left" style="z-index:3;width:283px;margin-top:84px;" id="mySidenav">
  <a href="javascript:void(0)" onclick="w3_close()" class="w3-right w3-xlarge w3-padding-large w3-hover-black w3-hide-large" title="close menu">
    <i class="fa fa-remove"></i>
  </a>
  <h4><b>Hello, Student Support Office</b></h4>
  <a href="admin.php" class="w3-hover-black">My Profile</a>
  <a href="editstudentdata.php" class="w3-hover-black">Edit Students</a>
  <a href="editteacherdata.php" class="w3-hover-black">Edit PATS</a>
  <a href="#" onclick="document.getElementById('id06').style.display='block'" class="w3-hover-black">Add Student</a>
  <a href="#" onclick="document.getElementById('id07').style.display='block'" class="w3-hover-black">Add PAT</a>
  <a href="#" onclick="document.getElementById('id05').style.display='block'" class="w3-hover-black">Generate PDF</a>
  <a href="feedbackadmin.php" class="w3-hover-black">Feedback</a>
  <a href="logout.php" class="w3-hover-black">Logout</a>
</nav>

<!-- Overlay effect when opening sidenav on small screens -->
<div class="w3-overlay w3-hide-large" onclick="w3_close()" style="cursor:pointer" title="close side menu" id="myOverlay"></div>

<!-- Main content: shift it to the right by 250 pixels when the sidenav is visible -->

<div class="w3-main" style="margin-left:283px">
	
	<div class="w3-row w3-padding-128">
		<div class="w3-rest w3-container">
			<div class="w3-half w3-container">
				<div class="col-lg-12 col-sm-8">

					<div class="card hovercard">
						<div class="cardheader">
							
						</div>
						<?php
							$sql1 = "select images from login where email='".$_SESSION['email']."'";
							$result1 = $db->query($sql1);	
							$rows=$result1->fetch_assoc();
							echo "<div class=\"avatar\">";
							echo '<img src="data:image;base64,'.base64_encode($rows['images']).'"style="width:128px;height:128px">';
							echo "</div>";
						
						?>
						<div class="info">
							<div class="title">
								<a target="_blank" href="http://scripteden.com/">Student Support Office</a>
							</div>
							<div class="desc">SSO@NAMAL.EDU.PK</div>
							<div class="desc">Namal College, Mianwali</div>
						</div>
						<div class="bottom">
							<button width="auto" onclick="document.getElementById('id03').style.display='block'" style="background-color:black";><span class="glyphicon glyphicon-wrench"></span>&nbsp&nbsp&nbspEdit Profile</button>
						</div>
					</div>
				</div>
			</div>
			<div class="w3-half w3-container">
				<div class="col-lg-12 col-sm-8">
					<div class="w3-row w3-container">
						<div class="w3-half w3-container">
							<h3><span id="btnAddd" class="glyphicon glyphicon-plus" style="padding-right">&nbsp&nbsp&nbsp&nbspReminders</h3>
						</div>
						<div class="w3-half w3-container">
						</div>
					</div>
					<div class="w3-row w3-container " style="margin-left:15px; background-color:#EBEDEF">
						
						
						
						
						
						<!--Reminders-->
						
						
						
					</div>
				</div>
			</div>
		</div>
	</div>
	
	
  <footer id="myFooter">
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
			<p><span class="glyphicon glyphicon-envelope"></span>&nbsp&nbsp&nbspinfo@namal.edu.pk</p>
		</div>
	  </div>
    </div>
  </footer>
	
	<div id="id03" class="modal">
  
	  	<form class="modal-content animate" action="action_page.php" style="width:400px">
			<div class="imgcontainer" style="padding-bottom:-10px">
			  <span onclick="document.getElementById('id03').style.display='none'" class="close" title="Close Modal">&times;</span>
			  <img src="C:\Users\Shahrukh\Desktop\SEGP\img_avatar.png" alt="Avatar" class="avatar">
				<h6>Upload a different photo...</h6>
				<input type="file" class="text-center center-block well well-sm">
			</div>

			<div class="container" style="width:100%;">
			  <label><b>Name</b></label><br>
			  <input type="text" placeholder="Shahrukh" name="uname" required>
			  <br>
			  <label><b>Education</b></label><br>
			  <input type="text" placeholder="Enter Password" name="uedu" required>
			  <br>
			  <label><b>Department</b></label><br>
			  <input type="text" placeholder="Enter Password" name="udept" required>
			  <br>
			  <label><b>Email</b></label><br>
			  <input type="text" placeholder="Enter Password" name="uemail" required>
			  <br>
			  <label><input type="checkbox" name="changePassword" value="password">Change Password</label>
			  <div class = "changePassword boxShow">
					<input type="password" placeholder="Enter Current Password" name="cpw" required>
					<br>
					<input type="password" placeholder="Enter new Password" name="npw" required>
					<br>
					<input type="password" placeholder="Confirm new Password" name="cpw" required>
			  </div>
			  <button type="submit">Save</button>
			</div>

			<div class="container" style="background-color:#f1f1f1; width:100%;">
			</div>
	  </form>
	</div>
	
	<div id="id05" class="modal w3-padding-128">
	  	<form class="modal-content animate" action="Generate_PDF.php" style="width:400px" method="post">
			<div class="imgcontainer" style="padding-bottom:-10px">
			  <span onclick="document.getElementById('id05').style.display='none'" class="close" title="Close Modal">&times;</span>
			</div>
			<div class="container" style="width:100%; margin-top:50px;">
				<label> Generate PDF file for:&nbsp&nbsp</label>
					<select name="selectOption">
						<option value="students">All Students</option>
						<option value="pats">All PATS</option>
						<option value="year 2">Year 2</option>
						<option value="year 3">Year 3</option>
						<option value="year 4">Year 4</option>
					</select>
			</div>
			<div class="w3-row container" style="background-color:#f1f1f1; width:100%;">
				<button>Generate</button>
			</div>
	    </form>
	</div>
	
	<div id="id06" class="modal w3-padding-64">
	  	<form class="modal-content animate" action="addnewstudent.php" style="width:400px" method="post">
			<div class="imgcontainer" style="padding-bottom:-10px">
			  <span onclick="document.getElementById('id06').style.display='none'" class="close" title="Close Modal">&times;</span>
			</div>
			<div class="container" style="width:100%; margin-top:50px;">
				<label><b>Name</b></label><br>
				<input type="text" name="name" id="name"  required onblur='check_pass1();'>
				<label><b>UOB#</b></label><br>
				<input type="text" name="uob" id="uob"  required onchange='check_pass1();'>
				<label><b>Year</b></label><br>
				<select name="year" style="width:100%">
					<option  value=1>year 1</option>
					<option  value=2>year 2</option>
					<option  value=3>year 3</option>	
					<option  value=4>year 4</option>
				</select>
				<label><b>Email</b></label><br>
				<input type="text" name="email" id="email" onchange='check_pass1();' required>
				<label><b>contact</b></label><br>
				<input type="text" name="contact" id="contact" onchange='check_pass1();' required>
				<br><label><b>Department</b></label><br>
				<select name="id" style="width:100%">
					<option  value="Computer Science">Computer Science</option>
					<option  value="Electrical Engineering">Electrical Engineering</option>
				</select>
				

				<?php				
					echo "<label><b>PAT (Half Loaded PATS)</b></label><br>";
					echo "<select name=\"half\" id=\"half\" style=\"width:100%\" onchange='check_pass1();'>";
					echo "<option  value=\"null\">NULL</option>";
					$sql="SELECT pat_name, COUNT(*) FROM students GROUP BY pat_name HAVING COUNT(*) <=9";
					$result=$db->query($sql);
						while($row=$result->fetch_assoc()){
							echo "<option  value=\"".$row['pat_name']."\">".$row['pat_name']."</option>";
						}
					echo "</select>";
					echo "<label><b>PAT (Full Loaded PATS)</b></label><br>";
					echo "<select name=\"full\" id=\"full\" style=\"width:100%\" onchange='check_pass1();'>";
					echo "<option  value=\"null\">NULL</option>";
						$sql1="SELECT pat_name, COUNT(*) FROM students GROUP BY pat_name HAVING COUNT(*) >=10";
						$result1=$db->query($sql1);
						while($row1=$result1->fetch_assoc()){
							echo "<option  value=\"".$row1['pat_name']."\">".$row1['pat_name']."</option>";
						}
					echo"</select>";
					echo "</div>";
				?>
			<div class="w3-row container" style="background-color:#f1f1f1; width:100%;">
				<button type="submit" id="add" >Add Student</button>
			</div>
	    </form>
	</div>
	
	<div id="id07" class="modal w3-padding-64">
	  	<form class="modal-content animate" action="addnewteacher.php" style="width:400px" method="post">
			<div class="imgcontainer" style="padding-bottom:-10px">
			  <span onclick="document.getElementById('id07').style.display='none'" class="close" title="Close Modal">&times;</span>
			</div>
			<div class="container" style="width:100%; margin-top:50px;">
				<label><b>Name</b></label><br>
				<input type="text" name="uname" required>
				<label><b>Email</b></label><br>
				<input type="text" name="email" required>
				<label><b>contact</b></label><br>
				<input type="text" name="contact" required>
				<br><label><b>Department</b></label><br>
				<select name="dept" style="width:100%">
					<option  value="Computer Science">Computer Science</option>
					<option  value="Electrical Engineering">Electrical Engineering</option>
				</select>
			</div>
			<div class="w3-row container" style="background-color:#f1f1f1; width:100%;">
				<button>Add Teacher</button>
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

$(document).ready(function(){
    $('input[type="checkbox"]').click(function(){
        if($(this).attr("value")=="password"){
            $(".changePassword").toggle();
        }
    });
});
function test_input(str) {
  str = trim(str);
  str = stripslashes(str);

}
function check_pass1(){
	var name = /^[a-zA-Z ]{2,30}$/;
	var uob=/(\d{8})/;
	var phone= /([0-9]\d{3})(\D*)(\d{7})/;
	var email= /[a-z]+\d{4}@namal.edu.pk/;
	if(name.test(document.getElementById(name).value)){
		//if (document.getElementById(uob).value == uob){
			//if(document.getElementById(year).value==/(\d{1})/){
				//if(document.getElementById(email).value==email){
					//if((document.getElementById(full).value!="null" && document.getElementById(half).value=="null")||(document.getElementById(full).value=="null" && document.getElementById(half).value!="null")){
						document.getElementById(add).disabled = false;
					//}
				//}
			//}
		//}
			else {
			document.getElementById(add).disabled = true;
		}
	}
	
    }

</script>

</body>
</html>