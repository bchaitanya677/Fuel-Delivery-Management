<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/dashboard.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.12.1/datatables.min.css"/>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap4.min.css" >
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.12.1/datatables.min.js"></script>
</head>
<body>

<div class="sidenav">
    <span1>Fuel<span>Station</span></span1>

    <div class="dropdown-btn"><img src="../assets/imgs/bg.jpg">    <?=$_SESSION['user_name']?><span class="caret"></span>
        <i class="fa fa-caret-down"></i>
    </div>
    <div class="dropdown-container">
        <a href="updateprofil.php">update profile</a>
        <a href="logout.php">logout</a>
    </div>

    <a href="dashboard.php">Dash board</a>
    <a href="state.php">State</a>
    <a href="city.php">City</a>
    <a href="fuel-price.php">Fuel price</a>
    <a href="reports.php">Reports</a>
    <a href="user.php">Register user</a>
    <a href="fuel-owner.php">Registered fuel station owner</a>
</div>

<script>
    var dropdown = document.getElementsByClassName("dropdown-btn");
    var i;

    for (i = 0; i < dropdown.length; i++) {
        dropdown[i].addEventListener("click", function() {
            this.classList.toggle("active");
            var dropdownContent = this.nextElementSibling;
            if (dropdownContent.style.display === "block") {
                dropdownContent.style.display = "none";
            } else {
                dropdownContent.style.display = "block";
            }
        });
    }
</script>





