<?php 
include ("lib/header.php");
include ("lib/menu.php");
require_once('functions/alert.php');
require_once('functions/redirect.php');
require_once('functions/user.php');

//redirect to users dashboard with regard to designation
if(is_user_loggedin() && !is_user_loggedin_empty() && is_user_student()){
    header("location: dashboard_students.php");
} elseif (is_user_loggedin() && !is_user_loggedin_empty() && is_user_staff()) {
    header("location: dashboard_staff.php");
} elseif (is_user_loggedin() && !is_user_loggedin_empty() && is_user_superadmin()) {
    header("location: dashboard.php");
}
?>
    <main role="main" class="container">
        <div class="my-5 p-3 px-4 max-width-35 mx-auto bg-white rounded shadow-sm">
            <?php print_alert();?>
            <h2>Login</h2>
            <form action="process/processlogin.php" method="post">
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
                <button type="submit">Login</button>
            </form>        
        </div>
    </main>
<?php include ("lib/footer.php");?>
