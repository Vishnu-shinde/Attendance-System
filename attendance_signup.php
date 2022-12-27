<?php include('server.php') ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Account</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>

<style>

    body{
        background-color: rgb(236, 223, 223);
    }

    .mybox{
        height: 500px;
        width: 530px;
        background-color: white;
        border-radius: 10px;
        padding: 20px 50px 30px 50px;
        margin: 30px 0 0 0;
    }

    .boxes
    {
        margin: 0px 0px 0px 35px;
        width: 400px;
        padding: 9px;
        font-weight: bold;
        border-radius: 5px;
        background-color: rgb(191, 228, 254);
        align:center;
    }
    
     .button{
        width: 400px;
        padding: 9px;
        border-radius: 5px;
        margin:10px 0px 10px 35px;
        background-color: rgb(0, 225, 255);
        border:none;
     }

    .button:hover{
        background-color: darkorchid;
        color:white;
    }

</style>

<body>
    <section>
        <form method="post" action="attendance_signup.php">
            <div align="center">
                <h2 style="color:cornflowerblue; margin-top:30px;" >Welcome to Attendance System</h2>
                <h5 style="color:cornflowerblue" >Regiter !</h5> 
                <h3 style="color:darkslateblue" >Enter Teacher Details</h3>
            </div>

            <div class="row">
                    <div class="col-md"></div>
                    <div class="col-md mybox"> 
                        <input class="boxes form-control" style="margin-top: 40px;" type="text" name="name" placeholder="Name" required="" autofocus=""><br>
                        <input class="boxes form-control" type="email" name="email" placeholder="E-mail" required="" autofocus=""><br>
                        <input class="boxes form-control" type="text" name="username" placeholder="username" required="" autofocus=""><br>
                        <input class="boxes form-control" type="password" id="password" name="password_1" placeholder="password" required="" autofocus=""><br>
                        <input class="boxes form-control" type="password" name="password_2" placeholder="confirm password" required="" autofocus=""><br>
                        <button class="button" type="submit" name="subbut">Register</button>
                </div>
                <div class="col-md"></div>
            </div>
        </form>
    </section>
</body>
</html>