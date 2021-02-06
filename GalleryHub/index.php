<?php
    include('includes/connection.inc');
    $_pageTitle = "Home";
    include('includes/head.inc');

    $_q_get_images = "SELECT * FROM artwork ORDER BY artwork_id DESC";
    $_r_get_images = mysqli_query($_connection, $_q_get_images);

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
                    <h5 class="text-white">
                        Welcome to Gallery Hub. Prepare to be blown away by the mind blowing pictures here.
                        Hold onto your jars.
                    </h5>

                    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                        <ol class="carousel-indicators">
                            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                            <li data-target="#carouselExampleIndicators" data-slide-to="3"></li>
                        </ol>
                        <div class="carousel-inner">
                        <?php

                            $_counter = 0;

                            while ($row = $_r_get_images->fetch_assoc()) {
                                if ($_counter < 1) {
                                    echo "
                                    <div class='carousel-item active'>
                                        <a href='artwork.php?id=" . $row['artwork_id'] . "'/><img class='carousel_img' src='uploads/" . $row['filename'] . "'></a>
                                    </div>
                                    ";
                                    $_counter++;
                                }
                                else if ($_counter >= 1 && $_counter < 4){
                                    echo "
                                    <div class='carousel-item'>
                                        <a href='artwork.php?id=" . $row['artwork_id'] . "'/><img class='carousel_img' src='uploads/" . $row['filename'] . "'></a>
                                    </div>
                                    ";
                                    $_counter++;
                                }
                                
                            }

                        ?>
                        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                        </a>
                    </div>
                </main>
                <?php
                    include('includes/footer.inc');
                ?>
            </div>
        </div>
    </body>
</html>
