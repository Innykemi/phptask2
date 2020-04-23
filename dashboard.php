<?php include ("lib/header.php");
    //redirect to login page if user designation is not "Super Admin" or user hasn't logged in
    if (isset($_SESSION['loggedin']) && $_SESSION['designation'] != 'Super Admin' || empty($_SESSION['loggedin'])) {
        header("location: login.php");
    }
include ("lib/menu.php");

?>
    <main role="main">
        <div class="container">
            <div class="row">
                <div class="col-md-12 mt-5">
                    <div class="col-md-4 float-right mt-4">
                        <?php
                            if (isset($_SESSION['message']) && !empty($_SESSION['message'])){
                                echo 
                                    "<div class='alert alert-success alert-dismissible fade show' role='alert'>" 
                                        . $_SESSION["message"] .
                                        "<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>",
                                    "</div>";
                                exit();
                            }
                        ?>
                    </div>
                </div>
                <div class="col-md-12 mt-2 row">
                    <div class="col-md-7" col-12>
                        <h3 class="purple">Welcome <?php echo $_SESSION['full_name'];?> <small> (<?php echo $_SESSION['department'];?>)</small></h3>
                        <p>You're logged in as a <strong><?php echo $_SESSION['designation'];?></strong>
                        </p>
                        <a href="view_staff.php" style="margin-right: 1em;"><button>View All Staff</button></a>
                        <a href="view_students.php" style="margin-right: 1em;"><button>View All Students</button></a>
                        <a href="all_appointments.php"><button>View All Appointments</button></a>
                    </div>
                    <div class="col-md-5 col-12 row">
                        <div class="col-md-6">
                            <div class="py-3 px-3 mb-2 bg-white rounded shadow-sm">
                                <h5>Registered</h5>
                                <p><?php echo $_SESSION['registration_date'];?></p>
                            </div>
                        </div>
                        <div class="col-md-6">
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
