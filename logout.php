<?php
session_name("session1");
session_start();
session_unset();
header("location:login.php");
?>