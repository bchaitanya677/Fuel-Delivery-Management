<?php
ob_start();
session_start();
include 'config.php';
include 'userheader.php';
include '../config_dash.php';
include 'auth_user.php';
?>
<div class="container" style="text-align: center">
    <h2>Welcome To Fuel Station</h2><br><br>
   <div class="col-sm-6 grid-margin">
    <div class="card">
        <div class="card-body">
            <h3> Today petrol price</h3>
            <h2 class="mb-0"><?=$fuel_price['petrol']?></h2>
        </div>
    </div>
</div>

<div class="col-sm-6 grid-margin">
    <div class="card">
        <div class="card-body">
            <h3> Today diesel price</h3>
            <h3 class="mb-0"><?=$fuel_price['diesel']?>
        </div>
    </div>
</div>

</div>
