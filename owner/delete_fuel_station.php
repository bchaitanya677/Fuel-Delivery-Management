<?php
include 'config.php';
include 'auth_owner.php';


if(isset($_GET['id'])){
    $id=$_GET['id'];
    $sql="DELETE FROM `users` WHERE `id`=$id ";
    $res=mysqli_query($conn,$sql) or die(mysqli_error());
    if($res){
        header('location: fuelstation.php');
    }
    else{
        echo "unable to delete";
    }
}