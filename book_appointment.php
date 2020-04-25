<?php include_once ("lib/header.php");
    //redirect to login page if user designation is not "Student" or user hasn't logged in
    if(isset($_SESSION['loggedin']) && $_SESSION['designation'] != 'Student' || empty($_SESSION['loggedin'])){
        //redirect to dashboard
        header("location: login.php");
    }
    include_once ("lib/menu.php");
    require_once('functions/alert.php');
    require_once('functions/redirect.php');
?>
    <main role="main" class="container">
        <div class="my-4 p-3 px-4 max-width-35 mx-auto bg-white rounded shadow-sm">
            <h2>Book Appointment</h2>      
            <form action="process/process_appointment.php" method="post">
                <?php
                    print_alert();
                    //unset_session();
                ?>
                <div class="form-item">
                    <label for="appointment_date">Date of Appointment</label>
                    <input 
                    <?php
                        if (isset($_SESSION['appointment_date']) && !empty($_SESSION['appointment_date'])) {
                            echo "value='" . $_SESSION['appointment_date'] ."'";
                        }
                    ?>
                    type="date" name="appointment_date" class="form-control" placeholder="Date of Appointment">
                </div>
                <div class="form-item">
                    <label for="appointment_time">Time of Appointment (24 hour)</label>
                    <input 
                    <?php
                        if (isset($_SESSION['appointment_time']) && !empty($_SESSION['appointment_time'])) {
                            echo "value='" . $_SESSION['appointment_time'] ."'";
                        }
                    ?>
                    type="time" name="appointment_time" class="form-control">
                </div>
                <div class="form-item">
                    <label for="appointment_nature">Nature of Appointment</label>
                    <select name="appointment_nature" class="form-control">
                        <option value="">Select One</option>
                        <option 
                        <?php
                            if (isset($_SESSION['appointment_nature']) && !empty($_SESSION['appointment_nature']) && $_SESSION['appointment_nature'] == 'Grade Issues') {
                                echo 'selected';
                            }
                        ?>
                        >Grade Issues</option>
                        <option 
                        <?php
                            if (isset($_SESSION['appointment_nature']) && !empty($_SESSION['appointment_nature']) && $_SESSION['appointment_nature'] == 'Missing Report Card') {
                                echo 'selected';
                            }
                        ?>
                        >Missing Report Card</option>
                        <option 
                        <?php
                            if (isset($_SESSION['appointment_nature']) && !empty($_SESSION['appointment_nature']) && $_SESSION['appointment_nature'] == 'Counselling') {
                                echo 'selected';
                            }
                        ?>
                        >Counselling</option>
                        <option 
                        <?php
                            if (isset($_SESSION['appointment_nature']) && !empty($_SESSION['appointment_nature']) && $_SESSION['appointment_nature'] == 'Health Issues') {
                                echo 'selected';
                            }
                        ?>
                        >Health Issues</option>
                        <option 
                        <?php
                            if (isset($_SESSION['appointment_nature']) && !empty($_SESSION['appointment_nature']) && $_SESSION['appointment_nature'] == 'Others') {
                                echo 'selected';
                            }
                        ?>
                        >Others</option>
                    </select>
                </div>
                <div class="form-item">
                    <label for="initial_complaint">Initial Complaint</label>
                    <textarea class="form-control" name="initial_complaint" rows="3"
                    ><?php
                        if (isset($_SESSION['initial_complaint']) && !empty($_SESSION['initial_complaint'])) {
                            echo $_SESSION['initial_complaint'];
                        }
                    ?></textarea>
                </div>
                <div class="form-item">
                    <label for="department_booked">Department the appointment is booked for</label>
                    <select name="department_booked" class="form-control">
                        <option value="">Select One</option>
                        <option 
                        <?php
                            if (isset($_SESSION['department_booked']) && !empty($_SESSION['department_booked']) && $_SESSION['department_booked'] == 'Art') {
                                echo 'selected';
                            }
                        ?>
                        >Art</option>
                        <option 
                        <?php
                            if (isset($_SESSION['department_booked']) && !empty($_SESSION['department_booked']) && $_SESSION['department_booked'] == 'Science') {
                                echo 'selected';
                            }
                        ?>
                        >Science</option>
                        <option 
                        <?php
                            if (isset($_SESSION['department_booked']) && !empty($_SESSION['department_booked']) && $_SESSION['department_booked'] == 'Commercial') {
                                echo 'selected';
                            }
                        ?>
                        >Commercial</option>
                        <option 
                        <?php
                            if (isset($_SESSION['department_booked']) && !empty($_SESSION['department_booked']) && $_SESSION['department_booked'] == 'Health') {
                                echo 'selected';
                            }
                        ?>
                        >Health</option>
                        <option 
                        <?php
                            if (isset($_SESSION['department_booked']) && !empty($_SESSION['department_booked']) && $_SESSION['department_booked'] == 'Non Teaching Staff') {
                                echo 'selected';
                            }
                        ?>
                        >Non Teaching Staff</option>
                    </select>
                </div>
                <button type="submit">Submit</button>
            </form>
        </div>
    </main>  
<?php include ("lib/footer.php");?>
