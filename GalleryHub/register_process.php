<?php
    include('includes/connection.inc');
    date_default_timezone_set("Australia/Melbourne");

    $_username = $_POST['username'];
    $_password = $_POST['password'];
    $_confirmPassword = $_POST['confirmPassword'];

    $_alreadyRegistered = false;
    
    $_q_check_if_registered = "SELECT * FROM member WHERE '$_username' = username";
    $checkDB = mysqli_query($_connection, $_q_check_if_registered);
    if($checkDB->num_rows == 0) {
        $_alreadyRegistered = false;
    }
    else {
        $_alreadyRegistered = true;
    }

    if ($_password == $_confirmPassword && $_alreadyRegistered == false) {
        $_username = strip_tags(mysqli_real_escape_string($_connection, trim($_username)));
        $_password = strip_tags(mysqli_real_escape_string($_connection, trim($_password)));

        $_password = sha1($_password);

        $_q_add_to_db = "INSERT INTO member (username, password, reg_date) VALUES ('$_username', '$_password', NOW())";
        $_addUser = mysqli_query($_connection, $_q_add_to_db);

       header("Location: registered.php");
    }   
?>

<?php
    $_pageTitle = "Error";
    include('includes/head.inc');
    include('includes/connection.inc');
?>
        <div class="container-fluid">
            <div class="bg-secondary text-dark">
                <main>
                    <h1 class="text-white">
                        <?php 
                            if ($_alreadyRegistered) {
                                echo "Already Registered";
                            }
                            else {
                                echo "Typo";
                            }
                        ?>
                    </h1>
                    <h3 class="text-white">
                        Please <a href="register.php">try again.</a>
                    </h3>
                </main>
                <?php
                    include('includes/footer.inc');
                ?>
            </div>
        </div>
    </body>
</html>

