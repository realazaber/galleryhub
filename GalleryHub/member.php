<?php
    $_pageTitle = "Member Details";
    include('includes/connection.inc');
    include('includes/head.inc');

    $_username = $_GET['id'];

    $_q_get_user = "SELECT user_id, username, reg_date FROM member WHERE username = '$_username'";
    
    $_r_get_user = mysqli_query($_connection, $_q_get_user);

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
                <?php

                    while ($row = $_r_get_user->fetch_assoc()) {
                        
                        echo "  <h2 class='text-white'>User ID: " . $row['user_id'] . "</h2>
                                <h2 class='text-white'>Username: " . $row['username'] ."</h2>
                                <h2 class='text-white'>Registration date: " . $row['reg_date'] ."</h2>
                            ";
                    }                  
                ?>

                <table>

                    <?php

                        $_q_get_images = "SELECT artwork_id, filename FROM artwork WHERE username = '$_username'";
                            
                        $_r_get_images = mysqli_query($_connection, $_q_get_images);

                        $_counter = 0;

                        while ($row = $_r_get_images->fetch_assoc()) {
                            
                            if ($_counter == 3) {
                                echo "<tr>";
                            }

                            echo "<td><a href='artwork.php?id=" . $row['artwork_id'] . "'/><img src='uploads/" . 
                                $row["filename"] .
                                 "' width='400px' height='200px'></a></td>";

                            $_counter++;
                        }
                    ?>
                </table>
                </main>
                <?php
                    include('includes/footer.inc');
                ?>
            </div>
        </div>
    </body>
</html>