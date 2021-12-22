class Validate {

    _form;
    _type;
    _error;
    _lastError;
    _isValide;

    _email;
    _password;
    _repeatPassword;
    _name;
    _phone;
    _agreement;
    

    constructor(hSelector, type) {
        this._form = new FormData(document.querySelector(hSelector));
        this._type = type;
        this._lastError = "";
    }

    getResult() {
        switch(this._type) {
            case "auth":
                this._email = this._form.get('UserMail');
                this._password = this._form.get('UserPassword');
                if(this.Email(this._email) && this.Password(this._password)) {
                    return true;
                }
                else {
                   return this._lastError;
                }
            case "reg":
                // имя почта телефон пароль пароль чек
                this._name = this._form.get('UserName');
                this._email = this._form.get('UserMail');
                this._phone = this._form.get('UserPhone');
                this._password = this._form.get('UserPassword');
                this._repeatPassword = this._form.get('UserRepeatPassword');
                this._agreement = this._form.get('agreement');

                if(this.Name(this._name) && this.Email(this._email) && this.Phone(this._phone) && this.Password(this._password) 
                && this.RepeatPassword(this._password, this._repeatPassword) && this.Agreement(this._agreement)) {
                    return true;
                }
                else {
                    return this._lastError;
                }
        }
    }

    getLastError() {
        return this._lastError;
    }

    Email(email) {
            this._isValide = true;
            const re = /^(([^<>()[\]\.,;:\s@\"]+(\.[^<>()[\]\.,;:\s@\"]+)*)|(\".+\"))@(([^<>()[\]\.,;:\s@\"]+\.)+[^<>()[\]\.,;:\s@\"]{2,})$/i;
            this._isValide = re.test(email);
            if(!this._isValide) {
                this._lastError = "Некорректный E-mail";
            }
            return this._isValide;
    }

    Password(password) {
        this._isValide = true;
        let count = 0;
        if(password.lenght < 6) {
            this._lastError = "Короткий пароль";
            this._isValide = false;
        }
        else {
            count++;
        }

        if(/[A-Z]/.test(password)) {
            count++;
        }

        if(/[a-z]/.test(password)) {
            count++;
        }

        if( /\d/.test(password)) {
            count++;
        }

        if( /\W/.test(password)) {
            count++;
        }

        if(count > 3) {
            return true
        }
        else {
            this._lastError = "Ненадежный пароль";
            return false;
        }
    }

    RepeatPassword(password, repeatPassword) {
        if(password == repeatPassword) {
            return true;
        }
        else {
            this._lastError = "Пароли не совпадают";
            return false;
        }
    }

    Name(name) {
        if(/^[а-яА-Я\-]+$/.test(name)) {
            return true;
        } 
        else {
            this._lastError = "Некорректное имя";
            return false;
        }
    }

    Phone(phone) {
        if(/^(\s*)?(\+)?([- _():=+]?\d[- _():=+]?){10,14}(\s*)?$/.test(phone)) {
            return true;
        }
        else {
            this._lastError = "Некорректный номер телефона";
        }
    }

    Agreement(agreement) {
        if(agreement) {
            return true;
        }
        else {
            this._lastError = "Непринято пользовательское соглашение";
            return false;
        }
    }
}