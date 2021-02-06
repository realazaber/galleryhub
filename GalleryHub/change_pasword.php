<?php
    include('includes/connection.inc');
    include('includes/check_login.inc');
    $_pageTitle = "Password changed";
    include('includes/head.inc');

    $_oldPassword = $_POST['old_password'];
    $_newPassword = $_POST['new_password'];
    $_confirmPassword = $_POST['confirmPassword'];

    $_newPassword = sha1($_newPassword);
    $_confirmPassword = sha1($_confirmPassword);

    $_typo = false;
    $_typo_new_password = false;

    $_username = $_SESSION['username'];

    $_q_checkDB = "SELECT * FROM member WHERE username = '$_username'"; //Query to find the user
    $_q_changePassword = "UPDATE member SET password = '$_confirmPassword' WHERE username = '$_username'"; //Query to change the password

    $_r_checkDB = mysqli_query($_connection, $_q_checkDB);
    $result_checkDB = mysqli_fetch_assoc($_r_checkDB);

    $_oldPassword = sha1($_oldPassword);

    if ($_oldPassword == $result_checkDB['password']) {
        if ($_newPassword == $_confirmPassword) {
            mysqli_query($_connection, $_q_changePassword);
        }
        else {
            $_typo_new_password = true;
        }
    }
    else {
        $_typo = true;

    }
?>
        <div class="container-fluid">
            <div class="bg-secondary text-dark">
                <main>
                    <h1 class="text-white">
                        <?php 
                            if ($_typo == true) {
                                echo "Error";
                            }
                         ?>
                    </h1>
                    <?php
                        if ($_typo == true) {
                            echo "
                            <h2 class='text-white'>
                                The password you typed in is not the 
                                same as your old one, please <a href='my_account.php'>try again.</a>
                            </h2>
                            ";

                        }

                        if ($_typo_new_password == true) {
                            echo "
                            <h2 class='text-white'>
                                Your new password and confirm password do not match, please <a href='my_account.php'>try again.</a>
                            </h2>
                            ";
                        }

                        if (!$_typo && !$_typo_new_password) {
                            echo "
                            <h2 class='text-white'>
                                Successfully changed password!
                            </h2>
                            ";
                        }
                    

                    ?>
                </main>
                <?php
                    include('includes/footer.inc');
                ?>
            </div>
        </div>
    </body>
</html>