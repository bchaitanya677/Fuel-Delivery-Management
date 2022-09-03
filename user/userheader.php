<?php
ob_start();
if(!isset($_SESSION)){
    session_start();
}

include 'config.php';
$user_name = $_SESSION['user_name'];

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title></title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <style>
        .navbar-header
        {
            color:#fff;
            height:100px;
        }
        span{
            color:#1DC4E7;
        }
        h1{
            color:white;
        }
        .navbar-inverse .navbar-nav>li>a {
            color: #9d9d9d;
            margin-top: 50px;
            margin-left:100px;
        }
    </style>
</head>
<body>

<nav class="navbar navbar-inverse">
    <div class="container-fluid">
        <div class="navbar-header">

            <div class="navbar-brand"><h1>Fuel<span>Station</span></h1></div>
        </div>
        <ul class="nav navbar-nav">
            <li><a href="dashboard.php">Dashboard</a></li>
            <li><a href="orderyourfuel.php">Order Your Fuel</a></li>
            <li><a href="user_reports.php">Order Status</a></li>
        </ul>
        <ul class="nav navbar-nav navbar-right">
            <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#"><span class="glyphicon glyphicon-user  "></span><?=$_SESSION['user_name']?><span class="caret"></span></a>

                <ul class="dropdown-menu">
                    <li><a href="updateprofil.php">Update Profile</a></li>
                    <li><a href="logout.php"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
                </ul>
            </li>
        </ul>
    </div>
</nav>
