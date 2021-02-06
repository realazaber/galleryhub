<?php
    $_pageTitle = "Login";
    include('includes/head.inc');
    include('includes/connection.inc');
?>
        <div class="container-fluid">
            <div class="bg-secondary text-dark">
                <main>
                <h1 class="text-white">
                    <?php
                        echo $_pageTitle;
                    ?>
                </h1>
                <br>
                <h4 class="text-white">
                    If you do not have an account please go to the <a class="text-primary" href="register.php">register</a> page.
                </h4>
                <form action="login_process.php" method="post">
                    <table>
                        <tr>
                            <td><h3 class="text-white">Username:</h3></td>
                            <td><input class="bg-dark text-white" type="text" name="username" required></td>
                        </tr>
                        <tr>
                            <td><h3 class="text-white">Password:</h3></td>
                            <td><input class="bg-dark text-white" type="password" name="password" required></td>
                        </tr>
                    </table>
                    <br>
                    <button class="btn btn-dark btn-lg" type="submit">Login</button>
                </form>
                </main>
                <?php
                    include('includes/footer.inc');
                ?>
            </div>
        </div>
    </body>
</html>

