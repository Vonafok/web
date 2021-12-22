<?php
    require_once 'session.php';
    unset($_SESSION['logged_user']);
    header('Location: ../index.php');
    exit();
?>