<?php include('server.php') ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <!-- <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css"> -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <title>Admin</title>
</head>
<style>

    .options{
        margin-top: 117px;
        margin-bottom: 140px;
        margin-right:0px;
        margin-left:0px;
        width:100%;
    }

    .mysec{
        margin-top: 100px;
        margin-bottom: 100px;
        margin-right:0px;
        margin-left:0px;
        width:100%;
    }

    .sizebut{
        width: 180px;
        height:80px;
        padding: 6px;
        border-radius: 5px;
        margin:0px 20px 0px 20px;
        background-color: aqua;
		border: none;
        color: black;
     }
     .sizebut:hover{
        background-color: darkorchid;
        color:white;
     }

     .footing{
	background-color:black;
    color:white;
    padding: 4% 25%;
    padding-top:50px;
    text-align: center;
    margin:0px 0px 0px 0px;
    height: 150px;
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
            <a class="nav-item nav-link active" href="#">Settings</a>
            <a class="nav-item nav-link active" href="#">More</a>
            <a class="nav-item nav-link active" href="logout.php">Logout</a>
            <i style="margin:7px 5px 0px 700px" class="material-icons">person</i>
            <h6 style="margin:8px 5px 0px 0px">
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
</nav><!--
    --><section class="options">
            <div class="row">
                <div class="col-sm"></div>
                <div class="col-md">
                    <a href="mark_At.php"><button class="sizebut">Attendance<br><small>Mark Attendance</small></button></a>
                </div>
                <div class="col-md">
                    <a href="Add_stud.php"><button class="sizebut">New Addmission<br><small>New Student Addmission</small></button></a>
                </div>
                <div class="col-md">
                    <a href="edit.php"><button class="sizebut">Edit Student Details<br><small>update, delete</small></button></a>
                </div>
                <div class="col-sm"></div>
            </div>                   
    </section><!--

    --><section class="mysec">
            <div class="row">
                <div class="col-sm"></div>
                <div class="col-md">
                    <a href="stud_list.php"><button class="sizebut">Class List<br><small>All students details</small></button></a>
                </div>
                <div class="col-md">
                    <a href="#"><button class="sizebut">Report<br><small>Student Attendance Report</small></button></a>
                </div>
                <div class="col-md">
                    <a href="edit_admin.php"><button class="sizebut">Edit Admin Details</button></a>
                </div>
                <div class="col-sm"></div>
            </div>                   
    </section><!--

    --><footer class="footing">

        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <a  class="linkedin" href="#"><i class="social-icon fa fa-linkedin" aria-hidden="true"></i> linkedin</a><br>
        <a  class="github" href="#"><i class="social-icon fa fa-github" aria-hidden="true"></i> github</a><br><br>
        
        <div class="row">
                <div class="col-sm"><small>Terms and services</small></div>
                <div class="col-md">
                <small>Privacy policies</small>
                </div>
                <div class="col-md">
                <small>Copyright</small></li>
                </div>
                <div class="col-md">
                <small>&copy;vishnu2022</small>
                </div>
                <div class="col-sm"><small>&reg;team vishnu</small></div>
        </div>   
    </div>    
</footer>

</body>
</html>