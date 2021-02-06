<?php
    if (isset($_SESSION['username'])) {
        include('includes/navbars/nav_logged_in.inc');
    }
    else {
        include('includes/navbars/nav_logged_out.inc');
    }
?>