<?php
    include('includes/connection.inc');

    $_image_id = $_GET['id'];

    $_q_get_image = "SELECT * FROM artwork WHERE artwork_id = '$_image_id'";
    
    $_r_get_image = mysqli_query($_connection, $_q_get_image);
    
    $_pageTitle = "Image Details";
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
                <?php

                    while ($row = $_r_get_image->fetch_assoc()) {
                        
                        echo "
                        <h4 class='text-white'>User: " . $row['username'] ."</h4>
                        <h4 class='text-white'>Title: " . $row['title'] ."</h4>
                        <h4 class='text-white'>Category: " . $row['category'] ."</h4>
                        <h4 class='text-white'>Tags: " . $row['tags'] ."</h4>
                        <h4 class='text-white'>Description: " . $row['description'] ."</h4>                    
                        
                        
                        <img src='uploads/" . 
                        $row["filename"] .
                         "' width='300px' height='170px'>";
                    }
                ?>
                </main>
                <?php
                    include('includes/footer.inc');
                ?>
            </div>
        </div>
    </body>
</html>