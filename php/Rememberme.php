<?php
session_start();
if (!isset($_SESSION["currentUserName"])) header('Location: Login.php');
if (isset($_SESSION["lifeTime"]) && (time() - $_SESSION["startTime"] > $_SESSION["lifeTime"])) {
    session_destroy();
    header("Location: Login.php");
    exit;
}
?>