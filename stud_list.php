<!-- PHP code to establish connection with the localserver -->
<?php
session_start();
// Username is root
$user = 'root';
$password = '';

// Database name is geeksforgeeks
$database = 'root';

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
$sql = " SELECT * FROM student ORDER BY roll ASC ";
$result = $mysqli->query($sql);
$mysqli->close();
?>
<!-- HTML code to display data in tabular format -->
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<title>Student List</title>
	<!-- CSS FOR STYLING THE PAGE -->
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    
</head>

<style>
		table {
		margin: 0 auto;
		font-size: large;
		border: 1px solid black;
		border-radius: 10px;
	}

	h1 {
		text-align: center;
		color: #006600;
		font-size: xx-large;
		font-family: 'Gill Sans', 'Gill Sans MT', ' Calibri', 'Trebuchet MS', 'sans-serif';
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
		width: Justify;
		padding: 10px 40px 10px 40px;
	}

	td {
		font-weight: lighter;
		text-align: center;
		width: Justify;
		padding: 10px 40px 10px 40px;
	}
	
</style>

<body>
<nav class="navbar navbar-expand-lg navbar-light" style="background-color: aqua; margin-right:0px; margin-left:0px;">
            <a class="navbar-brand" href="#">Attendance</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
        <div class="navbar-nav">
            <a class="nav-item nav-link active" href="adminpage.php">Home</a>
            <a class="nav-item nav-link active" href="logout.php">Logout</a>
            <i style="margin:7px 5px 0px 750px" class="material-icons">person</i>
            <h6>
            <strong>
                    <?php 
                    echo $_SESSION['username'];
    
                    if (!isset($_SESSION['username'])) {
                        $_SESSION['msg'] = "You have to log in first";
                        header('location: index.php');
                    }
                    ?>
            </strong><h6>
        </div>
    </div>
</nav>

<section>
		<h1>Student List</h1>
		<!-- TABLE CONSTRUCTION -->
		<table>
			<tr>
				<th>Roll no.</th>
				<th>Name</th>
				<th>Address</th>
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
				<td><?php echo $rows['roll'];?></td>
				<td><?php echo $rows['name'];?></td>
				<td><?php echo $rows['address'];?></td>
			</tr>
			<?php
				}
			?>
		</table>
	</section>
</body>

</html>
