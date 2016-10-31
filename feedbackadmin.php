
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

textarea {
    resize: none;
}

.box {
	color:#000;
	margin:15px auto;
	padding:8px;
	width:500px;
	height:240px;
	background:#234556;
	border-radius:4px;
	border-bottom:4px solid #5e95cd;
}
.overlimit{color: red;}

h2{color:#000; text-align:center;margin-bottom:-100px; margin-top:100px;}

@import url(//maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css);
body { padding-top: 60px; }
.nav.nav-justified > li > a { position: relative; }
.nav.nav-justified > li > a:hover,
.nav.nav-justified > li > a:focus { background-color: transparent; }
.nav.nav-justified > li > a > .quote {
    position: absolute;
    left: 0px;
    top: 0;
    opacity: 0;
    width: 30px;
    height: 30px;
    padding: 5px;
    background-color: #13c0ba;
    border-radius: 15px;
    color: #fff;  
}
.nav.nav-justified > li.active > a > .quote { opacity: 1; }
.nav.nav-justified > li > a > img { box-shadow: 0 0 0 5px #13c0ba; }
.nav.nav-justified > li > a > img { 
    max-width: 100%; 
    opacity: .3; 
    -webkit-transform: scale(.8,.8);
            transform: scale(.8,.8);
    -webkit-transition: all 0.3s 0s cubic-bezier(0.175, 0.885, 0.32, 1.275);
            transition: all 0.3s 0s cubic-bezier(0.175, 0.885, 0.32, 1.275);
}
.nav.nav-justified > li.active > a > img,
.nav.nav-justified > li:hover > a > img,
.nav.nav-justified > li:focus > a > img { 
    opacity: 1; 
    -webkit-transform: none;
            transform: none;
    -webkit-transition: all 0.3s 0s cubic-bezier(0.175, 0.885, 0.32, 1.275);
            transition: all 0.3s 0s cubic-bezier(0.175, 0.885, 0.32, 1.275);
}
.tab-pane .tab-inner { padding: 30px 0 20px; }

@media (min-width: 768px) {
    .nav.nav-justified > li > a > .quote {
        left: auto;
        top: auto;
        right: 20px;
        bottom: 0px;
    }  
}

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
<nav class="w3-sidenav w3-collapse w3-theme-l5 w3-animate-left" style="z-index:3;width:283px;margin-top:24px;" id="mySidenav">
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
	
	<div class="w3-row w3-padding-128" style="margin-left:-30px">
		<div class="w3-rest w3-container">
			<div class="[ container text-center ]">
				<div class="[ row ]">
					<div class="[ col-xs-12 col-sm-8 col-sm-offset-2 col-md-6 col-md-offset-3 ]" role="tabpanel">
						<div class="[ col-xs-4 col-sm-12 ]">
							<!-- Nav tabs -->
						<?php	
								$test_query="select Email from feedback";
								$result= $db->query($test_query);
								$count=0;
								echo "<ul class=\"[ nav nav-justified ]\" id=\"nav-tabs\" role=\"tablist\">";
								while($row = $result->fetch_assoc()){
									if($count==0){
										echo "<li role=\"presentation\" class=\"active\">";
									}
									else{
										echo "<li role=\"presentation\" class=\"\">";
									}
								
									echo "<a href=\"#".$row['Email']."\" aria-controls=\"dustin\" role=\"tab\" data-toggle=\"tab\" >";
									echo "<img class=\"img-circle\" src=\"1.png\" />
										<span class=\"quote\"><i class=\"fa fa-quote-left\"></i></span>
									</a>";
								echo "</li>";
									$count++;
								}
								echo "</ul>";
						  echo "</div>";
								echo "<div class=\"[ col-xs-8 col-sm-12 ]\">";
							//<!-- Tab panes -->
							echo "<div class=\"tab-content\" id=\"tabs-collapse\">";            
									$test_query1="select * from feedback";
									$result1= $db->query($test_query1);
									$count1=0;
									while($row = $result1->fetch_assoc()){
										if($count1==0){
											echo "<div role=\"tabpanel\" class=\"tab-pane fade in active\" id=\"".$row['Email']."\">";
										}
										else{
											echo "<div role=\"tabpanel\" class=\"tab-pane fade\" id=\"".$row['Email']."\">";
										}
										echo "<div class=\"tab-inner\">";                    
										echo "<p class=\"lead\">".$row['Feedback']."</p>
											<hr>";
										echo "<p><strong class=\"text-uppercase\">".$row['Name']."</strong></p>";
										echo "<p><em class=\"text-capitalize\">year ".$row['Year']."</em></p>";  
										echo "<p><em class=\"text-capitalize\">Department of ".$row['Department']."</em></p>";  
										echo "</div>";
										echo "</div>";
										$count1++;
										}
								

								//echo "</div>";
							    echo "</div> </div>"; 
							?>
						      
					</div>
				</div>
			</div>
		</div>
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

	
	<div class="w3-row w3-container">
		<div class="w3-quarter w3-container"></div>
		<div class="w3-half w3-container">
				<div class="box">
					<h3>Give us your Feedback! :)</h3>
					<textarea id="status" rows="5" style="width:485px;margin-bottom:10px; color:black"></textarea>
					<span id="text_counter"></span><input class="btn btn-large btn-primary pull-right" type="submit" id="posting" value="Post" />
				</div>
		</div>
		<div class="w3-quarter w3-container"></div>
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
  
<!-- END MAIN -->
</div>
<!--/div-->
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
	    var left = 140
	    $('#text_counter').text('Characters left: ' + left);
	  
	        $('#status').keyup(function () {
	  
	        left = 140 - $(this).val().length;
	  
	        if(left < 0){
	            $('#text_counter').addClass("overlimit");
	             $('#posting').attr("disabled", true);
	        }else{
	            $('#text_counter').removeClass("overlimit");
	            $('#posting').attr("disabled", false);
	        }
	  
	        $('#text_counter').text('Characters left: ' + left);
	    });
	});
</script>

</body>
</html>