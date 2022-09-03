<?php
ob_start();
session_start();
include 'config.php';
include 'userheader.php';
include '../config_dash.php';
?>
<div class="container">
    <h2>Welcome To Fuel Station</h2>
   <div class="col-sm-6 grid-margin">
    <div class="card">
        <div class="card-body">
            <h3> Today petrol price</h3>
            <div class="row">
                <div class="col-8 col-sm-12 col-xl-8 my-auto">
                    <div class="d-flex d-sm-block d-md-flex align-items-center">
                        <h3 class="mb-0">
                            <?=$fuel_price['petrol']?>
                        </h3>
                    </div>
                </div>
                <div class="col-4 col-sm-12 col-xl-4 text-center text-xl-right">
                    <i class="icon-lg mdi mdi-codepen text-primary ml-auto"></i>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="col-sm-6 grid-margin">
    <div class="card">
        <div class="card-body">
            <h3> Today diesel price</h3>
            <div class="row">
                <div class="col-8 col-sm-12 col-xl-8 my-auto">
                    <div class="d-flex d-sm-block d-md-flex align-items-center">
                        <h3 class="mb-0"><?=$fuel_price['diesel']?>
                        </h3>
                    </div>
                </div>
                <div class="col-4 col-sm-12 col-xl-4 text-center text-xl-right">
                    <i class="icon-lg mdi mdi-codepen text-primary ml-auto"></i>
                </div>
            </div>
        </div>
    </div>
</div>

</div>
