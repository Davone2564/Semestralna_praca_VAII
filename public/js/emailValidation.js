let emailField = document.getElementById("email");
let errorMsg = document.getElementById("error-msg");
let button = document.getElementById("button");
let mailRegex = /^[a-zA-Z][a-zA-Z0-9\-_.]+@[a-zA-Z0-9]{2,}\.[a-zA-Z0-9]{2,}$/;

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