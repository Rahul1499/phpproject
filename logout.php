<?php
session_start();

session_unset();
session_destroy();
 
 //"you are logout";die();
 header("location:login.php");



?>