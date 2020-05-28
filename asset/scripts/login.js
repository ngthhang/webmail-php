//on focus 
function onFocus() {
    let error_message = $('#error-message');
    error_message.html('');
}

// handle input login
function isInputLoginValid() {
    let useremail = $('#email').val();
    let password = $('#pwd').val();
    let error_message = $('#error-message');
    if (useremail == '') {
        error_message.html('Please enter your email');
        error_message.show();
        event.preventDefault();
        usermail.focus();
        return false
    } else if (!useremail.includes("@")) {
        error_message.html('Your email is not valid');
        error_message.show();
        event.preventDefault();
        usermail.focus();
        return false
    } else if (password == '') {
        error_message.html('Please enter your password');
        error_message.show();
        event.preventDefault();
        userpassword.focus();
        return false
    } else if (password.length < 6) {
        error_message.html('Passwork must contain at least 6 characters');
        error_message.show();
        event.preventDefault();
        userpassword.focus();
        return false
    }
    error_message.hide();
    return true
}

// Handle input logup
function isInputValid() {
    let email = $('#usermail').val();
    let password = $('#userpassword').val();
    let name = $('#username').val();
    let number = $('#userphone').val();
    let error_message = $('#error-message');
    if (name == '') {
        error_message.html("Please enter your name");
        error_message.show();
        username.focus();
        event.preventDefault();
        return false
    }
    else if (number.length < 10 || number.length > 10) {
        error_message.html("Your number phone is invalid");
        error_message.show();
        event.preventDefault();
        userphone.focus();
        return false
    }
    else if (email == '') {
        error_message.html('Please enter your email');
        error_message.show();
        event.preventDefault();
        usermail.focus();
        return false
    } else if (!email.includes("@")) {
        error_message.html('Your email is not valid');
        error_message.show();
        event.preventDefault();
        usermail.focus();
        return false
    } else if (password == '') {
        error_message.html('Please enter your password');
        error_message.show();
        event.preventDefault();
        userpassword.focus();
        return false
    } else if (password.length < 6) {
        error_message.html('Passwork must contain at least 6 characters');
        error_message.show();
        event.preventDefault();
        userpassword.focus();
        return false
    }
    error_message.hide("slow");
    return true
}

//show error
function showError(message){
    let error_message = $('#error-message');
    error_message.html(message);
    error_message.show();
}

//toggle show password 
function showPassword(input){
    let input_password = document.getElementById(input);
    if(input_password.type === 'text'){
        input_password.type = 'password';
    } else{
        input_password.type = 'text';
    }
}
