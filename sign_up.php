<?php
include 'admin/config.php';
$con_pswd_error=null;
$name_error=null;
$password_error=null;
$ph_number_error=null;
$email_error=null;
$bunk_name_error=null;
$error=null;
$con_pswd=null;



if(isset($_POST['submit']))
{
    if(isset($_POST['name'])&&$_POST['name']!=''){
        $name=$_POST['name'];
    } else {
        $sql_true = true;
        $name_error = "please enter user name";
    }
    if(isset($_POST['email'])&&$_POST['email']!=''){
        $email=$_POST['email'];
    } else {
        $sql_true = true;
        $email_error = "please enter  email";
    }
    if(isset($_POST['ph_number'])&&$_POST['ph_number']!=''){
        $ph_number=$_POST['ph_number'];
    } else {
        $sql_true = true;
        $ph_number_error = "please enter phone number";
    }
//    if(isset($_POST['bunk_name'])&&$_POST['bunk_name']!=''){
//        $bunk_name=$_POST['bunk_name'];
//    } else {
//        $sql_true = true;
//        $bunk_name_error = "please enter  bunk name";
//    }
    if(isset($_POST['pswd'])&&$_POST['pswd']!=''){
        $password=md5($_POST['pswd']);
    } else {
        $sql_true = true;
        $password_error = "please enter password";
    }
    if(isset($_POST['con_pswd'])&&$_POST['con_pswd']!=''){
        $con_pswd=md5($_POST['con_pswd']);
    } else {
        $sql_true = true;
        $con_pswd_error = "please enter  confirm password";
    }
    if ($password!=$con_pswd){
        $error="please match password";
        $sql_true = true;
    }
    if($name_error==null&&$email_error==null&&$ph_number_error==null&&$password_error==null&&$con_pswd_error==null&&$error==null){
        $sql="INSERT INTO `users`(`user_name`, `phone_number`, `email`, `password`, `account_type`, `created_at`) VALUES ('$name','$ph_number','$email','$password','USER',now())";
        $result=mysqli_query($conn,$sql) or die(mysqli_error());
        if($result){
        header('location: login.php');
        }
        else{
            $error="unable to insert";
        }
    } else{
        echo "exit";
    }
}


?>


<!DOCTYPE html>
<html lang="en">
<head>
  <title></title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
  <style>
  *{
	  padding:0px;
	  margin:auto;

  }
  .form-control{

	  width:300px;


  }
  body{
	  background-image:url(assets/imgs/bg.jpg);
	  background-repeat:no-repeat;
	  background-size:cover;
  }
  .container h2 {
	  color:#FFF;
	  margin-top:50px;
  }
  .container h5{
	  color:#FFF;
  }
  .form-check-label{
	  color:#FFF;
  }
  </style>
</head>
<body >

<div class="container">
  <h2>Registration form</h2>
    <!--<div class="form-check">
        <input class="form-check-input" type="radio" name="registation" id="fuel station owner">
        <label class="form-check-label" for="fuel station owner">
            Fuel Station Owner
        </label>
    </div>-->
    <!--<div class="form-check">
        <input class="form-check-input" type="radio" name="registation" id="user" checked>
        <label class="form-check-label" for="user">
            User
        </label>
    </div>-->

  <form action="" method="post" name="registration">
      <span class="text-danger"><?php echo $error;?></span>
   <div class="form-group">
       <input type="text" class="form-control" id="name" placeholder="Enter your name" name="name">
       <span class="text-danger"><?php echo $name_error;?></span>
    </div>
    <div class="form-group">
       <input type="email" class="form-control" id="email" placeholder="Enter your email" name="email">
        <span class="text-danger"><?php echo $email_error;?></span>
    </div>
      <div class="form-group">
          <input type="number" class="form-control" id="ph_number" placeholder="Enter your mobile number" name="ph_number">
          <span class="text-danger"><?php echo $ph_number_error;?></span>
      </div>
     <!-- <div class="form-group">
       <input type="text" class="form-control" id="bunk_name" placeholder="Enter your bunk name" name="bunk_name">
          <span class="text-danger"><?php /*echo $bunk_name_error;*/?></span>
    </div>
-->
    <div class="form-group">
      <input type="password" class="form-control" id="pswd" placeholder="Enter your password" name="pswd">
        <span class="text-danger"><?php echo $password_error;?></span>
    </div>
     <div class="form-group">
      <input type="password" class="form-control" id="pswd" placeholder="Repeat your password" name="con_pswd">
         <span class="text-danger"><?php echo $con_pswd_error;?></span>
    </div>
      <button type="submit" class="btn btn-primary" name="submit">Submit</button>
      <a href="login.php" type="submit" class="btn btn-primary" >Cancel</a>
  </form>

</div>

</body>
</html>
