
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


.boxShow{
	display:none;
}

#myInput {
    /*background-image: C:\Users\Shahrukh\Desktop\Bootstrap Learning\Website\searchIcon.png; Add a search icon to input */
    background-position: 10px 12px; /* Position the search icon */
    background-repeat: no-repeat; /* Do not repeat the icon image */
    width: 100%; /* Full-width */
    font-size: 16px; /* Increase font-size */
    padding: 12px 20px 12px 40px; /* Add some padding */
    border: 1px solid #ddd; /* Add a grey border */
    margin-bottom: 12px; /* Add some space below the input */
}

#myTable {
    border-collapse: collapse; /* Collapse borders */
    width: 100%; /* Full-width */
    border: 1px solid #ddd; /* Add a grey border */
    font-size: 18px; /* Increase font-size */
}

#myTable th, #myTable td {
    text-align: left; /* Left-align text */
    padding: 12px; /* Add padding */
}

#myTable tr {
    /* Add a bottom border to all table rows */
    border-bottom: 1px solid #ddd; 
}

#myTable tr.header, #myTable tr:hover {
    /* Add a grey background color to the table header and on hover */
    background-color: #f1f1f1;
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
  <h4><b>Menu</b></h4>
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
			<div class="col-lg-12">
				<input type="text" id="myInput" onkeyup="searchFunction()" placeholder="Search for names..">
				<table id="myTable" class="table table-bordred table-striped">
					<thead>
						<th>Name</th>
						<th>Email</th>
						<th>Department</th>
						<th>Contact</th>
						<th>Edit</th>
						<th>Delete</th>
					</thead>
					<?php
						$sql = "select * from pats";
						$result = $db->query($sql);
						$rows=$result->fetch_all(MYSQLI_ASSOC);
						echo "<tbody>";
						foreach($rows as $row){
							echo "<tr>";
								echo "<td>".$row['name']."</td>";
								echo "<td>".$row['email']."</td>";
								echo "<td>".$row['department']."</td>";
								echo "<td>".$row['contact']."</td>";
								echo "<td><p data-placement=\"top\" data-toggle=\"tooltip\" title=\"Edit\"><button class=\"btn btn-primary btn-xs\" data-title=\"Edit\" data-toggle=\"modal\" onclick=\"document.getElementById('".$row['name']."').style.display='block'\"><span class=\"glyphicon glyphicon-pencil\"></span></button></p></td>";
								echo "<td><p data-placement=\"top\" data-toggle=\"tooltip\" title=\"Delete\"><button class=\"btn btn-danger btn-xs\" data-title=\"Delete\" data-toggle=\"modal\" onclick=\"document.getElementById('".$row['email']."').style.display='block'\"data-target=\"#delete\" ><span class=\"glyphicon glyphicon-trash\"></span></button></p></td>";
							echo "</tr>";
						}
						echo "</tbody>";
					?>
				</table>
			</div>
		</div>
	</div>
		<br>
	<br>
	<br>
	<br>
	<br>
	<br>
	<br>
	<br>
	<br>
	<br>
	<br>
	<br>
	<br>
	<br>
	
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
	
	
	<?php
		
				
					$result2=$db->query("select * from pats");
			  while($rows3=$result2->fetch_assoc()){
				echo"<div id=\"".$rows3['name']."\" class=\"modal\" style=\"min-height:500px;\">";
				echo"<form class=\"modal-content animate\"  style=\"width:400px\" action=\"savedatapats.php\" method=\"POST\">";
				echo"<div class=\"imgcontainer\" style=\"padding-bottom:-10px\">";
				echo"<span onclick=\"document.getElementById('".$rows3['name']."').style.display='none'\" class=\"close\" title=\"Close Modal\">&times;</span>";
				echo "<div class=\"avatar\">";
				echo '<img src="data:image;base64,'.base64_encode($rows3['images']).'"style="width:128px;height:128px">';
				echo "</div>";
				echo"<h6>Upload a different photo...</h6>";
				echo"<input type=\"file\" name=\"image\" class=\"text-center center-block well well-sm\">";
				echo"</div>";

			  echo"<div class=\"container\" style=\"width:100%;\">";			  
			   echo"<label><b>Name</b></label><br>";
			  echo"<input type=\"text\" placeholder=\"Enter Name\" name=\"uname\" value=\"".$rows3['name']."\" >";
			  echo"<br>";
			  echo"<label><b>Department</b></label><br>";
			  echo"<input type=\"text\" placeholder=\"Enter Department\" name=\"udept\" value=\"".$rows3['department']."\">";
			  echo"<br>";
			  echo"<label><b>Email</b></label><br>";
			  echo"<input type=\"text\" placeholder=\"Enter Email\" name=\"uemail\" value=\"".$rows3['email']."\">";
			  echo "<input type=\"hidden\" placeholder=\"Enter Email\" name=\"mail\" value=\"".$rows3['email']."\">";
			  echo"<br>";
			  echo"<label><b>Contact</b></label><br>";
			  echo"<input type=\"text\" placeholder=\"Enter Contact Number\" name=\"ucontact\" value=\"".$rows3['contact']."\">";
			  echo"<br>";
			  echo"<label><input type=\"checkbox\" name=\"checkingbox\" value=\"password\">Change Password</label>";
			  echo"<div class = \"changePassword boxShow\">";
					echo"<br>";
					echo"<input type=\"password\" placeholder=\"Enter new Password\" name=\"new\">";
					echo"<br>";
					echo"<input type=\"password\" placeholder=\"Confirm new Password\" name=\"renew\">";
			  echo"</div>";
			  echo"<button type=\"submit\">Save</button>";
			echo"</div>";
			echo"<div class=\"container\" style=\"background-color:#f1f1f1; width:100%;\"></div>";
		   echo"</form>";
		   echo"</div>";
		   }
	
	
   ?>
	
	<?php
							$sql1 = "select name,email from pats";
							$result1 = $db->query($sql);
						
		
		while($rows1=$result1->fetch_assoc()){
				echo "<div id=\"".$rows1['email']."\" class=\"modal w3-padding-128\">";
				echo"<form class=\"modal-content animate\" action=\"deletepat.php\" style=\"width:400px\" method=\"post\">";
				echo "<div class=\"container\" style=\"width:100%;\">";
				echo "<h3>Are you sure you want to delete this student?</h3>
				</div>";
				echo "<div class=\"w3-row container\" style=\"background-color:#f1f1f1; width:100%;\">";
				echo "<input type=\"hidden\" name=\"email\" value=\"".$rows1['email']."\">";
				echo "<div class=\"w3-half\"><button name=\"name\" type=\"submit\" value=\"".$rows1['name']."\">Yes</button></div>";
				echo "</form>";
				echo "<div class=\"w3-half\"><button class=\"btn-danger\" onclick=\"document.getElementById('".$rows1['email']."').style.display='none'\">No</button></div>";
				echo "</div></div>";
		
		}
		
	
	?>
	
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

function searchFunction() {
  // Declare variables 
  var input, filter, table, tr, td, i;
  input = document.getElementById("myInput");
  filter = input.value.toUpperCase();
  table = document.getElementById("myTable");
  tr = table.getElementsByTagName("tr");

  // Loop through all table rows, and hide those who don't match the search query
  for (i = 0; i < tr.length; i++) {
    td1 = tr[i].getElementsByTagName("td")[0];
	td2 = tr[i].getElementsByTagName("td")[1];
	td3 = tr[i].getElementsByTagName("td")[2];
	td4 = tr[i].getElementsByTagName("td")[3];
	td5 = tr[i].getElementsByTagName("td")[4];
    if (td1 || td2 || td3 || td4 || td5) {
      if (td1.innerHTML.toUpperCase().indexOf(filter) > -1||td2.innerHTML.toUpperCase().indexOf(filter) > -1||td3.innerHTML.toUpperCase().indexOf(filter) > -1
	  ||td5.innerHTML.toUpperCase().indexOf(filter) > -1||td4.innerHTML.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    } 
	
  }
}

</script>

</body>
</html>