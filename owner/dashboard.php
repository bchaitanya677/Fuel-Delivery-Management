<?php
ob_start();
if (!isset($_SESSION)) {
    session_start();
}
include 'config.php';
include 'fuelstationownerheader.php';
include '../config_dash.php';
?>

<div class="container">
    <h2>Fuel Owner Dashboard</h2><br>
    <div id="content" style="text-align: center">
        <div class="container">
            <div class="col-sm-6 grid-margin">
                <div class="card">
                    <div class="card-body">
                        <h3> Total fuel station</h3>
                        <h2 class="mb-0"><?= $owner_count['owner_count'] ?></h2>
                    </div>
                </div>
            </div>

            <div class="col-sm-6 grid-margin">
                <div class="card">
                    <div class="card-body">
                        <h3> Total new order</h3>
                        <h2 class="mb-0"><?= $new_order_count['new_order'] ?></h2>
                    </div>
                </div>
            </div>

            <div class="col-sm-6 grid-margin">
                <div class="card">
                    <div class="card-body">
                        <h3> Total confirm order</h3>
                        <h2 class="mb-0"><?= $cnf_order_count['cnf_order'] ?></h2>
                    </div>
                </div>
            </div>

            <div class="col-sm-6 grid-margin">
                <div class="card">
                    <div class="card-body">
                        <h3> Total canceled order</h3>
                        <h2 class="mb-0"><?= $cancel_order_count['cancel_order'] ?></h2>
                    </div>
                </div>
            </div>

            <div class="col-sm-6 grid-margin">
                <div class="card">
                    <div class="card-body">
                        <h3> Total on-the-way order</h3>
                        <h2 class="mb-0"><?= $int_order_count['int_order'] ?></h2>
                    </div>
                </div>
            </div>

            <div class="col-sm-6 grid-margin">
                <div class="card">
                    <div class="card-body">
                        <h3> Total delivered order</h3>
                        <h2 class="mb-0"><?= $del_order_count['del_order'] ?></h2>
                    </div>
                </div>
            </div>
        </div>

    </div>

</div>

</body>
</html>

