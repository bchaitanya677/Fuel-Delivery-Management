<?php
ob_start();
session_start();
include 'config.php';
include 'fuelstationownerheader.php';
$sql_true=false;
$name_error = null;
$edit = false;
$edit_status='';
$id='';

if(isset($_GET['id']) && $_GET['id'] != ''){
    $edit = true;
    $id = $_GET['id'];
    $edit_sql = "SELECT * FROM `fuel_order` WHERE `id` = $id";
    $edit_res = mysqli_query($conn, $edit_sql) or die(mysqli_error());
    if(mysqli_num_rows($edit_res)>0){
        $edit_row = mysqli_fetch_assoc($edit_res);
        $edit_status = $edit_row['status'];
    }
}
if($edit) {
    if (isset($_POST['edit_order'])) {
        if (isset($_POST['status']) && $_POST['status'] != '') {
            $status = $_POST['status'];
            $sql_true = true;
        }
        if ($sql_true) {
            $sql = "UPDATE `fuel_order` SET `status`='$status' WHERE `id`=$id ";
            $result = mysqli_query($conn, $sql) or die(mysqli_error());
            if ($result) {
                header('location: reports.php');
            } else {
                $error = "unable to update";
            }
        }
    }
}
?>
    <div class="right " style="text-align: center">
        <h2>Edit Order Status</h2>
        <br><br>
        <div class="container">
        <form class="form-inline" method="post" action="">
            <div class="form-group">
                <label for="name">Order ID : <?=$id?></label>
                <br>
                <br>
                <label for="name">Current Status : <?=$edit_status?></label>
                <br>
                <br>
                <label for="status">Change Status</label>
                <select name="status" id="status">
                    <option value="PROCESSING">PROCESSING</option>
                    <option value="APPROVED">APPROVED</option>
                    <option value="IN_TRANSIT">IN TRANSIT</option>
                    <option value="DELIVERED">DELIVERED</option>
                    <option value="REJECTED">REJECTED</option>
                </select>
                <br>
                <span class="text-danger"><?php
                    echo $name_error;
                    ?>
                </span>
            </div>
        </div>
<br>
<br>
    <button type="submit" class="btn btn-primary" name="edit_order">Update</button>

&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<a class="btn btn-primary" href="reports.php">Cancel</a>
</form>
</div>
<?php
//include 'footer.php';
?>