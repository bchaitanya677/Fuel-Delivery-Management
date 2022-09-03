<?php
include 'admin/config.php';
session_start();
$msg = '';

if (isset($_SESSION['user_name']) && isset($_SESSION['account_type'])) {
    if( $_SESSION['account_type'] == 'ADMIN'){
        header('location: admin/dashboard.php');
    }
    if( $_SESSION['account_type'] == 'FUEL_OWNERS'){
        header('location: owner/dashboard.php');
    }
    if( $_SESSION['account_type'] == 'USER'){
        header('location: user/dashboard.php');
    }
}

if (isset($_POST['submit'])) {
    if (isset($_POST['email']) && isset($_POST['pswd']) && $_POST['email'] !== '' && $_POST['pswd'] !=='') {
        $email = $_POST['email'];
        $password = md5($_POST['pswd']);

        $sql = "SELECT * FROM `users` WHERE `email`='$email' AND `password` ='$password'";
        $result = mysqli_query($conn, $sql) or die(mysqli_error());
        $rows = mysqli_num_rows($result);
        if ($rows > 0) {
            $response = mysqli_fetch_array($result);
            $_SESSION['user_name'] = $response['user_name'];
            $_SESSION['id'] = $response['id'];
            $_SESSION['email'] = $response['email'];
            $_SESSION['account_type'] = $response['account_type'];
            if (isset($_SESSION['account_type'])) {
                header('location: index.php');
            }else{
                $msg = '<span class="text-danger">some thing went wrong</span>';
            }
        } else {
            $msg = '<span class="text-danger">Invalid credentials</span>';
        }
    }else{
        $msg = '<span class="text-danger">Please enter valid details</span>';
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
      background: url(assets/imgs/bg.jpg) no-repeat;
      background-size:cover;
  }
  .container{
	  margin-top:150px;

  }
  .container h2{
	  color:#FFF;
  }

  </style>
</head>
<body>

<div class="container">
  <h2 >Log in</h2>
  <form action="" method="post" name="login">
    <div class="form-group">
       <input type="email" class="form-control" id="email" placeholder="Enter email" name="email">
    </div>
    <div class="form-group">
      <input type="password" class="form-control" id="pwd" placeholder="Enter password" name="pswd">
    </div>
      <button type="submit" name="submit" class="btn btn-primary">Submit</button>
      <a class="btn btn-primary" href="sign_up.php">Register </a>
  </form>
    <span><?php echo $msg;?></span>
</div>

</body>
</html>

