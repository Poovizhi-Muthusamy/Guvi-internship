<!-- PHP code to establish connection with the localserver -->
<?php

session_start();

// Username is root
$user = 'root';
$password = '';

// Database name is geeksforgeeks
$database = 'guvi';

// Server is localhost with
// port number 3306
$servername='localhost:3306';
$mysqli = new mysqli($servername, $user,
				$password, $database);

// Checking for connections
if ($mysqli->connect_error) {
	die('Connect Error (' .
	$mysqli->connect_errno . ') '.
	$mysqli->connect_error);
}

// SQL query to select data from database
$sql = " SELECT * FROM profile WHERE email = '" . $_SESSION['login_user'] ."'";
$result = $mysqli->query($sql);
$mysqli->close();
?>
<!-- HTML code to display data in tabular format -->
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
  <script src="jquery-3.3.1.min.js"></script>
  <link rel="stylesheet" href="./style.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
 <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/11.4.24/sweetalert2.all.js"></script>
	<title>GFG User Details</title>
	<!-- CSS FOR STYLING THE PAGE -->
	<style>
		table {
			margin: 0 auto;
			font-size: large;
			border: 1px solid black;
		}

		h1 {
			text-align: center;
			color: #006600;
			font-size: xx-large;
			font-family: 'Gill Sans', 'Gill Sans MT',
			' Calibri', 'Trebuchet MS', 'sans-serif';
		}

		td {
			background-color: #E4F5D4;
			border: 1px solid black;
		}

		th,
		td {
			font-weight: bold;
			border: 1px solid black;
			padding: 10px;
			text-align: center;
		}

		td {
			font-weight: lighter;
		}
	</style>
</head>

<body>
	<section>
		<h1>dashboard</h1>
		<!-- TABLE CONSTRUCTION -->
		<table>
			<tr>
				<th>First Name</th>
				<th>Last Name</th>
				<th>DOB</th>
				<th>Age</th>
        <th>number</th>
        <th>Address</th>
        <th>City</th>
        <th>State</th>
        <th>Zip</th>
		<th>EMail</th>
			</tr>
			<!-- PHP CODE TO FETCH DATA FROM ROWS -->
			<?php
				// LOOP TILL END OF DATA
				while($rows=$result->fetch_assoc())
				{
			?>
			<tr>
				<!-- FETCHING DATA FROM EACH
					ROW OF EVERY COLUMN -->
				<td><?php echo $rows['fname'];?></td>
				<td><?php echo $rows['lname'];?></td>
				<td><?php echo $rows['dob'];?></td>
				<td><?php echo $rows['age'];?></td>
        <td><?php echo $rows['num'];?></td>
        <td><?php echo $rows['addr'];?></td>
        <td><?php echo $rows['city'];?></td>
        <td><?php echo $rows['state'];?></td>
        <td><?php echo $rows['zip'];?></td>
		<td><?php echo $rows['email'];?></td>
			</tr>
			<?php
				}
			?>
		</table>
	</section>
  <div class="col-12">
    <button type="submit" name="regg"class="btn btn-primary" onclick="back();">Edit</button>
  </div>
  <script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script>
              function back(){
           
                 window.location.href="profile.php?edit=1";}
        </script>
</body>

</html>
