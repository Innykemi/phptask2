<?php include ("lib/header.php");
    //redirect to users dashboard with regard to designation
    if(isset($_SESSION['loggedin']) && !empty($_SESSION['loggedin']) && $_SESSION['designation'] == 'Student'){
        header("location: dashboard_students.php");
    } elseif (isset($_SESSION['loggedin']) && !empty($_SESSION['loggedin']) && $_SESSION['designation'] == 'Staff') {
        header("location: dashboard_staff.php");
    } elseif (isset($_SESSION['loggedin']) && !empty($_SESSION['loggedin']) && $_SESSION['designation'] == 'Super Admin') {
        header("location: dashboard.php");
    }
    include ("lib/menu.php");
    require_once('functions/alert.php');
    require_once('functions/redirect.php');
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
