<?php
ob_start();
if(!isset($_SESSION)){
    session_start();
}
include 'admin/config.php';

$state_count =0;
$city_count =0;
$user_count =0;
$owner_count =0;
$fuel_price =0;

$state_count_sql ="SELECT COUNT(*) AS state_count FROM place WHERE type = 'STATE'";
$city_count_sql ="SELECT COUNT(*) AS city_count FROM place WHERE type = 'CITY'";
$user_count_sql = "SELECT COUNT(*) AS user_count FROM users WHERE `account_type` = 'USER'";
$owner_count_sql = "SELECT COUNT(*) AS owner_count FROM users WHERE `account_type` = 'FUEL_OWNERS'";
$fuel_price_sql = "SELECT * FROM `fuel-prices` ORDER BY `created_at` DESC LIMIT 1;";
$new_order_sql = "SELECT COUNT(*) AS new_order FROM `fuel_order` where `status` = 'PROCESSING' ORDER BY `created_at` DESC ";
$cnf_order_sql = "SELECT COUNT(*) AS cnf_order FROM `fuel_order` where `status` = 'APPROVED' ORDER BY `created_at` DESC ";
$cancel_order_sql = "SELECT COUNT(*) AS cancel_order FROM `fuel_order` where `status` = 'REJECTED' ORDER BY `created_at` DESC ";
$int_order_sql = "SELECT COUNT(*) AS int_order FROM `fuel_order` where `status` = 'IN_TRANSIT' ORDER BY `created_at` DESC ";
$del_order_sql = "SELECT COUNT(*) AS del_order FROM `fuel_order` where `status` = 'DELIVERED' ORDER BY `created_at` DESC ";

$state  = mysqli_query($conn,$state_count_sql);
$state_count = mysqli_fetch_assoc($state);

$city  = mysqli_query($conn,$city_count_sql);
$city_count = mysqli_fetch_assoc($city);

$user  = mysqli_query($conn,$user_count_sql);
$user_count = mysqli_fetch_assoc($user);

$owner  = mysqli_query($conn,$owner_count_sql);
$owner_count = mysqli_fetch_assoc($owner);

$fuel  = mysqli_query($conn,$fuel_price_sql);
$fuel_price = mysqli_fetch_assoc($fuel);

$new_order  = mysqli_query($conn,$new_order_sql);
$new_order_count = mysqli_fetch_assoc($new_order);

$cnf_order  = mysqli_query($conn,$cnf_order_sql);
$cnf_order_count = mysqli_fetch_assoc($cnf_order);

$cancel_order  = mysqli_query($conn,$cancel_order_sql);
$cancel_order_count = mysqli_fetch_assoc($cancel_order);

$int_order  = mysqli_query($conn,$int_order_sql);
$int_order_count = mysqli_fetch_assoc($int_order);

$del_order  = mysqli_query($conn,$del_order_sql);
$del_order_count = mysqli_fetch_assoc($del_order);

