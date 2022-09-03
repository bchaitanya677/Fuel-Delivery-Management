<?php
ob_start();
session_start();
include 'config.php';
include 'fuelstationownerheader.php';

$sql_true=false;
$name_error = null;
$email_error = null;
$ph_error = null;
$edit = false;
$edit_name='';
$edit_email='';
$edit_ph='';
$sql='';

if(isset($_GET['id']) && $_GET['id'] != ''){
    $id = $_GET['id'];
    $edit_sql = "SELECT * FROM `users` WHERE `id` = $id";
    $edit_res = mysqli_query($conn, $edit_sql) or die(mysqli_error());
    if(mysqli_num_rows($edit_res)>0){
        $edit = true;
        $edit_row = mysqli_fetch_assoc($edit_res);
        $edit_name = $edit_row['fuelstation_name'];
        $edit_email = $edit_row['email'];
        $edit_ph = $edit_row['phone_number'];
    }
}

    if (isset($_POST['submit'])) {
        if (isset($_POST['username']) && $_POST['username'] != '') {
            $name = $_POST['username'];
            $sql_true = true;
        } else {
            $name_error = "please enter  city";
        }
        if (isset($_POST['email']) && $_POST['email'] != '') {
            $email = $_POST['email'];
            $sql_true = true;
        } else {
            $email_error = "please enter  email";
        }if (isset($_POST['contactnumber']) && $_POST['contactnumber'] != '') {
            $ph = $_POST['contactnumber'];
            $sql_true = true;
        } else {
            $ph_error = "please enter  contactnumber";
        }
        if ($sql_true && $edit) {
            $sql = "UPDATE `users` SET `fuelstation_name`='$name',`email`='$email',`phone_number`='$ph' WHERE `id`=$id ";
        }else if($sql_true){
            $sql="INSERT INTO `users`( `fuelstation_name`,`email`, `phone_number`,`account_type`) VALUES ('$name','$email','$ph','FUEL_STATION')";
        }
            $result = mysqli_query($conn, $sql) or die(mysqli_error());
            if ($result) {
                header('location: fuelstation.php');
            } else {
                $error = "unable to update";
            }

    }
?>
<div class="container" style="text-align: center">
    <h2>Add fuel station</h2><br>
    <form action="" method="post" name="profile">
        <input class="form-group-sm" type="text" id="username" name="username" placeholder="fuel station name" value="<?=$edit_name?>"><br><br>
<!--        <input class="form-group-sm" type="text" id="email" name="email" placeholder="email"  value="--><?//=$edit_email?><!--"><br><br>-->
<!--        <input class="form-group-sm" type="tel" id="contactnumber" name="contactnumber" placeholder="phone number"  value="--><?//=$edit_ph?><!--"><br><br>-->
        <a href="dashboard.php" class="btn btn-primary">cancel</a>
        <button  class="btn btn-primary" type="submit" name="submit">Add</button>
    </form>
</div>
