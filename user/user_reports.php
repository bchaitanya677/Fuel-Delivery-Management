<?php
ob_start();
session_start();
include 'config.php';
include 'userheader.php';
include 'auth_user.php';


$id = $_SESSION['id'];
?>

<div class="right " style="padding-right: 20px">
    <div class="container" >
        <h2 >Order Status</h2><br>
    <div class="row ">
        <div class="col-12 grid-margin">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                            <tr>
                                <th> Order No </th>
                                <th> Bunk Name </th>
                                <th> Product Type </th>
                                <th> Product Qty / <small>ltr</small> </th>
<!--                                <th> Price </th>-->
                                <th> Payment Mode </th>
                                <th> Order Date </th>
                                <th> Order Status </th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            $sql = " SELECT `fuel_order`.*, `users`.`fuelstation_name` FROM `fuel_order` INNER JOIN `users` ON `fuel_order`.`bunk_id` = `users`.`id` where `fuel_order`.`user_id` = $id order by`created_at` desc ";
                            $result = mysqli_query($conn, $sql) or die(mysqli_error());
                            if (mysqli_num_rows($result) > 0) {
                            $cnt = 1;
                            $css='';
                            while ($row = mysqli_fetch_array($result)) {
                                if($row['status'] =="PROCESSING"){
                                    $css = 'text-warning';
                                }
                                if($row['status']=='APPROVED'){
                                    $css = 'text-success';
                                }
                                if($row['status']=='REJECTED'){
                                    $css = 'text-danger';
                                }

                            ?>
                            <tr>
                                <td><?=$row['id']?></td>
                                <td><?=$row['fuelstation_name']?></td>
                                <td><?=$row['fuel_type']?></td>
                                <td><?=$row['qty']?></td>
<!--                                <td>--><?//=$row['price']?><!--</td>-->
                                <td><?=$row['payment_mode']?></td>
                                <td><?=$row['created_at']?></td>
                                <td><div class="<?=$css?>"><?=$row['status']?></div></td>
                            </tr>
                            <?php
                                $cnt++;
                            }
                            ?>
                            </tbody>
                            <?php
                            }
                            ?>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
</div>
