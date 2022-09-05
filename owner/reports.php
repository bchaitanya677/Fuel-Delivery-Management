<?php
ob_start();
session_start();
include 'config.php';
include 'fuelstationownerheader.php';
include 'auth_owner.php';
?>

<div class="right " style="padding-right: 20px">
    <div class="container">
        <h2 >Order Status</h2><br>
        <div class="row ">
        <div class="col-12 grid-margin">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="owner_report" class="table table-striped table-bordered" >
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
                                <th> Action </th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            $sql = " SELECT `fuel_order`.*, `users`.`fuelstation_name` FROM `fuel_order` INNER JOIN `users` ON `fuel_order`.`bunk_id` = `users`.`id` order by`created_at` desc ";
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
<!--                                    <td>--><?//=$row['price']?><!--</td>-->
                                    <td><?=$row['payment_mode']?></td>
                                    <td><?=$row['created_at']?></td>
                                    <td><div class="<?=$css?>"><?=$row['status']?></div></td>
                                    <td><a href="edit_order.php?id=<?=$row['id']?>" class="glyphicon glyphicon-edit">edit</a></td>
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

<?php
include '../admin/footer.php';