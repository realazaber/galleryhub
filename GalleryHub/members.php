<?php
    $_pageTitle = "Member";
    include('includes/head.inc');
    include('includes/connection.inc');

    $_q_get_users = "SELECT user_id, username FROM member ORDER BY username ASC";
    
    $_r_get_users = mysqli_query($_connection, $_q_get_users);
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

                <table>
                    <?php
                        while ($row = $_r_get_users->fetch_assoc()) {
                            echo "
                                <tr>
                                    <td>
                                        <a href='member.php?id=" . $row['username'] . "'>
                                            <h2 class='text-white'>" .
                                                $row['username'] . 
                                            "</h2>
                                        </a>
                                    </td>
                                </tr>
                                ";
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