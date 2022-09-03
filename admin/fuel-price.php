<?php
ob_start();
session_start();
include 'config.php';
include 'header.php';


$fuel_price_sql = "SELECT * FROM `fuel-prices` ORDER BY `created_at` DESC LIMIT 1;";
$fuel  = mysqli_query($conn,$fuel_price_sql);
$fuel_price = mysqli_fetch_assoc($fuel);
?>

    <div class="right " style="padding-right: 20px">
        <h1>Fuel price</h1>

<!--        <table id="example" class="table table-striped table-bordered" style="width:100%">-->
<!--            <thead>-->
<!--            <tr>-->
<!--                <th><h2>Petrol</h2></th>-->
<!--                <th><h2>Diesel</h2></th>-->
<!---->
<!--            </tr>-->
<!--            </thead>-->
<!--            <tbody>-->
<!--            --><?php
//            $sql = "SELECT * FROM `fuel-prices`  order by`id` desc ";
//            $result = mysqli_query($conn, $sql) or die(mysqli_error());
//            if (mysqli_num_rows($result) > 0) {
//            while ($row = mysqli_fetch_array($result)) {
//                ?>
<!--                <tr>-->
<!--                    <td><b><h3 style="display: inline-block">--><?php //echo $row['petrol']; ?><!--</b></h3>/ltr</td>-->
<!--                    <td><b><h3 style="display: inline-block">--><?php //echo $row['diesel']; ?><!--</b></h3>/ltr</td>-->
<!--                </tr>-->
<!--                --><?php
//            }
//
//            ?>
<!--            </tbody>-->
<!--            --><?php
//            }
//            ?>
<!--        </table>-->
        <div class="col-sm-4 grid-margin">
            <div class="card">
                <div class="card-body">
                    <h3> Date</h3>
                    <div class="row">
                        <div class="col-8 col-sm-12 col-xl-8 my-auto">
                            <div class="d-flex d-sm-block d-md-flex align-items-center">
                                <h3 class="mb-0">
                                    <?=$fuel_price['created_at']?>
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
        <div class="col-sm-4 grid-margin">
            <div class="card">
                <div class="card-body">
                    <h3> Petrol price</h3>
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
        <div class="col-sm-4 grid-margin">
            <div class="card">
                <div class="card-body">
                    <h3> Diesel price</h3>
                    <div class="row">
                        <div class="col-8 col-sm-12 col-xl-8 my-auto">
                            <div class="d-flex d-sm-block d-md-flex align-items-center">
                                <h3 class="mb-0">  <?=$fuel_price['diesel']?>
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


        <table id="state_table" class="table table-striped table-bordered">
            <div style="float: right"> <a class="btn btn-primary" href="add-fuelprice.php">Add</a></div>

            <thead>
                <th style="text-align: center">Date</th>
                <th style="text-align: center">Petrol price</th>
                <th style="text-align: center">Diesel price</th>
                <th style="text-align: center">action</th>
            </thead>
            <tbody>
            <?php
            $sql = "SELECT * FROM `fuel-prices` order by`created_at` desc ";
            $result = mysqli_query($conn, $sql) or die(mysqli_error());
            if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_array($result)) {
                ?>
                <tr style="text-align: center">
                    <td><?php echo $row['created_at']; ?></td>
                    <td><?php echo $row['petrol']; ?></td>
                    <td><?php echo $row['diesel']; ?></td>
                    <td >
                        <a class="btn btn-danger" href="fuelprice_delete.php?id=<?php echo $row['id']; ?>" >Delete</a>
                    </td>
                </tr>
                <?php
            }

            ?>
            </tbody>
            <?php
            }
            ?>
        </table>


    </div>
<?php
include 'footer.php';
?>