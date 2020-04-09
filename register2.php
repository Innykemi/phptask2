<?php session_start();
    include_once ("lib/header.php");?>
    <?php include_once ("lib/menu.php");?>
    <div class="login-register">
        <h1>Register</h1>
        <div class="container">
            <div class="row">
                <form action="process/processregister.php" method="post">
                <p>
                    <?php
                        if (isset($_SESSION['error']) && !empty($_SESSION['error'])){
                            echo "<span style='color:red;'>" . $_SESSION['error'] . "</span>";
                            
                            session_destroy();
                        }
                    ?>
                </p>
                    <div class="form-item">
                        <label for="first_name">First Name</label>
                        <input 
                        <?php
                            if (isset($_SESSION['first_name'])) {
                                echo "value=" . $_SESSION['first_name'];
                            }
                        ?>
                        type="text" name="first_name" class="form-input" placeholder="First Name">
                    </div>
                    <div class="form-item">
                        <label for="last_name">Last Name</label>
                        <input 
                        <?php
                            if (isset($_SESSION['last_name'])) {
                                echo "value=" . $_SESSION['last_name'];
                            }
                        ?>
                        type="text" name="last_name" class="form-input" placeholder="Last Name">
                    </div>
                    <div class="form-item">
                        <label for="gender">Gender</label>
                        <select name="gender" class="form-input">
                            <option value="">Select One</option>
                            <option 
                            <?php
                                if (isset($_SESSION['gender']) && $_SESSION['gender'] == 'Female') {
                                    echo 'selected';
                                }
                            ?>
                            >Female</option>
                            <option 
                            <?php
                                if (isset($_SESSION['gender']) && $_SESSION['gender'] == 'Male') {
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
                            if (isset($_SESSION['email'])) {
                                echo "value=" . $_SESSION['email'];
                            }
                        ?>
                        type="email" name="email" class="form-input" placeholder="Email">
                    </div>
                    <div class="form-item">
                        <label for="password">Password</label>
                        <input type="password" name="password" class="form-input" placeholder="Password">
                    </div>
                    <div class="form-item">
                        <label for="designation">Designation</label>
                        <select name="designation" class="form-input">
                            <option value="">Select One</option>
                            <option 
                            <?php
                                if (isset($_SESSION['designation']) && $_SESSION['designation'] == 'Staff') {
                                    echo 'selected';
                                }
                            ?>
                            >Staff</option>
                            <option 
                            <?php
                                if (isset($_SESSION['designation']) && $_SESSION['designation'] == 'Student') {
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
                            if (isset($_SESSION['department'])) {
                                echo "value=" . $_SESSION['department'];
                            }
                        ?>
                        type="text" name="department" class="form-input" placeholder="Department">
                    </div>
                    <button type="submit">Register</button>
                </form>
            </div>
        </div>
    </div>
    
<?php include ("lib/footer.php");?>
