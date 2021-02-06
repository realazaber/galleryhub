<?php
    include('includes/connection.inc');
    include('includes/check_login.inc');
    $_pageTitle = "My Account";
    include('includes/head.inc');

    $_username = $_SESSION['username'];
?>
        <div class="container-fluid">
            <div class="bg-secondary text-dark">
                <main>
                    <h1 class="text-white">
                        <?php echo $_pageTitle; ?>
                    </h1>
                    <h2 class="text-white">
                        Your username is: 
                        <?php echo $_username ?>
                    </h2>
                    <h2 class="text-white">
                        You have signed up on: 
                        <?php

                            $q_checkDB = "SELECT reg_date FROM member WHERE username = '$_username'";
                            $r_checkDB = mysqli_query($_connection, $q_checkDB);
                            $result_checkDB = mysqli_fetch_assoc($r_checkDB);

                            $reg_date = $result_checkDB['reg_date'];

                            echo $reg_date;

                        ?>
                    </h2>
                    <br>
                    <h4 class="text-white">
                        Change password
                    </h4>
                    <form action="change_pasword.php" method="post">
                    <table>
                        <tr>
                            <td><h3 class="text-white">Old password:</h3></td>
                            <td><input class="bg-dark text-white" type="password" name="old_password" required></td>
                        </tr>
                        <tr>
                            <td><h3 class="text-white">New password:</h3></td>
                            <td><input class="bg-dark text-white" type="password" name="new_password" required></td>
                        </tr>
                        <tr>
                            <td><h3 class="text-white">Confirm password:</h3></td>
                            <td><input class="bg-dark text-white" type="password" name="confirmPassword" required></td>
                        </tr>
                        </table>
                        <br>
                        <button class="btn btn-dark" type="submit">Change Password</button>
                    </form>
                </main>
                <?php
                    include('includes/footer.inc');
                ?>
            </div>
        </div>
    </body>
</html>