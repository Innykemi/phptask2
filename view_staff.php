<?php include ("lib/header.php");
    if (isset($_SESSION['loggedin']) && $_SESSION['designation'] != 'Super Admin' || empty($_SESSION['loggedin'])) {
        header("location: login.php");
    }
    include ("lib/menu.php");
    include ("process_views/staffView.php");
?>
    <main role="main">
        <div class="container">
            <div class="row">
                <div class="col-12 col-md-9 offset-md-1 col-lg-9 offset-lg-1 text-center justify-content-center mt-5">

                <?php if($designationFromDB != 'Staff') { ?>
                    <h1>Staff</h1>
                    <table class="table table-inverse table-responsive staff text-left">
                        <thead>
                            <tr>
                                <th>Staff Name</th>
                                <th>Gender</th>
                                <th>Email</th>
                                <th>Department</th>
                                <th>Registration Date</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php  foreach ($staffList as $staffItem) { ?>
                            <?php if($staffItem->designation == 'Staff') { ?>
                            <tr>
                                <td><?php echo $staffItem->full_name ;?></td>
                                <td><?php echo $staffItem->gender ;?></td>
                                <td><?php echo $staffItem->email ;?></td>
                                <td><?php echo $staffItem->department ;?></td>
                                <td><?php echo $staffItem->registration_date ;?></td>
                            </tr>
                            <?php } ?>
                        <?php } ?>
                        </tbody>
                    </table>
                <?php }  else { 
                    echo "<h3>No staff has registered</h3>";
                } ?>   
                </div>
            </div>
        </div>
        
    </main>
<?php include ("lib/footer.php");?>
