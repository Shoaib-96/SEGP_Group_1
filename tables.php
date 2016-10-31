<html>

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
.btn{ border-radius: 50%; width:32px; height:32px; line-height:18px;  }

#myInput {
    background-image: url('searchicon.png'); /* Add a search icon to input */
	background-size: 35px 35px;
    background-position: 3px 4px; /* Position the search icon */
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
	include 'database.php';
	if($_SESSION['status']=="teacher"){
		
				$sql= "SELECT * FROM `students` ORDER BY `students`.`year` ASC";
				$result = $db->query($sql);

				// Check connection
				if ($db->connect_error) {
					die("Connection failed: " . $db->connect_error);
				} 
				echo "Connected successfully";	
					if ($result->num_rows > 0) {
						echo "<div class=\"w3-row w3-padding-128\">";
						echo "<div class=\"w3-rest w3-container\">";
						echo "<div class=\"col-md-12\">";
									echo "<input type=\"text\" id=\"myInput\" onkeyup=\"searchFunction()\" placeholder=\" Search Data..\">";

									echo "<table id=\"myTable\">";
									  echo "<tr class=\"header\">";
										echo "<th>UoB</th>";
										echo"<th>Name</th>";
										echo"<th>Email</th>";
										echo"<th>Year</th>";
										echo"<th>Contact</th>";
										echo"<th>PAT</th>";
									  echo "</tr>";
							while($row = $result->fetch_assoc()) {
									echo "<tr><td>".$row["UOB"]."</td><td>".$row["name"]."</td><td> ".$row["email"]."</td><td>".$row["year"]."</td><td>".$row["contact"]."</td><td>".$row["pat_name"]."</td></tr>";
							}
									echo "</table></div></div></div>";
			}
				
		}
	if($_SESSION['status']=="registrar"){
		
				$sql= "SELECT * FROM `students` ORDER BY `students`.`year` ASC";
				$result = $db->query($sql);

				// Check connection
				if ($db->connect_error) {
					die("Connection failed: " . $db->connect_error);
				} 
				echo "Connected successfully";	
					if ($result->num_rows > 0) {
						echo "<div class=\"w3-row w3-padding-128\">";
						echo "<div class=\"w3-rest w3-container\">";
						echo "<div class=\"col-md-12\">";
									echo "<input type=\"text\" id=\"myInput\" onkeyup=\"searchFunction()\" placeholder=\" Search Data..\">";

									echo "<table id=\"myTable\">";
									  echo "<tr class=\"header\">";
										echo "<th>UoB</th>";
										echo"<th>Name</th>";
										echo"<th>Email</th>";
										echo"<th>Year</th>";
										echo"<th>Contact</th>";
										echo"<th>PAT</th>";
									  echo "</tr>";
							while($row = $result->fetch_assoc()) {
									echo "<tr><td>".$row["UOB"]."</td><td>".$row["name"]."</td><td> ".$row["email"]."</td><td>".$row["year"]."</td><td>".$row["contact"]."</td><td>".$row["pat_name"]."</td></tr>";
							}
									echo "</table></div></div></div>";
			}
				
		}
	if($_SESSION['status']=="student"){
	
			$sql= "SELECT UOB,name,email,year,pat_name FROM `students` ORDER BY `students`.`year` ASC";
			$result = $db->query($sql);

			// Check connection
			if ($db->connect_error) {
				die("Connection failed: " . $db->connect_error);
			} 
			echo "Connected successfully";	
				if ($result->num_rows > 0) {
					echo "<div class=\"w3-row w3-padding-128\">";
					echo "<div class=\"w3-rest w3-container\">";
					echo "<div class=\"col-md-12\">";
								echo "<input type=\"text\" id=\"myInput\" onkeyup=\"searchFunction()\" placeholder=\" Search Data..\">";

								echo "<table id=\"myTable\">";
								  echo "<tr class=\"header\">";
									echo "<th>UoB</th>";
									echo"<th>Name</th>";
									echo"<th>Email</th>";
									echo"<th>Year</th>";
									//echo"<th>Contact</th>";
									echo"<th>PAT</th>";
								  echo "</tr>";
						while($row = $result->fetch_assoc()) {
								echo "<tr><td>".$row["UOB"]."</td><td>".$row["name"]."</td><td> ".$row["email"]."</td><td>".$row["year"]."</td><td>".$row["pat_name"]."</td></tr>";
						}
								echo "</table></div></div></div>";
		}
			
	}


?>
<script>
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