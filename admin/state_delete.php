<?php
include 'config.php';

if(isset($_GET['id'])){
    $id=$_GET['id'];
    $sql="DELETE FROM `place` WHERE `id`=$id ";
    $res=mysqli_query($conn,$sql) or die(mysqli_error());
    if($res){
        header('location: state.php');
    }
    else{
        echo "unable to delete";
    }
}