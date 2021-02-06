<?php
    $_pageTitle = "Register";
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
                        Want to upload your own images to Image Gallery 101?
                        Sign up today, its free :).
                    </h4>
                    <form action="register_process.php" method="post">
                        <table>

                        <tr>
                            <td><h3 class="text-white">Username:</h3></td>
                            <td><input class="bg-dark text-white" type="text" name="username" required></td>
                        </tr>
                        <tr>
                            <td><h3 class="text-white">Password:</h3></td>
                            <td><input class="bg-dark text-white" type="password" name="password" required></td>
                        </tr>
                        <tr>
                            <td><h3 class="text-white">Confirm password:</h3></td>
                            <td><input class="bg-dark text-white" type="password" name="confirmPassword" required></td>
                        </tr>
                        
                        </table>
                        <br>
                        <button class="btn btn-dark btn-lg" type="submit">Register</button>
                    </form>
                </main>
                <?php
                    include('includes/footer.inc');
                ?>
            </div>
        </div>
    </body>
</html>