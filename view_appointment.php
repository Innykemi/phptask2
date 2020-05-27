<?php include ("lib/header.php");
    include ("lib/menu.php");
    include ("process_views/appointmentView.php");
    require_once('functions/user.php');

    if (is_user_loggedin() && !is_user_staff() || is_user_loggedin_empty()) {
        header("location: login.php");
    }
?>
    <main role="main">
        <div class="container">
            <div class="row">
                <div class="col-12 col-md-8 offset-md-2 col-lg-8 offset-lg-2 text-center justify-content-center mt-5">

                <?php if($appointmentList != null) { ?>
                    <h1>Appointments</h1>
                    <table class="table table-inverse table-responsive student text-left">
                        <thead>
                            <tr>
                                <th>Student Name</th>
                                <th>Date of appointment</th>
                                <th>Nature of appointment</th>
                                <th>Initial complaint</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php  foreach ($appointmentList as $appointmentItem) { ?>

                            <?php if($appointmentItem->department_booked == $_SESSION['department']) { ?>
                                <tr>
                                    <td><?php echo $appointmentItem->student_name ;?></td>
                                    <td><?php echo $appointmentItem->appointment_date ;?></td>
                                    <td><?php echo $appointmentItem->appointment_nature ;?></td>
                                    <td><?php echo $appointmentItem->initial_complaint ;?></td>
                                </tr>
                            <?php } ?>
                            
                        <?php } ?>
                        </tbody>
                    </table>
                <?php }  else { 
                    echo "<h3>You have no pending appointments</h3>";
                } ?>   
                </div>
            </div>
        </div>
        
    </main>
<?php include ("lib/footer.php");?>
