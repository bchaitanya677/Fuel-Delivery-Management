<?php
ob_start();
session_start();
include 'config.php';
include 'header.php';
$sql_true=true;
$name_error = null;

if(isset($_POST['add_fuelprice'])) {

    if (isset($_POST['petrol']) && $_POST['petrol'] != '') {
        $petrol = $_POST['petrol'];
    } else {
        $sql_true = false;
        $name_error = "please enter price";
    }
    if (isset($_POST['diesel']) && $_POST['diesel'] != '') {
        $diesel = $_POST['diesel'];
    } else {
        $sql_true = false;
        $name_error = "please enter price";
    }
    if($sql_true){
        $sql="INSERT INTO `fuel-prices`( `petrol`, `diesel`) VALUES ($petrol,$diesel)";
        $result=mysqli_query($conn,$sql) or die(mysqli_error());
        echo $result;
        if($result){
            header('location: fuel-price.php');
        }
        else{
            $error="unable to insert";
        }
    }

}


?>

    <div class="right " style="padding-right: 20px">
        <h1>Enter New Fuel Price</h1>
        <br><br>
        <form class="form-inline" method="post" action="">
            <div class="form-group">
                <div>
                <label for="name">Enter Petrol Price</label>
                <input type="text" class="form-control mx-sm-4" placeholder="Enter Petrol Price" name="petrol"></div>
                <br>
                <label for="name">Enter Diesel Price</label>
                <input type="text" class="form-control mx-sm-4" placeholder="Enter Diesel Price" name="diesel">
                <br>
                <span class="text-danger"><?php
                    echo $name_error;
                    ?></span>
            </div>
            <br>
            <br>
            <a class="btn btn-primary" href="fuel-price.php">Cancel</a>
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <button type="submit" class="btn btn-primary" name="add_fuelprice">Submit</button>
        </form>
    </div>
<?php
include 'footer.php';
?>