<?php
include ("lib/header.php");
include ("lib/menu.php");
require_once('functions/alert.php');
require_once('functions/redirect.php');
require_once('functions/user.php');

//redirect to login page if user designation is not "Staff" or user hasn't logged in
if (is_user_loggedin() && !is_user_student() || is_user_loggedin_empty()) {
    header("location: login.php");
}
?>
    <main role="main">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="col-md-4 float-right mt-4 col-12">
                        <?php
                            print_alert();
                            //unset_session();
                        ?>
                    </div>
                    
                </div>
                <div class="col-md-12 row">
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
