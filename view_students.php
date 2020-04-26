<?php include ("lib/header.php");
    include ("lib/menu.php");
    include ("process_views/studentsView.php");
    require_once('functions/user.php');

    if (is_user_loggedin() && !is_user_superadmin() || is_user_loggedin_empty()) {
        header("location: login.php");
    }
?>
    <main role="main">
        <div class="container">
            <div class="row">
                <div class="col-12 col-md-9 offset-md-1 col-lg-9 offset-lg-1 text-center justify-content-center mt-5">

                <?php if($designationFromDB == 'Student') { ?>
                    <h1>Students</h1>
                    <table class="table table-inverse table-responsive students text-left">
                        <thead>
                            <tr>
                                <th>Student Name</th>
                                <th>Gender</th>
                                <th>Email</th>
                                <th>Department</th>
                                <th>Registration Date</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php  foreach ($studentList as $studentItem) { ?>
                            <?php if($studentItem->designation == 'Student') { ?>
                            <tr>
                                <td><?php echo $studentItem->full_name ;?></td>
                                <td><?php echo $studentItem->gender ;?></td>
                                <td><?php echo $studentItem->email ;?></td>
                                <td><?php echo $studentItem->department ;?></td>
                                <td><?php echo $studentItem->registration_date ;?></td>
                            </tr>
                            <?php } ?>
                        <?php } ?>
                        </tbody>
                    </table>
                <?php }  else { 
                    echo "<h3>No student has registered</h3>";
                } ?>   
                </div>
            </div>
        </div>
        
    </main>
<?php include ("lib/footer.php");?>
