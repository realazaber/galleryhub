<?php
    error_reporting(0);
    include("includes/connection.inc");

    $_username = $_POST['username']; //Receives user input for username
    $_password = $_POST['password']; //Receives user input for password
    $_password = sha1($_password); //Hashes the password

    $_user_not_found = false; //Checks if account exists
    $_wrong_password = false; //Checks if password does not match the one in database

    $_q_check_users = "SELECT * FROM member WHERE username='$_username'"; //Finds the user 
    $_q_check_users_and_password = "SELECT * FROM member WHERE username='$_username' AND password LIKE '$_password'"; //Checks for login

    $_r_check_users = mysqli_query($_connection, $_q_check_users); //Runs the query for finding the user
    $_r_check_both = mysqli_query($_connection, $_q_check_users_and_password); //Runs the query that checks if the login details are correct

    if(mysqli_num_rows($_r_check_users) > 0 && mysqli_num_rows($_r_check_both) > 0) { //If both username and password are correct this will log in the user
        session_start();                    
        $_SESSION['username'] = $_username;
        header("Location: admin_home.php");
    }
    else if(mysqli_num_rows($_r_check_users) == 0) { //If username is not in database / account doesn't exist
        $_user_not_found = true;

    }
    else if (mysqli_num_rows($_r_check_both) == 0 && $_user_not_found == false) { //If wrong password
        $_wrong_password = true;
    }


    $_pageTitle = "Error";
    include('includes/head.inc');
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
                <h1 class="text-white">
                    <?php
                        if ($_user_not_found) {
                            echo "Account with name " . $_username . " does not exist.<br>Click <a href='register.php'>here</a> to create one"; //If the username entered isn't in database then the user can register
                        }
                        else if ($_wrong_password) {
                            echo "Wrong password.<br>Click <a href='login.php'>here</a> to try again."; //If the user exists but wrong passowrd, prompts user to try again.
                        }
                    ?>
                </h1>
                </main>
                <?php
                    include('includes/footer.inc');
                ?>
            </div>
        </div>
    </body>
</html>