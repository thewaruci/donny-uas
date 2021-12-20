<?php 
 
session_start();
session_destroy();
 
header("Location: /UAS/index.php");
 
?>