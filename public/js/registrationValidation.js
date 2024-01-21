let emailField = document.getElementById("email");
let errorMsg = document.getElementById("error-msg");
let button = document.getElementById("button");
let mailRegex = /^[a-zA-Z][a-zA-Z0-9\-_.]+@[a-zA-Z0-9]{2,}\.[a-zA-Z0-9]{2,}\.?[a-zA-Z0-9]{0,}$/;

function checkEmail() {
    if (mailRegex.test(emailField.value)) {
        errorMsg.style.display = "none";
        emailField.style.borderColor = "#dee2e6";
        button.disabled = false;
    } else if(emailField.value == "") {
        errorMsg.style.display = "none";
        emailField.style.borderColor = "#dee2e6";
        button.disabled = true;
    } else {
        errorMsg.style.display = "block";
        errorMsg.style.color = "#DC3545";
        emailField.style.borderColor = "#DC3545";
        button.disabled = true;
    }
}

let usernameField = document.getElementById("login");
let usernameRegex = /^[a-zA-Z0-9\-_.]{3,}$/;
let errorMsgLogin = document.getElementById("error-msg-login");
function checkUsername() {
    if (usernameRegex.test(usernameField.value)) {
        errorMsgLogin.style.display = "none";
        usernameField.style.borderColor = "#dee2e6";
        button.disabled = false;
    } else if(usernameField.value == "") {
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