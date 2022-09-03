<?php
ob_start();
session_start();
include 'config.php';
include 'header.php';

$data =null;
$name_error =null;
$id= $_SESSION['id'];

if(isset($id) && $id !=''){
    $sql = "SELECT * FROM `users` WHERE `id` = $id";
    $res = mysqli_query($conn,$sql);
    $data = mysqli_fetch_assoc($res);
}

if(isset($_POST['submit'])){
    if (isset($_POST['username']) && $_POST['username'] != '') {
        $name = $_POST['username'];
        $sql_true = true;
    } else {
        $name_error = "please enter  city";
    } if (isset($_POST['email']) && $_POST['email'] != '') {
        $email = $_POST['email'];
        $sql_true = true;
    } else {
        $name_error = "please enter  email";
    } if (isset($_POST['contactnumber']) && $_POST['contactnumber'] != '') {
        $ph = $_POST['contactnumber'];
        $sql_true = true;
    } else {
        $name_error = "please enter  number";
    } if (isset($_POST['password']) && $_POST['password'] != '') {
        $psw = md5($_POST['password']);
        $sql_true = true;
    } else {
        $psw = $_POST['psw'];
    }
    if($name_error==null){
        $sql1 = "UPDATE `users` SET `user_name`='$name',`phone_number`=$ph,`email`='$email',`password`='$psw' WHERE `id`= $id";
        $result = mysqli_query($conn,$sql1);
        header('location: updateprofil.php');
    }else{
        echo 'profile update failed';
    }
}


?>
<div class="right " style="padding-right: 20px">
    <div class="container" style="text-align: center">
    <h2>Update Profile details</h2><br>
        <form action="" method="post" name="profile">
            <input class="form-group-sm" type="text" id="username" name="username" placeholder="user name" value="<?=$data['user_name']?>"><br><br>
            <input class="form-group-sm" type="text" id="email" name="email" placeholder="email" value="<?=$data['email']?>"><br><br>
            <input class="form-group-sm" type="tel" id="contactnumber" name="contactnumber" placeholder="mobile number" value="<?=$data['phone_number']?>"><br><br>
            <input class="form-group-sm" type="password" id="password" name="password" placeholder="password" ><br><br>
            <input type="hidden" name="psw" value="<?=$data['password']?>">
            <a href="dashboard.php" class="btn btn-primary">cancel</a> <button type="submit" name="submit"  class="btn btn-primary">update</button>
        </form>
    </div>
</div>
