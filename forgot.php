<?php include ("lib/header.php");
    //redirect to users dashboard with regard to designation
    if(isset($_SESSION['loggedin'])){
        //redirect to dashboard
        header("location: login.php");
    }
    include ("lib/menu.php");
    require_once('functions/alert.php');
    require_once('functions/redirect.php');
?>
    <main role="main" class="container">
        <div class="my-5 p-3 px-4 max-width-35 mx-auto bg-white rounded shadow-sm">
            <h2>Forgot Password</h2>
            <p>Please enter email associated with this account</p>
            <form action="process/processforgot2.php" method="post">
                <?php
                    print_alert();
                ?>
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
                <button type="submit">Send Reset Code</button>
            </form>        
        </div>
    </main>
<?php include ("lib/footer.php");?>
