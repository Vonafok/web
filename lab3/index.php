<?php require 'db.php' ?>

<?php

$query = "SELECT * FROM `photo` ORDER BY 'date' LIMIT 2";
$photos = $connection->query($query);


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
            <img src="images/logo.png"  alt="Logo" class="header__logo">
            <div class="header__title">ГАЛЕРЕЯ</div>
            <div class="header__navigation">
                <button id="auth_button" class="header__button popup-link">Войти</button>
                <button id="reg_button" class="header__button popup-link">Зарегистрироваться</button>
            </div>
        </div>
        <div class="main" id = "photo_container">
            <?php foreach ($photos as $row) : ?>
                <a href="detailed_page.php?id=<?= $row['photo_id'] ?>">
                  <img src="images/<?= $row['path'] ?>" class="main__photo">
                </a>
            <?php
            endforeach;
            ?>
        
        </div>
        <button id="load_new_images" offset = "2">далее</button>
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

    <div id="authorization" class="popup">
        <div class="popup__body">
            <div class="popup__content">
                <a id ="authFormClose" href="#" class="popup__close close-popup">X</a>
                <div class="popup__title">Вход</div>
                <div class="popup__form">
                    <form action="#" class="auth" id="auth">
                        <label for="UserMail">E-mail</label>
                        <input id="UserMail" class="form__input" placeholder="example@gmail.com" type="email" required>

                        <label for="UserPassword">Пароль</label>
                        <input id="UserPassword" class="form__input" placeholder="p@ssWoRD1" type="password" required>
                        <input type="submit" class="form__button login-button" value="Войти">
                        <button class="form__button header__link popup-link" id="login-form-button-to-signup">
                            Перейти к регистрации
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div id="registration" class="popup">
        <div class="popup__body">
            <div class="popup__content">
                <a id ="regFormClose" href="#" class="popup__close close-popup">X</a>
                <div class="popup__title">Регистрация</div>
                <div class="popup__form">
                    <form action="#" class="registration" id="registration">
                        <label for="UserName">Имя</label>
                        <input id="UserName" class="form__input" type="name" required="" placeholder="Иван" pattern="[А-Яа-яA-Za-z\s-]*" title="Используйте русские или латинские буквы">

                        <label for="UserMail">E-mail</label>
                        <input id="UserMail" class="form__input" type="email" required="" placeholder="example@gmail.com" title="Введите email">

                        <label for="UserPhone">Телефон</label>
                        <input id="UserPhone" class="form__input" required="" placeholder="89205108710" pattern="8\d{3}\d{3}\d{2}\d{2}" title="Введите телефон в формате 8**********">

                        <label for="UserPassword">Пароль</label>
                        <input id="UserPassword" class="form__input" type="password" placeholder="p@ssWoRD1" required="" pattern="^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{6,}$" title="Минимум 6 символов. Обязательно наличие букв и цифр">

                        <label for="UserRepeatPassword">Повторите пароль</label>
                        <input id="UserRepeatPassword" class="form__input" type="password" placeholder="p@ssWoRD1" required="" pattern="^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,}$" title="Минимум 8 символов. Обязательно наличие букв и цифр">
                        <span><input name="agreement" class="form__checkbox" type="checkbox" value="true" required>Я принимаю условия политики конфеденциальности</span>
                        <input type="submit" class="form__button registration-button" value="Зарегистрироваться">
                        <button class="form__button header__link popup-link" id="signup-form-button-to-login" >Перейти к авторизации</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script src="scripts/script.js"></script>
</body>
</html>