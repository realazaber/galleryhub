<?php
    include('includes/connection.inc');
    include('includes/check_login.inc');
    $_pageTitle = "Admin";
    include('includes/head.inc');

    $_username = $_SESSION['username'];

    $_q_get_images = "SELECT artwork_id, username, title, category, filename FROM artwork 
                      WHERE username like '$_username'";
    $_r_get_images = mysqli_query($_connection, $_q_get_images);
    
?>
        <div class="container-fluid">
            <div class="bg-secondary text-dark">
                <main>
                    <h1 class="text-white">
                        <?php
                            echo "Welcome " . $_SESSION['username'];
                        ?>
                    </h1>
                    <br>
                    <form action="manage_image.php" method="post">
                        <table>
                            <?php

                                $_counter = 0;

                                while ($row = $_r_get_images->fetch_assoc()) {
                                    
                                    if ($_counter == 4) {
                                        echo "<tr>";
                                    }

                                    echo "<td><a href='manage_image.php?id=" . $row['artwork_id'] ."'/><img src='uploads/" . 
                                        $row["filename"] .
                                        "' width='300px' height='170px'></td>";

                                    $_counter++;
                                }
                            ?>
                        </table>
                    </form>
                </main>
                <?php
                    include('includes/footer.inc');
                ?>
            </div>
        </div>
    </body>
</html>