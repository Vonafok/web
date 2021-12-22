<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles/style.css">
    <title>Галерея</title>
</head>
<body class="lock-padding">
    <div class="wrapper">

        <?php
            require_once 'php/session.php';
            if(isset($_SESSION['logged_user'])) {
                require 'php/authHeader.php';
            }
            else {
                require 'php/header.php';
            }
        ?>
        
        </div>
        <div class="main">
            <span class="main__slogan">Присоединяйтесь, чтобы получить возможность добавлять фотографии!</span>
            <?php
            require 'php/database.php';
            
            $db = new Database();
            $sql = "SELECT `id`, `name`, `description`, `path` FROM `photo`";
            $values = $db->query($sql);
            ?>

            <?php foreach($values as $value): ?>
                <img src="<?=$value['path']?>" alt="<?=$value['name']?>" class="main__photo">
            <?php endforeach; ?>
            
        </div>
        <?php require_once 'php/footer.php'; ?>
    </div>

    <?php require_once 'php/authorization.php'; ?>
    <?php require_once 'php/registration.php'; ?>

    <script src="scripts/animation.js"></script>
</body>
</html>
