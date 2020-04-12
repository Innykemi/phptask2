<?php 
include_once ("lib/header.php");
    include_once ("lib/menu.php");
?>
    <main role="main" class="container">
        <div class="my-4 p-3 px-4 max-width-35 mx-auto bg-white rounded shadow-sm">
            <h2>Register</h2>      
            <form action="process/processregister_admin.php" method="post">
                <p>
                    <?php
                        if (isset($_SESSION['error']) && !empty($_SESSION['error'])){
                            echo "<span style='color:red;'>" . $_SESSION['error'] . "</span>";
                            echo "<br/><span style='color:red;'>" . $_SESSION["nameErr"] . "</span>";
                            echo "<br/><span style='color:red;'>" . $_SESSION["emailErr"] . "</span>";
                            session_destroy();
                        }
                    ?>
                </p>
                <div class="form-item">
                    <label for="full_name">Full Name</label>
                    <input
                    <?php
                        if (isset($_SESSION['full_name']) && !empty($_SESSION['full_name'])) {
                            echo "value='" . $_SESSION['full_name'] ."'";
                        }
                    ?>
                    type="text" name="full_name" class="form-control" placeholder="Full Name">
                </div>
                <div class="form-item">
                    <label for="gender">Gender</label>
                    <select name="gender" class="form-control">
                        <option value="">Select One</option>
                        <option 
                        <?php
                            if (isset($_SESSION['gender']) && !empty($_SESSION['gender']) && $_SESSION['gender'] == 'Female') {
                                echo 'selected';
                            }
                        ?>
                        >Female</option>
                        <option 
                        <?php
                            if (isset($_SESSION['gender']) && !empty($_SESSION['gender']) && $_SESSION['gender'] == 'Male') {
                                echo 'selected';
                            }
                        ?>
                        >Male</option>
                    </select>
                </div>
                <div class="form-item">
                    <label for="email">Email</label>
                    <input 
                    <?php
                        if (isset($_SESSION['email']) && !empty($_SESSION['email'])) {
                            echo "value='" . $_SESSION['email'] ."'";
                        }
                    ?>
                    type="email" name="email" class="form-control" placeholder="Email">
                </div>
                <div class="form-item">
                    <label for="password">Password</label>
                    <input type="password" name="password" class="form-control" placeholder="Password">
                </div>
                <div class="form-item">
                    <label for="designation">Designation</label>
                    <select name="designation" class="form-control">
                        <option value="">Select One</option>
                        <option 
                        <?php
                            if (isset($_SESSION['designation']) && !empty($_SESSION['designation']) && $_SESSION['designation'] == 'Staff') {
                                echo 'selected';
                            }
                        ?>
                        >Staff</option>
                        <option 
                        <?php
                            if (isset($_SESSION['designation']) && !empty($_SESSION['designation']) && $_SESSION['designation'] == 'Student') {
                                echo 'selected';
                            }
                        ?>
                        >Student</option>
                    </select>
                </div>
                <div class="form-item">
                    <label for="department">Department</label>
                    <input 
                    <?php
                        if (isset($_SESSION['department']) && !empty($_SESSION['department'])) {
                            echo "value='" . $_SESSION['department'] ."'";
                        }
                    ?>
                    type="text" name="department" class="form-control" placeholder="Department">
                </div>
                <button type="submit">Create Account</button>
            </form>
        </div>
    </main>  
<?php include ("lib/footer.php");?>