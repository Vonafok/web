<?php
$user = "root";
$pass = "";
    try {
        $connection = new PDO('mysql:host=127.0.0.2;dbname=site', $user, $pass);
    } catch (PDOException $e) {
        print "Error!: " . $e->getMessage() . "<br/>";
        die();
    }