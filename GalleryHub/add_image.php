<?php
    include('includes/connection.inc');
    include('includes/check_login.inc');
    $_pageTitle = "Add image";
    include('includes/head.inc');
?>
        <div class="container-fluid">
            <div class="bg-secondary text-dark">
                <main>
                    <h1 class="text-white">
                        <?php echo $_pageTitle; ?>
                    </h1>
                    <form action="add_image.php" method="post" id="form_add_image" enctype="multipart/form-data">
                        <div class="form-row col-4">
                            <div class="col">
                                <h3 class="text-white">Title: </h3>
                            </div>
                            <div class="col">
                                <input class="bg-dark text-white" type="text" name="title" required>
                            </div>
                        </div>
                        
                        <div class="form-row col-4">
                            <div class="col">
                                <h3 class="text-white">Category: </h3>
                            </div>
                            <div class="col">
                                <input class="bg-dark text-white" type="text" name="category" required>
                            </div>
                        </div>

                        <div class="form-row col-4">
                            <div class="col">
                                <h3 class="text-white">Description: </h3>
                            </div>
                            <div class="col">
                                <!-- <input class="bg-dark text-white" type="text" name="description" required> -->
                                <textarea class="bg-dark text-white" name="description" form="form_add_image" cols="33" rows="5" required></textarea>
                            </div>
                        </div>
                        <br>
                        <div class="form-row col-4">
                            <div class="col">
                                <h3 class="text-white">Tags: </h3>
                            </div>
                            <div class="col">
                                <input class="bg-dark text-white" type="text" name="tags" required>
                            </div>
                        </div>

                        <div class="form-row col-4">
                            <div class="col">
                                <h3 class="text-white">Image: </h3>
                            </div>
                            <div class="col">
                                <input class="bg-dark text-white" type="file" name="image" required>
                            </div>
                        </div>
                        <br>
                        <div class="form-row col-4">
                            <div class="col">
                                <button class="btn btn-success btn-lg" name="upload_image" type="submit">Add Image</button>
                            </div>
                        </div>
                    </form>

                    <?php
                        $_username = $_SESSION['username'];

                        if (isset($_POST['upload_image'])) {
                            $_title = $_POST['title'];
                            $_category = $_POST['category'];
                            $_description = $_POST['description'];
                            $_tags = $_POST['tags'];
                            
                            $_image = $_FILES['image']['name'];
                            $_image_ext = pathinfo($_image, PATHINFO_EXTENSION);
                            $_image = pathinfo($_image, PATHINFO_FILENAME);
                            $_image = $_image.date("mjYHis").".".$_image_ext;
                            $_image_folder = "uploads/".basename($_image);
                    
                            $q_add_image = 
                            "INSERT INTO artwork (username, title, category, description, tags, filename)
                            VALUES ('$_username', '$_title', '$_category', '$_description', '$_tags', '$_image')";
                    
                            mysqli_query($_connection, $q_add_image);
                    
                            if (move_uploaded_file($_FILES['image']['tmp_name'], $_image_folder)) {
                                echo "
                                <h3 class='text-success'>
                                    Image uploaded successfully
                                </h3>
                                
                                ";
                            }
                            else {
                                echo "
                                <h3 class='text-danger'>
                                    Error.
                                </h3>
                                
                                ";
                            }
                    
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