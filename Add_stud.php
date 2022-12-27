<?php include('server.php')?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    
    <title>Student Addmission</title>
</head>

<style>
    body{
        background-color: rgb(236, 223, 223);
    }

    .mybox{
        height: 400px;
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
        margin:20px 20px 20px 40px;
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
        <form method="post" action="Add_stud.php">
            <div class="row">
                <div class="col-sm"></div>
                <div class="mybox col-md">
                    <h3 align="center" style="color:darkslateblue">Student Addmission</h3> 
                    <input class="boxes from-control" style="margin-top:30px" type="number" name="roll" placeholder="Enter Roll no." required="" autofocus="">
                    <input class="boxes from-control" type="text" name="name1" placeholder="Enter Name" required="" autofocus="">
                    <input class="boxes from-control" type="email" name="email1" placeholder="Enter Email" required="" autofocus="">
                    <input class="boxes from-control" type="text" name="address" placeholder="Enter address" required="" autofocus="">
                    <button class="button" type="submit"  name="add_stud" href="#">Add</button>
                </div>
                <div class="col-sm"></div>
            </div>
        </form>
</section>

</body>
</html>