<?php
include ("lib/header.php");
    if(!isset($_SESSION['loggedin'])) {
    //redirect to dashboard
    header("location: login.php");
}
include ("lib/menu.php");

?>
    <main>
        <h1>Dashboard</h1>
        
        <h3>Welcome <?php echo $_SESSION['full_name'];?></h3>
        <p>You're logged in as a <strong><?php echo $_SESSION['designation'];?></strong> in the <?php echo $_SESSION['department'];?> department.
        </p>
        <p>
            Registered: <?php echo $_SESSION['registration_date'];?><br/>
            Last Login: <?php echo $_SESSION['last_login'];?>
        </p>
    </main>
<?php include ("lib/footer.php");?>
