<?php
    error_reporting(0);
    include('includes/connection.inc');
    include('includes/check_login.inc');
    $_username = $_SESSION['username'];

    $_artwork_id = $_GET['id'];


       
    $_q_image_path = "SELECT artwork_id, filename FROM artwork WHERE artwork_id LIKE '$_artwork_id'";
    $_r_image_path = mysqli_query($_connection, $_q_image_path);
    $_image_path = mysqli_fetch_assoc($_r_image_path);
    $_path = "uploads/" . $_image_path['filename'];
    unlink($_path);
    
    $_q_delete_image = "DELETE FROM artwork 
    WHERE artwork_id = '$_artwork_id'";

    $_r_delete_image = mysqli_query($_connection, $_q_delete_image);

    $_pageTitle = "Image deleted";
    include('includes/head.inc');
?>

        <div class="container-fluid">
            <div class="bg-secondary text-dark">
                <main>
                    <h1 class="text-white">
                        <?php
                            echo "Deleted";
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