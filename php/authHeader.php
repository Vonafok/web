<?php
    require_once 'session.php';
    //var_dump($_SESSION['logged_user']);
?>
<div class="header">
    <img src="images/logo.png" alt="Logo" class="header__logo">
    <div class="header__title">XGallery</div>
    <div class="header__navigation">
        <a href="php/logout.php">Выйти</a>
    <button href="php/logout.php" class="header__button popup-link">Выйти</button>
    </div>
</div>