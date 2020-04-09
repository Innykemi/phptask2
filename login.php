<?php include ("lib/header.php");
    if(isset($_SESSION['loggedin']) && !empty($_SESSION['loggedin'])) {
        //redirect to dashboard
        header("location: dashboard.php");
    }
    include ("lib/menu.php");
?>
    <main class="login-full">
        <div class="login-register">
        <?php
            if (isset($_SESSION['message']) && !empty($_SESSION['message'])){
                echo "<p style='color:green;'>" . $_SESSION['message'] . "</p>";
                session_destroy();
            }
        ?>
            <h1>Login</h1>
            <div class="container">
                <div class="row">
                    <form action="process/processlogin.php" method="post">
                    <p>
                        <?php
                            if (isset($_SESSION['error']) && !empty($_SESSION['error'])){
                                echo "<span style='color:red;'>" . $_SESSION['error'] . "</span>";
                                echo "<br/><span style='color:red;'>" . $_SESSION["emailErr"] . "</span>";
                                session_destroy();
                            }
                        ?>
                    </p>
                        <div class="form-item">
                            <label for="email">Email</label>
                            <input 
                            <?php
                                if (isset($_SESSION['email']) && !empty($_SESSION['email'])) {
                                    echo "value='" . $_SESSION['email'] ."'";
                                }
                            ?>
                            type="email" name="email" class="form-input" placeholder="Email">
                        </div>
                        <div class="form-item">
                            <label for="password">Password</label>
                            <input type="password" name="password" class="form-input" placeholder="Password">
                        </div>
                        <button type="submit">Login</button>
                    </form>
                </div>
            </div>
        </div>
    </main>
<?php include ("lib/footer.php");?>
