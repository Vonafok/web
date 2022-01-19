<?php require 'db.php' ?>

<?php
$idd = htmlspecialchars($_GET["id"]);
$path = "";
$date = "";
$name = "";
$author_name = "";
$rate_count = "";
$average_rate = "";


$query = "SELECT photo_id, path, date, photo.name, users.name AS 'author_name' FROM users, photo WHERE users.email = photo.owner_email AND photo_id = $idd;";
$photos = $connection->query($query);

foreach ($photos as $row)
{
    $path = $row['path'];
    $date = $row['date'];
    $name = $row['name'];
    $author_name = $row['author_name'];
}

$query = "SELECT COUNT(*) FROM rates WHERE photo_id = $idd";
$photos = $connection->query($query);
foreach ($photos as $row)
{
    $rate_count = $row['COUNT(*)'];
}

$query = "SELECT AVG(rate) FROM rates WHERE photo_id=$idd";
$photos = $connection->query($query);
foreach ($photos as $row)
{
    $average_rate = $row['AVG(rate)'];
}
$average_rate = number_format($average_rate,2);
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles/style.css">
    <title>ГАЛЕРЕЯ</title>
</head>
<body class="lock-padding">
    <div class="wrapper">
        <div class="header">
            <img src="images/logo.png" href = "../" alt="Logo" class="header__logo"> 
            <div class="header__title"> <a href = "../">ГАЛЕРЕЯ</a></div>
            <div class="header__navigation">
                <button id="auth_button" class="header__button popup-link">Войти</button>
                <button id="reg_button" class="header__button popup-link">Зарегистрироваться</button>
            </div>
        </div>
        

        <p>Название: <?= $name ?> </p>
        <p>Дата публикации: <?= $date ?> </p>
        <p>Автор: <?= $author_name ?> </p>
        <p>Средняя оценка: <?= $average_rate; ?> </p>
        <p>Всего оценок: <?= $rate_count ?></p>
        <img src="images/<?= $path ?>" class="main__photo">
        
        <div class="footer">
            <div class="footer__social-block">
                <p class="social-box">
                    <a class="social" href="mailto: mrshapca@mail.ru">
                     <img class="social-picture" src="images/e-mail.png" alt="e-mail">
                    </a>
                  </p>
                  <p class="social-box">
                      <a class="social" href="https://www.facebook.com/profile.php?id=100069560648048" target="blank">
                       <img class="social-picture" src="images/facebook.png" alt="Facebook">
                      </a>
                    </p>
                    <p class="social-box">
                      <a class="social" href="tel: +79103518109">
                       <img class="social-picture" src="images/phone.svg" alt="Phone">
                      </a>
                    </p>
                    <p class="social-box">
                      <a class="social" href="https://t.me/Phoenix_run" target="blank">
                       <img class="social-picture" src="images/telegram.svg" alt="Telegram">
                      </a>
                    </p>
                  <p class="social-box">
                      <a class="social" href="https://vk.com/id470584378" target="blank">
                       <img class="social-picture" src="images/Vk.png" alt="VKontakte">
                      </a>
                    </p>
                    <span class="footer__copyriting">© Copyriting 2021</span>
            </div>
            
            
        </div>
    </div>
    <script src="scripts/script.js"></script>
</body>
</html>