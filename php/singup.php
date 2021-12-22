<?php
    require 'rb.php';
    $config = require 'config.php';

    R::setup('mysql:host='.$config['host'].';dbname='.$config['db_name'], $config['username'], $config['password']);

    $data = $_POST;
    $errors = array();
    if(isset($data['singup'])) {
        // проверки

        if($data['UserName'] == '') {
            $errors[] = "Name is empty!";
        }

        if($data['UserMail'] == '') {
            $errors[] = "E-mail is empty!";
        }

        if($data['UserPhone'] == '') {
            $errors[] = "Phone is empty";
        }

        if($data['UserPassword'] == '') {
            $errors[] = "Password is empty!";
        }

        if($data['UserPassword'] != $data['UserRepeatPassword']) {
            $errors[] = "Password and repeat password is not allone!";
        }

        if(empty($errors)) {
            $user = R::dispense('client');
            $user->name = $data['UserName'];
            $user->email = $data['UserMail'];
            $user->phone = $data['UserPhone'];
            $user->password = password_hash($data['UserPassword'], PASSWORD_DEFAULT);
            R::store($user);

            header('Location: ../index.php');
            exit();
        }
        else {
            echo array_shift($errors);
        }
    }

?>