    <!-- Menu -->
    
    <nav class="navbar navbar-expand-md navbar-dark">
        <a class="navbar-brand logo-text" href="#">SNG School</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExample04" aria-controls="navbarsExample04" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse justify-content-end" id="navbarsExample04">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="index.php">Home</a>
                </li>
                <?php if(!isset($_SESSION['loggedin'])) {?>
                <li class="nav-item">
                    <a class="nav-link" href="login.php">Login</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="register.php">Register</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="forgot.php">Forgot Password</a>
                </li>
                <?php } else { ?>
                <li class="nav-item">
                <?php 
                    if ($_SESSION["designation"] == "Staff") {
                        echo '<a class="nav-link" href="dashboard_staff.php">';
                    } elseif ($_SESSION["designation"] == "Student") {
                        echo '<a class="nav-link" href="dashboard_students.php">';
                    } else {
                        echo '<a class="nav-link" href="dashboard.php">';
                    }
                ?>
                    Dashboard</a>
                </li>
                <?php if ($_SESSION["designation"] != "Staff" && $_SESSION["designation"] != "Student") { ?>
                <li class="nav-item">
                    <a class="nav-link" href="register_admin.php">Register New User</a>
                </li>
                <?php } ?>
                <li class="nav-item">
                    <a class="nav-link" href="resetpassword.php">Reset Password</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="logout.php">Logout</a>
                </li>
                <?php } ?>
            </ul>
        </div>
    </nav>
   