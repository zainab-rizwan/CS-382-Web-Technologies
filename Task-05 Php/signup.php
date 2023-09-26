<?php
require('connection.php');
if (isset($_REQUEST['username'])){

    $username = stripslashes($_REQUEST['username']);
    $username = mysqli_real_escape_string($conn,$username); 
    $email = $_REQUEST["email"];
    $email = filter_var($email, FILTER_SANITIZE_EMAIL);
    $email = filter_var($email, FILTER_VALIDATE_EMAIL);
    $password = stripslashes($_REQUEST['password']);
    $password = mysqli_real_escape_string($conn,$password);
    $pass=md5($password);

    $sql1 =("SELECT * FROM wt WHERE email=?");
    $stmt = $conn->prepare($sql1); 
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result1 = $stmt->get_result();

    $_SESSION['username'] = $usename;

    if (mysqli_num_rows($result1)> 0) 
    {
     echo
        $_SESSION['message'] = "An account with this email already exists"; 
        $_SESSION['msg_type'] = "error";
        header('location: signup.php');  
    }
    else
    {
      $sql1="INSERT into wt (username, email, password) VALUES (?, ?, ?)";

      $stmt = $conn->prepare($sql1); 
      $stmt->bind_param("sss", $username, $email, $pass);
      $result1 = $stmt->execute();
      if($result1)
      {
          echo
          $_SESSION['message'] = "User registered successfully."; 
          $_SESSION['msg_type'] = "success";
      }
    }
  
}
    else{

?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<title>Register User</title>
<style type="text/css">
html {
     height: 100%;
     width: 100%;
 }

 body {
     background-size: cover;
 }
 /******************Navbar******************/
   ul {
    list-style-type: none;
    margin: 0;
    padding: 0;
    overflow: hidden;
    border: 1px solid #e7e7e7;
    background-color: white;
  }

  li {
    float: right;
  }

  li a {
    display: block;
    color: #666;
    text-align: center;
    padding: 14px 16px;
    text-decoration: none;
  }

  li a:hover:not(.active) {
    background-color: #ddd;
  }

  li a.active {
    color: white;
    background-color: #04AA6D;
  }

 /***********Alerts***********/
 .alert
  {
      padding: 20px;
      background-color: #f44336; /* Red */
      color: white;
      margin-bottom: 15px;
  }

/***********Registration form***********/
 #container {
     background-color: black;
     padding: 3em;
     opacity: 0.75;
     width: 0 auto;
     width: 70%;
     margin: 7rem;
 }

 h3 {
     text-align: center;
     vertical-align: middle;
     line-height: 3rem;
     height: 3rem;
     color: white;
 }

 fieldset {
     border: 0;
     text-align: center;
 }

 /***********Input fields***********/
 input[type="submit"] {
     border: 1px solid black;
     display: block;
     width: 12em;
     height: 3em;
     margin: 0 auto;
     color: black;
     background-color: white;
     padding: 0.7rem;
     cursor: pointer;
     border-radius: 15px;
 }

 input[type="submit"]:hover {
     background-color: black;
     color: white;       
     border: 1px solid white;
 }

 input {
     background: transparent;
     border-bottom: 1px solid white;
     border-top: 0;
     border-left: 0;
     border-right: 0;
     padding: 10px;
     width: 25rem;
     color: white;
 }

 input[type="text"]:focus,
 input[type="email"]:focus,
 input[type="password"]:focus {
     outline: 0;
     border-color: transparent;
     border: 1px solid white;

 }

 ::placeholder {
     color: #d3d3d3;
 }

 /***********Alert************/
   .alert-success
   {
    background-color: #39C16C ;
   }

</style>
</head>
<body>
    <!---------Navbar-------->
  <ul>
  </ul>

  <!-----------Alert------------>
   <?php if (isset($_SESSION['message'])): ?>
  <div class="alert alert-<?=$_SESSION['msg_type']?>" >
    <?php 
      echo $_SESSION['message']; 
      unset($_SESSION['message']);
    ?>
  </div>
  <?php endif ?>
    <br>
  <!-----------Registration Form------------>
<div style="display:flex; justify-content: center;">
 <div id="container" class="form">
         <h3>Sign Up</h3>
         <form name="registration" action="dashboard.php" method="post">
            <fieldset>
               <br/>
               <input type="text" name="username" id="username" placeholder="Username" required autofocus>
               <br/><br/>
               <input type="email" name="email" id="email" placeholder="Email" required>
               <br/><br/>
               <input type="password" name="password" id="password" placeholder="Password" required>
               <br/><br/>
               <label for="submit"></label>
               <input type="submit" name="submit" value="Sign Up"/>
               <br><br>
            </fieldset>
         </form>
      </div>
  <?php }; ?>
</div>
</body>
</html>