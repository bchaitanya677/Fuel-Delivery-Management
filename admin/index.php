<?php
if(isset($_SESSION['user_name']) && isset($_SESSION['account_type'])){
    if($_SESSION['account_type']=='ADMIN'){
        header('location: dashboard.php');
    }else{
        header('location: ./index.php');
    }
}else{
    header('location: ../login.php');
}