<?php require 'db.php' ?>

<?php
header('Content-Type: application/json');


$errors = [];

$query = "SELECT * FROM `users` WHERE name LIKE '" . htmlspecialchars($_POST['name']) . "'";
$query .= " OR telephone LIKE '" . $_POST['telephone'] . "'";
$query .= " OR email LIKE '" . $_POST['email'] . "'";
$result = $connection->query($query);


foreach ($result as $row)
{
    $errors[] = "такой аккаунт уже существует";
}

if (!empty($errors)) {
   echo json_encode(['errors' => $errors]);
   die();
}

$query = "INSERT INTO `users` (`name`, `email`, `telephone`, `password`) VALUES ('" . $_POST['name'] . "','" . $_POST['email'] . "','" . $_POST['telephone'] . "','" . $_POST['password'] . "')";
$result = $connection->query($query);

echo json_encode(['success' => true]);

session_start();
$_SESSION['name'] = $_POST['name'];