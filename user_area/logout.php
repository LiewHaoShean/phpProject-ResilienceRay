<?php
session_start();
session_unset();
session_destroy();
echo "<script>window.open('../user_area/main_page/index.php', '_self')</script>";
?>