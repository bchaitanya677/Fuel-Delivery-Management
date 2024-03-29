<?php
ob_start();
session_start();
include 'config.php';
include 'header.php';
?>

    <div class="content">
        <h1>Total citys</h1>

        <table id="state_table" class="table table-striped table-bordered">
            <div style="float: right"> <a class="btn btn-primary" href="add-city.php">Add</a></div>
            <thead>
                <th style="text-align: center">id</th>
                <th style="text-align: center">place</th>
                <th style="text-align: center">action</th>
            </thead>
                <?php
            $sql = "SELECT * FROM `place` WHERE `type`='CITY' order by`id` desc ";
            $result = mysqli_query($conn, $sql) or die(mysqli_error());
            if (mysqli_num_rows($result) > 0) {
                $cnt = 1;
            while ($row = mysqli_fetch_array($result)) {
                ?>
                <tr style="text-align: center">
                    <td><?php echo $cnt;?></td>
                    <td><?php echo $row['name']; ?></td>
                    <td>
                        <div style="display: contents">
                        <a href="add-city.php?id=<?=$row['id']?>" class="btn btn-warning" >Edit</a>
                        <a class="btn btn-danger" href="city_delete.php?id=<?php echo $row['id']; ?>">Delete</a>
                    </td>
                         </div>
                </tr>
                <?php
                $cnt++;
            }

            ?>
            <?php
            }
            ?>
        </table>
    </div>
<?php
include 'footer.php';
?>