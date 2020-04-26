<?php include ("lib/header.php");
    include ("lib/menu.php");
    include ("process_views/allAppointmentsView.php");
    require_once('functions/user.php');
    
    if (is_user_loggedin() && !is_user_superadmin() || is_user_loggedin_empty()) {
        header("location: login.php");
    }
?>
    <main role="main">
        <div class="container">
            <div class="row">
                <div class="col-12 col-md-9 offset-md-1 col-lg-9 offset-lg-1 text-center justify-content-center mt-5">

                <?php if($appointmentList != null) { ?>
                    <h1>All Appointments</h1>
                    <table class="table table-inverse table-responsive staff text-left">
                        <thead>
                            <tr>
                                <th>Student Name</th>
                                <th>Date of appointment</th>
                                <th>Nature of appointment</th>
                                <th>Initial complaint</th>
                                <th>Department Booked</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php  foreach ($appointmentList as $appointmentItem) { ?>
                            <tr>
                                <td><?php echo $appointmentItem->student_name ;?></td>
                                <td><?php echo $appointmentItem->appointment_date ;?></td>
                                <td><?php echo $appointmentItem->appointment_nature ;?></td>
                                <td><?php echo $appointmentItem->initial_complaint ;?></td>
                                <td><?php echo $appointmentItem->department_booked ;?></td>
                            </tr>
                            
                        <?php } ?>
                        </tbody>
                    </table>
                <?php }  else { 
                    echo "<h3>There are no pending appointments</h3>";
                } ?>   
                </div>
            </div>
        </div>
        
    </main>
<?php include ("lib/footer.php");?>
