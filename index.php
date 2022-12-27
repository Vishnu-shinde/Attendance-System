<?php include('server.php') ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign in</title>
	<!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    </head>

<style>
    body{
        background-color: rgb(236, 223, 223);
    }

    .mybox{
        height: 500px;
        width: 800px;
        background-color: white;
        border-radius: 10px;
        padding: 70px 70px 70px 70px;
        margin: 100px 350px 100px 350px;
    }

    #para{
        text-align: center;
    }

    .form-control
    {
        margin: 20px 90px 20px 80px;
        width: 500px;
        padding: 8px;
        text-decoration:rgb(6, 123, 206);
        font-weight: bold;
        border-radius: 5px;
        border-width: 2px;
        background-color:rgb(191, 228, 254);
		align:center;
    }
     .button{
        width: 100px;
        padding: 6px;
        border-radius: 5px;
        margin:20px 20px 20px 80px;
        background-color: rgb(0, 225, 255);
		border:none;
     }
     .button:hover{
        background-color: darkorchid;
        color:white;
     }

     .mydiv{
        margin: 0px 0px 0px 240px;
     }


</style>

<body>
    <section>
        <form method="post" action="index.php">
            <div class="mybox">
                <!-- <img class="mydiv" src="data:image/png;base64,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" alt="Smartknower" height="40px" width="120px"> -->
                <h2 style="color:cornflowerblue" align="center">Welcome to Attendance System</h2>
				<h5 style="color:cornflowerblue; padding: 0px;" align="center">You need to sign in first !</h5>
                <h2 align="center" style="color:darkslateblue">Sign In</h2> 
                <input class="form-control" id="username" type="text" name="username" placeholder="username" required="" autofocus="">
                <input class="form-control" id="password" type="password" name="password" placeholder="password" required="" autofocus="">
                <button class="button" type="submit"  name="login">Sign in</button>
                <a href="forgot.php">forgot password ?</a>        
                 or
                <a href="attendance_signup.php" style="margin-left:20px;">create a new account !</a>
           
            </div>
        </form>
    </section>
</body>
</html>