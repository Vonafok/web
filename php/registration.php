<div id="registration" class="popup">
    <div class="popup__body">
        <div class="popup__content">
            <a href="#header" class="popup__close close-popup">X</a>
            <div class="popup__title">Регистрация</div>
            <div class="popup__form">
                <form action="php/singup.php" method="POST" class="registration" id="reg">
                    <input name="UserName" class="form__input" placeholder="Имя" type="text">
                    <input name="UserMail" class="form__input" placeholder="E-mail" type="text">
                    <input name="UserPhone" class="form__input" placeholder="Телефон" type="text">
                    <input name="UserPassword" class="form__input" placeholder="Пароль" type="password">
                    <input name="UserRepeatPassword" class="form__input" placeholder="Повторите пароль" type="password">
                    <span><input name="agreement" class="form__checkbox" type="checkbox" value="true" required>Я принимаю условия политики конфеденциальности</span>
                    <input type="submit" name="singup" class="form__button registration-button" value="Зарегистрироваться">
                    <button class="form__button header__link popup-link" href="#authorization">Перейти к авторизации</button>
                </form>
            </div>
        </div>
    </div>
</div>