<?php
ob_start();
session_start();
include 'config.php';
include 'fuelstationownerheader.php';
?>

    <div class="right " style="padding-right: 20px">
        <h2>Fuel station</h2><br>
        <div class="container-fluid">
        <div style="float: right"> <a class="btn btn-primary" href="add_fuel_station.php">Add</a></div>
        <table id="example" class="table table-striped table-bordered" style="width:100%">
            <thead>
            <tr>
                <th>id</th>
                <th>user name</th>
                <th>phone number</th>
                <th>email</th>
                <th>action</th>
            </tr>
            </thead>
            <tbody>
            <?php
            $sql = "SELECT * FROM `users` WHERE `account_type`='FUEL_STATION' order by`id` desc ";
            $result = mysqli_query($conn, $sql) or die(mysqli_error());
            if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_array($result)) {
                ?>
                <tr>
                    <td><?php echo $row['id']; ?></td>
                    <td><?php echo $row['fuelstation_name']; ?></td>
                    <td><?php echo $row['phone_number']; ?></td>
                    <td><?php echo $row['email']; ?></td>
                    <td>
                        <a href="add_fuel_station.php?id=<?=$row['id']?>" class="btn btn-warning">Edit</a>
                        <a href="delete_fuel_station.php?id=<?=$row['id']?>" class="btn btn-danger">Delete</a></td>
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
    </div>
<?php
include '../admin/footer.php';
?>