<?php
    error_reporting(0);
    include('includes/connection.inc');
    include('includes/check_login.inc');
    $_username = $_SESSION['username'];

    $_artwork_id = $_GET['id'];

    $_q_get_image = "SELECT artwork_id, username, title, category, filename FROM artwork 
                      WHERE artwork_id = $_artwork_id";
    $_r_get_image = mysqli_query($_connection, $_q_get_image);

    $_pageTitle = "delete artwork " . $_artwork_id;
    include('includes/head.inc');
  
?>
        <div class="container-fluid">
            <div class="bg-secondary text-dark">
                <main>
                    <h1 class="text-white">
                        <?php
                            echo "Are you sure you want to " . $_pageTitle;
                        ?>
                    </h1>
                    <br>
                    <?php
                        while ($row = $_r_get_image->fetch_assoc()) {

                            echo "<img src='uploads/" . 
                                $row['filename'] .
                                 "' width='500px' height='340px'>
                                 <br>";
                        }
                    ?>
                    <br>
                    <?php
                    echo "

                    <a href='image_deleted.php?id=$_artwork_id'>
                        <button class='btn btn-danger'>
                            Delete
                        </button>
                    </a>
                    ";  

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