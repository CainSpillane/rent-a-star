<?php 

define("FILE_AUTHOR", "K Wright");

// sign out and redirect to login page
session_start();
session_unset();
session_destroy();
header("Location: star_login.php");