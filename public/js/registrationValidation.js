//funkcia na overenie spravneho tvaru emailovej adresy
function checkEmail() {
    let emailField = document.getElementById("email");
    let errorMsgEmail = document.getElementById("error-msg");
    let button = document.getElementById("button");
    let mailRegex = /^[a-zA-Z][a-zA-Z0-9\-_.]+@[a-zA-Z0-9]{2,}\.[a-zA-Z0-9]{2,}\.?[a-zA-Z0-9]{0,}$/;

    if (mailRegex.test(emailField.value)) {
        errorMsgEmail.style.display = "none";
        emailField.style.borderColor = "#dee2e6";
        button.disabled = false;
    } else if(emailField.value == "") {
        errorMsgEmail.style.display = "none";
        emailField.style.borderColor = "#dee2e6";
        button.disabled = true;
    } else {
        errorMsgEmail.style.display = "block";
        errorMsgEmail.style.color = "#DC3545";
        emailField.style.borderColor = "#DC3545";
        button.disabled = true;
    }
}

//funkcia na overenie spravnosti tvaru prihlasovacieho mena
function checkUsername() {
    let usernameField = document.getElementById("login");
    let usernameRegex = /^[a-zA-Z0-9\-_.]{3,}$/;
    let errorMsgLogin = document.getElementById("error-msg-login");

    if (usernameRegex.test(usernameField.value)) {
        errorMsgLogin.style.display = "none";
        usernameField.style.borderColor = "#dee2e6";
        button.disabled = false;
    } else if(usernameField.value === "") {
        errorMsgLogin.style.display = "none";
        usernameField.style.borderColor = "#dee2e6";
        button.disabled = true;
    } else {
        errorMsgLogin.style.display = "block";
        errorMsgLogin.style.color = "#DC3545";
        usernameField.style.borderColor = "#DC3545";
        button.disabled = true;
    }
}

//funkcia na overenie identickosti hesla
function passwordValidation() {
    let passwordField = document.getElementById("password");
    let passwordAgainField = document.getElementById("password-again");
    let errorMsgPassword = document.getElementById("error-msg-password");

    if (passwordAgainField.value === passwordField.value) {
        errorMsgPassword.style.display = "none";
        passwordAgainField.style.borderColor = "#dee2e6";
        button.disabled = false;
    } else if (passwordAgainField.value === "") {
        errorMsgPassword.style.display = "none";
        passwordAgainField.style.borderColor = "#dee2e6";
        button.disabled = false;
    } else if (passwordField.value === "") {
        errorMsgPassword.style.display = "none";
        passwordAgainField.style.borderColor = "#dee2e6";
        button.disabled = false;
    } else {
        errorMsgPassword.style.display = "block";
        errorMsgPassword.style.color = "#DC3545";
        passwordAgainField.style.borderColor = "#DC3545";
        button.disabled = true;
    }
}