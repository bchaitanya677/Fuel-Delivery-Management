<?php
ob_start();
session_start();
include 'config.php';
include 'header.php';
?>

<div class="content">
<h1>Register user</h1>

    <table id="example" class="table table-striped table-bordered" style="width:100%">

        <thead >
            <th style="text-align: center">id</th>
            <th style="text-align: center">user name</th>
            <th style="text-align: center">phone number</th>
            <th style="text-align: center">email</th>
<!--            <th>action</th>-->

        </thead>

        <tbody>
<?php
$sql = "SELECT * FROM `users` WHERE `account_type`='USER' order by`id` desc ";
$result = mysqli_query($conn, $sql) or die(mysqli_error());
if (mysqli_num_rows($result) > 0) {
    $cnt=1;
    while ($row = mysqli_fetch_array($result)) {
        ?>
        <tr style="text-align: center">
            <td><?php echo $cnt; ?></td>
            <td><?php echo $row['user_name']; ?></td>
            <td><?php echo $row['phone_number']; ?></td>
            <td><?php echo $row['email']; ?></td>
<!--            <td><button type="submit" name="edit">Edit</button>-->
<!--            <button type="submit" name="delete" >Delete</button></td>-->
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
<?php
include 'footer.php';
?>