<?php
session_start();
$username = "";
$email    = "";
$errors = array();
$_SESSION['success'] = "";

$db = mysqli_connect('localhost', 'root', '', 'root');

if (isset($_POST['dilet'])) {

    if ($db->connect_error) {
	    die('Connect Error (' .	$mysqli->connect_errno . ') '.	$mysqli->connect_error);
    }

    $roll = mysqli_real_escape_string($db, $_POST['roll']);

    $sql = " DELETE FROM student WHERE roll='$roll' ";
    $result = mysqli_query($db, $sql);
    // $sql = " ALTER TABLE attendance DROP $name ";
    // $result2= mysqli_query($db, $sql);
    $sql = " DELETE FROM attendance WHERE roll='$roll' ";
    $result = mysqli_query($db, $sql);

    if (count($errors) == 0) {
             
        $_SESSION['success'] = "Student Deleted Successffully !";
        header('location: stud_list.php');
    }

    else {
    array_push($errors, "Roll no. incorrect or doesn't exit !");
    }
}

if (isset($_POST['updet'])) {

    if ($db->connect_error) {
	    die('Connect Error (' .	$mysqli->connect_errno . ') '.	$mysqli->connect_error);
    }

    $num= mysqli_real_escape_string($db, $_POST['num']);
    $name = mysqli_real_escape_string($db, $_POST['name']);
    $email = mysqli_real_escape_string($db, $_POST['email']);
    $address = mysqli_real_escape_string($db, $_POST['address']);
    // $nav = mysqli_real_escape_string($db, $_POST['nav']);
    
    // $query = " UPDATE student SET "name"="$name", "email"="$email", "address"="$address" WHERE roll=$num ";
    // $query = "UPDATE users SET name = '".escape($name)."', email = '".escape($email)."', address = '".escape($address)."' WHERE roll = '".escape($_GET['num'])."'";
    $query = "UPDATE student set name='" . $_POST['name'] . "', email='" . $_POST['email'] . "', address='" . $_POST['address'] . "' WHERE roll='" . $_POST['num'] . "'";
    $result= mysqli_query($db, $query);
    
    if (count($errors) == 0) {
             
        $_SESSION['success'] = "Student Deleted Successffully !";
        header('location: stud_list.php');
    }
    else {
    array_push($errors, "Roll no. incorrect or doesn't exit !");
    }
}

// if (isset($_POST['updetnav'])) {

//     if ($db->connect_error) {
// 	    die('Connect Error (' .	$mysqli->connect_errno . ') '.	$mysqli->connect_error);
//     }

    
//     $name = mysqli_real_escape_string($db, $_POST['name']);
//     $nav = mysqli_real_escape_string($db, $_POST['nav']);
    
//     // $query = " UPDATE student SET "name"="$name", "email"="$email", "address"="$address" WHERE roll=$num ";
//     // $query = "UPDATE users SET name = '".escape($name)."', email = '".escape($email)."', address = '".escape($address)."' WHERE roll = '".escape($_GET['num'])."'";
//     $query = "UPDATE student set name='" . $_POST['nav'] . "' WHERE name='" . $_POST['name'] . "'";
//     $result= mysqli_query($db, $query);

//     $query = "ALTER TABLE attendance CHANGE $name $nav varchar(10)";
//     $result= mysqli_query($db, $query);
    
//     if (count($errors) == 0) {
             
//         $_SESSION['success'] = "Student Deleted Successffully !";
//         header('location: stud_list.php');
//     }
//     else {
//     array_push($errors, "Roll no. incorrect or doesn't exit !");
//     }
// }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"> -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    
</head>

<style>
    body{
        background-color: rgb(236, 223, 223);
    }

    .mybox{
        height: 290px;
        width: 530px;
        background-color: white;
        border-radius: 10px;
        padding: 20px 50px 20px 50px;
        margin: 30px 0 0 0;
        text-align: Justify;
    }

    .button{
        width: 100px;
        padding: 7px;
        border-radius: 5px;
        margin:0px 0px 0px 40px;
        background-color: rgb(0, 225, 255);
        border:none;
     }
     .button:hover{
        background-color: darkorchid;
        color:white;
    }

    .boxes
    {
        margin: 0px 0px 10px 40px;
        width: 400px;
        padding: 10px;
        font-weight: bold;
        border-radius: 5px;
        background-color: rgb(191, 228, 254);
        align:center;
        border:none;
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
            <i style="margin:7px 5px 0px 700px" class="material-icons">person</i>
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
        <form method="post" action="edit.php">
            <div align="center">
                <h3 style="color:black; margin-top:30px;" >Edit Student Details</h3>

            <div class="row">
                <div class="col-sm"></div>
                    <div class="col-md mybox"> 
                        <h5 style="margin:40px 0px 0px 40px;">Enter Roll no. delete</h5>
                        <input class="boxes form-control" style="margin-top: 30px;" type="text" name="roll" placeholder="Roll no." required="" autofocus=""><br>
                        <button class="button" type="submit" name="dilet">Delete</button>
                        or
                        <button type="button" style="margin-left:20px" class="button" data-toggle="modal" data-target="#myModal">Update</button>
                    </div>
                <div class="col-sm"></div>
            </div>

        </form>
    </section>

    <!--modal-->
    <div class="modal fade" id="myModal" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">   
                    <h4 class="modal-title" style="margin-left:40px">Enter student's new details</h4>
                    <!-- <button type="button" class="close" data-dismiss="modal">&times;</button>  -->
                    <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close">
                </div>
                <div class="modal-body">
                    <form method="post" action="edit.php">
                        <div class="">
                            <input class="boxes form-control" type="number" name="num" placeholder="Enter Roll no." required="" autofocus="">
                            <input class="boxes form-control" type="text" name="name" placeholder="Enter new Name" required="" autofocus="">
                            <input class="boxes form-control" type="email" name="email" placeholder="Enter new Email" required="" autofocus="">
                            <input class="boxes form-control" type="text" name="address" placeholder="Enter new address" required="" autofocus="">
                            <button class="button" style="margin-right:20px" type="submit"  name="updet">Submit</button>or
                            <button type="button" style="margin-left:20px" class="button" data-dismiss="modal">Back</button>
                        </div>
                    </form>               
                </div>
            </div>
        </div>
    </div>
  
    <!--modal name-->
    <!-- <div class="modal fade" id="myModal2" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">   
                    <h4 class="modal-title" style="margin-left:40px">Enter student's new details</h4>
                    <!-- <button type="button" class="close" data-dismiss="modal">&times;</button>  
                    <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close">
                </div>
                <div class="modal-body">
                    <form method="post" action="edit.php">
                        <div class="">
                            <input class="boxes form-control" type="text" name="name" placeholder="Enter old Name" required="" autofocus="">
                            <input class="boxes form-control" type="text" name="nav" placeholder="Enter new Name" required="" autofocus="">
                            <button class="button" style="margin-right:20px" type="submit"  name="updetnav">Submit</button>or
                            <button type="button" style="margin-left:20px" class="button" data-dismiss="modal">Back</button>
                        </div>
                    </form>               
                </div>
            </div>
        </div>
    </div>
</div> -->
</body>
</html>