<?php
    error_reporting(0);
    $_pageTitle = "Gallery";
    include('includes/head.inc');
    include('includes/connection.inc');

    $_q_get_category = "SELECT DISTINCT(category) FROM artwork ORDER BY category ASC";
    
    $_r_get_category = mysqli_query($_connection, $_q_get_category);

?>
        <div class="container-fluid">
            <div class="bg-secondary text-dark">
                <main>
                    <h1 class="text-white">
                        Gallery
                    </h1>
                    <br>
                    <form action="gallery.php" method="post">
                        <select class="bg-dark text-white" name="category" id="category">
                            <option class="bg-dark text-white">Please select a category</option>
                            <?php
                                while ($row = $_r_get_category->fetch_assoc()) {
                                    echo "<option class='bg-dark text-white' value=" . $row['category'] . ">" . $row['category'] . "</option>";
                                }
                            ?>
                        </select>
                        <br>
                        <input class="bg-dark text-white" type="submit" value="Search">
                    </form>
                    <table>
                    <?php
                        if (isset($_POST['category'])) {
                            $_chosen_category = $_POST['category'];
                            $_q_get_images = "SELECT artwork_id, category, filename FROM artwork WHERE category LIKE '$_chosen_category' ORDER BY artwork_id DESC";
                            $_r_get_images = mysqli_query($_connection, $_q_get_images);
                            echo "<h2 class='text-white'>" . $row . "</h2>";
                        }
    
                        $_counter = 0;

                        while ($row = $_r_get_images->fetch_assoc()) {
                            
                            if ($_counter == 3) {
                                echo "<tr>";
                            }

                            echo "<td><a href='artwork.php?id=" . $row['artwork_id'] . "'/><img class='gallery_img' src='uploads/" . 
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