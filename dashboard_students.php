<?php
include ("lib/header.php");
    if (isset($_SESSION['loggedin']) && $_SESSION['designation'] != 'Student' || empty($_SESSION['loggedin'])) {
        header("location: login.php");
    }
include ("lib/menu.php");

?>
    <main role="main">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="col-md-4 float-right mt-4">
                        <?php
                            if (isset($_SESSION['message']) && !empty($_SESSION['message'])){
                                echo 
                                    "<div class='alert alert-success alert-dismissible fade show' role='alert'>" 
                                        . $_SESSION["message"] .
                                        "<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>",
                                    "</div>";
                                //session_destroy();
                            }
                        ?>
                    </div>
                    
                </div>
                <div class="col-md-12 mt-2 row">
                    <div class="col-md-5 col-12">
                        <h3 class="purple">Welcome <?php echo $_SESSION['full_name'];?></h3>
                        <p>You're logged in as a <strong><?php echo $_SESSION['designation'];?></strong>
                        </p>
                        <a href="paybill.php" style="margin-right: 1em;"><button>Pay Bill</button></a>
                        <a href="book_appointment.php"><button>Book Appointment</button></a>
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
