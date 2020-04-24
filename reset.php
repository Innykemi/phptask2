<?php include ("lib/header.php");
    include ("lib/menu.php");

    if (!isset($_SESSION['loggedin']) && !isset($_GET['token']) && !isset($_SESSION['token'])){
        $_SESSION["error"] = "You are not authorized to view this page";
        $_SESSION["emailErr"] = "";
        header("location: login.php");
    }
?>
    <main role="main" class="container">
        <div class="my-5 p-3 px-4 max-width-35 mx-auto bg-white rounded shadow-sm">
            <h2>Reset Password</h2>
            <p>Reset Password associated with your account : [email]</p> 
            <form action="process/processreset.php" method="post">
                <?php
                    if (isset($_SESSION['error']) && !empty($_SESSION['error'])){
                        echo 
                            "<div class='alert alert-danger' role='alert'>" 
                                . $_SESSION['error'] . "<br/>"
                                . $_SESSION["emailErr"] .
                            "</div>";
                        unset($_SESSION['error']);
                        unset($_SESSION['emailErr']);
                    }
                ?>
                <?php if (!$_SESSION['loggedin']) { ?>
                <input 
                <?php              
                    if(isset($_SESSION['token'])){
                        echo "value='" . $_SESSION['token'] . "'";                                                             
                    } else{
                        echo "value='" . $_GET['token'] . "'";
                    }             
                ?>
                type="hidden" name="token"/>
                <?php } ?>
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
                <button type="submit">Reset Password</button>
            </form>        
        </div>
    </main>
<?php include ("lib/footer.php");?>
