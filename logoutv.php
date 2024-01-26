<?php
session_name("session2");
session_start();
session_unset();
header("location:loginv.php");
?>