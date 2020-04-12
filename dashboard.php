<?php include ("lib/header.php");
    if(!isset($_SESSION['loggedin']) && !empty($_SESSION['loggedin'])) {
        //redirect to dashboard
        header("location: login.php");
    }
include ("lib/menu.php");

?>
    <main role="main">
        <div class="container">
            <div class="row">
                <div class="col-md-12 mt-5">
                    <h1>Dashboard</h1>
                    <h3>Welcome <?php echo $_SESSION['full_name'];?><small> (<?php echo $_SESSION['department'];?>)</small></h3>
                    <p>You're logged in as the <strong><?php echo $_SESSION['designation'];?></strong>
                    </p>
                    <p>
                        Registered: <?php echo $_SESSION['registration_date'];?><br/>
                        Last Login: <?php echo $_SESSION['last_login'];?>
                    </p>
                    <p>
                        <?php
                            if (isset($_SESSION['message']) && !empty($_SESSION['message'])){
                                echo "<p style='color:green;'>" . $_SESSION['message'] . "</p>";
                                session_destroy();
                            }
                        ?>
                    </p>
                </div>
            </div>
        </div>
        
    </main>
<?php include ("lib/footer.php");?>
