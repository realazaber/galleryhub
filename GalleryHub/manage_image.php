    <?php
    include('includes/connection.inc');
    include('includes/check_login.inc');
    $_username = $_SESSION['username'];

    $_artwork_id = $_GET['id'];

    $_q_get_images = "SELECT * FROM artwork 
                      WHERE artwork_id = '$_artwork_id'";
    $_r_get_images = mysqli_query($_connection, $_q_get_images);

    $_pageTitle = "Manage Image";
    include('includes/head.inc');
  
?>
        <div class="container-fluid">
            <div class="bg-secondary text-dark">
                <main>
                    <h1 class="text-white">
                        <?php
                            echo "Manage Image";
                        ?>
                    </h1>
                                        
                        <table>
                            <?php

                                while ($row = $_r_get_images->fetch_assoc()) {
                                    
                                    echo "
                                        <h3 class='text-white'>Title: " . $row['title'] . "</h3>
                                        <h3 class='text-white'>Category: " . $row['category'] . "</h3>
                                        <h3 class='text-white'>Description: " . $row['description'] . "</h3>
                                        <h3 class='text-white'>Tags: " . $row['tags'] . "</h3>
                                        <br>
                                        <td><img src='uploads/" . 
                                        $row["filename"] .
                                        "' width='500px' height='340px'>
                                        <br><br>
                                        <center>
                                            <a href='delete_image.php?id=" . $row['artwork_id'] . "'>
                                                <button class='btn btn-danger'>
                                                    Delete Image
                                                </button>
                                            </a>
                                        </center>
                                        </td>";


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