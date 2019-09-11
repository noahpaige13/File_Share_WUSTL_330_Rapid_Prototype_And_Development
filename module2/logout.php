<!-- End Session on Logout and go to homepage -->
<?php
session_start();

session_destroy();
header ("Location: FileHomePage.html");


?>