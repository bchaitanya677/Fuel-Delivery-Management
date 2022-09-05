<?php
ob_start();
session_start();
include 'config.php';
include 'fuelstationownerheader.php';
include 'auth_owner.php';

?>

<div id="content">
    <div class="container">
        <h2>Orders of Fuel</h2>

        <table id="state_table" class="table table-striped table-bordered" style="width:100%">

            <thead>
            <tr>
                <th>id</th>
                <th>order recived from</th>
                <th>status</th>

            </tr>
            </thead>
            <tbody>

            <tr>
                <td><?php echo $row['id']; ?></td>
                <td><?php echo $row['name']; ?></td>
                <td >
                    <select class="form-select" id="status" name="status">
                        <option>recived</option>
                        <option class="warning">in-process</option>
                        <option class="danger">rejected</option>
                        <option>approved</option>
                        <option>in-transit</option>
                        <option class="success">delivered</option>
                    </select>

                </td>
            </tr>

            </tbody>
        </table>
    </div>

</div>
