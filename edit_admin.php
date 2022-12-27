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

    $username = mysqli_real_escape_string($db, $_POST['username']);

    $sql = " DELETE FROM users WHERE username='$username' ";
    $result = mysqli_query($db, $sql);

    if ($result == 1) {
             
        $_SESSION['success'] = "User Deleted Successffully !";
        header('location: show.php');
        session_destroy();
        unset($_SESSION['username']);
        echo "user deleted!";
    }
    else {
    array_push($errors, "Username incorrect or doesn't exit !");
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
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
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
        height: 250px;
        width: 530px;
        background-color: white;
        border-radius: 10px;
        padding: 20px 50px 30px 50px;
        margin: 30px 0 0 0;
    }

    .mybox2{
        height: 200px;
        width: 530px;
        background-color: white;
        border-radius: 10px;
        padding: 20px 50px 30px 50px;
        margin: 30px 0 0 0;
    }

    .button{
        width: 80px;
        padding: 7px;
        border-radius: 5px;
        margin:10px 20px 20px 40px;
        background-color: rgb(0, 225, 255);
        border:none;
     }
     .button:hover{
        background-color: darkorchid;
        color:white;
    }

    .button2{
        width: 150px;
        padding: 7px;
        border-radius: 5px;
        margin:0px 0px 10px 40px;
        background-color: rgb(0, 225, 255);
        border:none;
     }
     .button2:hover{
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
        <form method="post" action="edit_admin.php">
            <div align="center">
                <h3 style="color:black; margin-top:30px;" >Edit Users Details</h3>
            </div>

            <div class="row">
                <div class="col-sm"></div>
                    <div class="col-md mybox"> 
                        <h4 style="margin-left:40px">Enter Username to delete your account !</h4>
                        <input class="boxes form-control" style="margin-top: 30px;" type="text" name="username" placeholder="Username" required="" autofocus=""><br>
                        <button class="button" type="submit" name="dilet">Delete</button>
                    </div>
                <div class="col-sm"></div>
            </div><br>
            <h5 style="text-align:center";>OR</h5>
            <div class="row">
                <div class="col-sm"></div>
                    <div class="col-md mybox2"> 
                        <h4 style="margin-left:40px">Update user details</h4><br>
                        <div class="row">
                            <div class="col-sm">
                                <button type="button" style="" class="button2" data-toggle="modal" data-target="#myModal1">Update Name</button>
                            </div>
                            <div class="col-sm">
                                <button type="button" class="button2" data-toggle="modal" data-target="#myModal2">Update Username</button>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm"> 
                                <button type="button" class="button2" data-toggle="modal" data-target="#myModal3">Update Email</button>
                            </div>
                            <div class="col-sm">
                                <button type="button" class="button2" data-toggle="modal" data-target="#myModal4">Update Password</button>
                            </div>
                        </div>
                    </div>
                <div class="col-sm"></div>
            </div>
        </form>
    </section>

    <!--modal name-->
    <div class="modal fade" id="myModal1" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">   
                    <h4 class="modal-title" style="margin-left:40px">Enter Users's details</h4>
                    <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close">
                </div>
                <div class="modal-body">
                    <form method="post" action="edit.php">
                        <div class="">
                            <input class="boxes form-control" type="text" name="name" placeholder="Enter Username" required="" autofocus="">
                            <input class="boxes form-control" type="text" name="name" placeholder="Enter New Name" required="" autofocus="">
                            <button class="button" type="submit"  name="updet">Submit</button>
                            <button type="button" class="button" data-dismiss="modal">Back</button>
                        </div>
                    </form>               
                </div>
            </div>
        </div>
    </div>
  
    <!--modal username-->
    <div class="modal fade" id="myModal2" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">   
                    <h4 class="modal-title" style="margin-left:40px">Enter Users's new details</h4>
                    <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close">
                </div>
                <div class="modal-body">
                    <form method="post" action="edit.php">
                        <div class="">
                            <input class="boxes form-control" type="text" name="name" placeholder="Enter Email" required="" autofocus="">
                            <input class="boxes form-control" type="text" name="name" placeholder="Enter New Username" required="" autofocus="">
                            <button class="button" type="submit"  name="updet">Submit</button>
                            <button type="button" class="button" data-dismiss="modal">Back</button>
                        </div>
                    </form>               
                </div>
            </div>
        </div>
    </div>

    <!--modal email-->
    <div class="modal fade" id="myModal3" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">   
                    <h4 class="modal-title" style="margin-left:40px">Enter Users's new details</h4>
                    <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close">
                </div>
                <div class="modal-body">
                    <form method="post" action="edit.php">
                        <div class="">
                            <input class="boxes form-control" type="text" name="name" placeholder="Enter Username" required="" autofocus="">
                            <input class="boxes form-control" type="text" name="name" placeholder="Enter New Email" required="" autofocus="">
                            <button class="button" type="submit"  name="updet">Submit</button>
                            <button type="button" class="button" data-dismiss="modal">Back</button>
                        </div>
                    </form>               
                </div>
            </div>
        </div>
    </div>

    <!--modal password-->
    <div class="modal fade" id="myModal4" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">   
                    <h4 class="modal-title" style="margin-left:40px">Enter Users's new details</h4>
                    <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close">
                </div>
                <div class="modal-body">
                    <form method="post" action="edit.php">
                        <div class="">
                            <input class="boxes form-control" type="text" name="name" placeholder="Enter Username" required="" autofocus="">
                            <input class="boxes form-control" type="text" name="name" placeholder="Enter New Password" required="" autofocus="">
                            <button class="button" type="submit"  name="updet">Submit</button>
                            <button type="button" class="button" data-dismiss="modal">Back</button>
                        </div>
                    </form>               
                </div>
            </div>
        </div>
    </div>

</body>
</html>