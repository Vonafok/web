<div id="authorization" class="popup">
    <div class="popup__body">
        <div class="popup__content">
            <a href="#header" class="popup__close close-popup">X</a>
            <div class="popup__title">Вход</div>
            <div class="popup__form">
                <form action="php/singin.php" method="POST" class="auth" id="auth">
                    <input name="UserMail" class="form__input" placeholder="E-mail" type="text" required>
                    <input name="UserPassword" class="form__input" placeholder="Пароль" type="password" required>
                    <input type="submit" name="singin" class="form__button login-button" value="Войти">
                    <button class="form__button header__link popup-link" href="#registration">
                        Перейти к регистрации
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>