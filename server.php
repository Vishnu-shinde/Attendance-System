<?php
session_start();
$username = "";
$email    = "";
$errors = array();
$_SESSION['success'] = "";

$db = mysqli_connect('localhost', 'root', '', 'root');

// Registration code

if (isset($_POST['subbut'])) {
  
    $name = mysqli_real_escape_string($db, $_POST['name']);
    $email = mysqli_real_escape_string($db, $_POST['email']);
    $username = mysqli_real_escape_string($db, $_POST['username']);
    $password_1 = mysqli_real_escape_string($db, $_POST['password_1']);
    $password_2 = mysqli_real_escape_string($db, $_POST['password_2']);
  
    if (empty($username)) { array_push($errors, "Username is required"); }
    if (empty($email)) { array_push($errors, "Email is required"); }
    if (empty($password_1)) { array_push($errors, "Password is required"); }
    if (empty($password_2)) { array_push($errors, "Password is required"); }
  
    if ($password_1 != $password_2) {
        array_push($errors, "The two passwords do not match");
    }
  
    if (count($errors) == 0) {
         
        $password = md5($password_1);
         
        $query = "INSERT INTO users (name, username, email, password)
                  VALUES('$name','$username', '$email', '$password_1')";
         
        mysqli_query($db, $query);
  
        $_SESSION['username'] = $username;
         
        $_SESSION['success'] = "Account created successfully !";
         
        header('location: index.php');
    }
}
  
//User login
if (isset($_POST['login'])) {
     
    $username = mysqli_real_escape_string($db, $_POST['username']);
    $password = mysqli_real_escape_string($db, $_POST['password']);
  
    if (empty($username)) {
        array_push($errors, "Username is required");
    }
    if (empty($password)) {
        array_push($errors, "Password is required");
    }
  
    if (count($errors) == 0) {
         
        $query = "SELECT * FROM users WHERE username='$username' AND password='$password'";
        $results = mysqli_query($db, $query);
        $users = $results;
        
        foreach($users as $user) {
		
             		if(($user['username'] == $username) &&
             			($user['password'] == $password)) {
                             
                            $_SESSION['username'] = $username;
             				header("location: adminpage.php");
                            echo "welcome"+$user[username];
             		}
             		else {
             			echo "<script language='javascript'>";
             			echo "alert('WRONG INFORMATION')";
             			echo "</script>";
             			die();
             		}
             	}
    }
}
  
if (isset($_POST['add_stud'])) {

    
    $roll= mysqli_real_escape_string($db, $_POST['roll']);
    $name1 = mysqli_real_escape_string($db, $_POST['name1']);
    $email1 = mysqli_real_escape_string($db, $_POST['email1']);
    $address = mysqli_real_escape_string($db, $_POST['address']);

    if (empty($roll)) { array_push($errors, "Roll No. is required"); }
    if (empty($name1)) { array_push($errors, "Name is required"); }
    if (empty($email1)) { array_push($errors, "Email is required"); }
    if (empty($address)) { array_push($errors, "Address is required"); }
    
    
    if (count($errors) == 0) {
        
            $query = "SELECT * FROM student WHERE roll='$roll'";
            $results = mysqli_query($db, $query);
            
           if (mysqli_num_rows($results) == 1) {
                
              array_push($errors, "Roll no./Name already exists !");
        }
    
  
      if (count($errors) == 0) {
         
        
        $query = "INSERT INTO student (roll, name, email, address)
                  VALUES('$roll','$name1', '$email1', '$address')";
        mysqli_query($db, $query);
  
        // $query = "ALTER TABLE attendance ADD $name1 varchar(30)";
        $query = " INSERT INTO attendance (roll) values ($roll)";
        mysqli_query($db, $query); 
        
        $_SESSION['roll'] = $roll;
        // Welcome message
        $_SESSION['success'] = "Student Added successfully !";
         
        header('location: adminpage.php');
    }
  } 
}
?>