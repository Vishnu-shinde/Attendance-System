<?php

$username = "";
$email    = "";
$errors = array();
$_SESSION['success'] = "";

$db = mysqli_connect('localhost', 'root', '', 'root');

if (isset($_POST['reset'])) {
  
    $username = mysqli_real_escape_string($db, $_POST['username']);
    $password_1 = mysqli_real_escape_string($db, $_POST['password_1']);
    $password_2 = mysqli_real_escape_string($db, $_POST['password_2']);
  
    if (empty($username)) { array_push($errors, "Username is required"); }
    if (empty($password_1)) { array_push($errors, "Password is required"); }
    if (empty($password_2)) { array_push($errors, "Password is required"); }
  
    if ($password_1 != $password_2) {
        array_push($errors, "The two passwords do not match");
    
    }
  
    if (count($errors) == 0) {
         
        $password = md5($password_1);
         
        $query = "UPDATE users set password='" . $_POST['password_1'] . "' WHERE username='" . $_POST['username'] . "'";
        
        mysqli_query($db, $query); 

        if (count($errors) == 0) {
             
            $_SESSION['success'] = "Password reset Successfull !";
            header('location: index.php');
        }
        else {
        array_push($errors, "username incorrect or doesn't exit !");
        }
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
    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"> -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
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
        width: 130px;
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
        margin: 0px 0px 0px 40px;
        width: 400px;
        padding: 8px;
        font-weight: bold;
        border-radius: 5px;
        background-color: rgb(191, 228, 254);
        align:center;
        border:none;
    }

</style>

<body>
<section>
        <form method="post" action="forgot.php">
            <div align="center">
                <h2 style="color:black; margin-top:30px;" >Password reset</h2>
            </div>

            <div class="row">
                <div class="col-sm"></div>
                    <div class="col-md mybox"> 
                        <h4 style="margin-left:40px">Enter details</h4>
                        <input class="boxes" style="margin-top: 30px;" type="text" name="username" placeholder="Username" required="" autofocus=""><br>
                        <input class="boxes" style="margin-top: 30px;" type="password" name="password_1" placeholder="New Password" required="" autofocus=""><br>
                        <input class="boxes" style="margin-top: 30px;" type="password" name="password_2" placeholder="confirm Password" required="" autofocus=""><br>
                        <button class="button" type="submit" name="reset">Reset Password</button>
                        or
                        <a href="index.php" style="margin-left:20px">Back</a>
                    </div>
                <div class="col-sm"></div>
            </div>
        </form>
    </section>

</body>
</html>