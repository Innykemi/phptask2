    <!-- Menu -->
    <header>
        <div class="logo-text">
            SNG School
        </div>
        <ul>
            <li><a href="index.php">Home</a></li>
            <?php if(!isset($_SESSION['loggedin'])) {?>
            <li><a href="login.php">Login</a></li>
            <li><a href="register.php">Register</a></li>
            <?php } else { ?>
            <li>
            <?php 
                if ($_SESSION["designation"] == "Staff") {
                    echo '<a href="dashboard_staffs.php">';
                } elseif ($_SESSION["designation"] == "Student") {
                    echo '<a href="dashboard_students.php">';
                } else {
                    echo '<a href="dashboard.php">';
                }
            ?>
                    Dashboard</a></li>
            <?php if ($_SESSION["designation"] != "Staff" && $_SESSION["designation"] != "Student") { ?>
            <li><a href="register.php">Register New User</a></li>
            <?php } ?>
            <li><a href="logout.php">Logout</a></li>
            <?php } ?>
        </ul>
    </header>