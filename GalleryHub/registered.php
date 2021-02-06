<?php
    $_pageTitle = "Registered";
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
                    <h1 class="text-white">
                        You have successfully registered. 
                    </h1>
                    <h3 class="text-white">
                        To upload images just <a href="login.php">login</a>.
                    </h3>
                </main>
                <?php
                    include('includes/footer.inc');
                ?>
            </div>
        </div>
    </body>
</html>