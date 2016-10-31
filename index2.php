
<!DOCTYPE html>
<html>
 
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
.carousel-inner > .item > img,
  .carousel-inner > .item > a > img {
      width: 100%;
      margin: auto;
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
<?php
include 'database.php'; //connect the connection page
if(empty($_SESSION)) // if the session not yet started 
   session_start();


if(isset($_SESSION['psw'])) { // if already login
   header("location: Home.php"); // send to home page
   exit; 
}

?>
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
  <h4><b>Menu</b></h4>
  <a href="index.php" class="w3-hover-black">Home</a>
  <a href="feedback.php" class="w3-hover-black">Feedback</a>
  <a href="#" class="w3-hover-black" onclick="document.getElementById('id01').style.display='block'" style="width:auto;">Login</a>
</nav>

<!-- Overlay effect when opening sidenav on small screens -->
<div class="w3-overlay w3-hide-large" onclick="w3_close()" style="cursor:pointer" title="close side menu" id="myOverlay"></div>

<!-- Main content: shift it to the right by 250 pixels when the sidenav is visible -->

<div class="w3-main" style="margin-left:283px">
	
	<!--------------------------------------------------Carousel Start-------------------------------------------------------------->
	
	<!--<div>-->
		<div class="w3-rest w3-container">
			<div id="myCarousel" class="carousel slide" data-ride="carousel" style="margin-top:100px;">
			  <!-- Indicators -->
			  <ol class="carousel-indicators" style="visibility: hidden;">
				<li data-target="#myCarousel" data-slide-to="0" class="active"></li>
				<li data-target="#myCarousel" data-slide-to="1"></li>
			  </ol>
			  <!--Login Popup-->
  
	<div id="id01" class="modal">
  
	  <form class="modal-content animate" action="action_page.php" style="width:400px" id="loginform" name="loginform" method="post">
		<div class="imgcontainer">
		  <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">&times;</span>
		  <img src="1.png" alt="Avatar" class="avatar">
		</div>

		<div class="container" style="width:100%;">
		  <label><b>Email</b></label><br>
		  <input type="text" placeholder="Enter Email" name="uname" id="uname" required>
		  <br>
		  <label><b>Password</b></label><br>
		  <input type="password" placeholder="Enter Password" name="psw" id="psw" required>
		  <br>
		  
			
		  <button  type="submit" name="submit" value="login" id="submit">Login</button>
		</div>

		<div class="container" style="background-color:#f1f1f1; width:100%;">
		  <span class="psw"><a href="#">Forgot Password?</a></span>
		</div>
	  </form>
	</div>

			 
	
	<!--------------------------------------------------Carousel End---------------------------------------------------------------->
  
  <div class="w3-row w3-padding-64">
    <div class="w3-rest w3-container">
	<center><img src="aww.png" style="">
      <<h1 class="w3-text-teal">OOps! Wrong Information!</h1>
      <h3><?php echo $_SESSION['error'] ?></h3></center>
    </div>
  </div>

  
<!--Footer-->
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
<!--</div>-->
</div>
<script>
$(document).ready(function (){
   $("#submit").click(function (){
        alert("hi");
        if($("#email").val()==""||$("#pass").val()=="")
            $("div#ack").html("please enter email and pass");
        else
            $.post( $("#myForm").attr("action"), 
                    $("#myForm :input").serializeArray(),
                    function(data){
                        $("div#ack").html(data);
                    });
        $("#myForm").submit( function(){
            return false;
        });
     });
    });
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

// Get the modal
var modal = document.getElementById('id01');

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}
function check_Form() {
// Fetching values from all input fields and storing them in variables.
var name = document.getElementById("uname").value;
var password = document.getElementById("psw").value;
//Check input Fields Should not be blanks.
if (name == '' || password == '') {
alert("Fill All Fields");
} else {
//Notifying error fields
var username1 = document.getElementById("unameErr");
//Check All Values/Informations Filled by User are Valid Or Not.If All Fields Are invalid Then Generate alert.
if (username1.innerHTML == 'Invalid email' {
alert("Enter Valid Email");
} else {
//Submit Form When All values are valid.
document.getElementById("loginform").submit();
}
}
}
// AJAX code to check input field values when onblur event triggerd.
function validate(field, query) {
var xmlhttp;
if (window.XMLHttpRequest) { // for IE7+, Firefox, Chrome, Opera, Safari
xmlhttp = new XMLHttpRequest();
} else { // for IE6, IE5
xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
}
xmlhttp.onreadystatechange = function() {
if (xmlhttp.readyState != 4 && xmlhttp.status == 200) {
document.getElementById(field).innerHTML = "Validating..";
} else if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
document.getElementById(field).innerHTML = xmlhttp.responseText;
} else {
document.getElementById(field).innerHTML = "Error Occurred. <a href='index.php'>Reload Or Try Again</a> the page.";
}
}
xmlhttp.open("POST", "action_page.php?field=" + field + "&query=" + query, false);
xmlhttp.send();
}
</script>

</body>
</html>