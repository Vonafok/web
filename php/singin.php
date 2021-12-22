<?php
    require 'rb.php';
    require_once 'session.php';
    $config = require 'config.php';

    R::setup('mysql:host='.$config['host'].';dbname='.$config['db_name'], $config['username'], $config['password']);
    $data = $_POST;
    $errors = array();

    if(isset($data['singin'])) {
        $user = R::findOne('client', 'email = ?', array($data['UserMail']));

        if($user) {
            if(password_verify($data['UserPassword'], $user['password'])) {
                $_SESSION['logged_user'] = $user;

                header('Location: ../index.php');
                exit();
            }
            else {
                $errors[] = "Uncorrect password!";
            }
        }
        else {
            $errors[] = "User by this e-mail not found!";
        }

        echo array_shift($errors);
    }
?>