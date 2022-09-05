<?php
ob_start();
if (!isset($_SESSION)) {
    session_start();
}
if(!isset($_SESSION['account_type']) && $_SESSION['account_type'] != 'FUEL_OWNERS'){
    header("Location: index.php");
}
