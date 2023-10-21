<?php
session_start();
require_once("partials/header.php");
session_unset();
session_destroy();
header('location: index.php');
exit();

?>