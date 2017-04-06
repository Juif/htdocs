<?php
session_start();
session_unset();
session_destroy();
ob_start();
header("location:entrainement.php");
ob_end_flush();
include 'entrainement.php';

exit();
?>
