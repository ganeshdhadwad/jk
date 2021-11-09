<?php 
error_reporting(0);
include("../includes/db/database.php");
session_start();
session_destroy();
header('location: '.$path.'staff/login');
?>