<?php
session_start();

$username = "";
$email    = "";
$errors = array();
$_SESSION['success'] = "";

$db = mysqli_connect('localhost', 'root', '', 'root');

if(isset($_POST['checked']))
{
	$date = mysqli_real_escape_string($db, $_POST['date']);
	$query = " ALTER TABLE attendance ADD `$date` varchar(30) ";  
	mysqli_query($db,$query);
	      	
	$checkbox1=$_POST['techno'];
	
	$rol="0";
	// $chk=""; 
	foreach($checkbox1 as $chk1)
	{	
		// $chk .= $chk1.","; 
		$rol = $rol+1;
		$query = " UPDATE attendance SET `$date`='$chk1' where roll='$rol'";
		$in_ch=mysqli_query($db, $query);
		if($in_ch==1)  
   		{  
     		$alert = "<script>alert('Inserted Successfully')</script>";
			echo $alert;
   		}  
		else  
   		{  
      		$alert = "<script>alert('Failed To Insert')</script>";  
			echo $alert;
   		}  
	} 
		
	header('location: adminpage.php');
	}
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>

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
	
	.section{
		margin:50px 0px 0px 0px;
	}

	.mydate{
		font-weight: Bold;
		text-align: center;
	}
		
	.button{
    width: 80px;
    padding: 5px;
    border-radius: 5px;
    margin:0px 20px 0px 40px;
    background-color: rgb(0, 225, 255);
    border:none;
    }
    .button:hover{
    background-color: darkorchid;
    color:white;
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
            <a class="nav-item nav-link active" href="stud_list.php">Student List</a>
            <a class="nav-item nav-link active" href="logout.php">Logout</a>
            <i style="margin:7px 5px 0px 750px" class="material-icons">person</i>
            <h6>
            <strong>   
                    <?php 
                    echo $_SESSION['username'];
                    ?>
            </strong><h6>
        </div>
    </div>
</nav>

<section class="section">
    <form action="mark_At.php" method="post">
		<div class="mydate">
			<label for="date">Enter Date:</label>
			<input type="date" name="date" min="2010-01-01" max="<?= date('Y-m-d'); ?>" required>
		</div><br>
		<table>
        	    <tr>
					<td colspan="3"><strong><span style="font-weight:bold;">Get Attendance</span></strong></td>
				</tr>
			<?php
				
				$user = 'root';
				$password = '';
				
				$database = 'root';
				
				$servername='localhost:3306';
				$mysqli = new mysqli($servername, $user,
								$password, $database);
				
				if ($mysqli->connect_error) {
					die('Connect Error (' .
					$mysqli->connect_errno . ') '.
					$mysqli->connect_error);
				}
				
				extract($_POST);
				$sql = " SELECT * FROM student ORDER BY roll ASC ";
				$result = $mysqli->query($sql);
				$mysqli->close();
				?>

			<tr>
				<th>Roll no.</th>
				<th>Name</th>
				<th>Status</th>
			</tr>
			<?php
				while($rows=$result->fetch_assoc())
				{
			?>
			<tr>
				<td><?php echo $rows['roll'];?></td>
				<td><?php echo $rows['name'];?></td>
				
				<td>
					<input type="checkbox" name="techno[]" id="p" value="P">P
					<input type="checkbox" name="techno[]" id="a" checked value="A">A
				</td>
			</tr>
			
			<?php
				}
			?>

			<tr>
              	<td colspan="3">
					<div align="center">		
            			<input class="button" type="submit" name="checked">&nbsp;&nbsp;
					</div>
				</td>
            </tr>
		</table>	

    </form>
</section>

</body>
</html>