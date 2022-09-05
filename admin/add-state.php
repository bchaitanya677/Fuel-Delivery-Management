<?php
ob_start();
session_start();
include 'config.php';
include 'header.php';
$sql_true=false;
$name_error = null;
$edit = false;
$edit_name='';

if(isset($_GET['id']) && $_GET['id'] != ''){
    $edit = true;
    $id = $_GET['id'];
    $edit_sql = "SELECT * FROM `place` WHERE `id` = $id";
    $edit_res = mysqli_query($conn, $edit_sql) or die(mysqli_error());
   if(mysqli_num_rows($edit_res)>0){
       $edit_row = mysqli_fetch_assoc($edit_res);
       $edit_name = $edit_row['name'];
   }
}
if($edit) {
    if (isset($_POST['edit_state'])) {
        if (isset($_POST['name']) && $_POST['name'] != '') {
            $name = $_POST['name'];
            $sql_true = true;
        } else {

            $name_error = "please enter  state";
        }
        if ($sql_true) {
            $sql = "UPDATE `place` SET `name`='$name' WHERE `id`=$id ";
            $result = mysqli_query($conn, $sql) or die(mysqli_error());
            if ($result) {
                header('location: state.php');
            } else {
                $error = "unable to update";
            }

        }
    }
}else{
    if(isset($_POST['add_state'])) {
        if (isset($_POST['name']) && $_POST['name'] != '') {
            $name = $_POST['name'];
            $sql_true = true;
        } else {
            $name_error = "please enter  state";
        }
        if($sql_true){
            $sql="INSERT INTO `place`( `name`, `type`) VALUES ('$name','STATE')";
            $result=mysqli_query($conn,$sql) or die(mysqli_error());
            if($result){
                header('location: state.php');
            }
            else{
                $error="unable to insert";
            }
        }
    }
}

?>

    <div class="content" style="text-align: center">
        <h1>Enter State To Add</h1>
        <br><br>
        <form class="form-inline" method="post" action="">
            <div class="form-group">
                <label for="name">Enter State</label>
            <input type="text" class="form-control mx-sm-4" placeholder="Enter state" name="name" value="<?php echo $edit_name ? $edit_name : ''; ?>">
                <br>
                <span class="text-danger"><?php
                    echo $name_error;
                    ?></span>
            </div>
            <br>
            <br>
            <a class="btn btn-primary" href="state.php">Cancel</a>
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <?php
            if($edit){
                ?>
                <button type="submit" class="btn btn-primary" name="edit_state">Update</button>
                <?php
            }else{
                ?>
                <button type="submit" class="btn btn-primary" name="add_state">Submit</button>
                <?php
            }
            ?>


        </form>
    </div>
<?php
include 'footer.php';
