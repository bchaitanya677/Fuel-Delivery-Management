<?php
session_start();

include 'config.php';
include 'header.php';
include '../config_dash.php';
?>

<div class="content">
    <h1>Dash board</h1><br><br><br>
    <div class="row" style="text-align: center">
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
                    <h2 class="mb-0"><?=$fuel_price['diesel']?></h2>
                </div>
            </div>
        </div>
        <div class="col-sm-6 grid-margin">
            <div class="card">
                <div class="card-body">
                    <h3> Total registered users</h3>
                    <h2 ><?=$user_count['user_count']?></h2>
                </div>
            </div>
        </div>
        <div class="col-sm-6 grid-margin">
            <div class="card">
                <div class="card-body">
                    <h3> Total fuel station owner</h3>
                    <h2 class="mb-0"><?=$owner_count['owner_count']?></h2>
                </div>
            </div>
        </div>
        <div class="col-sm-6 grid-margin">
            <div class="card">
                <div class="card-body">
                    <h3> Total state</h3>
                    <h2 class="mb-0"><?=$state_count['state_count']?></h2>
                </div>
            </div>
        </div>
        <div class="col-sm-6 grid-margin">
            <div class="card">
                <div class="card-body">
                    <h3> Total city</h3>
                    <h2 class="mb-0"><?=$city_count['city_count']?></h2>
                </div>
            </div>
        </div>
    </div>
</div>


