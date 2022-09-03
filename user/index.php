<?php
if (isset($_SESSION['account_type'])) {
    if( $_SESSION['account_type'] == 'ADMIN'){
        header('location: admin/dashboard.php');
    }
    if( $_SESSION['account_type'] == 'FUEL_OWNERS'){
        header('location: owner/dashboard.php');
    }
    if( $_SESSION['account_type'] == 'USER'){
        header('location: user/dashboard.php');
    }
}else{
    header('location: ../login.php');
}