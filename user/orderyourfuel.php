<?php
ob_start();
session_start();
include 'config.php';
include 'userheader.php';

$id = $_SESSION['id'];
$name_error=null;
$password_error=null;
$ph_number_error=null;
$qty_error=null;
$payment_mode_error=null;
$product_type_error=null;


if(isset($_POST['submit']))
{
    if(isset($_POST['bunk_name'])&&$_POST['bunk_name']!=''){
        $name=$_POST['bunk_name'];
    } else {
        $sql_true = true;
        $name_error = "please enter bunk name";
    }
    if(isset($_POST['product_type'])&&$_POST['product_type']!=''){
        $product_type=$_POST['product_type'];
    } else {
        $sql_true = true;
        $product_type_error = "please select product type";
    }
    if(isset($_POST['payment_mode'])&&$_POST['payment_mode']!=''){
        $payment_mode=$_POST['payment_mode'];
    } else {
        $sql_true = true;
        $payment_mode_error = "please select payment type";
    }
    if(isset($_POST['req_qnty'])&&$_POST['req_qnty']!=''){
        $qty=$_POST['req_qnty'];
    } else {
        $sql_true = true;
        $qty_error = "please enter quantity";
    }
    if($name_error==null&&$product_type_error==null&&$qty_error==null){
        $sql="INSERT INTO `fuel_order`(`bunk_id`, `user_id`, `qty`, `fuel_type`, `payment_mode`, `price`, `created_at`) VALUES ($name,'$id','$qty','$product_type','$payment_mode','0',now())";
        $result=mysqli_query($conn,$sql) or die(mysqli_error());
        if($result){
            header('location: user_reports.php');
        }
        else{
            $error="unable to insert";
        }
    } else{
        echo "exit";
    }
}



?>

<div class="container">
    <h2>Order Your Fuel</h2>

    <form method="post" action="">
        <div class="row">
        <div class="col-sm-3">
            <select class="form-select" id="payment_mode" name="bunk_name">
                <?php
                $sql2 = "SELECT * FROM `users` where `account_type` = 'FUEL_STATION'";
                $res = mysqli_query($conn,$sql2);
                if(mysqli_num_rows($res)>0){
                    while($row = mysqli_fetch_array($res)){
                        ?>
                        <option value="<?=$row['id']?>"><?=$row['fuelstation_name']?></option>
                <?php
                    }
                }
                ?>
            </select>
<!--            <input type="text" class="form-control" id="bunk_name" placeholder="Enter your bunk name" name="bunk_name">-->
            <br>
            <input type="number" class="form-control" id="contact_number" placeholder="Enter your contact number" name="contact_number">

            <table>
            <tr>
                <td><input type="number" class="form-control" id="req_qnty" placeholder="Enter quantity in liters" name="req_qnty"></td>
                <td><select class="form-select" id="product_type" name="product_type">
                <option value="PETROL">petrol</option>
                <option value="DIESEL" >diesel</option>
            </select></td>
            </tr><br>
            </table><br>
            <label for="payment_type">Please select payment type</label>
            <td><select class="form-select" id="payment_mode" name="payment_mode">
                    <option value="ONLINE">Online</option>
                    <option value="CASH" >Cash</option>
                    <option value="CHEQUE">Cheque</option>
                    <option value="DD" >DD</option>
                </select></td>
        </div>
        </div>
    <br>
      <a href="orderyourfuel.php" class="btn btn-primary">cancle</a>
    <button class="btn btn-primary" name="submit">submit</button>
    </form>

</div>
