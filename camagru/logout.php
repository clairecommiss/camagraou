<?php
session_start();
include('config.php');
$_SESSION['uid']=''; 
header("Location: home.php");
?>