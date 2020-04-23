<?php
include ("lib/header.php");
    //redirect to login page if user designation is not "Staff" or user hasn't logged in
    if (isset($_SESSION['loggedin']) && $_SESSION['designation'] != 'Staff' || empty($_SESSION['loggedin'])) {
        header("location: login.php");
    }
include ("lib/menu.php");

?>
    <main role="main">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <?php
                        if (isset($_SESSION['message']) && !empty($_SESSION['message'])){
                            echo 
                                "<div class='alert alert-success' role='alert'>" 
                                    . $_SESSION["message"] .
                                "</div>";
                        }
                    ?>
                </div>
                <div class="col-md-12 mt-5 row">
                    <div class="col-md-5" col-12>
                        <h3 class="purple">Welcome <?php echo $_SESSION['full_name'];?></h3>
                        <p>You're logged in as a <strong><?php echo $_SESSION['designation'];?></strong>
                        </p>
                        <a href="view_appointment.php"><button>View Appointments</button></a>
                    </div>
                    <div class="col-md-7 col-12 row">
                        <div class="col-md-4">
                            <div class="py-3 px-3 mb-2 bg-white rounded shadow-sm">
                                <h5>Department</h5>
                                <p><?php echo $_SESSION['department'];?></p>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="py-3 px-3 mb-2 bg-white rounded shadow-sm">
                                <h5>Registered</h5>
                                <p><?php echo $_SESSION['registration_date'];?></p>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="py-3 px-3 mb-2 bg-white rounded shadow-sm">
                                <h5>Last Login</h5>
                                <p><?php echo $_SESSION['last_login'];?></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
    </main>
<?php include ("lib/footer.php");?>
